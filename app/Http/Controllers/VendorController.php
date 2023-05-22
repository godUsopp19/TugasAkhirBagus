<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Carbon\Carbon;


class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::latest()->get();
        return view('vendor.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'Vendor'     => 'required|unique:vendors',
            ]);
            $now = Carbon::now('GMT+7');

            $activityLog = [

                'username'=> auth()->user()->username,
                'modify'  => 'Membuat Vendor Baru',
                'updated' => $request->Vendor,
                'date_time'=> $now,
            ];
    
            DB::table('activity_logs')->insert($activityLog);

            $vendor = Vendor::create([
                'Vendor'     => $request->Vendor,
            ]);

            return redirect()->route('vendor.index')->with(['success' => 'Data Berhasil Disimpan!']);

        } catch (\Exception $e){

            return redirect()->route('vendor.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(vendor $vendor)
    {
        return view('vendor.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vendor $vendor)
    {
        try {
            $this->validate($request, [
                'Vendor'     => 'required|unique:vendors',
            ]);

            $vendor = Vendor::findOrFail($vendor->id_v);
            $now = Carbon::now('GMT+7');

            $activityLog = [

                'username'=> auth()->user()->username,
                'modify'  => 'Mengubah Vendor',
                'updated' => $request->Vendor,
                'date_time'=> $now,
            ];
    
            DB::table('activity_logs')->insert($activityLog);

            $vendor->update([
                'Vendor'     => $request->Vendor
            ]);

            return redirect()->route('vendor.index')->with(['success' => 'Data Berhasil Diupdate!']);

        } catch (\Exception $e){

            return redirect()->route('vendor.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_v)
    {
        $vendor = Vendor::findOrFail($id_v);

        $now = Carbon::now('GMT+7');

    $activityLog = [

        'username'=> auth()->user()->username,
        'modify'  => 'Menghapus Perencanaan',
        'updated' => $vendor->Vendor,
        'date_time'=> $now,
    ];

    DB::table('activity_logs')->insert($activityLog);
    
        $vendor->delete();

    if($vendor){
        //redirect dengan pesan sukses
        return redirect()->route('vendor.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('vendor.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}
