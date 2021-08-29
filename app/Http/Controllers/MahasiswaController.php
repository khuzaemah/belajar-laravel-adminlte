<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MahasiswaModel;
use Dompdf\Dompdf;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->MahasiswaModel = new MahasiswaModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'mahasiswa' => $this->MahasiswaModel->allData(),
        ];
        return view('v_mahasiswa', $data);
    }

    public function add()
    {
        return view('v_addmahasiswa');
    }

    public function print()
    {
        $data = [
            'mahasiswa' => $this->MahasiswaModel->allData(),
        ];
        return view('v_print', $data);
    }

    public function printpdf()
    {
        $data = [
            'mahasiswa' => $this->MahasiswaModel->allData(),
        ];
        return view('v_printpdf', $data);
    }
}
