<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Rdiklat extends Model
{
    use HasFactory;
    protected $fillable = [
        'Judul', 'Pelaks', 'Vendor','JmlPes','WktM','WktK', 'Bidang','PerPem','BiayaD','BiayaS','BTotal','HargPen','Status'
    ];
    //protected $primaryKey = "id_R";
    public $incrementing = false;

    public function allData()
    {
        return DB::table('rdiklats')
            ->leftJoin('vendors', 'vendors.id_v', "=", 'rdiklats.Vendor')
            ->orderBy('id')
            ->get();

    }

    public function jallData()
    {
        return DB::table('rdiklats')
            ->count();

    }

    public function sumtot()
    {
        return DB::table('rdiklats')
            ->where('Status', '=', 'Sudah Dibayarkan')
            ->sum('BTotal');
    }
}
