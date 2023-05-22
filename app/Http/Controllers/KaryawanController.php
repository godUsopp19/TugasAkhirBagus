<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $karyawans = Karyawan::latest()->orderBy('Nama')->get();
        return view('karyawan.index', compact('karyawans'));
    }

        public function create()
    {
        return view('karyawan.create');
    }

    /**
    * store
    *
    * @param  mixed $request
    * @return void
    */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'NIP'     => 'required|unique:karyawans',
                'Nama'     => 'required',
                'Jabatan'   => 'required',
                'Bidangnsub' => 'required',
                'Unit' => 'required'
            ]);

            $karyawan = Karyawan::create([
                'NIP'     => $request->NIP,
                'Nama'     => $request->Nama,
                'Jabatan'   => $request->Jabatan,
                'Bidangnsub' => $request->Bidangnsub,
                'Unit' => $request->Unit,
                'Email'=> $request->Email
            ]);

            return redirect()->route('karyawan.index')->with(['success' => 'Data Berhasil Disimpan!']);

        } catch (\Exception $e){

            return redirect()->route('karyawan.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
    * edit
    *
    * @param  mixed $karyawan
    * @return void
    */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $blog
    * @return void
    */
    public function update(Request $request, Karyawan $karyawan)
    {
        try {
            $this->validate($request, [
                'NIP'     => 'required|unique:karyawans',
                'Nama'     => 'required',
                'Jabatan'   => 'required',
                'Bidangnsub' => 'required',
                'Unit' => 'required'
            ]);

            $karyawan = Karyawan::findOrFail($karyawan->id_k);

            $karyawan->update([
                'NIP'     => $request->NIP,
                'Nama'     => $request->Nama,
                'Jabatan'   => $request->Jabatan,
                'Bidangnsub' => $request->Bidangnsub,
                'Unit' => $request->Unit,
                'Email'=> $request->Email
            ]);

            return redirect()->route('karyawan.index')->with(['success' => 'Data Berhasil Diupdate!']);

        } catch (\Exception $e){

            return redirect()->route('karyawan.index')->with(['error' => 'Data Gagal Diupdate!']);
        }

    }

    /**
    * destroy
    *
    * @param  mixed $id
    * @return void
    */
    public function destroy($id_k)
    {
    $karyawan = karyawan::findOrFail($id_k);
    
    $karyawan->delete();

    if($karyawan){
        //redirect dengan pesan sukses
        return redirect()->route('karyawan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('karyawan.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }


}