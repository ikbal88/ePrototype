<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

use App\User;
use App\Pembelian;
use App\PembelianDetail;
use App\Maklon;
use App\MaklonDetail;
use App\Supplier;
use App\Param;

class VerifyController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function verify_pembelian_index()
  {
    $kode     = 'SIP';
    $title    = 'Pembelian';
    $tag      = 'pembelian';
    $tanggal  = Carbon::now('Asia/Jakarta')->format('d/m/Y');
    $index    = Pembelian::orderBy('index', 'desc')->take(1)->get();

    if(!isset($index[0])){
      $newid    = $kode.'0001';
    } else {
      $index    = $index[0]->index + 1;
      $pad      = str_pad($index,4,'0',STR_PAD_LEFT);
      $newid    = $kode.$pad;
    }
    return view('verifikasi.verify_pembelian',[ 'newid'=>$newid,'title'=>$title,
    'tag'=>$tag,'tanggal'=>$tanggal ]);
  }

  public function verify_pembelian_api()
  {
    $pembelian = DB::table('pembelian')
    ->select('pembelian.*','supplier.name as nama_supplier')
    ->join('supplier', 'pembelian.id_supplier', '=', 'supplier.id')
    ->where('pembelian.isactive','<>','A')
    ->get();

    return DataTables::of($pembelian)
    ->editColumn('isactive', function($pembelian){
      if ($pembelian->isactive == 'A') {
        return 'Active';
      } elseif ($pembelian->isactive == 'C') {
        return 'Dibatalkan';
      } elseif ($pembelian->isactive == 'N') {
        return 'Menunggu Acc, Non Aktif';
      }
    })
    ->addColumn('action', function($pembelian){
      $status = ($pembelian->isactive == 'A') ? 'btn-success' : 'disabled btn-default';
      $print  = (isset($pembelian->id_user_acc_3)) ? 'btn-primary' : 'disabled btn-default';
      $acc = '';
      $cancel = '';
      $role = Auth::user()->role == '0001' || Auth::user()->role == '0002' || Auth::user()->role == '0003' || Auth::user()->role == '0004';
      if ($role) {
        $acc = 'btn-success';
        if (Auth::user()->role == '0004') {
          if (isset($pembelian->id_user_acc_1)) {
            $acc = 'disabled btn-default';
          }
        }
        if ($pembelian->isactive == 'C') {
          $cancel = 'disabled btn-default';
          $print = 'disabled btn-default';
          $acc = 'disabled btn-default';
          $msg = '<a onclick="msgData(\''.$pembelian->catatan_pembatalan.'\')" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-warning-sign"></i> Telah Ditolak</a> &nbsp;';
        } else {
          $cancel = 'btn-danger';
          $msg = '';
        }
      } else {
        $acc = 'disabled btn-default';
      }
      if ($role) {
      return
      '<a onclick="viewData(\''.$pembelian->id.'\')" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> View</a> &nbsp;'.
      '<a onclick="printData(\''.$pembelian->id.'\')" class="btn '.$print.' btn-xs"><i class="glyphicon glyphicon-print"></i> Print</a> &nbsp;'.
      '<a onclick="accData(\''.$pembelian->id.'\')" class="btn '.$acc.' btn-xs"><i class="glyphicon glyphicon-check"></i> Approve</a> &nbsp;'.
      '<a onclick="cancelData(\''.$pembelian->id.'\')" class="btn '.$cancel.' btn-xs"><i class="glyphicon glyphicon-ban-circle"></i> Not Approve</a>&nbsp;'.$msg;
      } else {
        return
        '<a onclick="viewData(\''.$pembelian->id.'\')" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> View</a> &nbsp;'.
        '<a onclick="printData(\''.$pembelian->id.'\')" class="btn '.$print.' btn-xs"><i class="glyphicon glyphicon-print"></i> Print</a> &nbsp;'.$msg;
      }
    })->make(true);
  }

  public function verify_pembelian_view($id)
  {
    $profile   = Param::all();
    $pembelian = DB::table('pembelian')
    ->select('pembelian.*','pembelian_detail.*','supplier.name as nama_supplier','proses.name as nama_proses','material.name as nama_material')
    ->join('supplier', 'pembelian.id_supplier', '=', 'supplier.id')
    ->join('pembelian_detail', 'pembelian.id', '=', 'pembelian_detail.id_po')
    ->join('proses', 'pembelian.id_proses', '=', 'proses.id')
    ->join('material', 'pembelian_detail.id_material', '=', 'material.id')
    ->where('pembelian.id', '=', $id)
    ->get();

    return response()->json([
      'data'=>$pembelian,
      'profile'=>$profile
    ]);

  }

  public function verify_pembelian_print($id)
  {
    $check = Pembelian::findOrFail($id);
    if (!isset($check->tgl_acc_3)) {
      abort(404);
    } else {
      $title      = 'PURCHASE ORDER';
      $profile    = Param::all();
      $data       = DB::table('pembelian')
      ->select('pembelian.*','pembelian_detail.*','supplier.name as nama_supplier','proses.name as nama_proses',
      'material.name as nama_material','warna.name as nama_warna','satuan.name as nama_satuan','supplier.alamat as alamat_supplier')
      ->join('supplier', 'pembelian.id_supplier', '=', 'supplier.id')
      ->join('pembelian_detail', 'pembelian.id', '=', 'pembelian_detail.id_po')
      ->join('proses', 'pembelian.id_proses', '=', 'proses.id')
      ->join('warna', 'pembelian_detail.id_warna', '=', 'warna.id')
      ->join('satuan', 'pembelian_detail.id_satuan', '=', 'satuan.id')
      ->join('material', 'pembelian_detail.id_material', '=', 'material.id')
      ->where('pembelian.id', '=', $id)
      ->get();

      $pdf          = PDF::loadView('transaksi.print.master', ['title'=>$title,
      'data'=>$data,'profile'=>$profile,'total_trans'=>$data[0]->total_trans]);
      $pdf->setPaper('a4', 'potrait');
      return $pdf->stream();
    }

  }

  public function verify_pembelian_acc(Request $request)
  {
    $r          = $request->all();
    $userid     = Auth::user()->id;
    $verify     = User::findOrFail($userid);
    if ($r['pin'] != $verify->pin) {
      return response()->json([
        'status' => false,
        'message' => 'Pin Salah! '
      ]);
    }
    $role       = Auth::user()->role;
    $pembelian  = Pembelian::findOrFail($r['id']);
    if ($role == '0004') {
      $data     = [
        'tgl_acc_1' => $this->datenowtodb(),
        'id_user_acc_1' => $userid
      ];
    } elseif ($role == '0003') {
      $data     = [
        'tgl_acc_2' => $this->datenowtodb(),
        'id_user_acc_2' => $userid
      ];
    } elseif ($role == '0002' || $role == '0001') {
      $data     = [
        'tgl_acc_3' => $this->datenowtodb(),
        'id_user_acc_3' => $userid,
        'isactive' => 'A'
      ];
    } else {
      return response()->json([
        'status' => false,
        'message' => 'Acc Batal'
      ]);
    }

    $pembelian->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Acc Berhasil'
    ]);
  }

  public function verify_pembelian_cancel(Request $request)
  {
    $r          = $request->all();
    $name       = Auth::user()->name;
    $data       = [
        'catatan_pembatalan' => $r['msg'].', by: '.$name,
        'isactive' => 'C'
      ];
    $pembelian  = Pembelian::findOrFail($r['id']);
    $pembelian->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Cancel Berhasil'
    ]);
  }





}
