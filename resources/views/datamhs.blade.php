@extends('layouts',[
    'title' => 'Data Mahasiswa Informatika'
])
@section('content')
    <div class="container">
        <!-- Button trigger modal -->
        <div class="row">
            <div class="col">
                <div class="pull-left">
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</button>
                    <a href="/" class="btn btn-secondary mb-2"><i class="fas fa-chevron-circle-left"></i> Refresh</a>
                </div>
            </div>
            <div class="col">
                <div class="float-right">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">logout</button>
                    </form>
                </div>
            </div>
        </div>
        <form action="/mhs/search" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="cari" required placeholder="Cari.." aria-label="Cari.." aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                </div>
            </div>
        </form>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Foto</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mhs as $row)
                        <tr>
                            <td class="text-center">{{$loop->index+1}}</td>
                            <td>{{$row['nim']}}</td>
                            <td>{{$row['nama']}}</td>
                            <td>{{$row['jenis_kelamin']}}</td>
                            <td>{{$row['agama']}}</td>
                            <td>
                                <img src="{{$row->getAvatar()}}" width="50" height="50" class="img-thumbnail mx-auto d-block" alt="{{$row['foto']}}">
                            </td>
                            <td>{{$row['alamat']}}</td>
                            <td class="text-center">
                                <a href="/mhs/{{$row['id']}}/edit" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="/mhs/{{$row['id']}}/delete" onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $mhs->links() }}
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/mhs/tambah" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nim">Nim</label>
                            <input type="text" required name="nim" id="nim" placeholder="Nim Anda" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" required name="nama" id="nama" placeholder="Nama Anda" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" required type="radio" name="gender" id="lk" value="Laki-laki">
                                <label class="form-check-label" for="lk">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" required type="radio" name="gender" id="pr" value="Perempuan">
                                <label class="form-check-label" for="pr">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" required id="agama" class="form-control">
                                <option value="">-- Pilih Salah Satu --</option>
                                <option value="Islam">Islam</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Konghucu">Konghucu</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" placeholder="Foto Anda" class="form-control-file">
                        </div>
                        <div class="form-froup">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" required id="alamat" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection