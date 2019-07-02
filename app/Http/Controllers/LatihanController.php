<?php

namespace App\Http\Controllers;
use \App\LatihanModel;
use Illuminate\Http\Request;
class LatihanController extends Controller
{
    public function index()
    {
        $test = new LatihanModel();
        $data['nilai'] = $test->orderBy('nilai','desc')->get();
        return view('latihan',$data);
    }
    public function create(Request $request)
    {
        $test = new LatihanModel();
        $test->nilai = $request->nilai;
        if($test->save()){
            return redirect('/test')->with('success','Data berhasil ditambahkan!');
        }else{
            return redirect('/test')->with('error','Data gagal ditambahkan!');
        }
    }
    public function edit($id)
    {
        $test = new LatihanModel;
        $data['row'] = $test->find($id);
        if($data['row']){
            return view('edit')->with($data);
        }else{
            return redirect('/test')->with('error','Data tidak ditemukan');
        }
    }
    public function update(Request $request, $id)
    {
        $test = \App\LatihanModel::find($id);
        $test->nilai = $request->nilai;
        $test->save();
        return redirect('/test')->with('success','Data telah di update');
    }
    public function delete($id)
    {
        $test = \App\LatihanModel::find($id);
        $test->delete();
        return redirect('/test')->with('success','Data telah di dihapus');
    }
}
