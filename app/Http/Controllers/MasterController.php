<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

use App\Material;
use App\Warna;
use App\Satuan;
use App\Proses;
use App\JenisBarang;
use App\Barang;
use App\Supplier;
use App\Costumer;
use App\Role;

class MasterController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  // CRUD MATERIAL
  public function material_index()
  {
    $title  = 'Material';
    $tag    = 'material';
    $newid  = $this->genid('Material','');

    return view('master.material',['newid'=>$newid,'title'=>$title,'tag'=>$tag]);
  }

  public function material_create(Request $request)
  {
    $index  = $this->genindex('Material');
    $data   = [
      'id'        => $request['id'],
      'index'     => $index,
      'name'      => $request['name'],
      'isactive'  => $request['isactive']
    ];

    $material = Material::where('name',$request['name'])->count();
    $newid = $this->genid('Material','');

    if ($material > 0) {
      return response()->json([
        'status' => false,
        'message' => 'Material already exists!',
        'newid'   => $newid
      ]);
    }

    Material::create($data);
    $newid = $this->genid('Material','');

    return response()->json([
      'status'  => true,
      'message' => 'Material created',
      'newid'   => $newid
    ]);
  }

  public function material_edit($id)
  {
    $material = Material::findOrFail($id);
    return $material;
  }

  public function material_update(Request $request, $id)
  {
    $material  = Material::findOrFail($request['id_edit']);
    $data     = [
      'name' => $request['name_edit'],
      'isactive' => $request['isactive_edit']
    ];
    $material->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Material Updated'
    ]);
  }

  public function material_delete($id)
  {
    $material = Material::findOrFail($id);
    Material::destroy($id);
    $newid    = $this->genid('Material','');
    return response()->json([
      'status'  => true,
      'message' => 'Material Deleted',
      'newid'   => $newid
    ]);
  }

  public function material_api()
  {
    $material = Material::all();
    return DataTables::of($material)
    ->editColumn('isactive', function($material){
      return ($material->isactive == 'A') ? 'Active' : 'Non Active';
    })
    ->addColumn('action', function($material){
      return
      '<a onclick="editData(\''.$material->id.'\')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp;'.
      '<a onclick="deleteData(\''.$material->id.'\')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
    })->make(true);
  }

  // CRUD WARNA
  public function warna_index()
  {
    $title  = 'Warna';
    $tag    = 'warna';
    $newid  = $this->genid('Warna','');

    return view('master.warna',['newid'=>$newid,'title'=>$title,'tag'=>$tag]);
  }

  public function warna_create(Request $request)
  {
    $index  = $this->genindex('Warna');
    $data   = [
      'id'        => $request['id'],
      'index'     => $index,
      'name'      => $request['name'],
      'isactive'  => $request['isactive']
    ];

    $warna = Warna::where('name',$request['name'])->count();
    $newid = $this->genid('Warna','');

    if ($warna > 0) {
      return response()->json([
        'status' => false,
        'message' => 'Warna already exists!',
        'newid'   => $newid
      ]);
    }

    Warna::create($data);
    $newid = $this->genid('Warna','');

    return response()->json([
      'status'  => true,
      'message' => 'Warna created',
      'newid'   => $newid
    ]);
  }

  public function warna_edit($id)
  {
    $warna = Warna::findOrFail($id);
    return $warna;
  }

  public function warna_update(Request $request, $id)
  {
    $warna  = Warna::findOrFail($request['id_edit']);
    $data     = [
      'name' => $request['name_edit'],
      'isactive' => $request['isactive_edit']
    ];
    $warna->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Warna Updated'
    ]);
  }

  public function warna_delete($id)
  {
    $warna = Warna::findOrFail($id);
    Warna::destroy($id);
    $newid    = $this->genid('Warna','');
    return response()->json([
      'status'  => true,
      'message' => 'Warna Deleted',
      'newid'   => $newid
    ]);
  }

  public function warna_api()
  {
    $warna = Warna::all();
    return DataTables::of($warna)
    ->editColumn('isactive', function($warna){
      return ($warna->isactive == 'A') ? 'Active' : 'Non Active';
    })
    ->addColumn('action', function($warna){
      return
      '<a onclick="editData(\''.$warna->id.'\')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp;'.
      '<a onclick="deleteData(\''.$warna->id.'\')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
    })->make(true);
  }

  //CRUD SATUAN
  public function satuan_index()
  {
    $title  = 'Satuan';
    $tag    = 'satuan';
    $newid  = $this->genid('Satuan','');

    return view('master.satuan',['newid'=>$newid,'title'=>$title,'tag'=>$tag]);
  }

  public function satuan_create(Request $request)
  {
    $index  = $this->genindex('Satuan');
    $data   = [
      'id'        => $request['id'],
      'index'     => $index,
      'name'      => $request['name'],
      'isactive'  => $request['isactive']
    ];

    $satuan = Satuan::where('name',$request['name'])->count();
    $newid = $this->genid('Satuan','');

    if ($satuan > 0) {
      return response()->json([
        'status' => false,
        'message' => 'Satuan already exists!',
        'newid'   => $newid
      ]);
    }

    Satuan::create($data);
    $newid = $this->genid('Satuan','');

    return response()->json([
      'status'  => true,
      'message' => 'Satuan created',
      'newid'   => $newid
    ]);
  }

  public function satuan_edit($id)
  {
    $satuan = Satuan::findOrFail($id);
    return $satuan;
  }

  public function satuan_update(Request $request, $id)
  {
    $satuan  = Satuan::findOrFail($request['id_edit']);
    $data     = [
      'name' => $request['name_edit'],
      'isactive' => $request['isactive_edit']
    ];
    $satuan->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Satuan Updated'
    ]);
  }

  public function satuan_delete($id)
  {
    $satuan = Satuan::findOrFail($id);
    Satuan::destroy($id);
    $newid    = $this->genid('Satuan','');
    return response()->json([
      'status'  => true,
      'message' => 'Satuan Deleted',
      'newid'   => $newid
    ]);
  }

  public function satuan_api()
  {
    $satuan = Satuan::all();
    return DataTables::of($satuan)
    ->editColumn('isactive', function($satuan){
      return ($satuan->isactive == 'A') ? 'Active' : 'Non Active';
    })
    ->addColumn('action', function($satuan){
      return
      '<a onclick="editData(\''.$satuan->id.'\')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp;'.
      '<a onclick="deleteData(\''.$satuan->id.'\')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
    })->make(true);
  }

  //CRUD PROSES
  public function proses_index()
  {
    $title  = 'Proses';
    $tag    = 'proses';
    $newid  = $this->genid('Proses','');

    return view('master.proses',['newid'=>$newid,'title'=>$title,'tag'=>$tag]);
  }

  public function proses_create(Request $request)
  {
    $index  = $this->genindex('Proses');
    $data   = [
      'id'        => $request['id'],
      'index'     => $index,
      'name'      => $request['name'],
      'isactive'  => $request['isactive']
    ];

    $proses = Proses::where('name',$request['name'])->count();
    $newid = $this->genid('Proses','');

    if ($proses > 0) {
      return response()->json([
        'status' => false,
        'message' => 'Proses already exists!',
        'newid'   => $newid
      ]);
    }

    Proses::create($data);
    $newid = $this->genid('Proses','');

    return response()->json([
      'status'  => true,
      'message' => 'Proses created',
      'newid'   => $newid
    ]);
  }

  public function proses_edit($id)
  {
    $proses = Proses::findOrFail($id);
    return $proses;
  }

  public function proses_update(Request $request, $id)
  {
    $proses  = Proses::findOrFail($request['id_edit']);
    $data     = [
      'name' => $request['name_edit'],
      'isactive' => $request['isactive_edit']
    ];
    $proses->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Proses Updated'
    ]);
  }

  public function proses_delete($id)
  {
    $proses = Proses::findOrFail($id);
    Proses::destroy($id);
    $newid    = $this->genid('Proses','');
    return response()->json([
      'status'  => true,
      'message' => 'Proses Deleted',
      'newid'   => $newid
    ]);
  }

  public function proses_api()
  {
    $proses = Proses::all();
    return DataTables::of($proses)
    ->editColumn('isactive', function($proses){
      return ($proses->isactive == 'A') ? 'Active' : 'Non Active';
    })
    ->addColumn('action', function($proses){
      return
      '<a onclick="editData(\''.$proses->id.'\')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp;'.
      '<a onclick="deleteData(\''.$proses->id.'\')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
    })->make(true);
  }

  // CRUD ROLE
  public function role_index()
  {
    $title  = 'Role';
    $tag    = 'role';
    $newid  = $this->genid('Role','');

    return view('master.role',['newid'=>$newid,'title'=>$title,'tag'=>$tag]);
  }

  public function role_create(Request $request)
  {
    $index  = $this->genindex('Role');
    $data   = [
      'id'        => $request['id'],
      'index'     => $index,
      'name'      => $request['name'],
      'isactive'  => $request['isactive']
    ];

    $role = Role::where('name',$request['name'])->count();
    $newid = $this->genid('Role','');

    if ($role > 0) {
      return response()->json([
        'status' => false,
        'message' => 'Role already exists!',
        'newid'   => $newid
      ]);
    }

    Role::create($data);
    $newid = $this->genid('Role','');

    return response()->json([
      'status'  => true,
      'message' => 'Role created',
      'newid'   => $newid
    ]);
  }

  public function role_edit($id)
  {
    $role = Role::findOrFail($id);
    return $role;
  }

  public function role_update(Request $request, $id)
  {
    $role  = Role::findOrFail($request['id_edit']);
    $data     = [
      'name' => $request['name_edit'],
      'isactive' => $request['isactive_edit']
    ];
    $role->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Role Updated'
    ]);
  }

  public function role_delete($id)
  {
    $role = Role::findOrFail($id);
    Role::destroy($id);
    $newid    = $this->genid('Role','');
    return response()->json([
      'status'  => true,
      'message' => 'Role Deleted',
      'newid'   => $newid
    ]);
  }

  public function role_api()
  {
    $role = Role::all();
    return DataTables::of($role)
    ->editColumn('isactive', function($role){
      return ($role->isactive == 'A') ? 'Active' : 'Non Active';
    })
    ->addColumn('action', function($role){
      return
      '<a onclick="editData(\''.$role->id.'\')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp;'.
      '<a onclick="deleteData(\''.$role->id.'\')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
    })->make(true);
  }

  //CRUD JENIS BARANG
  public function jenis_barang_index()
  {
    $title  = 'JenisBarang';
    $tag    = 'jenis_barang';
    $newid  = $this->genid('JenisBarang','');

    return view('master.jenis_barang',['newid'=>$newid,'title'=>$title,'tag'=>$tag]);
  }

  public function jenis_barang_create(Request $request)
  {
    $index  = $this->genindex('JenisBarang');
    $data   = [
      'id'        => $request['id'],
      'index'     => $index,
      'name'      => $request['name'],
      'isactive'  => $request['isactive']
    ];

    $jenis_barang = JenisBarang::where('name',$request['name'])->count();
    $newid = $this->genid('JenisBarang','');

    if ($jenis_barang > 0) {
      return response()->json([
        'status' => false,
        'message' => 'JenisBarang already exists!',
        'newid'   => $newid
      ]);
    }

    JenisBarang::create($data);
    $newid = $this->genid('JenisBarang','');

    return response()->json([
      'status'  => true,
      'message' => 'JenisBarang created',
      'newid'   => $newid
    ]);
  }

  public function jenis_barang_edit($id)
  {
    $jenis_barang = JenisBarang::findOrFail($id);
    return $jenis_barang;
  }

  public function jenis_barang_update(Request $request, $id)
  {
    $jenis_barang  = JenisBarang::findOrFail($request['id_edit']);
    $data     = [
      'name' => $request['name_edit'],
      'isactive' => $request['isactive_edit']
    ];
    $jenis_barang->update($data);
    return response()->json([
      'status' => true,
      'message' => 'JenisBarang Updated'
    ]);
  }

  public function jenis_barang_delete($id)
  {
    $jenis_barang = JenisBarang::findOrFail($id);
    JenisBarang::destroy($id);
    $newid    = $this->genid('JenisBarang','');
    return response()->json([
      'status'  => true,
      'message' => 'JenisBarang Deleted',
      'newid'   => $newid
    ]);
  }

  public function jenis_barang_api()
  {
    $jenis_barang = JenisBarang::all();
    return DataTables::of($jenis_barang)
    ->editColumn('isactive', function($jenis_barang){
      return ($jenis_barang->isactive == 'A') ? 'Active' : 'Non Active';
    })
    ->addColumn('action', function($jenis_barang){
      return
      '<a onclick="editData(\''.$jenis_barang->id.'\')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp;'.
      '<a onclick="deleteData(\''.$jenis_barang->id.'\')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
    })->make(true);
  }

  //CRUD BARANG
  public function barang_index()
  {
    $title  = 'Barang';
    $tag    = 'barang';
    $newid  = $this->genid('Barang','');
    $tanggal= $this->datenowmanual('m/y');

    return view('master.barang',['newid'=>$newid,'title'=>$title,'tag'=>$tag,'tanggal'=>$tanggal]);
  }

  public function barang_create(Request $request)
  {
    $index    = $this->genindex('Barang');
    $s        = $request['status'];
    $isactive = 'N';

    if ($s == 'B') {
      $isactive = 'N';
    } else {
      $isactive = 'A';
    }

    $data   = [
      'id'          => $request['id'],
      'index'       => $index,
      'name'        => $request['name'],
      'id_material' => $request['id_material'],
      'id_warna'    => $request['id_warna'],
      'id_satuan'   => $request['id_satuan'],
      'id_jenis'    => $request['id_jenis_barang'],
      'qty'         => $request['qty'],
      'status'      => $request['status'],
      'isactive'    => $isactive
    ];

    $barang = Barang::where('name',$request['name'])->count();
    $newid = $this->genid('Barang','');

    if ($barang > 0) {
      return response()->json([
        'status' => false,
        'message' => 'Barang already exists!',
        'newid'   => $newid
      ]);
    }

    Barang::create($data);
    $newid = $this->genid('Barang','');

    return response()->json([
      'status'  => true,
      'message' => 'Barang created',
      'newid'   => $newid
    ]);
  }

  public function barang_edit($id)
  {
    $barang = Barang::findOrFail($id);
    return $barang;
  }

  public function barang_update(Request $request, $id)
  {
    $barang  = Barang::findOrFail($request['id_edit']);
    $data     = [
      'name' => $request['name_edit'],
      'isactive' => $request['isactive_edit']
    ];
    $barang->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Barang Updated'
    ]);
  }

  public function barang_delete($id)
  {
    $barang = Barang::findOrFail($id);
    Barang::destroy($id);
    $newid    = $this->genid('Barang','');
    return response()->json([
      'status'  => true,
      'message' => 'Barang Deleted',
      'newid'   => $newid
    ]);
  }

  public function barang_api()
  {
    $barang = DB::table('barang')
    ->select('barang.*','satuan.name as nama_satuan')
    ->join('satuan', 'barang.id_satuan', '=', 'satuan.id')
    ->get();

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


  // CRUD SUPPLIER
  public function supplier_index()
  {
    $title  = 'Supplier';
    $tag    = 'supplier';
    $newid  = $this->genid('Supplier','');

    return view('master.supplier',['newid'=>$newid,'title'=>$title,'tag'=>$tag]);
  }

  public function supplier_create(Request $request)
  {
    $index  = $this->genindex('Supplier');
    $data   = [
      'id'        => $request['id'],
      'index'     => $index,
      'name'      => $request['name'],
      'alamat'    => $request['alamat'],
      'no_telepon' => $request['no_telepon'],
      'isactive'  => $request['isactive']
    ];

    $supplier = Supplier::where('name',$request['name'])->count();
    $newid = $this->genid('Supplier','');

    if ($supplier > 0) {
      return response()->json([
        'status' => false,
        'message' => 'Supplier already exists!',
        'newid'   => $newid
      ]);
    }

    Supplier::create($data);
    $newid = $this->genid('Supplier','');

    return response()->json([
      'status'  => true,
      'message' => 'Supplier created',
      'newid'   => $newid
    ]);
  }

  public function supplier_edit($id)
  {
    $supplier = Supplier::findOrFail($id);
    return $supplier;
  }

  public function supplier_update(Request $request, $id)
  {
    $supplier  = Supplier::findOrFail($request['id_edit']);
    $data     = [
      'name' => $request['name_edit'],
      'alamat' => $request['alamat_edit'],
      'no_telepon' => $request['no_telepon_edit'],
      'isactive' => $request['isactive_edit']
    ];
    $supplier->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Supplier Updated'
    ]);
  }

  public function supplier_delete($id)
  {
    $supplier = Supplier::findOrFail($id);
    Supplier::destroy($id);
    $newid    = $this->genid('Supplier','');
    return response()->json([
      'status'  => true,
      'message' => 'Supplier Deleted',
      'newid'   => $newid
    ]);
  }

  public function supplier_api()
  {
    $supplier = Supplier::all();
    return DataTables::of($supplier)
    ->editColumn('isactive', function($supplier){
      return ($supplier->isactive == 'A') ? 'Active' : 'Non Active';
    })
    ->addColumn('action', function($supplier){
      return
      '<a onclick="editData(\''.$supplier->id.'\')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp;'.
      '<a onclick="deleteData(\''.$supplier->id.'\')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
    })->make(true);
  }

  //CRUD COSTUMER
  public function costumer_index()
  {
    $title  = 'Costumer';
    $tag    = 'costumer';
    $newid  = $this->genid('Costumer','');

    return view('master.costumer',['newid'=>$newid,'title'=>$title,'tag'=>$tag]);
  }

  public function costumer_create(Request $request)
  {
    $index  = $this->genindex('Costumer');
    $data   = [
      'id'        => $request['id'],
      'index'     => $index,
      'name'      => $request['name'],
      'alamat'    => $request['alamat'],
      'no_telepon' => $request['no_telepon'],
      'isactive'  => $request['isactive']
    ];

    $costumer = Costumer::where('name',$request['name'])->count();
    $newid = $this->genid('Costumer','');

    if ($costumer > 0) {
      return response()->json([
        'status' => false,
        'message' => 'Costumer already exists!',
        'newid'   => $newid
      ]);
    }

    Costumer::create($data);
    $newid = $this->genid('Costumer','');

    return response()->json([
      'status'  => true,
      'message' => 'Costumer created',
      'newid'   => $newid
    ]);
  }

  public function costumer_edit($id)
  {
    $costumer = Costumer::findOrFail($id);
    return $costumer;
  }

  public function costumer_update(Request $request, $id)
  {
    $costumer  = Costumer::findOrFail($request['id_edit']);
    $data     = [
      'name' => $request['name_edit'],
      'alamat' => $request['alamat_edit'],
      'no_telepon' => $request['no_telepon_edit'],
      'isactive' => $request['isactive_edit']
    ];
    $costumer->update($data);
    return response()->json([
      'status' => true,
      'message' => 'Costumer Updated'
    ]);
  }

  public function costumer_delete($id)
  {
    $costumer = Costumer::findOrFail($id);
    Costumer::destroy($id);
    $newid    = $this->genid('Costumer','');
    return response()->json([
      'status'  => true,
      'message' => 'Costumer Deleted',
      'newid'   => $newid
    ]);
  }

  public function costumer_api()
  {
    $costumer = Costumer::all();
    return DataTables::of($costumer)
    ->editColumn('isactive', function($costumer){
      return ($costumer->isactive == 'A') ? 'Active' : 'Non Active';
    })
    ->addColumn('action', function($costumer){
      return
      '<a onclick="editData(\''.$costumer->id.'\')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp;'.
      '<a onclick="deleteData(\''.$costumer->id.'\')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
    })->make(true);
  }

}
