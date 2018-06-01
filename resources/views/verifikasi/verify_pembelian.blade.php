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
        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-editbutton="false">
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
                    <th data-class="expand">Nama Supplier</th>
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

//Fungsi View Data
function viewData(id) {
  $.ajax({
    url: "{{ url('pembelian') }}" + '/' + id + "/view",
    type: "GET",
    dataType: "JSON",
    success: function(data) {
      var d = data['data'];
      var p = data['profile'];
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
      var catatan = (d[0].catatan != null) ? d[0].catatan : 'Pembelian PO';
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
