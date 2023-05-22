<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pdiklat extends Model
{
    use HasFactory;
    protected $fillable = [
        'Program', 'Tujuan', 'Prioritas','WktP','WktS','Vendor', 'JmlP','RenP','Bidang','HargSat',
        'SPPD','Total','HargPen','Totals','PermPemb','Approval','LM','Tahun','Peserta', 'Rev', 'Alasan'
    ];
    protected $primaryKey = "id_P";
    public $incrementing = false;

    public function allData()
    {
        return DB::table('pdiklats')
            ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
            ->leftJoin('sasarans', 'sasarans.id_sa', "=", 'pdiklats.Tujuan')
            ->paginate(10);

    }

    public function PIC1Data()
    {
        return DB::table('pdiklats')
            ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
            ->where('Bidang', 'like', '%OPS%')
            ->orWhere('Bidang', '=', 'ALL')
            ->paginate(10);

    }
    public function PIC2Data()
    {
        return DB::table('pdiklats')
            ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
            ->where('Bidang', 'like', '%QAQC%')
            ->orWhere('Bidang', '=', 'ALL')
            ->paginate(10);

    }

    public function PIC3Data()
    {
        return DB::table('pdiklats')
            ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
            ->where('Bidang', 'like', '%REN%')
            ->orWhere('Bidang', '=', 'ALL')
            ->paginate(10);

    }
    public function PIC4Data()
    {
        return DB::table('pdiklats')
            ->leftJoin('vendors', 'vendors.id_v', "=", 'pdiklats.Vendor')
            ->where('Bidang', 'like', '%KKU%')
            ->orWhere('Bidang', '=', 'ALL')
            ->paginate(10);

    }
}