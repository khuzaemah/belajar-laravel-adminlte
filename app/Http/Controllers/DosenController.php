<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DosenModel;

class DosenController extends Controller
{

    public function __construct()
    {
        $this->DosenModel = new DosenModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'dosen' => $this->DosenModel->allData(),
        ];
        return view('v_dosen', $data);
    }

    public function detail($id_dosen)
    {
        if (!$this->DosenModel->detailData($id_dosen)) {
            abort(404);
        }
        $data = [
            'dosen' => $this->DosenModel->detailData($id_dosen),
        ];
        return view('v_detaildosen', $data);
    }

    public function add()
    {
        return view('v_adddosen');
    }

    public function insert()
    {

        Request()->validate(
            [
                'nip' => 'required|unique:tbl_dosen,nip|min:4|max:5',
                'nama_dosen' => 'required',
                'matkul' => 'required',
                'foto_dosen' => 'required|mimes:jpg,jpeg,bmp,png|max:1024kb',
            ],
            [
                'nip.required' => 'Wajib Diisi!!',
                'nip.unique' => 'NIP ini sudah ada!!!',
                'nip.min' => 'NIP 4 Karakter',
                'nip.max' => 'NIP 5 Karakter',
                'nama_dosen.required' => 'Wajib Diisi!!',
                'matkul.required' => 'Wajib Diisi!!',
                'foto_dosen.required' => 'Wajib Diisi!!',
            ]
        );

        //?jika validasi tidak ada maka lakukan simpan data
        //upload gambar/foto 
        $file = Request()->foto_dosen;
        $fileName = Request()->nip . '.' . $file->extension();
        //$request->file('key')->move(destinationPath, $fileName);
        $file->move(public_path('foto_dosen'), $fileName);

        $data = [
            'nip' => Request()->nip,
            'nama_dosen' => Request()->nama_dosen,
            'matkul' => Request()->matkul,
            'foto_dosen' => $fileName,
        ];
        $this->DosenModel->addData($data);
        return redirect()->route('dosen')->with('pesan', 'Data Berhasil Ditambahkan !!!');
    }

    public function edit($id_dosen)
    {
        if (!$this->DosenModel->detailData($id_dosen)) {
            abort(404);
        }
        $data = [
            'dosen' => $this->DosenModel->detailData($id_dosen),
        ];
        return view('v_editdosen', $data);
    }

    public function update($id_dosen)
    {

        Request()->validate(
            [
                'nip' => 'required|min:4|max:5',
                'nama_dosen' => 'required',
                'matkul' => 'required',
                'foto_dosen' => 'mimes:jpg,jpeg,bmp,png|max:1024kb',
            ],
            [
                'nip.required' => 'Wajib Diisi!!',
                'nip.min' => 'NIP 4 Karakter',
                'nip.max' => 'NIP 5 Karakter',
                'nama_dosen.required' => 'Wajib Diisi!!',
                'matkul.required' => 'Wajib Diisi!!',
            ]
        );

        //?jika validasi tidak ada maka lakukan simpan data


        if (Request()->foto_dosen <> "") {
            //!jika ingin ganti foto
            //upload gambar/foto 
            $file = Request()->foto_dosen;
            $fileName = Request()->nip . '.' . $file->extension();
            //$request->file('key')->move(destinationPath, $fileName);
            $file->move(public_path('foto_dosen'), $fileName);

            $data = [
                'nip' => Request()->nip,
                'nama_dosen' => Request()->nama_dosen,
                'matkul' => Request()->matkul,
                'foto_dosen' => $fileName,
            ];
            $this->DosenModel->editData($id_dosen, $data);
        } else {
            //!jika tidak ganti foto
            $data = [
                'nip' => Request()->nip,
                'nama_dosen' => Request()->nama_dosen,
                'matkul' => Request()->matkul,
            ];
            $this->DosenModel->editData($id_dosen, $data);
        }

        return redirect()->route('dosen')->with('pesan', 'Data Berhasil Di Update !!!');
    }

    public function delete($id_dosen)
    {
        //hapus foto
        $dosen = $this->DosenModel->detailData($id_dosen);
        if ($dosen->foto_dosen <> "") {
            unlink(public_path('foto_dosen') . '/' . $dosen->foto_dosen);
        }
        $this->DosenModel->deleteData($id_dosen);
        return redirect()->route('dosen')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }
}
