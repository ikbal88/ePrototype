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
                    <label class="col-md-2 control-label">Kode PO </label>
                    <div class="col-md-1">
                      <input class="form-control" id="id" name="id" placeholder="Kode {{ $title }}" type="text" value="{{ $newid }}" readonly>
                    </div>
                    <div class="col-sm-2 pull-right">
                      <div class="input-group">
                        <input type="text" id="tanggal" name="tanggal" placeholder="Select a date" class="form-control datepicker" data-dateformat="dd/mm/yy" value="{{ $tanggal }}" readonly="readonly">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      </div>
                    </div>
                    <label class="col-md-1 control-label pull-right">Tanggal </label>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Nama Supplier </label>
                    <div class="col-md-3">
                      <select class="select2" style="width:100%;" name="id_supplier" required></select>
                    </div>
                    <span class="help-block with-errors"></span>
                    <div class="col-md-2 pull-right">
                      <input class="form-control" name="style" type="text">
                    </div>
                    <label class="col-md-1 control-label pull-right">Style </label>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Term Of Payment </label>
                    <div class="col-md-4">
                      <input class="form-control" id="top" name="top" type="text">
                    </div>
                    <div class="col-md-2 pull-right">
                      <input class="form-control" name="attention" type="text">
                    </div>
                    <label class="col-md-1 control-label pull-right">Attention </label>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Term Of Shipment</label>
                    <div class="col-md-4">
                      <input class="form-control" id="tos" name="tos" type="text">
                    </div>
                    <div class="col-md-2 pull-right">
                      <select class="select2" style="width:100%;" name="id_proses"></select>
                    </div>
                    <label class="col-md-1 control-label pull-right">Proses </label>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Tanggal Kirim </label>
                    <div class="col-sm-2">
                      <div class="input-group">
                        <input type="text" id="tanggal_kirim" name="tanggal_kirim" placeholder="Select a date" class="form-control datepicker" data-dateformat="dd/mm/yy" value="{{ $tanggal }}">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">PPN</label>
                    <div class="col-md-3">
                      <label class="radio radio-inline">
                        <input type="radio" class="radiobox" value="I" name="ppn" checked="">
                        <span>Include</span>
                      </label>
                      <label class="radio radio-inline">
                        <input type="radio" class="radiobox" value="E" name="ppn">
                        <span>Exclude</span>
                      </label>
                    </div>
                  </div>
                </fieldset><br><br>
                <fieldset>
                  <legend>Details {{ $title }}</legend>
                  <div class="form-group">
                    <div class="col-md-2">
                      <label class="control-label">Nama Barang</label>
                    </div>
                    <div class="col-md-2">
                      <label class="control-label">Warna</label>
                    </div>
                    <div class="col-md-1">
                      <label class="control-label">Size</label>
                    </div>
                    <div class="col-md-1">
                      <label class="control-label">L/D</label>
                    </div>
                    <div class="col-md-1">
                      <label class="control-label">Qty</label>
                    </div>
                    <div class="col-md-1">
                      <label class="control-label">Satuan</label>
                    </div>
                    <div class="col-md-2">
                      <label class="control-label">Price</label>
                    </div>
                    <div class="col-md-2">
                      <label class="control-label">Total</label>
                    </div>
                  </div>
                  <div id="detail">
                    <div class="detailLine form-group">
                      <div class="itemLine col-md-2">
                        <select class="select2" style="width:100%;" name="id_material[]" required></select>
                        <span class="help-block with-errors"></span>
                      </div>
                      <div class="itemLine col-md-2">
                        <select class="select2" style="width:100%;" name="id_warna[]"></select>
                      </div>
                      <div class="itemLine col-md-1">
                        <input class="form-control" name="size[]" placeholder="Size" type="text" value="">
                      </div>
                      <div class="itemLine col-md-1">
                        <input class="form-control" name="ld[]" placeholder="L/D" type="text" value="">
                      </div>
                      <div class="itemLine col-md-1">
                        <input class="calc form-control decimal" name="qty[]" placeholder="Qty" type="decimal" value="">
                      </div>
                      <div class="itemLine col-md-1">
                        <select class="select2" style="width:100%;" name="id_satuan[]"></select>
                      </div>
                      <div class="itemLine col-md-2">
                        <input class="calc form-control ribuan" name="price[]" placeholder="Price" type="decimal" value="">
                      </div>
                      <div class="itemLine col-md-2">
                        <input class="calc form-control ribuan" name="total[]" placeholder="Total" type="decimal" value="0" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-1">
                      <button id="btnAddLine" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-plus"></i></button>
                    </div>
                    <div class="col-md-2 pull-right">
                      <input class="form-control input-lg" name="total_all" placeholder="Total" type="decimal" value="0" readonly>
                    </div>
                  </div>
                </fieldset>
                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-12">
                      <button id="btnAdd" type="submit" class="btn btn-primary">
                        <i class="fa fa-send"></i>
                        Buat PO
                      </button>
                      <a id="btnResetAdd" class="btn btn-default">
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
@include('transaksi.view.modalGeneralView');
@endsection

