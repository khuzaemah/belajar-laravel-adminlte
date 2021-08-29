@extends('layout.v_template')

@section('title', 'Mahasiswa')

@section('content')
<a href="/mahasiswa/add" class="btn btn-primary">Add</a>
<a href="/mahasiswa/print" target="_blank" class="btn btn-primary">Print to Printer</a>
<a href="/mahasiswa/printpdf" target="_blank" class="btn btn-success">Print to PDF</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Foto Mahasiswa</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        @foreach ($mahasiswa as $data)
        <tr>
            <td> {{$no++}} </td>
            <td> {{$data->nim}} </td>
            <td> {{$data->nama_mahasiswa}} </td>
            <td> {{$data->kelas}} </td>
            <td> {{$data->jurusan}} </td>
            <td> <img src="{{url('foto_mahasiswa/'.$data->foto_mahasiswa) }}" alt="foto dosen" width="100px"> </td>
            <td>
                <a href="" class="btn btn-sm btn-success" >Detail</a>
                <a href="" class="btn btn-sm btn-warning" >Edit</a>
                <button type="button" class="btn btn-sm btn-danger">
                    Delete
                </button>
            </td>
        </tr>   
        @endforeach
    </tbody>
</table>

@endsection