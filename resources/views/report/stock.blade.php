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
          {{ $title }}
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
                <h2>Filter {{ $title }}</h2>

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
                        <label class="col-md-2 control-label">Material </label>
                        <div class="col-md-2">
                          <select class="genid form-control" style="width:100%;" name="id_material" required></select>
                        </div>
                        <label class="col-md-2 control-label">Jenis Barang </label>
                        <div class="col-md-2">
                          <select class="genid form-control" style="width:100%;" name="id_jenis_barang" required></select>
                        </div>
                        <label class="col-md-2 control-label">Warna</label>
                        <div class="col-md-2">
                          <select class="genid form-control" style="width:100%;" name="id_warna" required></select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-3 pull-right">
                          <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                              <i class="fa fa-calendar"></i>&nbsp;
                              <span></span> <i class="fa fa-caret-down"></i>
                          </div>
                        </div>
                        <label class="col-md-2 control-label pull-right">Date Range</label>
                      </div>

                      <!-- <div class="form-group">
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
                      </div> -->

                    </fieldset>

                    <div class="form-actions">
                      <div class="row">
                        <div class="col-md-12">
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

  </section>
  <!-- end widget grid -->

</div>
<!-- END MAIN CONTENT -->
@endsection

@section('script')
<script>
var tanggal   = '{{ $tanggal }}';
var startdate = '';
var enddate   = '';
var tag       = '{{$tag}}';


$(function() {
  select2Run();
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('D/M/YYYY') + ' - ' + end.format('D/M/YYYY'));
        startdate = start.format('YYYY-M-D');
        enddate   = end.format('YYYY-M-D');
        table.ajax.reload();
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Hari Ini': [moment(), moment()],
           'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           '7 Hari Lalu': [moment().subtract(6, 'days'), moment()],
           '30 Hari Lalu': [moment().subtract(29, 'days'), moment()],
           'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
           'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});


$('[name=id_warna]').on('change',function () {
  table.ajax.reload();
});
$('[name=id_jenis_barang]').on('change',function () {
  table.ajax.reload();
});
$('[name=id_material]').on('change',function () {
  table.ajax.reload();
});
var table     = $('#'+tag+'-table').DataTable({
  lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "All"]],
  processing: true,
  serverSide: true,
  ajax: {
         url: "{{ route('stock_a.api') }}",
         data: function (d) {
             d.id_warna = $('[name=id_warna]').val(),
             d.id_material = $('[name=id_material]').val(),
             d.id_jenis_barang = $('[name=id_jenis_barang]').val(),
             d.startdate = startdate,
             d.enddate = enddate;
         }
     },
  columns: [
    {data: 'id', name: 'id'},
    {data: 'name', name: 'name'},
    {data: 'qty', name: 'qty'},
    {data: 'isactive', name: 'isactive'},
    {data: 'action', name: 'action', orderable: false, searchable: false}
  ]
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
}

//Fungsi Reset Data form
function resetForm() {
  $('#formAdd')[0].reset();
  $('.select2').val('').change();
}
</script>
@endsection
