@extends('layouts',[
    'title' => 'Latihan'
])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah
                    </button>
                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <strong>{{session('success')}}</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        <strong>{{session('error')}}</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="table-responsive mt-2">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <th>No.</th>
                            <th>Nilai</th>
                            <th>Created</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($nilai as $rows)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$rows->nilai}}</td>
                                    <td>{{$rows->created_at}}</td>
                                    <td>
                                        <a href="/test/{{$rows->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="/test/{{$rows->id}}/delete" onclick="return confirm('Yakin untuk menghapus?')" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/test/insert" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="number" class="form-control" name="nilai" id="nilai">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
