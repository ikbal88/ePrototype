<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use PDF;

use App\Param;

use App\Material;
use App\Warna;
use App\Satuan;
use App\Proses;
use App\JenisBarang;
use App\Barang;
use App\Supplier;
use App\Costumer;
use App\Role;

class ReportController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function export_material()
  {
    return $this->genexport('Material','Material');
  }

  public function export_warna()
  {
    return $this->genexport('Warna','Warna');
  }

  public function export_satuan()
  {
    return $this->genexport('Satuan','Satuan');
  }

  public function export_proses()
  {
    return $this->genexport('Proses','Proses');
  }

  public function export_jenis_barang()
  {
    return $this->genexport('JenisBarang','Jenis Barang');
  }

  public function export_barang()
  {
    return $this->genexport('Barang','Barang');
  }

  public function export_suppier()
  {
    return $this->genexport('Supplier','Supplier');
  }

  public function export_costumer()
  {
    return $this->genexport('Costumer','Costumer');
  }

  public function export_role()
  {
    return $this->genexport('Role','Role');
  }

  public function work_in_process()
  {
    $title = 'Work In Process';
    return view('report.work_in_process',['title'=>$title]);
  }

  public function stock_a()
  {
    $tanggal = $this->datenowtoview();
    $title  = 'Stock Grade A';
    $tag    = 'stock_a';
    return view('report.stock',['title'=>$title,'tag'=>$tag,'tanggal'=>$tanggal]);
  }

  public function stock_a_api(Request $request)
  {
    $r = $request->all();
    $barang = DB::table('barang')
    ->select('barang.*','satuan.name as nama_satuan')
    ->join('satuan', 'barang.id_satuan', '=', 'satuan.id');

    if(isset($r['id_warna'])){
      $barang = $barang->where('barang.id_warna','=',$r['id_warna']);
    }

    if(isset($r['id_material'])){
      $barang = $barang->where('barang.id_material','=',$r['id_material']);
    }

    if(isset($r['id_jenis_barang'])){
      $barang = $barang->where('barang.id_jenis','=',$r['id_jenis_barang']);
    }

    if(isset($r['startdate'])){
      $barang = $barang->where('barang.created_at','>=',$r['startdate']);
    }

    if(isset($r['startdate'])){
      $barang = $barang->where('barang.created_at','<=',$r['enddate']);
    }


    return DataTables::of($barang)
    ->editColumn('isactive', function($barang){
      return ($barang->isactive == 'A') ? 'Active' : 'Non Active';
    })
    ->addColumn('qty', function($barang){
      return ($barang->qty >= '0') ? $barang->qty.' '.$barang->nama_satuan : 'Habis';
    })
    ->addColumn('action', function($barang){
      return '-';
      // '<a onclick="editData(\''.$barang->id.'\')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp;'.
      // '<a onclick="deleteData(\''.$barang->id.'\')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
    })->make(true);
  }

  public function koreksi_stock()
  {
    $title = 'Koreksi Stock';
    return view('report.koreksi_stock',['title'=>$title]);
  }

  public function rekap_penjualan()
  {
    $title = 'Rekap Penjualan';
    return view('report.rekap_penjualan',['title'=>$title]);
  }

}
