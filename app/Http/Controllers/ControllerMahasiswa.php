<?php

namespace App\Http\Controllers;
use \App\ModelMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ControllerMahasiswa extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index(Request $request)
    {
        $mhs = new ModelMahasiswa();
        if($request){
            $data = $mhs->where('nama','LIKE','%'.$request->cari.'%')
                        ->orWhere('nim','LIKE','%'.$request->cari.'%')
                        ->orWhere('alamat','LIKE','%'.$request->cari.'%')->orderBy('nim','asc')->paginate(4);
        }else{
            $data = $mhs->orderBy('nim','asc')->paginate(3);
        }
        return view('datamhs')->with(['mhs' => $data]);
    }
    public function create(Request $request)
    {
        $mhs = new ModelMahasiswa();
        $mhs->nim = $request->nim;
        $mhs->nama = $request->nama;
        $mhs->jenis_kelamin = $request->gender;
        $mhs->agama = $request->agama;
        $file = $request->file('foto');
        if($file != null){
            $new_name = $request->nim."_".$request->nama.".".$file->getClientOriginalExtension();
            $file->move('images/',$new_name);
            $mhs->foto = $new_name;
        }else{
            $mhs->foto = "default.jpg";
        }
        $mhs->alamat = $request->alamat;
        $mhs->save();
        return redirect('/')->with('success','Data berhasil diinput!');
    }
    public function edit($id)
    {
        $mhs = new ModelMahasiswa();
        $data['row'] = $mhs->find($id);
        return view('editmhs')->with($data);
    }
    public function update(Request $request,$id)
    {
        $mhs = \App\ModelMahasiswa::find($id);
        $mhs->nim = $request->nim;
        $mhs->nama = $request->nama;
        $mhs->jenis_kelamin = $request->gender;
        $mhs->agama = $request->agama;
        $mhs->alamat = $request->alamat;
        if($request->file('foto') != null){
            if($mhs->foto != "default.jpg"){
                unlink(public_path('/images/').$mhs->foto);
            }
            $new_name = $request->nim."_".$request->nama.".".$request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move('images/',$new_name);
            $mhs->foto = $new_name;
        }
        $mhs->save();
        return redirect('/')->with('success','Data telah di update');
    }
    public function delete($id)
    {
        $mhs = \App\ModelMahasiswa::find($id);
        if($mhs->foto != "default.jpg"){
            unlink(public_path('/images/').$mhs->foto);
        }
        $mhs->delete();
        return redirect('/')->with('success','Data telah di hapus');
    }
}
