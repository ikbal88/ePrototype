<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
  public $incrementing  = false;
  protected $table      = 'surat_jalan';
  protected $primaryKey = 'id';
  protected $fillable   = ['id','index','pengirim','tanggal','jam',
  'no_kendaraan','id_supplier','ppn','style','attention','id_proses',
  'tgl_acc_1','id_user_acc_1','tgl_acc_2','id_user_acc_2','tgl_acc_3','id_user_acc_3',
  'total_trans','catatan','catatan_pembatalan','status','isactive'];
  protected $casts = [
    'id' => 'string',
  ];

}
