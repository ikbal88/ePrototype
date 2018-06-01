@extends('layouts.super_admin.app')

@section('style')
<style>

</style>
@endsection

@section('content')
<!-- MAIN CONTENT -->
<div id="content">

  <div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
      <h1 class="page-title txt-color-blueDark">
        <i class="fa fa-pencil-square-o fa-fw "></i>
        Master {{ $title }}
      </h1>
    </div>
  </div>

  <!-- widget grid -->
  <section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

      <!-- NEW WIDGET START -->
      <article class="col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">

          <header>
            <span class="widget-icon"> <i class="fa fa-send"></i> </span>
            <h2>Tambah {{ $title }}</h2>

          </header>

          <!-- widget div-->
          <div>

            <!-- widget edit box -->
            <div class="jarviswidget-editbox">
              <!-- This area used as dropdown edit box -->

            </div>
            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body">

              <form id="formAdd" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}

                <fieldset>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Nama {{ $title }}</label>
                    <div class="col-md-4">
                      <input class="form-control" name="name" placeholder="Masukkan Nama {{ $title }}" type="text" required="">
                    </div>
                    <label class="col-md-2 control-label">Material </label>
                    <div class="col-md-2">
                      <select class="genid form-control" style="width:100%;" name="id_material" required></select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Jenis Barang </label>
                    <div class="col-md-2">
                      <select class="genid form-control" style="width:100%;" name="id_jenis_barang" required></select>
                    </div>
                    <label class="col-md-1 control-label">Warna</label>
                    <div class="col-md-2">
                      <select class="genid form-control" style="width:100%;" name="id_warna" required></select>
                    </div>
                    <label class="col-md-1 control-label">Qty</label>
                    <div class="col-md-1">
                      <input class="form-control" type="decimal" name="qty" value="" required>
                    </div>
                    <label class="col-md-1 control-label">Satuan</label>
                    <div class="col-md-1">
                      <select class="genid form-control" style="width:100%;" name="id_satuan" required></select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Kode Barang/ Barcode</label>
                    <div class="col-md-10">
                      <input class="form-control input-lg" name="id" placeholder="" value="----" type="text" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Status</label>
                    <div class="col-md-10">
                      <label class="radio radio-inline">
                        <input type="radio" value="B" class="radiobox" name="status" checked>
                        <span>Barang Baru</span>
                      </label>
                      <label class="radio radio-inline">
                        <input type="radio" value="P" class="radiobox" name="status">
                        <span>Barang Hasil Produksi</span>
                      </label>
                      <label class="radio radio-inline">
                        <input type="radio" value="L" class="radiobox" name="status">
                        <span>Barang Lama</span>
                      </label>
                      <label class="radio radio-inline">
                        <input type="radio" value="S" class="radiobox" name="status">
                        <span>Barang Sisa</span>
                      </label>
                    </div>
                  </div>

                </fieldset>

                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-12">
                      <button id="btnAdd" type="submit" class="btn btn-primary">
                        <i class="fa fa-send"></i>
                        Simpan
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
            <!-- end widget content -->

          </div>
          <!-- end widget div -->

        </div>
        <!-- end widget -->

      </article>
      <!-- WIDGET END -->

    </div>
    <!-- end row -->

    <!-- row -->
    <div class="row">

      <!-- NEW WIDGET START -->
      <article class="col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-darken" id="wid-id-3" data-widget-editbutton="false">
          <header>
            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
            <h2>List Data {{ $title }}</h2>

          </header>

          <!-- widget div-->
          <div>

            <!-- widget edit box -->
            <div class="jarviswidget-editbox">
              <!-- This area used as dropdown edit box -->

            </div>
            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body">

              <table id="{{$tag}}-table" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                  <tr>
                    <th data-hide="phone">Kode</th>
                    <th data-class="expand">Nama {{ $title }}</th>
                    <th data-class="expand">Qty {{ $title }}</th>
                    <th>Status</th>
                    <th data-hide="phone">Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>

            </div>
            <!-- end widget content -->

          </div>
          <!-- end widget div -->

        </div>
        <!-- end widget -->


      </article>
      <!-- WIDGET END -->

    </div>
    <!-- end row -->

  <!-- end row -->

