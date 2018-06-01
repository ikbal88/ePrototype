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

              <form class="form-horizontal">

                <fieldset>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Tanggal Awal:</label>
                    <div class="col-md-2">
                      <div class="input-group">
                        <input type="text" name="mydate" placeholder="Select a date" class="form-control datepicker" data-dateformat="dd/mm/yy">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      </div>
                    </div>
                    <label class="col-md-2 control-label">Tanggal Akhir:</label>
                    <div class="col-md-2">
                      <div class="input-group">
                        <input type="text" name="mydate" placeholder="Select a date" class="form-control datepicker" data-dateformat="dd/mm/yy">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      </div>
                    </div>
                    <label class="col-md-2 control-label">Mata Uang </label>
                    <div class="col-md-2">
                      <label class="radio radio-inline">
                        <input type="radio" class="radiobox" name="mata_uang" checked="">
                        <span>Rupiah</span>
                      </label>
                      <label class="radio radio-inline">
                        <input type="radio" class="radiobox" name="mata_uang">
                        <span>Dollar</span>
                      </label>
                    </div>
                  </div>

                </fieldset>

                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-12">
                      <button class="btn btn-default">
                        <i class="glyphicon glyphicon-refresh"></i>
                        Reset
                      </button>
                      <button class="btn btn-primary" type="submit">
                        <i class="glyphicon glyphicon-flash"></i>
                        Process
                      </button>
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
                    <th data-hide="phone">No Invoice</th>
                    <th data-hide="phone">Kode Barang</th>
                    <th data-class="expand">Nama Barang</th>
                    <th>Qty</th>
                    <th data-hide="phone">Satuan</th>
                    <th data-hide="phone">Harga</th>
                    <th data-hide="phone">Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>SIP0001</td>
                    <td>0001-10.00-0003</td>
                    <td>Kain Cotton 20S Polos</td>
                    <td>1200</td>
                    <td>KG</td>
                    <td>40000</td>
                    <td>480000000</td>
                  </tr>
                  <tr>
                    <td>SIP0001</td>
                    <td>0222-10.00-0666</td>
                    <td>Kain CVC Multi</td>
                    <td>10</td>
                    <td>Rols</td>
                    <td>300000</td>
                    <td>3000000</td>
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
