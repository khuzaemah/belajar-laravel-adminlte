@extends('layout.v_template')

@section('title', 'Dosen')

@section('content')
    <a href="/dosen/add" class="btn btn-primary btn-sm">Add</a><br>

    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i>Success:</h4>
        {{session('pesan')}}
    </div>     
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>NIP</th>
                <th>Nama Dosen</th>
                <th>Mata Kuliah</th>
                <th>Foto Dosen</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($dosen as $data)
            <tr>
                <td> {{$no++}} </td>
                <td> {{$data->nip}} </td>
                <td> {{$data->nama_dosen}} </td>
                <td> {{$data->matkul}} </td>
                <td> <img src="{{url('foto_dosen/'.$data->foto_dosen) }}" alt="foto dosen" width="100px"> </td>
                <td>
                    <a href="/dosen/detail/{{$data->id_dosen}} " class="btn btn-sm btn-success" >Detail</a>
                    <a href="/dosen/edit/{{$data->id_dosen}} " class="btn btn-sm btn-warning" >Edit</a>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$data->id_dosen}}">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @foreach ($dosen as $data)     
    <div class="modal modal-danger fade" id="delete{{$data->id_dosen}}">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">{{$data->nama_dosen}}</h4>
            </div>
            <div class="modal-body">
              <p>Apakah Anda Yakin Ingin Menghapus Data Ini....???</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
              <a href="/dosen/delete/{{$data->id_dosen}} " class="btn btn-outline">Yes</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    @endforeach

    {{-- @foreach ($dosen as $data)
    NIP : {{$data['nip']}}<br>
    Nama : {{$data['nama']}}<br>
    Matkul : {{$data['matkul']}}<br>
    <br>
    @endforeach --}}

@endsection