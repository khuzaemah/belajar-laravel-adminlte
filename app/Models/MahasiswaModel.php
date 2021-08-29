<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class MahasiswaModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_mahasiswa')
            ->leftJoin('tbl_kelas', 'tbl_kelas.id_kelas', '=', 'tbl_mahasiswa.id_kelas')
            ->leftJoin('tbl_jurusan', 'tbl_jurusan.id_jurusan', '=', 'tbl_mahasiswa.id_jurusan')
            ->get();
    }
    // public function print()
    // {
    //     DB::table('tbl_mahasiswa')->get();
    // }

    public function addData($data)
    {
        DB::table('tbl_mahasiswa')->insert($data);
    }
}
