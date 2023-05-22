<?php

namespace App\Http\Controllers;

use App\Models\Rdiklat;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Carbon\Carbon;
use App\Http\Requests\StoreRdiklatRequest;
use App\Http\Requests\UpdateRdiklatRequest;

class RdiklatController extends Controller
{

    public function __construct()
    {
        $this->Rdiklat = new Rdiklat();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'rdiklat'=> $this->Rdiklat->allData()
        ];

        //$pdiklats = Pdiklat::latest()->paginate(10);
        return view('rdiklat.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::all();
        return view('rdiklat.create', compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRdiklatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Judul'     => 'required',
            'Pelaks'     => 'required',
            'Vendor'   => 'required',
            'JmlPes' => 'required',
            'WktM' => 'required|date',
            'WktK'=>'required|date',
            'Bidang' => 'required',
            //'PerPem' => 'required',
            'BiayaD' => 'required',
            'BiayaS' => 'required',
            'HargPen' => 'required',
            'Tahun' =>'required',
            'Status'=>'required'
        ]);

        $tot = $request->BiayaD + $request->BiayaS;
        $now = Carbon::now('GMT+7');

            $activityLog = [

                'username'=> auth()->user()->username,
                'modify'  => 'Membuat Realisasi',
                'updated' => $request->Judul,
                'date_time'=> $now,
            ];
    
            DB::table('activity_logs')->insert($activityLog);

        $rdiklat = Rdiklat::create([
            'Judul'     =>$request->Judul,
            'Pelaks'     =>$request->Pelaks,
            'Vendor'   => $request->Vendor,
            'JmlPes' => $request->JmlPes,
            'WktM' => $request->WktM,
            'WktK' => $request->WktK,
            'Bidang' => $request->Bidang,
            //'PerPem' => $request->PerPem,
            'BiayaD' => $request->BiayaD,
            'BiayaS' => $request->BiayaS,
            'BTotal' => $tot,
            'HargPen' => $request->HargPen,
            'Tahun'=>$request->Tahun,
            'Peserta'=>$request->Peserta,
            'Status'=>$request->Status
        ]);

        return redirect()->route('rdiklat.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rdiklat  $rdiklat
     * @return \Illuminate\Http\Response
     */
    public function show(Rdiklat $rdiklat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rdiklat  $rdiklat
     * @return \Illuminate\Http\Response
     */
    public function edit(Rdiklat $rdiklat)
    {
        $vendors = Vendor::all();
        return view('rdiklat.edit', compact('vendors', 'rdiklat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRdiklatRequest  $request
     * @param  \App\Models\Rdiklat  $rdiklat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rdiklat $rdiklat)
    {
        try {
            $this->validate($request, [
                'Judul' => 'required',
                'Pelaks' => 'required',
                'Vendor' => 'required',
                'JmlPes' => 'required',
                'WktM' => 'required|date',
                'WktK'=>'required|date',
                'Bidang' => 'required',
                'PerPem' => 'required',
                'BiayaD' => 'required',
                'BiayaS' => 'required',
                'BTotal' => 'required',
                'HargPen' => 'required',
                'Tahun' =>'required',
                'Status'=>'required'
            ]);

            $rdiklat = Rdiklat::findOrFail($rdiklat->id);
            $tot = $request->BiayaD + $request->BiayaS;

            $now = Carbon::now('GMT+7');

            $activityLog = [

                'username'=> auth()->user()->username,
                'modify'  => 'Mengubah Realisasi',
                'updated' => $request->Judul,
                'date_time'=> $now,
            ];
    
            DB::table('activity_logs')->insert($activityLog);

            $rdiklat->update([
                'Judul'     =>$request->Judul,
                'Pelaks'     =>$request->Pelaks,
                'Vendor'   => $request->Vendor,
                'JmlPes' => $request->JmlPes,
                'WktM' => $request->WktM,
                'WktK' => $request->WktK,
                'Bidang' => $request->Bidang,
                'PerPem' => $request->PerPem,
                'BiayaD' => $request->BiayaD,
                'BiayaS' => $request->BiayaS,
                'Tahun'=>$request->Tahun,
            'Peserta'=>$request->Peserta,
                'BTotal' => $tot,
                'HargPen' => $request->HargPen,
                'Status'=>$request->Status
            ]);

            return redirect()->route('rdiklat.index')->with(['success' => 'Data Berhasil Diupdate!']);

        } catch (\Exception $e){

            return redirect()->route('rdiklat.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rdiklat  $rdiklat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rdiklat = Rdiklat::findOrFail($id);
        $now = Carbon::now('GMT+7');

        $activityLog = [

            'username'=> auth()->user()->username,
            'modify'  => 'Menghapus Perencanaan',
            'updated' => $rdiklat->Judul,
            'date_time'=> $now,
        ];
    
        DB::table('activity_logs')->insert($activityLog);
    
        $rdiklat->delete();
        

    
    
   
    
        if($rdiklat){
            //redirect dengan pesan sukses
            return redirect()->route('rdiklat.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('rdiklat.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
