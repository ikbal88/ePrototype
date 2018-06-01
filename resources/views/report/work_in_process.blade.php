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
          <!-- widget options:
          usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

          data-widget-colorbutton="false"
          data-widget-editbutton="false"
          data-widget-togglebutton="false"
          data-widget-deletebutton="false"
          data-widget-fullscreenbutton="false"
          data-widget-custombutton="false"
          data-widget-collapsed="true"
          data-widget-sortable="false"

          -->
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
            <div class="widget-body no-padding">

              <table id="datatable_tabletools" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                  <tr>
                    <th data-hide="phone">Kode</th>
                    <th data-hide="phone">Tanggal Masuk</th>
                    <th data-hide="phone">Tanggal Estimasi Selesai</th>
                    <th data-class="expand">Nama {{ $title }}</th>
                    <th data-hide="phone">Company</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="info">
                    <td>SIP0001</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 1</td>
                    <td>PT Harapan Kurnia</td>
                    <td>On Proses Cuci Finish</td>
                  </tr>
                  <tr class="warning">
                    <td>SIP0002</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 2</td>
                    <td>PT Sunshine Indoglobal</td>
                    <td>On Proses Rajut</td>
                  </tr>
                  <tr class="success">
                    <td>SIP0003</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 3</td>
                    <td>PT Harapan Kurnia</td>
                    <td>Selesai Cuci</td>
                  </tr>
                  <tr class="info">
                    <td>SIP0001</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 1</td>
                    <td>PT Harapan Kurnia</td>
                    <td>On Proses Cuci Finish</td>
                  </tr>
                  <tr class="warning">
                    <td>SIP0002</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 2</td>
                    <td>PT Sunshine Indoglobal</td>
                    <td>On Proses Rajut</td>
                  </tr>
                  <tr class="success">
                    <td>SIP0003</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 3</td>
                    <td>PT Harapan Kurnia</td>
                    <td>Selesai Cuci</td>
                  </tr>
                  <tr class="info">
                    <td>SIP0001</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 1</td>
                    <td>PT Harapan Kurnia</td>
                    <td>On Proses Cuci Finish</td>
                  </tr>
                  <tr class="warning">
                    <td>SIP0002</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 2</td>
                    <td>PT Sunshine Indoglobal</td>
                    <td>On Proses Rajut</td>
                  </tr>
                  <tr class="success">
                    <td>SIP0003</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 3</td>
                    <td>PT Harapan Kurnia</td>
                    <td>Selesai Cuci</td>
                  </tr>
                  <tr class="info">
                    <td>SIP0001</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 1</td>
                    <td>PT Harapan Kurnia</td>
                    <td>On Proses Cuci Finish</td>
                  </tr>
                  <tr class="warning">
                    <td>SIP0002</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 2</td>
                    <td>PT Sunshine Indoglobal</td>
                    <td>On Proses Rajut</td>
                  </tr>
                  <tr class="success">
                    <td>SIP0003</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 3</td>
                    <td>PT Harapan Kurnia</td>
                    <td>Selesai Cuci</td>
                  </tr>
                  <tr class="info">
                    <td>SIP0001</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 1</td>
                    <td>PT Harapan Kurnia</td>
                    <td>On Proses Cuci Finish</td>
                  </tr>
                  <tr class="warning">
                    <td>SIP0002</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 2</td>
                    <td>PT Sunshine Indoglobal</td>
                    <td>On Proses Rajut</td>
                  </tr>
                  <tr class="success">
                    <td>SIP0003</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 3</td>
                    <td>PT Harapan Kurnia</td>
                    <td>Selesai Cuci</td>
                  </tr>
                  <tr class="info">
                    <td>SIP0001</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 1</td>
                    <td>PT Harapan Kurnia</td>
                    <td>On Proses Cuci Finish</td>
                  </tr>
                  <tr class="warning">
                    <td>SIP0002</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 2</td>
                    <td>PT Sunshine Indoglobal</td>
                    <td>On Proses Rajut</td>
                  </tr>
                  <tr class="success">
                    <td>SIP0003</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 3</td>
                    <td>PT Harapan Kurnia</td>
                    <td>Selesai Cuci</td>
                  </tr>
                  <tr class="info">
                    <td>SIP0001</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 1</td>
                    <td>PT Harapan Kurnia</td>
                    <td>On Proses Cuci Finish</td>
                  </tr>
                  <tr class="warning">
                    <td>SIP0002</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 2</td>
                    <td>PT Sunshine Indoglobal</td>
                    <td>On Proses Rajut</td>
                  </tr>
                  <tr class="success">
                    <td>SIP0003</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 3</td>
                    <td>PT Harapan Kurnia</td>
                    <td>Selesai Cuci</td>
                  </tr>
                  <tr class="info">
                    <td>SIP0001</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 1</td>
                    <td>PT Harapan Kurnia</td>
                    <td>On Proses Cuci Finish</td>
                  </tr>
                  <tr class="warning">
                    <td>SIP0002</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 2</td>
                    <td>PT Sunshine Indoglobal</td>
                    <td>On Proses Rajut</td>
                  </tr>
                  <tr class="success">
                    <td>SIP0003</td>
                    <td>01/05/2018</td>
                    <td>15/05/2018</td>
                    <td>{{ $title }} 3</td>
                    <td>PT Harapan Kurnia</td>
                    <td>Selesai Cuci</td>
                  </tr>
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
  function verifikasi(id) {
    swal({
        title: 'Masukkan PIN',
        input: 'password',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        showLoaderOnConfirm: true,
        preConfirm: (email) => {
          return new Promise((resolve) => {
            setTimeout(() => {
              if (email === 'taken@example.com') {
                swal.showValidationError(
                  'This email is already taken.'
                )
              }
              resolve()
            }, 2000)
          })
        },
        allowOutsideClick: () => !swal.isLoading()
      }).then((result) => {
        if (result.value) {
          swal({
            type: 'success',
            title: 'Berhasil di Acc!',
          })
        }
      });
  }
</script>
@endsection
