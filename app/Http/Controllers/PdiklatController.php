<?php

namespace App\Http\Controllers;

use App\Models\Pdiklat;
use App\Models\Vendor;
use App\Models\Sasaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Carbon\Carbon;
use App\Http\Requests\StorePdiklatRequest;
use App\Http\Requests\UpdatePdiklatRequest;

class PdiklatController extends Controller
{
    public function index()
    {
        $datas= DB::table('pdiklats')
        ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
        ->leftJoin('sasarans', 'sasarans.id_sa', "=", 'pdiklats.Tujuan')
        ->orderBy('id_p')
        ->get();

        $data1= DB::table('pdiklats')
        ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
        ->leftJoin('sasarans', 'sasarans.id_sa', "=", 'pdiklats.Tujuan')
        ->where('Bidang', 'like', '%OPS%')
        ->orWhere('Bidang', '=', 'ALL')
        ->orderBy('id_p')
        ->get();

        $data2= DB::table('pdiklats')
        ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
        ->leftJoin('sasarans', 'sasarans.id_sa', "=", 'pdiklats.Tujuan')
        ->where('Bidang', 'like', '%QAQC%')
        ->orWhere('Bidang', '=', 'ALL')
        ->orderBy('id_p')
        ->get();

        $data3= DB::table('pdiklats')
            ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
            ->leftJoin('sasarans', 'sasarans.id_sa', "=", 'pdiklats.Tujuan')
            ->where('Bidang', 'like', '%REN%')
            ->orWhere('Bidang', '=', 'ALL')
            ->orderBy('id_p')
            ->get();

        $data4= DB::table('pdiklats')
            ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
            ->leftJoin('sasarans', 'sasarans.id_sa', "=", 'pdiklats.Tujuan')
            ->where('Bidang', 'like', '%KKU%')
            ->orWhere('Bidang', '=', 'ALL')
            ->orderBy('id_p')
            ->get();

        $data4= DB::table('pdiklats')
            ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
            ->leftJoin('sasarans', 'sasarans.id_sa', "=", 'pdiklats.Tujuan')
            ->where('Bidang', 'like', '%KKU%')
            ->orWhere('Bidang', '=', 'ALL')
            ->orderBy('id_p')
            ->get();

        $data5= DB::table('pdiklats')
        ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
        ->leftJoin('sasarans', 'sasarans.id_sa', "=", 'pdiklats.Tujuan')
        ->where('Bidang', 'like', '%UPMK I%')
        ->orWhere('Bidang', '=', 'ALL')
        ->orderBy('id_p')
        ->get();

        $data6= DB::table('pdiklats')
        ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
        ->leftJoin('sasarans', 'sasarans.id_sa', "=", 'pdiklats.Tujuan')
        ->where('Bidang', 'like', '%UPMK II%')
        ->orWhere('Bidang', '=', 'ALL')
        ->orderBy('id_p')
        ->get();

        $data7= DB::table('pdiklats')
        ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
        ->leftJoin('sasarans', 'sasarans.id_sa', "=", 'pdiklats.Tujuan')
        ->where('Bidang', 'like', '%UPMK III%')
        ->orWhere('Bidang', '=', 'ALL')
        ->orderBy('id_p')
        ->get();

        $data8= DB::table('pdiklats')
        ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
        ->leftJoin('sasarans', 'sasarans.id_sa', "=", 'pdiklats.Tujuan')
        ->where('Bidang', 'like', '%UPMK IV%')
        ->orWhere('Bidang', '=', 'ALL')
        ->orderBy('id_p')
        ->get();

        $data9= DB::table('pdiklats')
        ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
        ->leftJoin('sasarans', 'sasarans.id_sa', "=", 'pdiklats.Tujuan')
        ->where('Bidang', 'like', '%UPMK V%')
        ->orWhere('Bidang', '=', 'ALL')
        ->orderBy('id_p')
        ->get();

        $data10= DB::table('pdiklats')
        ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
        ->leftJoin('sasarans', 'sasarans.id_sa', "=", 'pdiklats.Tujuan')
        ->where('Bidang', 'like', '%UPMK%')
        ->orWhere('Bidang', '=', 'ALL')
        ->orWhere('Bidang', 'like', '%OPS%')
        ->orderBy('id_p')
        ->get();

        
        return view('pdiklat.index', compact('datas','data1','data2','data3','data4','data5','data6','data7','data8','data9','data10'))
        
        
        ;
    }
    
    public function activityLog()
    {
        $activityLog = DB::table('activity_logs')->get();
        return view('pdiklat.activity_log',compact('activityLog'));
    }


    public function create()
    {
        
        $vendors = Vendor::all();
        $sasarans = Sasaran::all();
        return view('pdiklat.create', compact('vendors','sasarans'));
    }

