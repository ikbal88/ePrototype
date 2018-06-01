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
use App\SuratJalan;
use App\SuratJalanDetail;
use App\SuratMasuk;
use App\SuratMasukDetail;
use App\Trans;
use App\TransDetail;
use App\Barang;

class TransaksiController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function pembelian_index()
  {
    $data  = [
      'title'   =>  'Pembelian',
      'tag'     =>  'pembelian',
      'newid'   =>  $this->genid('Pembelian', 'SIP'),
      'tanggal' =>  $this->datenowtoview(),
    ];

    return view('transaksi.pembelian', $data);
  }

  public function pembelian_create(Request $request)
  {
    $r    = $request->all();
    $i    = $this->genindex('Pembelian');
    $data = [
      'id'            => $r['id'],
      'index'         => $i,
      'tanggal'       => $this->dateviewtodb($r['tanggal']),
      'tanggal_kirim' => $this->dateviewtodb($r['tanggal_kirim']),
      'id_supplier'   => $r['id_supplier'],
      'id_proses'     => $r['id_proses'],
      'style'         => $r['style'],
      'top'           => $r['top'],
      'tos'           => $r['tos'],
      'attention'     => $r['attention'],
      'ppn'           => $r['ppn'],
      'total_trans'   => $this->todb($r['total_all']),
      'isactive'      => 'N'
    ];

    for ($i=0; $i < count($r['id_material']) ; $i++) {
      $data_detail = [
        'id_po'         => $r['id'],
        'index'         => $i,
        'tanggal'       => $this->dateviewtodb($r['tanggal']),
        'id_material'   => $r['id_material'][$i],
        'id_warna'      => $r['id_warna'][$i],
        'size'          => $r['size'][$i],
        'ld'            => $r['ld'][$i],
        'qty'           => $this->todb($r['qty'][$i]),
        'id_satuan'     => $r['id_satuan'][$i],
        'price'         => $this->todb($r['price'][$i]),
        'total'         => $this->todb($r['total'][$i]),
        'isactive'      => 'A'
      ];
      PembelianDetail::create($data_detail);
    }

    Pembelian::create($data);
    $newid = $this->genid('Pembelian', 'SIP');

    return response()->json([
      'status'  => true,
      'message' => 'Pembelian created',
      'newid'   => $newid
    ]);
  }

  public function pembelian_api()
  {
    $pembelian = DB::table('pembelian')
    ->select('pembelian.*', 'supplier.name as nama_supplier')
    ->join('supplier', 'pembelian.id_supplier', '=', 'supplier.id')
    ->get();

    return DataTables::of($pembelian)
    ->editColumn('isactive', function ($pembelian) {
      if ($pembelian->isactive == 'A') {
        return 'Active';
      } elseif ($pembelian->isactive == 'C') {
        return 'Dibatalkan';
      } elseif ($pembelian->isactive == 'N') {
        return 'Menunggu Acc, Non Aktif';
      }
    })
    ->addColumn('action', function ($pembelian) {
      $status = ($pembelian->isactive == 'A') ? 'btn-success' : 'disabled btn-default';
      $print  = (isset($pembelian->id_user_acc_3)) ? 'btn-primary' : 'disabled btn-default';
      $acc = (isset($pembelian->id_user_acc_3)) ? 'btn-primary' : 'disabled btn-default';
      $cancel = (isset($pembelian->id_user_acc_3)) ? 'btn-danger' : 'disabled btn-default';
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
          $acc = (isset($pembelian->id_user_acc_3)) ? 'disabled btn-default' : 'btn-primary';
          $cancel = (isset($pembelian->id_user_acc_3)) ? 'disabled btn-default' : 'btn-danger';
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

  public function pembelian_view($id)
  {
    $profile   = Param::all();
    $pembelian = DB::table('pembelian')
    ->select(
      'pembelian.*',
      'pembelian_detail.*',
      'supplier.name as nama_supplier',
      'supplier.alamat as alamat_supplier',
      'proses.name as nama_proses',
      'satuan.name as nama_satuan',
      'material.name as nama_material'
      )
      ->join('supplier', 'pembelian.id_supplier', '=', 'supplier.id')
      ->join('pembelian_detail', 'pembelian.id', '=', 'pembelian_detail.id_po')
      ->join('proses', 'pembelian.id_proses', '=', 'proses.id')
      ->join('satuan', 'pembelian_detail.id_satuan', '=', 'satuan.id')
      ->join('material', 'pembelian_detail.id_material', '=', 'material.id')
      ->where('pembelian.id', '=', $id)
      ->get();

      return response()->json([
        'data'    =>  $pembelian,
        'profile' =>  $profile,
        'type'    =>  'M'
      ]);
    }

  public function pembelian_print($id)
  {
    $check = Pembelian::findOrFail($id);
    if (!isset($check->tgl_acc_3)) {
      abort(404);
    } else {
      $title      = 'PURCHASE ORDER';
      $profile    = Param::all();
      $data       = DB::table('pembelian')
      ->select(
        'pembelian.*',
        'pembelian_detail.*',
        'supplier.name as nama_supplier',
        'proses.name as nama_proses',
        'material.name as nama_material',
        'warna.name as nama_warna',
        'satuan.name as nama_satuan',
        'supplier.alamat as alamat_supplier'
        )
        ->join('supplier', 'pembelian.id_supplier', '=', 'supplier.id')
        ->join('pembelian_detail', 'pembelian.id', '=', 'pembelian_detail.id_po')
        ->join('proses', 'pembelian.id_proses', '=', 'proses.id')
        ->join('warna', 'pembelian_detail.id_warna', '=', 'warna.id')
        ->join('satuan', 'pembelian_detail.id_satuan', '=', 'satuan.id')
        ->join('material', 'pembelian_detail.id_material', '=', 'material.id')
        ->where('pembelian.id', '=', $id)
        ->get();

        $data = [
          'title'       =>  $title,
          'data'        =>  $data,
          'profile'     =>  $profile,
          'total_trans' =>  $data[0]->total_trans
        ];

        $pdf  = PDF::loadView('transaksi.print.master', $data);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
      }
    }

  public function pembelian_acc(Request $request)
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

  public function pembelian_cancel(Request $request)
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

  public function maklon_index()
  {
    $data  = [
      'title'   =>  'Maklon',
      'tag'     =>  'maklon',
      'newid'   =>  $this->genid('Maklon', 'SIP'),
      'tanggal' =>  $this->datenowtoview(),
    ];

    return view('transaksi.maklon', $data);
  }

  public function maklon_create(Request $request)
  {
    $r    = $request->all();
    $i    = $this->genindex('Maklon');
    $data = [
      'id'            => $r['id'],
      'index'         => $i,
      'tanggal'       => $this->dateviewtodb($r['tanggal']),
      'tanggal_kirim' => $this->dateviewtodb($r['tanggal_kirim']),
      'id_supplier'   => $r['id_supplier'],
      'id_proses'     => $r['id_proses'],
      'style'         => $r['style'],
      'top'           => $r['top'],
      'tos'           => $r['tos'],
      'attention'     => $r['attention'],
      'ppn'           => $r['ppn'],
      'total_trans'   => $this->todb($r['total_all']),
      'isactive'      => 'N'
    ];

    for ($i=0; $i < count($r['id_barang'] != '') ; $i++) {
        $data_detail = [
          'id_po'         => $r['id'],
          'index'         => $i,
          'tanggal'       => $this->dateviewtodb($r['tanggal']),
          'id_barang'     => $r['id_barang'][$i],
          'size'          => $r['size'][$i],
          'ld'            => $r['ld'][$i],
          'qty'           => $this->todb($r['qty'][$i]),
          'id_satuan'     => $r['id_satuan'][$i],
          'price'         => $this->todb($r['price'][$i]),
          'total'         => $this->todb($r['total'][$i]),
          'isactive'      => 'A'
        ];
        MaklonDetail::create($data_detail);
    }

    Maklon::create($data);
    $newid = $this->genid('Maklon', 'SIP');

    return response()->json([
      'status'  => true,
      'message' => 'Maklon created',
      'newid'   => $newid
    ]);
  }

  public function maklon_api()
  {
    $maklon = DB::table('maklon')
    ->select('maklon.*', 'supplier.name as nama_supplier')
    ->join('supplier', 'maklon.id_supplier', '=', 'supplier.id')
    ->get();

    return DataTables::of($maklon)
    ->editColumn('isactive', function ($maklon) {
      if ($maklon->isactive == 'A') {
        return 'Active';
      } elseif ($maklon->isactive == 'C') {
        return 'Dibatalkan';
      } elseif ($maklon->isactive == 'N') {
        return 'Menunggu Acc, Non Aktif';
      }
    })
    ->addColumn('action', function ($maklon) {
      $status = ($maklon->isactive == 'A') ? 'btn-success' : 'disabled btn-default';
      $print  = (isset($maklon->id_user_acc_3)) ? 'btn-primary' : 'disabled btn-default';
      $acc = (isset($maklon->id_user_acc_3)) ? 'btn-primary' : 'disabled btn-default';
      $cancel = (isset($maklon->id_user_acc_3)) ? 'btn-danger' : 'disabled btn-default';
      $role = Auth::user()->role == '0001' || Auth::user()->role == '0002' || Auth::user()->role == '0003' || Auth::user()->role == '0004';
      if ($role) {
        $acc = 'btn-success';
        if (Auth::user()->role == '0004') {
          if (isset($maklon->id_user_acc_1)) {
            $acc = 'disabled btn-default';
          }
        }
        if ($maklon->isactive == 'C') {
          $cancel = 'disabled btn-default';
          $print = 'disabled btn-default';
          $acc = 'disabled btn-default';
          $msg = '<a onclick="msgData(\''.$maklon->catatan_pembatalan.'\')" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-warning-sign"></i> Telah Ditolak</a> &nbsp;';
        } else {
          $acc = (isset($maklon->id_user_acc_3)) ? 'disabled btn-default' : 'btn-primary';
          $cancel = (isset($maklon->id_user_acc_3)) ? 'disabled btn-default' : 'btn-danger';
          $msg = '';
        }
      } else {
        $acc = 'disabled btn-default';
      }
      if ($role) {
        return
        '<a onclick="viewData(\''.$maklon->id.'\')" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> View</a> &nbsp;'.
        '<a onclick="printData(\''.$maklon->id.'\')" class="btn '.$print.' btn-xs"><i class="glyphicon glyphicon-print"></i> Print</a> &nbsp;'.
        '<a onclick="accData(\''.$maklon->id.'\')" class="btn '.$acc.' btn-xs"><i class="glyphicon glyphicon-check"></i> Approve</a> &nbsp;'.
        '<a onclick="cancelData(\''.$maklon->id.'\')" class="btn '.$cancel.' btn-xs"><i class="glyphicon glyphicon-ban-circle"></i> Not Approve</a>&nbsp;'.$msg;
      } else {
        return
        '<a onclick="viewData(\''.$maklon->id.'\')" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> View</a> &nbsp;'.
        '<a onclick="printData(\''.$maklon->id.'\')" class="btn '.$print.' btn-xs"><i class="glyphicon glyphicon-print"></i> Print</a> &nbsp;'.$msg;
      }
    })->make(true);
  }

  public function maklon_view($id)
  {
    $profile   = Param::all();
    $maklon = DB::table('maklon')
    ->select(
      'maklon.*',
      'maklon_detail.*',
      'supplier.name as nama_supplier',
      'supplier.alamat as alamat_supplier',
      'proses.name as nama_proses',
      'satuan.name as nama_satuan',
      'maklon_detail.id_barang as id_barang'
      )
      ->join('supplier', 'maklon.id_supplier', '=', 'supplier.id')
      ->join('maklon_detail', 'maklon.id', '=', 'maklon_detail.id_po')
      ->join('proses', 'maklon.id_proses', '=', 'proses.id')
      ->join('satuan', 'maklon_detail.id_satuan', '=', 'satuan.id')
      ->where('maklon.id', '=', $id)
      ->get();

      return response()->json([
        'data'    =>  $maklon,
        'profile' =>  $profile,
        'type'    =>  'M'
      ]);
    }

  public function maklon_print($id)
  {
    $check = Maklon::findOrFail($id);
    if (!isset($check->tgl_acc_3)) {
      abort(404);
    } else {
      $title      = 'PURCHASE ORDER';
      $profile    = Param::all();
      $data       = DB::table('maklon')
      ->select(
        'maklon.*',
        'maklon_detail.*',
        'supplier.name as nama_supplier',
        'proses.name as nama_proses',
        'satuan.name as nama_satuan',
        'supplier.alamat as alamat_supplier',
        'barang.name as nama_barang'
        )
        ->join('supplier', 'maklon.id_supplier', '=', 'supplier.id')
        ->join('maklon_detail', 'maklon.id', '=', 'maklon_detail.id_po')
        ->join('proses', 'maklon.id_proses', '=', 'proses.id')
        ->join('satuan', 'maklon_detail.id_satuan', '=', 'satuan.id')
        ->join('barang', 'maklon_detail.id_barang', '=', 'barang.id')
        ->where('maklon.id', '=', $id)
        ->get();

        $data = [
          'title'       =>  $title,
          'data'        =>  $data,
          'profile'     =>  $profile,
          'total_trans' =>  $data[0]->total_trans
        ];

        $pdf  = PDF::loadView('transaksi.print.master', $data);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
      }
    }

  public function maklon_acc(Request $request)
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
    $maklon     = Maklon::findOrFail($r['id']);
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

    $maklon->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Acc Berhasil'
    ]);
  }

  public function maklon_cancel(Request $request)
  {
    $r          = $request->all();
    $name       = Auth::user()->name;
    $data       = [
      'catatan_pembatalan' => $r['msg'].', by: '.$name,
      'isactive' => 'C'
    ];
    $maklon  = Maklon::findOrFail($r['id']);
    $maklon->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Cancel Berhasil'
    ]);
  }

  public function surat_jalan_index()
  {
    $data  = [
      'title'   =>  'Surat Jalan',
      'tag'     =>  'surat_jalan',
      'newid'   =>  $this->genid('SuratJalan', 'SIP-SJ-'),
      'tanggal' =>  $this->datenowtoview(),
    ];

    return view('transaksi.surat_jalan', $data);
  }

  public function surat_jalan_create(Request $request)
  {
    $r    = $request->all();
    $i    = $this->genindex('SuratJalan');
    $data = [
      'id'            => $r['id'],
      'index'         => $i,
      'tanggal'       => $this->dateviewtodb($r['tanggal']),
      'pengirim'      => $r['pengirim'],
      'jam'           => $r['jam'],
      'no_kendaraan'  => $r['no_kendaraan'],
      'id_supplier'   => $r['id_supplier'],
      'id_proses'     => $r['id_proses'],
      'attention'     => $r['attention'],
      'isactive'      => 'N'
    ];

    for ($i=0; $i < count($r['qty']) ; $i++) {
      $data_detail = [
        'id_surat_jalan'=> $r['id'],
        'index'         => $i,
        'tanggal'       => $this->dateviewtodb($r['tanggal']),
        'qty'           => $this->todb($r['qty'][$i]),
        'id_satuan'     => $r['id_satuan'][$i],
        'keterangan'    => $r['ket'][$i],
        'isactive'      => 'N'
      ];
      if (isset($r['id_barang'][$i])) {
        $data_detail['id_barang'] = $r['id_barang'][$i];
        $data_detail['id_po'] = $r['id_po'][$i];
      } else {
        $data_detail['id_material'] = $r['id_material'][$i];
        $data_detail['id_po'] = $r['id_po'][$i];
      }

      $barang_stock = Barang::where('id', $r['id_barang'][$i])->get();
      $a = $barang_stock[0]['qty'];
      $b = $this->todb($r['qty'][$i]);
      $c = $a-$b;
      if ($c<1) {
        SuratJalanDetail::where('id_surat_jalan', $r['id'])->delete();
        return response()->json([
          'status'  => false,
          'message' => 'Cek kembali stock barang!'
        ]);
      } else {
        SuratJalanDetail::create($data_detail);
      }
    }

    $create = SuratJalan::create($data);
    $newid = $this->genid('SuratJalan', 'SIP-SJ-');

    return response()->json([
      'status'  => true,
      'message' => 'Surat Jalan created',
      'newid'   => $newid
    ]);
  }

  public function surat_jalan_api()
  {
    $surat_jalan = DB::table('surat_jalan')
    ->select('surat_jalan.*', 'supplier.name as nama_supplier')
    ->join('supplier', 'surat_jalan.id_supplier', '=', 'supplier.id')
    ->get();

    return DataTables::of($surat_jalan)
    ->editColumn('isactive', function ($surat_jalan) {
      if ($surat_jalan->isactive == 'A') {
        return 'Active';
      } elseif ($surat_jalan->isactive == 'C') {
        return 'Dibatalkan';
      } elseif ($surat_jalan->isactive == 'N') {
        return 'Menunggu Acc, Non Aktif';
      }
    })
    ->addColumn('action', function ($surat_jalan) {
      $status = ($surat_jalan->isactive == 'A') ? 'btn-success' : 'disabled btn-default';
      $print  = (isset($surat_jalan->id_user_acc_3)) ? 'btn-primary' : 'disabled btn-default';
      $acc = (isset($surat_jalan->id_user_acc_3)) ? 'btn-primary' : 'disabled btn-default';
      $cancel = (isset($surat_jalan->id_user_acc_3)) ? 'btn-danger' : 'disabled btn-default';
      $role = Auth::user()->role == '0001' || Auth::user()->role == '0002' || Auth::user()->role == '0003' || Auth::user()->role == '0004';
      if ($role) {
        $acc = 'btn-success';
        if (Auth::user()->role == '0004') {
          if (isset($surat_jalan->id_user_acc_1)) {
            $acc = 'disabled btn-default';
          }
        }
        if ($surat_jalan->isactive == 'C') {
          $cancel = 'disabled btn-default';
          $print = 'disabled btn-default';
          $acc = 'disabled btn-default';
          $msg = '<a onclick="msgData(\''.$surat_jalan->catatan_pembatalan.'\')" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-warning-sign"></i> Telah Ditolak</a> &nbsp;';
        } else {
          $acc = (isset($surat_jalan->id_user_acc_3)) ? 'disabled btn-default' : 'btn-primary';
          $cancel = (isset($surat_jalan->id_user_acc_3)) ? 'disabled btn-default' : 'btn-danger';
          $msg = '';
        }
      } else {
        $acc = 'disabled btn-default';
        $acc = 'disabled btn-default';
        if ($surat_jalan->id_proses == '0002' && isset($surat_jalan->id_user_acc_1)) {
          $print = 'btn-primary';
        }
      }
      if ($role) {
        return
        '<a onclick="viewData(\''.$surat_jalan->id.'\')" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> View</a> &nbsp;'.
        '<a onclick="printData(\''.$surat_jalan->id.'\')" class="btn '.$print.' btn-xs"><i class="glyphicon glyphicon-print"></i> Print</a> &nbsp;'.
        '<a onclick="accData(\''.$surat_jalan->id.'\')" class="btn '.$acc.' btn-xs"><i class="glyphicon glyphicon-check"></i> Approve</a> &nbsp;'.
        '<a onclick="cancelData(\''.$surat_jalan->id.'\')" class="btn '.$cancel.' btn-xs"><i class="glyphicon glyphicon-ban-circle"></i> Not Approve</a>&nbsp;'.$msg;
      } else {
        return
        '<a onclick="viewData(\''.$surat_jalan->id.'\')" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> View</a> &nbsp;'.
        '<a onclick="printData(\''.$surat_jalan->id.'\')" class="btn '.$print.' btn-xs"><i class="glyphicon glyphicon-print"></i> Print</a> &nbsp;'.$msg;
      }
    })->make(true);
  }

  public function surat_jalan_view($id)
  {
    $profile   = Param::all();
    $surat_jalan = DB::table('surat_jalan')
    ->select(
      'surat_jalan.*',
      'surat_jalan_detail.*',
      'supplier.name as nama_supplier',
      'supplier.alamat as alamat_supplier',
      'proses.name as nama_proses',
      'satuan.name as nama_satuan',
      'surat_jalan_detail.id_barang as id_barang'
      )
      ->join('supplier', 'surat_jalan.id_supplier', '=', 'supplier.id')
      ->join('surat_jalan_detail', 'surat_jalan.id', '=', 'surat_jalan_detail.id_surat_jalan')
      ->join('proses', 'surat_jalan.id_proses', '=', 'proses.id')
      ->join('satuan', 'surat_jalan_detail.id_satuan', '=', 'satuan.id')
      ->where('surat_jalan.id', '=', $id)
      ->get();

      return response()->json([
        'data'    =>  $surat_jalan,
        'profile' =>  $profile,
        'type'    =>  'M'
      ]);
    }

  public function surat_jalan_print($id)
  {
    $check = SuratJalan::findOrFail($id);
    if (($check['id_proses'] == '0002' && isset($check['tgl_acc_1'])) || isset($check['tgl_acc_3'])) {
      $title      = 'SURAT JALAN';
      $profile    = Param::all();
      $data       = DB::table('surat_jalan')
      ->select(
        'surat_jalan.*',
        'surat_jalan_detail.*',
        'supplier.name as nama_supplier',
        'supplier.alamat as alamat_supplier',
        'proses.name as nama_proses',
        'satuan.name as nama_satuan',
        'barang.name as nama_barang',
        'surat_jalan_detail.id_barang as id_barang'
        )
        ->join('supplier', 'surat_jalan.id_supplier', '=', 'supplier.id')
        ->join('surat_jalan_detail', 'surat_jalan.id', '=', 'surat_jalan_detail.id_surat_jalan')
        ->join('proses', 'surat_jalan.id_proses', '=', 'proses.id')
        ->join('satuan', 'surat_jalan_detail.id_satuan', '=', 'satuan.id')
        ->join('barang', 'surat_jalan_detail.id_barang', '=', 'barang.id')
        ->where('surat_jalan.id', '=', $id)
        ->get();
        $tanggal = $this->datedbtoview($data[0]->tanggal);
        $id = $data[0]->id_surat_jalan;
        $data = [
          'id'          =>  $id,
          'title'       =>  $title,
          'data'        =>  $data,
          'profile'     =>  $profile,
          'tanggal'     =>  $tanggal
        ];

        $pdf  = PDF::loadView('transaksi.print.master_surat_jalan', $data);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    } else {
      abort(404);
      }
    }

  public function surat_jalan_acc(Request $request)
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
    $role             = Auth::user()->role;
    $surat_jalan      = SuratJalan::findOrFail($r['id']);
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

      $surat_jalan_get = SuratJalanDetail::where('id_surat_jalan',$r['id'])->get();
      for ($i=0; $i < count($surat_jalan_get); $i++) {
        $barang_stock = Barang::where('id', $surat_jalan_get[$i]['id_barang'])->get();
        $a = $barang_stock[0]['qty'];
        $b = $surat_jalan_get[$i]['qty'];
        $c = $a-$b;
        $barang = Barang::find($surat_jalan_get[$i]['id_barang']);
        $barang->update([
                  'qty'=>$c,
                  'updated_at'=>$this->datenowtodb()
                ]);
      }

    } else {
      return response()->json([
        'status' => false,
        'message' => 'Acc Batal'
      ]);
    }

    $surat_jalan->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Acc Berhasil'
    ]);
  }

  public function surat_jalan_cancel(Request $request)
  {
    $r          = $request->all();
    $name       = Auth::user()->name;
    $data       = [
      'catatan_pembatalan' => $r['msg'].', by: '.$name,
      'isactive' => 'C'
    ];
    $surat_jalan  = SuratJalan::findOrFail($r['id']);
    $surat_jalan->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Cancel Berhasil'
    ]);
  }


  public function surat_masuk_index()
  {
    $data  = [
      'title'   =>  'Surat Masuk',
      'tag'     =>  'surat_masuk',
      'newid'   =>  $this->genid('SuratMasuk', 'SIP-SM-'),
      'tanggal' =>  $this->datenowtoview(),
    ];

    return view('transaksi.surat_masuk', $data);
  }

  public function surat_masuk_create(Request $request)
  {
    $r    = $request->all();
    $i    = $this->genindex('SuratMasuk');
    $data = [
      'id'            => $r['id'],
      'index'         => $i,
      'tanggal'       => $this->dateviewtodb($r['tanggal']),
      'id_surat_jalan'=> $r['id_surat_jalan'],
      'penerima'      => $r['penerima'],
      'jam'           => $r['jam'],
      'no_kendaraan'  => $r['no_kendaraan'],
      'id_supplier'   => $r['id_supplier'],
      'id_proses'     => $r['id_proses'],
      'attention'     => $r['attention'],
      'isactive'      => 'N'
    ];

    for ($i=0; $i < count($r['qty']) ; $i++) {
      $data_detail = [
        'id_surat_masuk'=> $r['id'],
        'index'         => $i,
        'tanggal'       => $this->dateviewtodb($r['tanggal']),
        'id_barang'     => $r['id_barang'][$i],
        'id_po'         => $r['id_po'][$i],
        'qty'           => $this->todb($r['qty'][$i]),
        'id_satuan'     => $r['id_satuan'][$i],
        'keterangan'    => $r['ket'][$i],
        'isactive'      => 'N',
      ];

        SuratMasukDetail::create($data_detail);
    }

    $create = SuratMasuk::create($data);
    $newid = $this->genid('SuratMasuk', 'SIP-SM-');

    return response()->json([
      'status'  => true,
      'message' => 'Surat Masuk created',
      'newid'   => $newid
    ]);
  }

  public function surat_masuk_api()
  {
    $surat_masuk = DB::table('surat_masuk')
    ->select('surat_masuk.*', 'supplier.name as nama_supplier')
    ->join('supplier', 'surat_masuk.id_supplier', '=', 'supplier.id')
    ->get();

    return DataTables::of($surat_masuk)
    ->editColumn('isactive', function ($surat_masuk) {
      if ($surat_masuk->isactive == 'A') {
        return 'Active';
      } elseif ($surat_masuk->isactive == 'C') {
        return 'Dibatalkan';
      } elseif ($surat_masuk->isactive == 'N') {
        return 'Menunggu Acc, Non Aktif';
      }
    })
    ->addColumn('action', function ($surat_masuk) {
      $status = ($surat_masuk->isactive == 'A') ? 'btn-success' : 'disabled btn-default';
      $print  = (isset($surat_masuk->id_user_acc_3)) ? 'btn-primary' : 'disabled btn-default';
      $acc = (isset($surat_masuk->id_user_acc_3)) ? 'btn-primary' : 'disabled btn-default';
      $cancel = (isset($surat_masuk->id_user_acc_3)) ? 'btn-danger' : 'disabled btn-default';
      $role = Auth::user()->role == '0001' || Auth::user()->role == '0002' || Auth::user()->role == '0003' || Auth::user()->role == '0004';
      if ($role) {
        $acc = 'btn-success';
        if (Auth::user()->role == '0004') {
          if (isset($surat_masuk->id_user_acc_1)) {
            $acc = 'disabled btn-default';
          }
        }
        if ($surat_masuk->isactive == 'C') {
          $cancel = 'disabled btn-default';
          $print = 'disabled btn-default';
          $acc = 'disabled btn-default';
          $msg = '<a onclick="msgData(\''.$surat_masuk->catatan_pembatalan.'\')" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-warning-sign"></i> Telah Ditolak</a> &nbsp;';
        } else {
          $acc = (isset($surat_masuk->id_user_acc_3)) ? 'disabled btn-default' : 'btn-primary';
          $cancel = (isset($surat_masuk->id_user_acc_3)) ? 'disabled btn-default' : 'btn-danger';
          $msg = '';
        }
      } else {
        $acc = 'disabled btn-default';
        $acc = 'disabled btn-default';
        if ($surat_masuk->id_proses == '0002' && isset($surat_masuk->id_user_acc_1)) {
          $print = 'btn-primary';
        }
      }
      if ($role) {
        return
        '<a onclick="viewData(\''.$surat_masuk->id.'\')" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> View</a> &nbsp;'.
        '<a onclick="printData(\''.$surat_masuk->id.'\')" class="btn '.$print.' btn-xs"><i class="glyphicon glyphicon-print"></i> Print</a> &nbsp;'.
        '<a onclick="accData(\''.$surat_masuk->id.'\')" class="btn '.$acc.' btn-xs"><i class="glyphicon glyphicon-check"></i> Approve</a> &nbsp;'.
        '<a onclick="cancelData(\''.$surat_masuk->id.'\')" class="btn '.$cancel.' btn-xs"><i class="glyphicon glyphicon-ban-circle"></i> Not Approve</a>&nbsp;'.$msg;
      } else {
        return
        '<a onclick="viewData(\''.$surat_masuk->id.'\')" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> View</a> &nbsp;'.
        '<a onclick="printData(\''.$surat_masuk->id.'\')" class="btn '.$print.' btn-xs"><i class="glyphicon glyphicon-print"></i> Print</a> &nbsp;'.$msg;
      }
    })->make(true);
  }

  public function surat_masuk_view($id)
  {
    $profile   = Param::all();
    $surat_masuk = DB::table('surat_masuk')
    ->select(
      'surat_masuk.*',
      'surat_masuk_detail.*',
      'supplier.name as nama_supplier',
      'supplier.alamat as alamat_supplier',
      'proses.name as nama_proses',
      'satuan.name as nama_satuan',
      'surat_masuk_detail.id_barang as id_barang'
      )
      ->join('supplier', 'surat_masuk.id_supplier', '=', 'supplier.id')
      ->join('surat_masuk_detail', 'surat_masuk.id', '=', 'surat_masuk_detail.id_surat_masuk')
      ->join('proses', 'surat_masuk.id_proses', '=', 'proses.id')
      ->join('satuan', 'surat_masuk_detail.id_satuan', '=', 'satuan.id')
      ->where('surat_masuk.id', '=', $id)
      ->get();

      return response()->json([
        'data'    =>  $surat_masuk,
        'profile' =>  $profile,
        'type'    =>  'M'
      ]);
    }

  public function surat_masuk_print($id)
  {
    $check = SuratMasuk::findOrFail($id);
    if (($check['id_proses'] == '0002' && isset($check['tgl_acc_1'])) || isset($check['tgl_acc_3'])) {
      $title      = 'SURAT JALAN';
      $profile    = Param::all();
      $data       = DB::table('surat_masuk')
      ->select(
        'surat_masuk.*',
        'surat_masuk_detail.*',
        'supplier.name as nama_supplier',
        'supplier.alamat as alamat_supplier',
        'proses.name as nama_proses',
        'satuan.name as nama_satuan',
        'barang.name as nama_barang',
        'surat_masuk_detail.id_barang as id_barang'
        )
        ->join('supplier', 'surat_masuk.id_supplier', '=', 'supplier.id')
        ->join('surat_masuk_detail', 'surat_masuk.id', '=', 'surat_masuk_detail.id_surat_masuk')
        ->join('proses', 'surat_masuk.id_proses', '=', 'proses.id')
        ->join('satuan', 'surat_masuk_detail.id_satuan', '=', 'satuan.id')
        ->join('barang', 'surat_masuk_detail.id_barang', '=', 'barang.id')
        ->where('surat_masuk.id', '=', $id)
        ->get();
        $tanggal = $this->datedbtoview($data[0]->tanggal);
        $id = $data[0]->id_surat_masuk;
        $data = [
          'id'          =>  $id,
          'title'       =>  $title,
          'data'        =>  $data,
          'profile'     =>  $profile,
          'tanggal'     =>  $tanggal
        ];

        $pdf  = PDF::loadView('transaksi.print.master_surat_masuk', $data);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    } else {
      abort(404);
      }
    }

  public function surat_masuk_acc(Request $request)
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
    $role             = Auth::user()->role;
    $surat_masuk      = SuratMasuk::findOrFail($r['id']);
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

      $surat_masuk_get = SuratMasukDetail::where('id_surat_masuk',$r['id'])->get();
      for ($i=0; $i < count($surat_masuk_get); $i++) {
        $barang = Barang::find($surat_masuk_get[$i]['id_barang']);
        $barang->update([
          'isactive'    =>  'A',
          'updated_at'  =>  $this->datenowtodb()
        ]);
      }

    } else {
      return response()->json([
        'status' => false,
        'message' => 'Acc Batal'
      ]);
    }

    $surat_masuk->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Acc Berhasil'
    ]);
  }

  public function surat_masuk_cancel(Request $request)
  {
    $r          = $request->all();
    $name       = Auth::user()->name;
    $data       = [
      'catatan_pembatalan' => $r['msg'].', by: '.$name,
      'isactive' => 'C'
    ];
    $surat_masuk  = SuratMasuk::findOrFail($r['id']);
    $surat_masuk->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Cancel Berhasil'
    ]);
  }

  public function trans_index()
  {
    $data  = [
      'title'   =>  'Transaksi Penjualan',
      'tag'     =>  'trans',
      'newid'   =>  $this->genid('Trans', 'INV'),
      'tanggal' =>  $this->datenowtoview(),
    ];

    return view('transaksi.trans', $data);
  }

  public function trans_create(Request $request)
  {
    $r    = $request->all();
    $i    = $this->genindex('Trans');
    $data = [
      'id'            => $r['id'],
      'index'         => $i,
      'tanggal'       => $this->dateviewtodb($r['tanggal']),
      'tanggal_kirim' => $this->dateviewtodb($r['tanggal_kirim']),
      'id_supplier'   => $r['id_supplier'],
      'id_proses'     => $r['id_proses'],
      'style'         => $r['style'],
      'top'           => $r['top'],
      'tos'           => $r['tos'],
      'attention'     => $r['attention'],
      'ppn'           => $r['ppn'],
      'total_trans'   => $this->todb($r['total_all']),
      'isactive'      => 'N'
    ];

    for ($i=0; $i < count($r['id_material']) ; $i++) {
      $data_detail = [
        'id_po'         => $r['id'],
        'index'         => $i,
        'tanggal'       => $this->dateviewtodb($r['tanggal']),
        'id_material'   => $r['id_material'][$i],
        'id_warna'      => $r['id_warna'][$i],
        'size'          => $r['size'][$i],
        'ld'            => $r['ld'][$i],
        'qty'           => $this->todb($r['qty'][$i]),
        'id_satuan'     => $r['id_satuan'][$i],
        'price'         => $this->todb($r['price'][$i]),
        'total'         => $this->todb($r['total'][$i]),
        'isactive'      => 'A'
      ];
      TransDetail::create($data_detail);
    }

    Trans::create($data);
    $newid = $this->genid('Trans', 'INV');

    return response()->json([
      'status'  => true,
      'message' => 'Transaksi Penjualan created',
      'newid'   => $newid
    ]);
  }

  public function trans_api()
  {
    $trans = DB::table('trans')
    ->select('trans.*', 'supplier.name as nama_supplier')
    ->join('supplier', 'trans.id_supplier', '=', 'supplier.id')
    ->get();

    return DataTables::of($trans)
    ->editColumn('isactive', function ($trans) {
      if ($trans->isactive == 'A') {
        return 'Active';
      } elseif ($trans->isactive == 'C') {
        return 'Dibatalkan';
      } elseif ($trans->isactive == 'N') {
        return 'Menunggu Acc, Non Aktif';
      }
    })
    ->addColumn('action', function ($trans) {
      $status = ($trans->isactive == 'A') ? 'btn-success' : 'disabled btn-default';
      $print  = (isset($trans->id_user_acc_3)) ? 'btn-primary' : 'disabled btn-default';
      $acc = (isset($trans->id_user_acc_3)) ? 'btn-primary' : 'disabled btn-default';
      $cancel = (isset($trans->id_user_acc_3)) ? 'btn-danger' : 'disabled btn-default';
      $role = Auth::user()->role == '0001' || Auth::user()->role == '0002' || Auth::user()->role == '0003' || Auth::user()->role == '0004';
      if ($role) {
        $acc = 'btn-success';
        if (Auth::user()->role == '0004') {
          if (isset($trans->id_user_acc_1)) {
            $acc = 'disabled btn-default';
          }
        }
        if ($trans->isactive == 'C') {
          $cancel = 'disabled btn-default';
          $print = 'disabled btn-default';
          $acc = 'disabled btn-default';
          $msg = '<a onclick="msgData(\''.$trans->catatan_pembatalan.'\')" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-warning-sign"></i> Telah Ditolak</a> &nbsp;';
        } else {
          $acc = (isset($trans->id_user_acc_3)) ? 'disabled btn-default' : 'btn-primary';
          $cancel = (isset($trans->id_user_acc_3)) ? 'disabled btn-default' : 'btn-danger';
          $msg = '';
        }
      } else {
        $acc = 'disabled btn-default';
      }
      if ($role) {
        return
        '<a onclick="viewData(\''.$trans->id.'\')" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> View</a> &nbsp;'.
        '<a onclick="printData(\''.$trans->id.'\')" class="btn '.$print.' btn-xs"><i class="glyphicon glyphicon-print"></i> Print</a> &nbsp;'.
        '<a onclick="accData(\''.$trans->id.'\')" class="btn '.$acc.' btn-xs"><i class="glyphicon glyphicon-check"></i> Approve</a> &nbsp;'.
        '<a onclick="cancelData(\''.$trans->id.'\')" class="btn '.$cancel.' btn-xs"><i class="glyphicon glyphicon-ban-circle"></i> Not Approve</a>&nbsp;'.$msg;
      } else {
        return
        '<a onclick="viewData(\''.$trans->id.'\')" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> View</a> &nbsp;'.
        '<a onclick="printData(\''.$trans->id.'\')" class="btn '.$print.' btn-xs"><i class="glyphicon glyphicon-print"></i> Print</a> &nbsp;'.$msg;
      }
    })->make(true);
  }

  public function trans_view($id)
  {
    $profile   = Param::all();
    $trans = DB::table('trans')
    ->select(
      'trans.*',
      'trans_detail.*',
      'supplier.name as nama_supplier',
      'supplier.alamat as alamat_supplier',
      'proses.name as nama_proses',
      'satuan.name as nama_satuan',
      'material.name as nama_material'
      )
      ->join('supplier', 'trans.id_supplier', '=', 'supplier.id')
      ->join('trans_detail', 'trans.id', '=', 'trans_detail.id_po')
      ->join('proses', 'trans.id_proses', '=', 'proses.id')
      ->join('satuan', 'trans_detail.id_satuan', '=', 'satuan.id')
      ->join('material', 'trans_detail.id_material', '=', 'material.id')
      ->where('trans.id', '=', $id)
      ->get();

      return response()->json([
        'data'    =>  $trans,
        'profile' =>  $profile,
        'type'    =>  'M'
      ]);
    }

  public function trans_print($id)
  {
    $check = Trans::findOrFail($id);
    if (!isset($check->tgl_acc_3)) {
      abort(404);
    } else {
      $title      = 'PURCHASE ORDER';
      $profile    = Param::all();
      $data       = DB::table('trans')
      ->select(
        'trans.*',
        'trans_detail.*',
        'supplier.name as nama_supplier',
        'proses.name as nama_proses',
        'material.name as nama_material',
        'warna.name as nama_warna',
        'satuan.name as nama_satuan',
        'supplier.alamat as alamat_supplier'
        )
        ->join('supplier', 'trans.id_supplier', '=', 'supplier.id')
        ->join('trans_detail', 'trans.id', '=', 'trans_detail.id_po')
        ->join('proses', 'trans.id_proses', '=', 'proses.id')
        ->join('warna', 'trans_detail.id_warna', '=', 'warna.id')
        ->join('satuan', 'trans_detail.id_satuan', '=', 'satuan.id')
        ->join('material', 'trans_detail.id_material', '=', 'material.id')
        ->where('trans.id', '=', $id)
        ->get();

        $data = [
          'title'       =>  $title,
          'data'        =>  $data,
          'profile'     =>  $profile,
          'total_trans' =>  $data[0]->total_trans
        ];

        $pdf  = PDF::loadView('transaksi.print.master', $data);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
      }
    }

  public function trans_acc(Request $request)
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
    $trans  = Trans::findOrFail($r['id']);
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

    $trans->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Acc Berhasil'
    ]);
  }

  public function trans_cancel(Request $request)
  {
    $r          = $request->all();
    $name       = Auth::user()->name;
    $data       = [
      'catatan_pembatalan' => $r['msg'].', by: '.$name,
      'isactive' => 'C'
    ];
    $trans  = Trans::findOrFail($r['id']);
    $trans->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Cancel Berhasil'
    ]);
  }


}
