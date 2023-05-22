<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sertifikat extends Model
{
    use HasFactory;
    /**
    * fillable
    *
    * @var array
    */
    protected $fillable = [
        'NamaK', 'Judul', 'Lembaga','NoSertif','Fungsi','TglSertif','Deadline','Em1','Em2'
    ];

    protected $primaryKey = "id_s";
    public $incrementing = false;

    public function allData()
    {
        return DB::table('sertifikats')
            ->leftJoin('karyawans', 'karyawans.id_k', '=', 'sertifikats.NamaK')
            ->leftJoin('vendors', 'vendors.id_v', "=", 'sertifikats.Lembaga')
            ->get();

    }
}
