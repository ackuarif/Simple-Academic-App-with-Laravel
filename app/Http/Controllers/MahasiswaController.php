<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Mahasiswa;
use App\Models\User;

class MahasiswaController extends Controller
{
    public function formCreate()
    {
        $datas = Mahasiswa::find(1);
        return view('mahasiswa.formCreate', compact('datas'));
    }

    public function getAll()
    {
        $datas = Mahasiswa::all();
        return view('mahasiswa.list', compact('datas'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email'
        ]);

        $req = $request->all();
        $create = Mahasiswa::create($req);

        if($create){
            $data = [
                'name'=>$request->nama,
                'email'=>$request->email,
                'password'=>Hash::make($request->nim),
                'type'=>'mahasiswa',
            ];
            User::create($data);
            return redirect()->route('mahasiswa.list');
        }
            

        return redirect()->route('mahasiswa.formCreate')->with(['error' => 'Data Gagal Disimpan!']);
    }

    public function editById(Request $request)
    {
        $datas = Mahasiswa::find($request->id);
        return view('mahasiswa.formUpdate', compact('datas'));
    }

    public function deleteById(Request $request)
    {
        $getById = Mahasiswa::findOrFail($request->id);
        $getById->delete();

        if($getById){
            User::where('email',$getById->email)->delete();
            return redirect()->route('mahasiswa.list')->with(['success' => 'Data Berhasil Dihapus!']);
        }
        
        return redirect()->route('mahasiswa.list')->with(['error' => 'Data Gagal Dihapus!']);
    }

    public function updateById(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email'
        ]);

        $getById = Mahasiswa::findOrFail($request->id);
        $getById->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

        if($getById){
            $userGetById = User::where('email',$getById->email);
            $userGetById->update([
                'email' => $request->email,
                'password' => Hash::make($request->nim),
            ]);            
            return redirect()->route('mahasiswa.list')->with(['success' => 'Data Berhasil Dihapus!']);
        }
            
        return redirect()->route('mahasiswa.list')->with(['error' => 'Data Gagal Dihapus!']);
    }
}