@section('script')
<script>
var tag   = '{{$tag}}';
var table = $('#'+tag+'-table').DataTable({
  processing: true,
  serverSide: true,
  ajax: "{{ route('pembelian.api') }}",
  columns: [
    {data: 'id', name: 'id'},
    {data: 'nama_supplier', name: 'nama_supplier'},
    {data: 'isactive', name: 'isactive'},
    {data: 'action', name: 'action', orderable: false, searchable: false}
  ]
});

$(function () {

  var detailLine = $('#detail .detailLine').eq(0).html();

  $('#btnAddLine').on('click',function (e) {
    $('#detail .detailLine').last().after('<div class="detailLine form-group">'+detailLine+'</div>');
    $('[name="id_material[]"]:last,[name="id_warna[]"]:last,[name="id_satuan[]"]:last').next(".select2-container").hide();
    runSelect2();
    e.preventDefault();
  });

  $('#detail').on('keyup','.calc',function() {
    var self  = $(this);
    var qty   = self.parents('.detailLine').find('.calc[name="qty[]"]');
    var price = self.parents('.detailLine').find('.calc[name="price[]"]');
    var total = self.parents('.detailLine').find('.calc[name="total[]"]');
    total.val(ribuan(parseInt(toDb(qty.val())*toDb(price.val()))));
    var tl    = toDb($('[name="total[]"]:last').val());
    hitungTotal();
    if( tl > 0) {
      $('#detail .detailLine').last().after('<div class="detailLine form-group">'+detailLine+'</div>');
      $('[name="id_material[]"]:last,[name="id_warna[]"]:last,[name="id_satuan[]"]:last').next(".select2-container").hide();
    }
    runSelect2();
    runRibuan();
    runDecimal();
  }
);

$('#btnResetAdd').on('click', function (e) {
  resetForm();
});

$('#formAdd').validator().on('submit', function (e) {
  $('input[name=_method]').val('POST');
  if (!e.isDefaultPrevented()){
    var id = $('#id').val();
    url = "{{ url('pembelian') }}";

    $.ajax({
      url : url,
      type : "POST",
      data : $('#formAdd').serialize(),
      success : function(data) {
        table.ajax.reload();
        if (data.status == true) {
          myswal('s',data.message,'s',1500);
          resetForm();
          $('#name').focus();
          $('#id').val(data.newid);
        } else {
          myswal('e',data.message,'e',1500);
          $('#name').focus();
          $('#id').val(id);
        }
      },
      error : function(data){
        myswal('e',data.message,'e',1500);
      }
    });
    return false;
  }
});

runSelect2();
});

//Fungsi Reset Data form
function resetForm() {
  $('#formAdd')[0].reset();
  $('.select2').val('').change();
  $('.detailLine').not(':eq(0)').remove();
}

//Fungsi Hitung Total All
function hitungTotal() {
  var total_all = 0;
  $('[name="total[]"]').each(function() {
    var val = $(this).val();
    total_all = parseFloat(total_all) + parseFloat(toDb(val));
  });
  var num   = numeral(total_all).format('0,0');
  $('[name=total_all]').val(num);
}

//Fungsi View Data
function viewData(id) {
  $.ajax({
    url: "{{ url('pembelian') }}" + '/' + id + "/view",
    type: "GET",
    dataType: "JSON",
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
      var catatan = (t == 'p') ? 'PO Benang' : 'PO Maklon';
      var total_trans = numeral(d[0].total_trans).format('0,0');
      for (var i = 0; i < d.length; i++) {
        s += '<tr>\n\
        <td><strong>'+d[i].qty+'</strong></td>\n\
        <td>'+d[i].nama_satuan+'</td>\n\
        <td>'+d[i].nama_material+'</td>\n\
        <td>'+catatan+'</td>\n\
        <td>'+numeral(d[i].price).format('0,0')+'</td>\n\
        <td>'+numeral(d[i].total).format('0,0')+'</td>\n\
        </tr>';
      }
      s += '<tr>\n\
      <td colspan="5">Total</td>\n\
      <td><strong>Rp. '+total_trans+'</strong></td>\n\
      </tr>';

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
  window.open(baseurl+'/pembelian/'+id+'/print');
}

//Fungsi Acc
function accData(id_po) {
  var csrf_token = $('meta[name="csrf-token"]').attr('content');
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
        url: "{{ route('pembelian.acc') }}",
        type: "POST",
        data: {'id':id_po,'pin':pin,'_token' : csrf_token},
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
  var csrf_token = $('meta[name="csrf-token"]').attr('content');
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
        url: "{{ route('pembelian.cancel') }}",
        type: "POST",
        data: {'id':id_po,'msg':msg,'_token' : csrf_token},
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
