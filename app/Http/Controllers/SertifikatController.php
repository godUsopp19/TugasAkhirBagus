<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Vendor;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Carbon\Carbon;

class SertifikatController extends Controller
{
    
    public function index()
    {
        $datas=
        DB::table('sertifikats')
        ->leftJoin('karyawans', 'karyawans.id_k', '=', 'sertifikats.NamaK')
        ->leftJoin('vendors', 'vendors.id_v', "=", 'sertifikats.Lembaga')
        ->get(); 
        //$sertifikats = Sertifikat::latest()->paginate(10);
        return view('sertifikat.index', compact('datas',));
    }
    
    public function create()
    {
        $karyawans = Karyawan::all();
        $vendors = Vendor::all();
        return view('sertifikat.create', compact('karyawans', 'vendors'));
    }

    public function store(Request $request)
    {
            $this->validate($request, [
                'NamaK'     => 'required',
                'Judul'     => 'required',
                'Lembaga'   => 'required',
                'Fungsi' => 'required',
                'NoSertif' => 'required',
                'TglSertif' => 'required|date',
                'Deadline'=>'required|date'
            ]);

            $now = Carbon::now('GMT+7');

            $activityLog = [

                'username'=> auth()->user()->username,
                'modify'  => 'Membuat Sertifikat Baru',
                'updated' => $request->Judul,
                'date_time'=> $now,
            ];
    
            DB::table('activity_logs')->insert($activityLog);

            $sertifikat = Sertifikat::create([
                'NamaK'     => $request->NamaK,
                'Judul'     => $request->Judul,
                'Lembaga'   => $request->Lembaga,
                'Fungsi' => $request->Fungsi,
                'NoSertif' => $request->NoSertif,
                'TglSertif' => $request->TglSertif,
                'Deadline' => $request->Deadline
            ]);

            return redirect()->route('sertifikat.index')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }

    public function destroy($id_s)
    {
    $sertifikat = Sertifikat::findOrFail($id_s);

    $now = Carbon::now('GMT+7');

    $activityLog = [

        'username'=> auth()->user()->username,
        'modify'  => 'Menghapus Perencanaan',
        'updated' => $sertifikat->Judul,
        'date_time'=> $now,
    ];

    DB::table('activity_logs')->insert($activityLog);
    
    $sertifikat->delete();

    if($sertifikat){
        //redirect dengan pesan sukses
        return redirect()->route('sertifikat.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('sertifikat.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }

    public function edit(Sertifikat $sertifikat)
    {
        $karyawans = Karyawan::all();
        $vendors = Vendor::all();
        return view('sertifikat.edit', compact('karyawans', 'vendors', 'sertifikat'));
    }

    public function update(Request $request, Sertifikat $sertifikat)
    {
        try {
            $this->validate($request, [
                'NamaK'     => 'required',
                'Judul'     => 'required',
                'Lembaga'   => 'required',
                'Fungsi' => 'required',
                'NoSertif' => 'required',
                'TglSertif' => 'required|date',
                'Deadline'=>'required|date'
            ]);

            $sertifikat = Sertifikat::findOrFail($sertifikat->id_s);

            $now = Carbon::now('GMT+7');

            $activityLog = [

                'username'=> auth()->user()->username,
                'modify'  => 'Mengubah Sertifikat',
                'updated' => $request->Judul,
                'date_time'=> $now,
            ];
    
            DB::table('activity_logs')->insert($activityLog);

            $sertifikat->update([
                'NamaK'     => $request->NamaK,
                'Judul'     => $request->Judul,
                'Lembaga'   => $request->Lembaga,
                'Fungsi' => $request->Fungsi,
                'NoSertif' => $request->NoSertif,
                'TglSertif' => $request->TglSertif,
                'Deadline' => $request->Deadline
            ]);

            return redirect()->route('sertifikat.index')->with(['success' => 'Data Berhasil Diupdate!']);

        } catch (\Exception $e){

            return redirect()->route('sertifikat.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }





}