</section>
<!-- end widget grid -->

</div>
<!-- END MAIN CONTENT -->
@endsection

@section('script')
<script>
var tanggal   = '{{ $tanggal }}';
var tag       = '{{$tag}}';
var table     = $('#'+tag+'-table').DataTable({
  processing: true,
  serverSide: true,
  ajax: "{{ route('barang.api') }}",
  columns: [
    {data: 'id', name: 'id'},
    {data: 'name', name: 'name'},
    {data: 'qty', name: 'qty'},
    {data: 'isactive', name: 'isactive'},
    {data: 'action', name: 'action', orderable: false, searchable: false}
  ]
});

function generateKode() {
  var material = $('[name=id_material]').val();
  var jenis = $('[name=id_jenis_barang]').val();
  var warna = $('[name=id_warna]').val();
  var qty = $('[name=qty]').val();
  var satuan = $('[name=id_satuan]').val();
  if(material == null) material = '';
  if(jenis == null) jenis = '';
  if(warna == null) warna = '';
  if(satuan == null) satuan = '';
  else { var satuan = $('[name=id_satuan]').select2('data')[0].text; }
  $('[name=id]').val(tanggal+'-'+material+'-'+warna+'-'+jenis+'-'+qty+satuan);
}

$('[name=id_material]').on('change',function () {
  generateKode();
});
$('[name=id_jenis_barang]').on('change',function () {
  generateKode();
});
$('[name=id_warna]').on('change',function () {
  generateKode();
});
$('[name=id_satuan]').on('change',function () {
  generateKode();
});
$('[name=qty]').on('keyup',function () {
  generateKode();
});

$(function () {
  select2Run();
  generateKode();

    $('#btnResetAdd').on('click', function (e) {
      resetForm();
    });

    $('#formAdd').validator().on('submit', function (e) {
      $('input[name=_method]').val('POST');
      if (!e.isDefaultPrevented()){
        var id = $('#id').val();
        url = "{{ url('barang') }}";

        $.ajax({
          url : url,
          type : "POST",
          data : $('#formAdd').serialize(),
          success : function(data) {
            table.ajax.reload();
            resetForm();
            if (data.status == true) {
              myswal('s',data.message,'s',1500);
              $('#id').val(data.newid);
              $('#name').focus();
            } else {
              myswal('e',data.message,'e',1500);
              $('#id').val(data.newid);
              $('#name').focus();
            }
          },
          error : function(data){
            myswal('e',data.message,'e',1500);
          }
        });
        return false;
      }
    });

    $('#modalEdit form').validator().on('submit', function (e) {
      if (!e.isDefaultPrevented()){
        var id = $('#id_edit').val();
        url = "{{ url('barang') . '/' }}" + id;

        $.ajax({
          url : url,
          type : "POST",
          data : $('#modalEdit form').serialize(),
          success : function(data) {
            $('#modalEdit').modal('hide');
            table.ajax.reload();
            myswal('s',data.message,'s',1500);
          },
          error : function(data){
            myswal('e',data.message,'e',1500);
          }
        });
        return false;
      }
    });

});

//Mengaktifkan Fungsi Select 2
function select2Run() {
  $('[name=id_jenis_barang]').select2({
      ajax: {
        url: baseurl+'/jenis_barang_get',
        delay:250,
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }
          return query;
        },
        processResults: function (data) {
          return {
            results: data
          };
        }
      }
    });

  $('[name=id_material]').select2({
      ajax: {
        url: baseurl+'/material_get',
        delay:250,
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }
          return query;
        },
        processResults: function (data) {
          return {
            results: data
          };
        }
      }
    });

  $('[name=id_warna]').select2({
      ajax: {
        url: baseurl+'/warna_get',
        delay:250,
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }
          return query;
        },
        processResults: function (data) {
          return {
            results: data
          };
        }
      }
    });

  $('[name=id_satuan]').select2({
      ajax: {
        url: baseurl+'/satuan_get',
        delay:250,
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }
          return query;
        },
        processResults: function (data) {
          return {
            results: data
          };
        }
      }
    });
}

//Fungsi Reset Data form
function resetForm() {
  $('#formAdd')[0].reset();
  $('.select2').val('').change();
}

</script>
@endsection
