@extends('layout.v_template')
@section('title', 'Edit Dosen')
    
@section('content')
<form action="/dosen/update/{{$dosen->id_dosen}} " method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">NIP</label>
                    <input name="nip" class="form-control" value="{{$dosen->nip}}" readonly>
                    <div class="text-danger">
                        @error('nip')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Nama Dosen</label>
                    <input name="nama_dosen" class="form-control" value="{{$dosen->nama_dosen}}">
                    <div class="text-danger">
                        @error('nama_dosen')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Mata Kuliah</label>
                    <input name="matkul" class="form-control"value="{{$dosen->matkul}}">
                    <div class="text-danger">
                        @error('matkul')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-5">
                        <img src="{{url('foto_dosen/' . $dosen->foto_dosen)}}" width="150px" alt="">
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="">Ganti Foto Dosen</label>
                            <input type="file" name="foto_dosen" class="form-control">
                            <div class="text-danger">
                                @error('foto_dosen')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="col-sm-12">
            <div class="form-group">
                <button class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
    </div>
</form>
@endsection