    public function store(Request $request)
    {
            $this->validate($request, [
                'Program'     => 'required',
                'Tujuan'     => 'required',
                'Prioritas'   => 'required',
                'WktP' => 'required|date',
                'WktS' => 'required|date',
                'Vendor'=>'required',
                'JmlP' => 'required',
                //'RenP' => 'required',
                'Bidang' => 'required',
                'HargSat' => 'required',
                'SPPD' => 'required',
                'Tahun'=>'required'
                //'HargPen' => 'required',
                //'PermPemb'=>'required'
            ]);

            $rev= 0;

            $tot = ($request->HargSat * $request->JmlP) + $request->SPPD;
            $now = Carbon::now('GMT+7');

            $activityLog = [

                'username'=> auth()->user()->username,
                'modify'  => 'Membuat Perencanaan Baru',
                'updated' => $request->Program,
                'date_time'=> $now,
            ];
    
            DB::table('activity_logs')->insert($activityLog);

            $pdiklat = Pdiklat::create([
                'Program'     =>$request->Program,
                'Tujuan'     =>$request->Tujuan,
                'Prioritas'   => $request->Prioritas,
                'WktP' => $request->WktP,
                'WktS' => $request->WktS,
                'Vendor' => $request->Vendor,
                'JmlP' => $request->JmlP,
                'RenP' => $request->RenP,
                'Bidang' => $request->Bidang,
                'HargSat' => $request->HargSat,
                'SPPD' => $request->SPPD,
                'Tahun'=>$request->Tahun,
                'Peserta'=>$request->Peserta,
                'Total' => $tot,
                'LM'=> $now,
                'Rev'=> $rev,
                //'HargPen' => $request->HargPen,
                //'PermPemb'=>$request->PermPemb
            ]);

            return redirect()->route('pdiklat.index')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }

    public function destroy($id_P)
    {
    $pdiklat = Pdiklat::findOrFail($id_P);

    $now = Carbon::now('GMT+7');

    $activityLog = [

        'username'=> auth()->user()->username,
        'modify'  => 'Menghapus Perencanaan',
        'updated' => $pdiklat->Program,
        'date_time'=> $now,
    ];

    DB::table('activity_logs')->insert($activityLog);
    
    $pdiklat->delete();

    

    if($pdiklat){
        //redirect dengan pesan sukses
        return redirect()->route('pdiklat.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('pdiklat.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }

    public function edit(Pdiklat $pdiklat)
    {
        $vendors = Vendor::all();
        $sasarans = Sasaran::all();
        
        return view('pdiklat.edit', compact('vendors', 'pdiklat', 'sasarans'));
    }

    public function update(Request $request, Pdiklat $pdiklat)
    {
        
        try {
            $this->validate($request, [
                'Program'     => 'required',
                //'Tujuan'     => 'required',
                'Prioritas'   => 'required',
                'WktP' => 'required|date',
                'WktS' => 'required|date',
                'Vendor'=>'required',
                'JmlP' => 'required',
                //'RenP' => 'required',
                'Bidang' => 'required',
                'HargSat' => 'required',
                'Tahun' => 'required',
                'SPPD' => 'required',
                //'PermPemb'=>'required'
            ]);

            $pdiklat = Pdiklat::findOrFail($pdiklat->id_P);
            $tot = ($request->HargSat * $request->JmlP) + $request->SPPD;
            $now = Carbon::now('GMT+7');

            $activityLog = [

                'username'=> auth()->user()->username,
                'modify'  => 'Mengupdate Perencanaan',
                'updated' => $request->Program,
                'date_time'=> $now,
            ];
    
            DB::table('activity_logs')->insert($activityLog);
            
            $rev= $pdiklat->Rev;

            if (!auth()->check()|| auth()->user()->role == 'PIC Operasi') {
                $rev= $pdiklat->Rev + 1;
            }
            if (!auth()->check()|| auth()->user()->role == 'PIC KKU') {
                $rev= $pdiklat->Rev + 1;
            }
            if (!auth()->check()|| auth()->user()->role == 'PIC REN') {
                $rev= $pdiklat->Rev + 1;
            }
            if (!auth()->check()|| auth()->user()->role == 'PIC QAQC') {
                $rev= $pdiklat->Rev + 1;
            }
            if (!auth()->check()|| auth()->user()->role == 'PIC UPMK I') {
                $rev= $pdiklat->Rev + 1;
            }
            if (!auth()->check()|| auth()->user()->role == 'PIC UPMK II') {
                $rev= $pdiklat->Rev + 1;
            }
            if (!auth()->check()|| auth()->user()->role == 'PIC UPMK III') {
                $rev= $pdiklat->Rev + 1;
            }
            if (!auth()->check()|| auth()->user()->role == 'PIC UPMK IV') {
                $rev= $pdiklat->Rev + 1;
            }
            if (!auth()->check()|| auth()->user()->role == 'PIC UPMK V') {
                $rev= $pdiklat->Rev + 1;
            }



            $pdiklat->update([
                'Program'     =>$request->Program,
                //'Tujuan'     =>$request->Tujuan,
                'Prioritas'   => $request->Prioritas,
                'WktP' => $request->WktP,
                'WktS' => $request->WktS,
                'Vendor' => $request->Vendor,
                'JmlP' => $request->JmlP,
                'RenP' => $request->RenP,
                'Bidang' => $request->Bidang,
                'HargSat' => $request->HargSat,
                'SPPD' => $request->SPPD,
                'Tahun'=>$request->Tahun,
                'Peserta'=>$request->Peserta,
                'Total' => $tot,
                'HargPen' => $request->HargPen,
                'Alasan' => $request->Alasan,
                'LM'=> $now,
                'Rev'=> $rev,
                //'PermPemb'=>$request->PermPemb,
                'Approval'=>$request->Approval
            ]);

            return redirect()->route('pdiklat.index')->with(['success' => 'Data Berhasil Diupdate!']);

        } catch (\Exception $e){

            return redirect()->route('pdiklat.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
}
