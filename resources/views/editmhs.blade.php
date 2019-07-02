@extends('layouts',[
    'title' => 'Edit data mahasiswa'
])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-3">
            <a href="/" class="btn btn-sm btn-warning"><i class="fas fa-chevron-circle-left"></i></a>
            <form action="/mhs/{{$row['id']}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nim">Nim</label>
                    <input type="text" required value="{{$row['nim']}}" name="nim" id="nim" placeholder="Nim Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" required value="{{$row['nama']}}" name="nama" id="nama" placeholder="Nama Anda" class="form-control">
                </div>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" @if( $row['jenis_kelamin'] == "Laki-laki") checked @endif required type="radio" name="gender" id="lk" value="Laki-laki">
                        <label class="form-check-label" for="lk">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" @if( $row['jenis_kelamin'] == "Perempuan") checked @endif required type="radio" name="gender" id="pr" value="Perempuan">
                        <label class="form-check-label" for="pr">Perempuan</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select name="agama" required id="agama" class="form-control">
                        <option value="">-- Pilih Salah Satu --</option>
                        <option value="Islam" @if ($row['agama']=="Islam")selected @endif>Islam</option>
                        <option value="Katholik" @if ($row['agama']=="Katholik")selected @endif>Katholik</option>
                        <option value="Protestan" @if ($row['agama']=="Protestan")selected @endif>Protestan</option>
                        <option value="Konghucu" @if ($row['agama']=="Konghucu")selected @endif>Konghucu</option>
                        <option value="Budha" @if ($row['agama']=="Budha")selected @endif>Budha</option>
                        <option value="Hindu" @if ($row['agama']=="Hindu")selected @endif>Hindu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" required id="alamat" cols="30" rows="3" class="form-control">{{$row['alamat']}}</textarea>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <img src="{{asset('images/'.$row['foto'])}}" alt="{{$row['foto']}}"  class="img-thumbnail">
                    </div>
                    <div class="col-9">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control-file">
                    </div>
                </div>
                <div class="form-group">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection