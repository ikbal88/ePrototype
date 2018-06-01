@extends('layouts.super_admin.app')

@section('style')
<style>
</style>
@endsection

@section('content')
<div id="content">
  <div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
      <h1 class="page-title txt-color-blueDark">
        <i class="fa fa-pencil-square-o fa-fw "></i>
          {{ $title }}
      </h1>
    </div>
  </div>
  <section id="widget-grid" class="">
    <div class="row">
      <article class="col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
          <header>
            <span class="widget-icon"> <i class="fa fa-send"></i> </span>
            <h2>Tambah {{ $title }}</h2>
          </header>
          <div>
            <div class="widget-body">
              <form id="formAdd" name="formAdd" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <fieldset>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Kode </label>
                    <div class="col-md-2">
                      <input class="form-control" name="id" placeholder="Kode {{ $title }}" type="text" value="{{ $newid }}" readonly>
                    </div>
                    <div class="col-sm-2 pull-right">
                      <div class="input-group">
                        <input type="text" name="tanggal" placeholder="Select a date" class="form-control datepicker" data-dateformat="dd/mm/yy" value="{{ $tanggal }}" readonly="readonly">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      </div>
                    </div>
                    <label class="col-md-1 control-label pull-right">Tanggal </label>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">No. Surat Jalan </label>
                    <div class="col-md-2">
                      <input class="form-control" name="id_surat_jalan" type="text" required="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Diterima Oleh </label>
                    <div class="col-md-2">
                      <input class="form-control" name="penerima" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Jam </label>
                    <div class="col-md-2">
                      <input class="form-control" name="jam" type="time">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Kendaraan No. </label>
                    <div class="col-md-2">
                      <input class="form-control" name="no_kendaraan" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Pengirim</label>
                    <div class="col-md-3">
                      <select class="select2" style="width:100%;" name="id_supplier" required></select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Proses</label>
                    <div class="col-md-3">
                      <select class="select2" style="width:100%;" name="id_proses" required></select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Attention </label>
                    <div class="col-md-2">
                      <input class="form-control" name="attention" type="text">
                    </div>
                  </div>

                </fieldset>

                <fieldset>
                  <legend>Details {{ $title }}</legend>
                  <div class="form-group">
                    <div class="col-md-1">
                      <label class="control-label">Qty</label>
                    </div>
                    <div class="col-md-1">
                      <label class="control-label">Satuan</label>
                    </div>
                    <div class="col-md-3">
                      <label class="control-label">Barcode</label>
                    </div>
                    <div class="col-md-2">
                      <label class="control-label">Nama Barang</label>
                    </div>
                    <div class="col-md-2">
                      <label class="control-label">Nomor PO</label>
                    </div>
                    <div class="col-md-3">
                      <label class="control-label">Keterangan</label>
                    </div>
                  </div>
                  <div id="detail">
                    <div class="detailLine form-group">
                      <div class="itemLine col-md-1">
                        <input class="form-control decimal" name="qty[]" placeholder="Qty" type="decimal" value="" required="">
                      </div>
                      <div class="itemLine col-md-1">
                        <select class="select2" style="width:100%;" name="id_satuan[]" required=""></select>
                      </div>
                      <div class="itemLine col-md-3">
                        <input class="form-control" name="id_barang[]" placeholder="Scan Barcode" type="text" value="" required="">
                      </div>
                      <div class="itemLine col-md-2">
                        <input class="form-control" name="nama[]" placeholder="Nama Barang" type="text" value="" readonly>
                      </div>
                      <div class="itemLine col-md-2">
                        <input class="form-control" name="id_po[]" placeholder="No PO" type="text" value="" required="">
                      </div>
                      <div class="itemLine col-md-3">
                        <input class="form-control" name="ket[]" placeholder="Catatan" type="text" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-1">
                      <button id="btnAddLine" class="btn btn-primary btn-circle" type="button" onclick="addRow()"><i class="glyphicon glyphicon-plus"></i></button>
                    </div>
                  </div>
                </fieldset>

                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-12">
                      <button id="btnAdd" type="button" class="btn btn-primary" onclick="create(); return false;">
                        <i class="fa fa-send"></i>
                        Buat
                      </button>
                      <button id="btnResetAdd" type="button" class="btn btn-default">
                        <i class="fa fa-refresh"></i>
                        Batal
                      </a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </article>
    </div>
    <div class="row">
      <article class="col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-editbutton="false">
          <header>
            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
            <h2>List Data {{ $title }}</h2>
          </header>
          <div>
            <div class="widget-body">
              <table id="{{$tag}}-table" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                  <tr>
                    <th data-hide="phone">Kode</th>
                    <th data-class="expand">Nama Supplier</th>
                    <th>Status</th>
                    <th data-hide="phone">Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </article>
    </div>
  </section>
</div>

@include('transaksi.view.modalGeneralView_surat_masuk');
@endsection

@section('script')
<script>
var tag   = '{{$tag}}';
var token = $('meta[name="csrf-token"]').attr('content');
var table = $('#'+tag+'-table').DataTable({
  processing: true,
  serverSide: true,
  ajax: "{{ route('surat_masuk.api') }}",
  columns: [
    {data: 'id', name: 'id'},
    {data: 'nama_supplier', name: 'nama_supplier'},
    {data: 'isactive', name: 'isactive'},
    {data: 'action', name: 'action', orderable: false, searchable: false}
  ]
});

$(function () {
  var form = $('#formAdd');
  form.validator();
  runSelect2();
  runDecimal();
  get_nama_barang()

  $('#btnResetAdd').on('click', function (e) {
    resetForm();
  });


});

