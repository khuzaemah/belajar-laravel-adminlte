@extends('layout.v_template')
@section('title', 'Add Mahasiswa')
    
@section('content')

<form action="/mahasiswa/insert" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input name="nim" class="form-control" value=" {{old('nim')}} ">
                    <div class="text-danger">
                        @error('nim')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                              
                
                <div class="form-group">
                    <label for="nama_mahasiswa">Nama Mahasiswa</label>
                    <input name="nama_mahasiswa" class="form-control" value=" {{old('nama_mahasiswa')}} ">
                    <div class="text-danger">
                        @error('nama_mahasiswa')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                              
                <div class="form-group">
                    <label for="id_prodi">Prodi</label>
                    <input name="id_prodi" class="form-control" value=" {{old('id_prodi')}} ">
                    <div class="text-danger">
                        @error('id_prodi')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="id_jurusan">Jurusan</label>
                    <input name="id_jurusan" class="form-control" value=" {{old('id_jurusan')}} ">
                    <div class="text-danger">
                        @error('id_jurusan')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="id_kelas">Kelas</label>
                    <input name="id_kelas" class="form-control" value=" {{old('id_kelas')}} ">
                    <div class="text-danger">
                        @error('id_kelas')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="foto_mahasiswa">Foto Mahasiswa</label>
                    <input type="file" name="foto_mahasiswa" class="form-control">
                    <div class="text-danger">
                        @error('foto_mahasiswa')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Simpan</button>
                </div>
                
            </div>
        </div>
    </div>
</form>

@endsection