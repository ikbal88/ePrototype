<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;
use App\JenisBarang;
use App\Warna;
use App\Satuan;
use App\Material;
use App\Proses;
use App\Role;
use App\Pembelian;
use App\PembelianDetail;
use App\Maklon;
use App\MaklonDetail;
use App\Barang;
use App\Costumer;

class GeneralController extends Controller
{
    public function supplier_get(Request $request)
    {
      $r      = $request->all();
      $param  = (!isset($r['search'])) ? '' : $r['search'] ;
      $data   = Supplier::select('id as id','name as text')
      ->where('name','like','%'.$param.'%')
      ->where('isactive','A')
      ->get();
      return response()->json($data);
    }

    public function costumer_get(Request $request)
    {
      $r      = $request->all();
      $param  = (!isset($r['search'])) ? '' : $r['search'] ;
      $data   = Costumer::select('id as id','name as text')
      ->where('name','like','%'.$param.'%')
      ->where('isactive','A')
      ->get();
      return response()->json($data);
    }

    public function nama_barang_get(Request $request)
    {
      $r      = $request->all();
      $t      = (isset($r['type']) == 'open') ? 'O' : 'C';
      if ($t == 'C') {
        $data   = Barang::select('name as nama_barang')->where('id','=',''.$r['id'].'')->where('isactive','A')->get();
      } else {
        $data   = Barang::select('name as nama_barang')->where('id','=',''.$r['id'].'')->get();
      }

      return response()->json($data);
    }

    public function jenis_barang_get(Request $request)
    {
      $r      = $request->all();
      $param  = (!isset($r['search'])) ? '' : $r['search'] ;
      $data   = JenisBarang::select('id as id','name as text')
      ->where('name','like','%'.$param.'%')
      ->where('isactive','A')
      ->get();
      return response()->json($data);
    }

    public function warna_get(Request $request)
    {
      $r      = $request->all();
      $param  = (!isset($r['search'])) ? '' : $r['search'] ;
      $data   = Warna::select('id as id','name as text')
      ->where('name','like','%'.$param.'%')
      ->where('isactive','A')
      ->get();
      return response()->json($data);
    }

    public function satuan_get(Request $request)
    {
      $r      = $request->all();
      $param  = (!isset($r['search'])) ? '' : $r['search'] ;
      $data   = Satuan::select('id as id','name as text')
      ->where('name','like','%'.$param.'%')
      ->where('isactive','A')
      ->get();
      return response()->json($data);
    }

    public function material_get(Request $request)
    {
      $r      = $request->all();
      $param  = (!isset($r['search'])) ? '' : $r['search'] ;
      $data   = Material::select('id as id','name as text')
      ->where('name','like','%'.$param.'%')
      ->where('isactive','A')
      ->get();
      return response()->json($data);
    }

    public function proses_get(Request $request)
    {
      $r      = $request->all();
      $param  = (!isset($r['search'])) ? '' : $r['search'] ;
      $data   = Proses::select('id as id','name as text')
      ->where('name','like','%'.$param.'%')
      ->where('isactive','A')
      ->get();
      return response()->json($data);
    }

    public function role_get(Request $request)
    {
      $r      = $request->all();
      $param  = (!isset($r['search'])) ? '' : $r['search'] ;
      $data   = Role::select('id as id','name as text')
      ->where('name','like','%'.$param.'%')
      ->where('isactive','A')
      ->get();
      return response()->json($data);
    }

    public function po_pembelian_get(Request $request)
    {
      $r      = $request->all();
      $param  = (!isset($r['search'])) ? '' : $r['search'] ;
      $data   = Pembelian::select('id as id','id as text')
      ->where('id','like','%'.$param.'%')
      // ->where('isactive','A')
      ->get();
      return response()->json($data);
    }

    public function po_maklon_get(Request $request)
    {
      $r      = $request->all();
      $param  = (!isset($r['search'])) ? '' : $r['search'] ;
      $data   = Maklon::select('id as id','id as text')
      ->where('id','like','%'.$param.'%')
      // ->where('isactive','A')
      ->get();
      return response()->json($data);
    }
}