//Fungsi buat surat masuk
function create(e) {
    var form = $('#formAdd');
    form.validator();
    $('input[name=_method]').val('POST');
      var id = $('#id').val();
      url = "{{ url('surat_masuk_create') }}";
      $.ajax({
        url : url,
        type : "POST",
        data : $('#formAdd').serialize(),
        success : function(data) {
          table.ajax.reload();
          if (data.status == true) {
            myswal('s',data.message,'s',1500);
            resetForm();
            $('[name=pengirim]').focus();
            $('[name=id]').val(data.newid);
          } else {
            myswal('e',data.message,'e',1500);
            $('[name=pengirim]').focus();
          }
        },
        error : function(data){
          myswal('e',data.message,'e',1500);
        }
      });
}

//Fungsi buat surat jalan
function get_nama_barang() {
  $('[name="id_barang[]"]').on('keyup', function (e) {
    var self  = $(this);
    var nama  = self.parents('.detailLine').find('[name="nama[]"]');
    url = "{{ url('nama_barang_get') }}";
    $.ajax({
      url : url,
      type : "POST",
      data : {id:self.val(),_token:token,type:'open'},
      success : function(data) {
        nama.val('');
        if(data.length > 0){
          nama.val(data[0].nama_barang);
        } else {
          self.val('');
          myswal('e','Produk tidak terdaftar/ tidak aktif.','e',1500);
        }
      },
      error : function(data){
        self.val('');
        nama.val('');
        myswal('e','Not Avaliable','e',1500);
      }
    });
  });
}

//Fungsi tambah baris detail
function addRow() {
  var detailLine = $('#detail .detailLine').eq(0).html();
  $('#detail .detailLine').last().after('<div class="detailLine form-group">'+detailLine+'</div>');
  // $('[name="id_satuan[]"]:last,[name="id_material[]"]:last,[name="id_po_pembelian[]"]:last').next(".select2-container").hide();
  $('[name="id_satuan[]"]:last,[name="id_material[]"]:last').next(".select2-container").hide();
  runSelect2();
  runDecimal();
  get_nama_barang();
}

//Fungsi Reset Data form
function resetForm() {
  $('#formAdd')[0].reset();
  $('.select2').val('').change();
  $('.detailLine').not(':eq(0)').remove();
}


//Fungsi View Data
function viewData(id) {
  $.ajax({
    url: "{{ url('surat_masuk') }}" +'/'+ id + '/view',
    type: "GET",
    dataType: "JSON",
    data:{id:id,_token:token},
    success: function(data) {
      var d = data['data'];
      var p = data['profile'];
      var t = data['type'];
      $('#modalShow').modal('show');
      $('.modal-title').text('View {{$title}} '+d[0].id);
      $('.profile').html('');
      $('#view_name').html(p[0].name_perusahaan);
      $('#view_alamat').html(p[0].alamat);
      $('#view_telepon').html(p[0].telp);
      $('.dataview').html('');
      $('#view_id').html(d[0].id);
      $('#view_tanggal').html(d[0].tanggal);
      $('#view_supplier').html(d[0].nama_supplier);
      $('#view_alamat_supplier').html(d[0].alamat_supplier);
      $('#view_proses').html(d[0].nama_proses);
      $('#view_attention').html(d[0].attention);
      var s = '';
      var total_trans = numeral(d[0].total_trans).format('0,0');
      for (var i = 0; i < d.length; i++) {
        if (d[i].id_barang != '' || d[i].id_barang != null) {
          var barang = d[i].id_barang;
        } else {
          var barang = d[i].nama_material;
        }
        s += '<tr>\n\
        <td><strong>'+d[i].qty+'</strong></td>\n\
        <td>'+d[i].nama_satuan+'</td>\n\
        <td>'+barang+'</td>\n\
        <td>'+d[i].keterangan+'</td>\n\
        </tr>';
      }

      $('#view_detail').html('');
      $('#view_detail').append(s);
    },
    error : function() {
      myswal('e','No Data..','e',1500);
    }
  });
}

//Fungsi View Data
function printData(id) {
  window.open(baseurl+'/surat_masuk/'+id+'/print');

}

//Fungsi Acc
function accData(id_po) {
  swal({
    title: 'Masukkan PIN Anda!',
    input: 'password',
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    confirmButtonText: 'Aprove',
    showLoaderOnConfirm: true,
    preConfirm: (pin) => {
      $.ajax({
        url: "{{ route('surat_masuk.acc') }}",
        type: "POST",
        data: {'id':id_po,'pin':pin,'_token' : token},
        dataType: "JSON",
        success: function(data) {
          if (data.status == true) {
            table.ajax.reload();
            myswal('s',data.message,'s',1500);
          } else {
            myswal('e',data.message,'e',1500);
          }
        },
        error : function() {
          myswal('e','Not Autorized..','e',1500);
        }
      });
    },
    allowOutsideClick: () => !swal.isLoading()
  });

}

//Fungsi Cancel
function cancelData(id_po) {
  swal({
    title: 'Masukkan Catatan',
    input: 'text',
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    confirmButtonText: 'Send',
    showLoaderOnConfirm: true,
    preConfirm: (msg) => {
      $.ajax({
        url: "{{ route('surat_masuk.cancel') }}",
        type: "POST",
        data: {'id':id_po,'msg':msg,'_token' : token},
        dataType: "JSON",
        success: function(data) {
          if (data.status == true) {
            table.ajax.reload();
            myswal('s',data.message,'s',1500);
          } else {
            myswal('e',data.message,'e',1500);
          }
        },
        error : function() {
          myswal('e','Not Autorized..','e',1500);
        }
      });
    },
    allowOutsideClick: () => !swal.isLoading()
  });

}

//Fungsi Show Message Cancel
function msgData(msg) {
  myswal('w',msg,'w',3000);
}



</script>
@endsection
