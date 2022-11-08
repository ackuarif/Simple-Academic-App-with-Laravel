<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    public function formCreate()
    {
        $datas = MataKuliah::find(1);
        return view('mata_kuliah.formCreate', compact('datas'));
    }

    public function getAll()
    {
        $datas = MataKuliah::all();
        return view('mata_kuliah.list', compact('datas'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'kd_matkul' => 'required',
            'nama' => 'required',
            'sks' => 'required|integer|gt:0',
        ]);

        $req = $request->all();
        $create = MataKuliah::create($req);

        if($create)
            return redirect()->route('mata_kuliah.list');

        return redirect()->route('mata_kuliah.formCreate')->with(['error' => 'Data Gagal Disimpan!']);
    }

    public function editById(Request $request)
    {
        $datas = MataKuliah::find($request->id);
        return view('mata_kuliah.formUpdate', compact('datas'));
    }

    public function deleteById(Request $request)
    {
        $getById = MataKuliah::findOrFail($request->id);
        $getById->delete();

        if($getById)
            return redirect()->route('mata_kuliah.list')->with(['success' => 'Data Berhasil Dihapus!']);
        
        return redirect()->route('mata_kuliah.list')->with(['error' => 'Data Gagal Dihapus!']);
    }

    public function updateById(Request $request)
    {
        $this->validate($request, [
            'kd_matkul' => 'required',
            'nama' => 'required',
            'sks' => 'required|integer|gt:0',
        ]);

        $getById = MataKuliah::findOrFail($request->id);
        $getById->update([
            'kd_matkul' => $request->kd_matkul,
            'nama' => $request->nama,
            'sks' => $request->sks,
        ]);

        if($getById)
            return redirect()->route('mata_kuliah.list')->with(['success' => 'Data Berhasil Dihapus!']);
        
        return redirect()->route('mata_kuliah.list')->with(['error' => 'Data Gagal Dihapus!']);
    }
}
