<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Carbon\Carbon;
use App\Param;
use PDF;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // ID
    public function genid($m='',$k='')
    {
      $m      = 'App\\'.$m;
      $i      = $m::orderBy('index', 'desc')->take(1)->get();

      if(!isset($i[0])){
        return $newid     = $k.'0001';
      } else {
        $i                = $i[0]->index + 1;
        $pad              = str_pad($i,4,'0',STR_PAD_LEFT);
        return $newid     = $k.$pad;
      }

    }

    public function genindex($m='')
    {
      $m      = 'App\\'.$m;
      $i      = $m::orderBy('index', 'desc')->take(1)->get();

      if(!isset($i[0])){
        return $index     = 1;
      } else {
        return $index     = $i[0]->index + 1;
      }

    }

    public function genexport($m='',$t='')
    {
      $m            = 'App\\'.$m;
      $data         = $m::all();
      $profil       = Param::all();
      $title        = $t;
      $company      = $profil[0]['name_perusahaan'];
      $alamat       = $profil[0]['alamat'];
      $no_telepon   = $profil[0]['telp'];
      $email        = $profil[0]['email'];
      $pdf          = PDF::loadView('report.export.master', ['title'=>$title,
      'data'=>$data,'company'=>$company,'alamat'=>$alamat,'no_telepon'=>$no_telepon,
      'email'=>$email]);
      $pdf->setPaper('a4', 'potrait');
      return $pdf->stream();
    }


    // DATE TIME
    public function datenowtoview()
    {
      return Carbon::now('Asia/Jakarta')->format('d/m/Y');
    }

    public function datenowtodb()
    {
      return Carbon::now('Asia/Jakarta')->format('Y-m-d');
    }

    public function datenowmanual($s='')
    {
      return Carbon::now('Asia/Jakarta')->format($s);
    }

    public function datedbtoview($d='')
    {
      return Carbon::createFromFormat('Y-m-d',$d)->format('d/m/Y');
    }

    public function dateviewtodb($d='')
    {
      return Carbon::createFromFormat('d/m/Y',$d)->format('Y-m-d');
    }

    public function datemanual($d='',$s='')
    {
      return Carbon::createFromFormat($s,$d);
    }


    // TRANS
    public function todb($v='')
    {
      return str_replace(',', '', $v);
    }
}
