<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pegawai::orderBy('nip','desc')->paginate(10);

        return view('admin.Data-pegawai')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create-pegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nip', $request->nip);
        Session::flash('nama', $request->nama);
        Session::flash('jk', $request->jk);
        Session::flash('alamat', $request->alamat);
        Session::flash('telepon', $request->telepon);

        $request->validate([
            'nip'=>'required|numeric|unique:pegawai,nip',
            'nama'=>'required',
            'jk'=>'required',
            'alamat'=>'required',
            'telepon'=>'required|numeric',            
        ],[
            'nip.required'=>'NIP wajib diisi',
            'nip.numeric'=>'NIP wajib diisi dengan angka',
            'nip.unique'=>'NIP sudah ada di dalam data',
            'nama.required'=>'Nama wajib diisi',
            'jk.required'=>'Jenis kelamin wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
            'telepon.required'=>'Telepon wajib diisi',
            'telepon.numeric'=>'Telepon wajib diisi dengan angka',
        ]);


        $data = [
            'nip'=>$request->nip,
            'nama'=>$request->nama,
            'jk'=>$request->jk,
            'alamat'=>$request->alamat,
            'telepon'=>$request->telepon,
        ];
        Pegawai::create($data);
        return redirect()->to('admin')->with('success','BERHASIL TAMBAH DATA');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pegawai::where('nip',$id)->first();
        return view('admin.edit-pegawai')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'jk'=>'required',
            'alamat'=>'required',
            'telepon'=>'required|numeric',            
        ],[
            'nama.required'=>'Nama wajib diisi',
            'jk.required'=>'Jenis kelamin wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
            'telepon.required'=>'Telepon wajib diisi',
            'telepon.numeric'=>'Telepon wajib diisi dengan angka',
        ]);


        $data = [
            'nama'=>$request->nama,
            'jk'=>$request->jk,
            'alamat'=>$request->alamat,
            'telepon'=>$request->telepon,
        ];
        Pegawai::where('nip',$id)->update($data);
        return redirect()->to('admin')->with('success','BERHASIL UBAH DATA');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pegawai::where('nip',$id)->delete();
        return redirect()->to('admin')->with('success','BERHASIL HAPUS DATA');
    }
}
