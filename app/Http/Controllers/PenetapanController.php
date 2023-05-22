<?php

namespace App\Http\Controllers;

use App\Models\Penetapan;
use Illuminate\Http\Request;
Use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PenetapanController extends Controller
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
        $penetapans = Penetapan::latest()->get();
        return view('penetapan.index', compact('penetapans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penetapan.create');
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
                'Tahun' => 'required',
                'Penetapan'     => 'required',
            ]);
            $now = Carbon::now('GMT+7');

            $activityLog = [

                'username'=> auth()->user()->username,
                'modify'  => 'Membuat Penetapan',
                'updated' => $request->Tahun,
                'date_time'=> $now,
            ];
    
            DB::table('activity_logs')->insert($activityLog);

            $penetapan = Penetapan::create([
                'Tahun'     => $request->Tahun,
                'Penetapan'     => $request->Penetapan,
            ]);

            return redirect()->route('penetapan.index')->with(['success' => 'Data Berhasil Disimpan!']);

        } catch (\Exception $e){

            return redirect()->route('penetapan.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penetapan  $penetapan
     * @return \Illuminate\Http\Response
     */
    public function show(penetapan $penetapan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penetapan  $penetapan
     * @return \Illuminate\Http\Response
     */
    public function edit(penetapan $penetapan)
    {
        return view('penetapan.edit', compact('penetapan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\penetapan  $penetapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penetapan $penetapan)
    {
        try {
            $this->validate($request, [
                'Tahun' => 'required',
                'Penetapan'     => 'required',
            ]);

            $penetapan = Penetapan::findOrFail($penetapan->id_v);

            $now = Carbon::now('GMT+7');

            $activityLog = [

                'username'=> auth()->user()->username,
                'modify'  => 'Mengubah Penetapan',
                'updated' => $request->Tahun,
                'date_time'=> $now,
            ];
    
            DB::table('activity_logs')->insert($activityLog);

            $penetapan->update([
                'Tahun'     => $request->Tahun,
                'Penetapan'     => $request->Penetapan
            ]);

            return redirect()->route('penetapan.index')->with(['success' => 'Data Berhasil Diupdate!']);

        } catch (\Exception $e){

            return redirect()->route('penetapan.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penetapan  $penetapan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pen)
    {
        $penetapan = Penetapan::findOrFail($id_pen);
    
        $penetapan->delete();

    if($penetapan){
        //redirect dengan pesan sukses
        return redirect()->route('penetapan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('penetapan.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}
