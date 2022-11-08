<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;
use App\Models\Mahasiswa;
use App\Models\Krs;

class KrsController extends Controller
{
    public function formCreate()
    {
        $email = auth()->user()->email;
        $mahasiswas = Mahasiswa::where(['email'=>$email])->get()[0];
        $matkuls = MataKuliah::all();
        $krss = Krs::where(['nim'=>$mahasiswas->nim])->with('mata_kuliah')->get();
        return view('krs.formCreate', compact('matkuls','mahasiswas','krss'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'kd_matkul' => 'required',
        ]);

        $req = $request->except(['_token','nama']);
        $create = Krs::updateOrCreate($req);
        $create->save();

        if($create)
            return redirect()->route('krs.formCreate');

        return redirect()->route('krs.formCreate')->with(['error' => 'Data Gagal Disimpan!']);
    }

    public function deleteById(Request $request)
    {
        $getById = Krs::findOrFail($request->id);
        $getById->delete();

        if($getById)
            return redirect()->route('krs.formCreate')->with(['success' => 'Data Berhasil Dihapus!']);
        
        return redirect()->route('krs.formCreate')->with(['error' => 'Data Gagal Dihapus!']);
    }
}
