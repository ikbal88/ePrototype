<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

use App\User;
use App\Param;



class SettingController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function user_index()
  {
    $kode   = 'U';
    $title  = 'User';
    $tag    = 'user';

    return view('setting.user',['title'=>$title,'tag'=>$tag]);
  }

  public function user_create(Request $request)
  {
    $newid = $this->genid('User','');
    $index = $this->genindex('User','user');
    $data = [
      'id'                => $newid,
      'name'              => $request['name'],
      'index'             => $index,
      'email'             => $request['email'],
      'no_ktp'            => $request['no_ktp'],
      'telepon'           => $request['telepon'],
      'alamat'            => $request['alamat'],
      'password'          => bcrypt($request['password']),
      'pin'               => $request['pin'],
      'role'              => $request['id_role'],
      'isactive'          => $request['isactive']
    ];

    $user = User::where('email',$request['email'])->count();

    if ($user > 0) {

      return response()->json([
        'status' => false,
        'message' => 'Email already exists!'
      ]);
    }

    User::create($data);

    return response()->json([
      'status'  => true,
      'message' => 'User created',
    ]);
  }

  public function user_edit($id)
  {
    $user = User::findOrFail($id);

    return $user;
  }

  public function user_update(Request $request, $id)
  {
    $user  = User::findOrFail($request['id_hidden']);

    $data     = [
      'index'             => $request['id_edit'],
      'name'              => $request['name_edit'],
      'email'             => $request['email_edit'],
      'role'              => $request['role_edit'],
      'ktp'               => $request['ktp_edit'],
      'telp'              => $request['telp_edit'],
      'alamat'            => $request['alamat_edit'],
      'remember_token'    => 'null',
      'password'          => bcrypt($request['password_edit']),
      'updated_at'        => Carbon::now(),
      'isactive'          => $request['isactive_edit']
    ];

    $user->update($data);
    return response()->json([
      'status' => true,
      'message' => 'User updated'
    ]);
  }

  public function user_delete($id)
  {
    $user = User::findOrFail($id);
    User::destroy($id);
    return response()->json([
      'status' => true,
      'message' => 'User Deleted'
    ]);
  }

  public function user_api()
  {
    $user = User::all();
    return DataTables::of($user)
    ->editColumn('isactive', function($user){
      return ($user->isactive == 'A') ? 'Active' : 'Non Active';
    })
    ->addColumn('action', function($user){
      return '-';
      // '<a onclick="editData(\''.$user->id.'\')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp;'.
      // '<a onclick="deleteData(\''.$user->id.'\')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
    })->make(true);
  }


  public function profil_index()
  {
    $kode   = 'P';
    $title  = 'Profil';
    $tag    = 'profil';

    return view('setting.profil', ['title'=>$title,'tag'=>$tag]);
  }


  public function profil_edit()
  {
    $param = Param::findOrFail('1');

    return $param;
  }

  public function profil_update(Request $request, $id)
  {
    $user  = Param::findOrFail($id);

    $data     = [
      'name_aplikasi'      => $request['name_aplikasi'],
      'name_perusahaan'    => $request['name_perusahaan'],
      'alamat'             => $request['alamat'],
      'telp'               => $request['telp'],
      'email'              => $request['email'],
      'logo_aplikasi'      => $request['logo_aplikasi'],
      'background_front'   => $request['background_front'],
      'logo_perusahaan'    => $request['logo_perusahaan'],
      'updated_at'         => Carbon::now()
    ];

    $user->update($data);
    return response()->json([
      'status' => true,
      'message' => 'User updated'
    ]);
  }

}
