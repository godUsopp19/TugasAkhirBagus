<?php

namespace App\Http\Controllers;

use App\Mail\ReminderSertfikat;
use App\Models\Pdiklat;
use App\Models\Rdiklat;
use App\Models\Sertifikat;
use Illuminate\Support\Facades\DB;
use App\Mail\UserEmail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        
        if (empty($filter)) {
            /*$data = DB::table('pdiklats')
            ->count();

            $data2 = DB::table('rdiklats')
            ->count();

            $data3= DB::table('pdiklats')
            ->sum('JmlP');
            
            $data4 = DB::table('sertifikats')
            ->get();

            $data5 = round($data2/$data*100, 2);
            
            $dons1= DB::table('rdiklats')
            ->where('Status', '=', 'SUDAH DIBAYARKAN')
            ->sum('BTotal');

            $dons2= DB::table('rdiklats')
            ->where('Status', '=', 'HTD SUDAH MELAKUKAN PENAGIHAN')
            ->sum('BTotal');
            //dd($dons2);

            $dons3= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (DALAM PERENCANAAN)')
            ->sum('BTotal');

            $dons4= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (SUDAH BERKONTRAK/SURAT)')
            ->sum('BTotal');

            $dons5= DB::table('rdiklats')
            ->where('Status', '=', 'VENDOR BELUM MENGIRIM TAGIHAN')
            ->sum('BTotal');
            
            $donc1= DB::table('rdiklats')
            ->where('Status', '=', 'SUDAH DIBAYARKAN')
            ->count();

            $donc2= DB::table('rdiklats')
            ->where('Status', '=', 'HTD SUDAH MELAKUKAN PENAGIHAN')
            ->count();

            $donc3= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (DALAM PERENCANAAN)')
            ->count();

            $donc4= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (SUDAH BERKONTRAK/SURAT)')
            ->count();

            $donc5= DB::table('rdiklats')
            ->where('Status', '=', 'VENDOR BELUM MENGIRIM TAGIHAN')
            ->count();

            $penetapan = DB::table('penetapans')
            ->sum('Penetapan');*/

            $data = DB::table('pdiklats')
            ->where('Tahun','=',2023)
            ->count();

            $data2 = DB::table('rdiklats')
            ->where('Tahun','=',2023)
            ->count();

            $data3= DB::table('pdiklats')
            ->where('Tahun','=',2023)
            ->sum('JmlP');
            
            $data4 = DB::table('sertifikats')
           //->where('Tahun','=',2023)
            ->get();

            if ($data==0){
                $data =1;
            } else if ($data2 ==0){
                $data2 =1;
            }
            $data5 = round($data2/$data*100, 2); 
            
            $dons1= DB::table('rdiklats')
            ->where('Status', '=', 'SUDAH DIBAYARKAN')
            ->where('Tahun','=',2023)
            ->sum('BTotal');

            $dons2= DB::table('rdiklats')
            ->where('Status', '=', 'HTD SUDAH MELAKUKAN PENAGIHAN')
            ->where('Tahun','=',2023)
            ->sum('BTotal');
            //dd($dons2);

            $dons3= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (DALAM PERENCANAAN)')
            ->where('Tahun','=',2023)
            ->sum('BTotal');

            $dons4= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (SUDAH BERKONTRAK/SURAT)')
            ->where('Tahun','=',2023)
            ->sum('BTotal');

            $dons5= DB::table('rdiklats')
            ->where('Status', '=', 'VENDOR BELUM MENGIRIM TAGIHAN')
            ->where('Tahun','=',2023)
            ->sum('BTotal');
            
            $donc1= DB::table('rdiklats')
            ->where('Status', '=', 'SUDAH DIBAYARKAN')
            ->where('Tahun','=',2023)
            ->count();

            $donc2= DB::table('rdiklats')
            ->where('Status', '=', 'HTD SUDAH MELAKUKAN PENAGIHAN')
            ->where('Tahun','=',2023)
            ->count();

            $donc3= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (DALAM PERENCANAAN)')
            ->where('Tahun','=',2023)
            ->count();

            $donc4= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (SUDAH BERKONTRAK/SURAT)')
            ->where('Tahun','=',2023)
            ->count();

            $donc5= DB::table('rdiklats')
            ->where('Status', '=', 'VENDOR BELUM MENGIRIM TAGIHAN')
            ->where('Tahun','=',2023)
            ->count();

            $penetapan = DB::table('penetapans')
            ->where('Tahun','=',2023)
            ->sum('Penetapan');

            $jan1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereBetween('Deadline', [2023-01-01, 2023-01-31])
            ->count();
            $feb1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereBetween('Deadline', [2023-02-01, 2023-02-28])
            ->count();
            $mar1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereBetween('Deadline', [2023-03-01, 2023-03-31])
            ->count();
            $apr1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereBetween('Deadline', [2023-04-01, 2023-04-30])
            ->count();
            $may1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereBetween('Deadline', [2023-05-01, 2023-05-31])
            ->count();
            $jun1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereBetween('Deadline', [2023-06-01, 2023-06-30])
            ->count();
            $jul1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereBetween('Deadline', [2023-07-01, 2023-07-31])
            ->count();
            $aug1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereBetween('Deadline', [2023-8-01, 2023-8-31])
            ->count();
            $sep1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereBetween('Deadline', [2023-9-01, 2023-9-30])
            ->count();
            $oct1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereBetween('Deadline', [2023-10-01, 2023-10-31])
            ->count();
            $nov1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereBetween('Deadline', [2023-11-01, 2023-11-30])
            ->count();
            $des1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereBetween('Deadline', [2023-12-01, 2023-12-31])
            ->count();

            $donp= $dons1;
            $donpp= $penetapan-$donc1;

            $donou= $dons2 + $dons4;
            $donout = $penetapan-$donou;

            $donog = $penetapan-$dons5;
        } else {
            $data = DB::table('pdiklats')
            ->where('Tahun','=',$filter)
            ->count();

            $data2 = DB::table('rdiklats')
            ->where('Tahun','=',$filter)
            ->count();

            $data3= DB::table('pdiklats')
            ->where('Tahun','=',$filter)
            ->sum('JmlP');
            
            $data4 = DB::table('sertifikats')
           //->where('Tahun','=',$filter)
            ->get();

            if ($data==0){
                $data =1;
            } else if ($data2 ==0){
                $data2 =1;
            }
            $data5 = round($data2/$data*100, 2); 
            
            $dons1= DB::table('rdiklats')
            ->where('Status', '=', 'SUDAH DIBAYARKAN')
            ->where('Tahun','=',$filter)
            ->sum('BTotal');

            $dons2= DB::table('rdiklats')
            ->where('Status', '=', 'HTD SUDAH MELAKUKAN PENAGIHAN')
            ->where('Tahun','=',$filter)
            ->sum('BTotal');
            //dd($dons2);

            $dons3= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (DALAM PERENCANAAN)')
            ->where('Tahun','=',$filter)
            ->sum('BTotal');

            $dons4= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (SUDAH BERKONTRAK/SURAT)')
            ->where('Tahun','=',$filter)
            ->sum('BTotal');

            $dons5= DB::table('rdiklats')
            ->where('Status', '=', 'VENDOR BELUM MENGIRIM TAGIHAN')
            ->where('Tahun','=',$filter)
            ->sum('BTotal');
            
            $donc1= DB::table('rdiklats')
            ->where('Status', '=', 'SUDAH DIBAYARKAN')
            ->where('Tahun','=',$filter)
            ->count();

            $donc2= DB::table('rdiklats')
            ->where('Status', '=', 'HTD SUDAH MELAKUKAN PENAGIHAN')
            ->where('Tahun','=',$filter)
            ->count();

            $donc3= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (DALAM PERENCANAAN)')
            ->where('Tahun','=',$filter)
            ->count();

            $donc4= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (SUDAH BERKONTRAK/SURAT)')
            ->where('Tahun','=',$filter)
            ->count();

            $donc5= DB::table('rdiklats')
            ->where('Status', '=', 'VENDOR BELUM MENGIRIM TAGIHAN')
            ->where('Tahun','=',$filter)
            ->count();

            $penetapan = DB::table('penetapans')
            ->where('Tahun','=',$filter)
            ->sum('Penetapan');

            $jan1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-1-01')
            ->whereDate('Deadline','<','2022-1-31')
            ->count();
            $feb1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-2-01')
            ->whereDate('Deadline','<','2022-2-28')
            ->count();
            $mar1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-3-01')
            ->whereDate('Deadline','<','2022-3-31')
            ->count();
            $apr1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-4-01')
            ->whereDate('Deadline','<','2022-4-30')
            ->count();
            $may1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-5-01')
            ->whereDate('Deadline','<','2022-5-31')
            ->count();
            $jun1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-6-01')
            ->whereDate('Deadline','<','2022-6-30')
            ->count();
            $jul1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-7-01')
            ->whereDate('Deadline','<','2022-7-31')
            ->count();
            $aug1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-8-01')
            ->whereDate('Deadline','<','2022-8-31')
            ->count();
            $sep1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-9-01')
            ->whereDate('Deadline','<','2022-9-30')
            ->count();
            $oct1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
       
            ->whereDate('Deadline','>','2022-10-01')
            ->whereDate('Deadline','<','2022-10-31')
            ->count();
            $nov1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
           
            ->whereDate('Deadline','>','2022-11-01')
            ->whereDate('Deadline','<','2022-11-30')
            ->count();
            $des1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-12-01')
            ->whereDate('Deadline','<','2022-12-31')
            ->count();
            //->get();
            
           //dd($des1);


            $donp= $dons1;
            $donpp= $penetapan-$donc1;

            $donou= $dons2 + $dons4;
            $donout = $penetapan-$donou;

            $donog = $penetapan-$dons5;


            
        }
        
      
        //$pdiklats = Pdiklat::latest()->paginate(10);
        return view('dashboard.index', compact('filter','data','data2','data3','data4','data5','dons1','dons2','dons3','dons4','dons5','penetapan',
        'donc1','donc2','donc3','donc4','donc5',
        'donp','donpp','donou','donout','donog', 
        'jan1','feb1','mar1','apr1','may1','jun1','jul1','aug1','sep1','oct1','nov1','des1'));
    }

    public function print_pdf()
    {
        $filter = '2022';
        $data = DB::table('pdiklats')
            ->where('Tahun','=',$filter)
            ->count();

            $data2 = DB::table('rdiklats')
            ->where('Tahun','=',$filter)
            ->count();

            $data3= DB::table('pdiklats')
            ->where('Tahun','=',$filter)
            ->sum('JmlP');
            
            $data4 = DB::table('sertifikats')
           //->where('Tahun','=',$filter)
            ->get();

            if ($data==0){
                $data =1;
            } else if ($data2 ==0){
                $data2 =1;
            }
            $data5 = round($data2/$data*100, 2); 
            
            $dons1= DB::table('rdiklats')
            ->where('Status', '=', 'SUDAH DIBAYARKAN')
            ->where('Tahun','=',$filter)
            ->sum('BTotal');

            $dons2= DB::table('rdiklats')
            ->where('Status', '=', 'HTD SUDAH MELAKUKAN PENAGIHAN')
            ->where('Tahun','=',$filter)
            ->sum('BTotal');
            //dd($dons2);

            $dons3= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (DALAM PERENCANAAN)')
            ->where('Tahun','=',$filter)
            ->sum('BTotal');

            $dons4= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (SUDAH BERKONTRAK/SURAT)')
            ->where('Tahun','=',$filter)
            ->sum('BTotal');

            $dons5= DB::table('rdiklats')
            ->where('Status', '=', 'VENDOR BELUM MENGIRIM TAGIHAN')
            ->where('Tahun','=',$filter)
            ->sum('BTotal');
            
            $donc1= DB::table('rdiklats')
            ->where('Status', '=', 'SUDAH DIBAYARKAN')
            ->where('Tahun','=',$filter)
            ->count();

            $donc2= DB::table('rdiklats')
            ->where('Status', '=', 'HTD SUDAH MELAKUKAN PENAGIHAN')
            ->where('Tahun','=',$filter)
            ->count();

            $donc3= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (DALAM PERENCANAAN)')
            ->where('Tahun','=',$filter)
            ->count();

            $donc4= DB::table('rdiklats')
            ->where('Status', '=', 'PELATIHAN BELUM DILAKSANAKAN (SUDAH BERKONTRAK/SURAT)')
            ->where('Tahun','=',$filter)
            ->count();

            $donc5= DB::table('rdiklats')
            ->where('Status', '=', 'VENDOR BELUM MENGIRIM TAGIHAN')
            ->where('Tahun','=',$filter)
            ->count();

            $penetapan = DB::table('penetapans')
            ->where('Tahun','=',$filter)
            ->sum('Penetapan');

            $jan1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-1-01')
            ->whereDate('Deadline','<','2022-1-31')
            ->count();
            $feb1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-2-01')
            ->whereDate('Deadline','<','2022-2-28')
            ->count();
            $mar1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-3-01')
            ->whereDate('Deadline','<','2022-3-31')
            ->count();
            $apr1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-4-01')
            ->whereDate('Deadline','<','2022-4-30')
            ->count();
            $may1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-5-01')
            ->whereDate('Deadline','<','2022-5-31')
            ->count();
            $jun1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-6-01')
            ->whereDate('Deadline','<','2022-6-30')
            ->count();
            $jul1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-7-01')
            ->whereDate('Deadline','<','2022-7-31')
            ->count();
            $aug1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-8-01')
            ->whereDate('Deadline','<','2022-8-31')
            ->count();
            $sep1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-9-01')
            ->whereDate('Deadline','<','2022-9-30')
            ->count();
            $oct1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
       
            ->whereDate('Deadline','>','2022-10-01')
            ->whereDate('Deadline','<','2022-10-31')
            ->count();
            $nov1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
           
            ->whereDate('Deadline','>','2022-11-01')
            ->whereDate('Deadline','<','2022-11-30')
            ->count();
            $des1 = DB::table('sertifikats')
            //->where('Tahun','=',$filter)
            ->whereDate('Deadline',"!=",'0000-00-00')
            ->whereDate('Deadline','>','2022-12-01')
            ->whereDate('Deadline','<','2022-12-31')
            ->count();
            //->get();
            
           //dd($des1);


            $donp= $dons1;
            $donpp= $penetapan-$donc1;

            $donou= $dons2 + $dons4;
            $donout = $penetapan-$donou;

            $donog = $penetapan-$dons5;

        
      
        //$pdiklats = Pdiklat::latest()->paginate(10);
        
        $html=view('dashboard.report', compact('filter','data','data2','data3','data4','data5','dons1','dons2','dons3','dons4','dons5','penetapan',
        'donc1','donc2','donc3','donc4','donc5',
        'donp','donpp','donou','donout','donog', 
        'jan1','feb1','mar1','apr1','may1','jun1','jul1','aug1','sep1','oct1','nov1','des1'));
        $pdf=Pdf::loadHTML($html);
        return $pdf->stream('dashboard.pdf');
    }
}

