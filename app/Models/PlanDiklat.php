<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PlanDiklat extends Model
{
    use HasFactory;
    /**
    * fillable
    *
    * @var array
    */
    protected $fillable = [
        'Program', 'Tujuan', 'Prioritas','WktP','WktS','Vendor', 'JmlP','RenP','Bidang','HargSat','SPPD','Total','HargPen','Totals','PermPemb'
    ];
    protected $primaryKey = "id_P";
    public $incrementing = false;

    public function allData()
    {
        return DB::table('PlanDiklats')
            ->leftJoin('vendors', 'vendors.id_v', "=", 'PlanDiklats.Vendor')
            ->get();

    }
}
