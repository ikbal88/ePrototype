<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
  public $incrementing  = false;
  protected $table      = 'pembelian';
  protected $fillable   = ['id','index','id_supplier','top','tos',
  'tanggal','tanggal_kirim','ppn','style','attention','id_proses',
  'tgl_acc_1','id_user_acc_1','tgl_acc_2','id_user_acc_2','tgl_acc_3','id_user_acc_3',
  'total_trans','catatan','catatan_pembatalan','status','isactive'];

}
