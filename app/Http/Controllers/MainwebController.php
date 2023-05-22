<?php

namespace App\Http\Controllers;
use App\Models\Pdiklat;
use App\Models\Rdiklat;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Mail\Reminder_Sertifikat;
use App\Mail\Reminder_Sertifikat_2;
use App\Models\Sertifikat;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MainwebController extends Controller
{
    public function index()
    {
        $datas = DB::table('pdiklats')
        ->where('Approval', '=', 'Disetujui')
        ->get();

        $now = Carbon::now('GMT+7');

        /*$karyawans = DB::table('sertifikats')
        ->leftJoin('karyawans', 'karyawans.id_k', '=', 'sertifikats.NamaK')
        ->leftJoin('vendors', 'vendors.id_v', "=", 'sertifikats.Lembaga')
        ->where('Em1', "=", NULL)
        ->whereNotNull('Email')
        ->whereDate('Deadline',"!=",'0000-00-00')
        ->where('Deadline', '<', $now->addMonth(3))
        ->where('Judul',"=",'A1')
        ->get();

        foreach ($karyawans as $penerima) {
            
            Mail::to($penerima->Email)->send(new Reminder_Sertifikat($penerima));
            Mail::to('krustychungus@gmail.com')->send(new Reminder_Sertifikat($penerima));
        }*/

        $now2 = Carbon::now('GMT+7');

        $goat= Sertifikat::
        leftJoin('karyawans', 'karyawans.id_k', '=', 'sertifikats.NamaK')
        ->leftJoin('vendors', 'vendors.id_v', "=", 'sertifikats.Lembaga')
        ->where('Em1', "=", NULL)
        
        ->whereNotNull('Deadline')
        
        ->whereDate('Deadline',"!=",'0000-00-00')
        ->where('Deadline', '<', $now2->addMonth(3))
        //->where('Judul',"=",'A1')
        ->limit(1);
        
        $goat->update(['Status'=> 'Reminder Ke-1']);
        $goat->update(['Em1'=> 'Sudah']);
        

        $now3 = Carbon::now('GMT+7');

        /*$karyawans2 = DB::table('sertifikats')
        ->leftJoin('karyawans', 'karyawans.id_k', '=', 'sertifikats.NamaK')
        ->leftJoin('vendors', 'vendors.id_v', "=", 'sertifikats.Lembaga')
        ->where('Em2', "=", NULL)
        ->whereNotNull('Email')
        ->whereDate('Deadline',"!=",'0000-00-00')
        ->where('Deadline', '<', $now3->addDay(76))
        ->where('Judul',"=",'A1')
        ->get();

        foreach ($karyawans2 as $penerima2) {
            
            Mail::to($penerima2->Email)->send(new Reminder_Sertifikat_2($penerima2));
            Mail::to('krustychungus@gmail.com')->send(new Reminder_Sertifikat_2($penerima2));
        }*/

        $now4 = Carbon::now('GMT+7');

        $goat2= Sertifikat::
        leftJoin('karyawans', 'karyawans.id_k', '=', 'sertifikats.NamaK')
        ->leftJoin('vendors', 'vendors.id_v', "=", 'sertifikats.Lembaga')
        ->where('Em2', "=", NULL)
        
        ->whereNotNull('Deadline')
        
        ->whereDate('Deadline',"!=",'0000-00-00')
        ->where('Deadline', '<', $now4->addDay(76))
        //->where('Judul',"=",'A1')
        ->limit(1);
        
        $goat2->update(['Status'=> 'Reminder Ke-2']);
        $goat2->update(['Em2'=> 'Sudah']);
        

        $now5 = Carbon::now('GMT+7');

        $goat3= Sertifikat::
            leftJoin('karyawans', 'karyawans.id_k', '=', 'sertifikats.NamaK')
            ->leftJoin('vendors', 'vendors.id_v', "=", 'sertifikats.Lembaga')
            ->where('Em1', "=", 'Sudah')
            ->whereNotNull('Deadline')
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->where('Deadline', '<', $now5)
            ->limit(1);
            
        $goat3->update(['Status'=> 'Expired']);

        

        return view('mainweb.index', compact('datas'));

    }
}
