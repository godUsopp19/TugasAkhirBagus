<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usulan;
use Illuminate\Support\Facades\DB;
Use Carbon\Carbon;

class UsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usulans = Usulan::latest()->get();
        return view('usulan.index', compact('usulans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usulan.create');
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
                'NamaP'=> 'required',
                'Usulan'     => 'required',
                'Alasan' =>'required'
                
            ]);
            $now = Carbon::now('GMT+7');

            $activityLog = [

                'username'=> auth()->user()->username,
                'modify'  => 'Membuat Usulan Baru',
                'updated' => $request->Usulan,
                'date_time'=> $now,
            ];
    
            DB::table('activity_logs')->insert($activityLog);

            $usulan = Usulan::create([
                'NamaP'=> $request->NamaP,
                'Usulan'     => $request->Usulan,
                'Alasan' =>$request->Alasan
            ]);

            return redirect()->route('usulan.index')->with(['success' => 'Data Berhasil Disimpan!']);

        } catch (\Exception $e){

            return redirect()->route('usulan.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function show(usulan $usulan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function edit(usulan $usulan)
    {
        return view('usulan.edit', compact('usulan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, usulan $usulan)
    {
        try {
            $this->validate($request, [
                'NamaP'=> 'required',
                'Usulan'     => 'required',
                'Alasan' =>'required'
            ]);

            $usulan = Usulan::findOrFail($usulan->id);
            $now = Carbon::now('GMT+7');

            $activityLog = [

                'username'=> auth()->user()->username,
                'modify'  => 'Mengubah Usulan',
                'updated' => $request->Usulan,
                'date_time'=> $now,
            ];
    
            DB::table('activity_logs')->insert($activityLog);

            $usulan->update([
                'NamaP'=> $request->NamaP,
                'Usulan'     => $request->Usulan,
                'Alasan' =>$request->Alasan
            ]);

            return redirect()->route('usulan.index')->with(['success' => 'Data Berhasil Diupdate!']);

        } catch (\Exception $e){

            return redirect()->route('usulan.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usulan = Usulan::findOrFail($id);

        $now = Carbon::now('GMT+7');

    $activityLog = [

        'username'=> auth()->user()->username,
        'modify'  => 'Menghapus Usulan',
        'updated' => $usulan->Usulan,
        'date_time'=> $now,
    ];

    DB::table('activity_logs')->insert($activityLog);
    
        $usulan->delete();

    if($usulan){
        //redirect dengan pesan sukses
        return redirect()->route('usulan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('usulan.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}
