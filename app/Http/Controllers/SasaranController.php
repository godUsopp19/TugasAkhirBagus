<?php

namespace App\Http\Controllers;

use App\Models\Sasaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Carbon\Carbon;

class SasaranController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->check()|| auth()->user()->role !== 'Admin') {
            abort(403);
        }
        $sasarans = Sasaran::latest()->get();
        return view('sasaran.index', compact('sasarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sasaran.create');
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
                'Sasaran'     => 'required|unique:sasarans',
            ]);

            $now = Carbon::now('GMT+7');

            $activityLog = [

                'username'=> auth()->user()->username,
                'modify'  => 'Membuat Sasaran',
                'updated' => $request->Sasaran,
                'date_time'=> $now,
            ];
    
            DB::table('activity_logs')->insert($activityLog);

            $sasaran = Sasaran::create([
                'Sasaran'     => $request->Sasaran,
            ]);

            return redirect()->route('sasaran.index')->with(['success' => 'Data Berhasil Disimpan!']);

        } catch (\Exception $e){

            return redirect()->route('sasaran.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sasaran  $sasaran
     * @return \Illuminate\Http\Response
     */
    public function show(sasaran $sasaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sasaran  $sasaran
     * @return \Illuminate\Http\Response
     */
    public function edit(sasaran $sasaran)
    {
        return view('sasaran.edit', compact('sasaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sasaran  $sasaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sasaran $sasaran)
    {
        try {
            $this->validate($request, [
                'Sasaran'     => 'required|unique:sasarans',
            ]);

            $sasaran = Sasaran::findOrFail($sasaran->id_v);

            $now = Carbon::now('GMT+7');

            $activityLog = [

                'username'=> auth()->user()->username,
                'modify'  => 'Mengubah Sasaran',
                'updated' => $request->Sasaran,
                'date_time'=> $now,
            ];
    
            DB::table('activity_logs')->insert($activityLog);

            $sasaran->update([
                'Sasaran'     => $request->Sasaran
            ]);

            return redirect()->route('sasaran.index')->with(['success' => 'Data Berhasil Diupdate!']);

        } catch (\Exception $e){

            return redirect()->route('sasaran.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sasaran  $sasaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sa)
    {
        $sasaran = Sasaran::findOrFail($id_sa);

        $now = Carbon::now('GMT+7');

    $activityLog = [

        'username'=> auth()->user()->username,
        'modify'  => 'Menghapus Sasaran',
        'updated' => $sasaran->Program,
        'date_time'=> $now,
    ];

    DB::table('activity_logs')->insert($activityLog);
    
        $sasaran->delete();

    if($sasaran){
        //redirect dengan pesan sukses
        return redirect()->route('sasaran.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('sasaran.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}
