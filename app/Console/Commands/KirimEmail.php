<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Mail\ReminderSertfikat;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class KirimEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kirim:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kirim Email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $karyawans = DB::table('sertifikats')
        ->leftJoin('karyawans', 'karyawans.id_k', '=', 'sertifikats.NamaK')
        ->leftJoin('vendors', 'vendors.id_v', "=", 'sertifikats.Lembaga')
        ->where('Email','=','emirsyachbagus@gmail.com')
        ->whereDate('Deadline','!=','0000-00-00')
        ->where('Deadline', '>=', Carbon::now()->subDays(90))
        ->orWhere('Deadline', '>=', Carbon::now()->subDays(76))
        ->whereNotNull('Email')
        ->get();

        foreach ($karyawans as $penerima) {
            Mail::to($penerima->Email)->send(new ReminderSertfikat($penerima));
            Mail::to('buyatriharmoko@gmail.com')->send(new ReminderSertfikat($penerima));
        }
    }
}
