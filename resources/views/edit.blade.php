@extends('layouts',[
    'title' => 'Edit data'
])
@section('content')
   <div class="container">
       <div class="row">
           <div class="col">
                <form action="/test/{{$row->id}}/update" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="text" name="nilai" id="nilai" value="{{$row->nilai}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                </form>
           </div>
       </div>
   </div>
@endsection