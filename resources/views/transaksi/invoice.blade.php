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

              <form class="form-horizontal">

                <fieldset>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Kode PO </label>
                    <div class="col-md-2">
                      <input class="form-control" name="id" placeholder="Kode {{ $title }}" type="text" value="SIP/2018/04/0023" readonly>
                    </div>
                    <div class="col-md-2 pull-right">
                      <input class="form-control" name="id" type="text" value="20/04/2018" readonly>
                    </div>
                    <label class="col-md-1 pull-right control-label">Tanggal </label>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Costumer </label>
                    <div class="col-md-4">
                      <select class="select2" name="">
                        <option></option>
                        <option value="0001">FOREVER</option>
                      </select>
                    </div>
                    <label class="col-md-1 control-label">Mata Uang </label>
                    <div class="col-md-4">
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

                <fieldset>
                  <legend>Details</legend>
                  <div class="form-group">
                    <div class="col-md-2">
                      <label class="control-label">Nama Barang</label>
                    </div>
                    <div class="col-md-2">
                      <label class="control-label">Color</label>
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
                      <label class="control-label">Unit</label>
                    </div>
                    <div class="col-md-2">
                      <label class="control-label">Price</label>
                    </div>
                    <div class="col-md-2">
                      <label class="control-label">Total</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">
                      <input class="form-control" name="nama_barang[]" placeholder="Nama Barang" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <select class="select2" name="color[]">
                        <option></option>
                        <option value="0001">HITAM</option>
                      </select>
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="size[]" placeholder="Size" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="l/d[]" placeholder="L/D" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="qty[]" placeholder="Qty" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <select class="select2" name="unit[]">
                        <option></option>
                        <option value="0001">KG</option>
                        <option value="0002">Yard</option>
                        <option value="0002">Roll</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <input class="form-control" name="price[]" placeholder="Price" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <input class="form-control" name="total[]" placeholder="Total" type="text" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">
                      <input class="form-control" name="nama_barang[]" placeholder="Nama Barang" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <select class="select2" name="color[]">
                        <option></option>
                        <option value="0001">HITAM</option>
                      </select>
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="size[]" placeholder="Size" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="l/d[]" placeholder="L/D" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="qty[]" placeholder="Qty" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <select class="select2" name="unit[]">
                        <option></option>
                        <option value="0001">KG</option>
                        <option value="0002">Yard</option>
                        <option value="0002">Roll</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <input class="form-control" name="price[]" placeholder="Price" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <input class="form-control" name="total[]" placeholder="Total" type="text" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">
                      <input class="form-control" name="nama_barang[]" placeholder="Nama Barang" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <select class="select2" name="color[]">
                        <option></option>
                        <option value="0001">HITAM</option>
                      </select>
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="size[]" placeholder="Size" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="l/d[]" placeholder="L/D" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="qty[]" placeholder="Qty" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <select class="select2" name="unit[]">
                        <option></option>
                        <option value="0001">KG</option>
                        <option value="0002">Yard</option>
                        <option value="0002">Roll</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <input class="form-control" name="price[]" placeholder="Price" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <input class="form-control" name="total[]" placeholder="Total" type="text" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">
                      <input class="form-control" name="nama_barang[]" placeholder="Nama Barang" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <select class="select2" name="color[]">
                        <option></option>
                        <option value="0001">HITAM</option>
                      </select>
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="size[]" placeholder="Size" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="l/d[]" placeholder="L/D" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="qty[]" placeholder="Qty" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <select class="select2" name="unit[]">
                        <option></option>
                        <option value="0001">KG</option>
                        <option value="0002">Yard</option>
                        <option value="0002">Roll</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <input class="form-control" name="price[]" placeholder="Price" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <input class="form-control" name="total[]" placeholder="Total" type="text" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">
                      <input class="form-control" name="nama_barang[]" placeholder="Nama Barang" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <select class="select2" name="color[]">
                        <option></option>
                        <option value="0001">HITAM</option>
                      </select>
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="size[]" placeholder="Size" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="l/d[]" placeholder="L/D" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="qty[]" placeholder="Qty" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <select class="select2" name="unit[]">
                        <option></option>
                        <option value="0001">KG</option>
                        <option value="0002">Yard</option>
                        <option value="0002">Roll</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <input class="form-control" name="price[]" placeholder="Price" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <input class="form-control" name="total[]" placeholder="Total" type="text" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">
                      <input class="form-control" name="nama_barang[]" placeholder="Nama Barang" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <select class="select2" name="color[]">
                        <option></option>
                        <option value="0001">HITAM</option>
                      </select>
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="size[]" placeholder="Size" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="l/d[]" placeholder="L/D" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="qty[]" placeholder="Qty" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <select class="select2" name="unit[]">
                        <option></option>
                        <option value="0001">KG</option>
                        <option value="0002">Yard</option>
                        <option value="0002">Roll</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <input class="form-control" name="price[]" placeholder="Price" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <input class="form-control" name="total[]" placeholder="Total" type="text" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">
                      <input class="form-control" name="nama_barang[]" placeholder="Nama Barang" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <select class="select2" name="color[]">
                        <option></option>
                        <option value="0001">HITAM</option>
                      </select>
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="size[]" placeholder="Size" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="l/d[]" placeholder="L/D" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <input class="form-control" name="qty[]" placeholder="Qty" type="text" value="">
                    </div>
                    <div class="col-md-1">
                      <select class="select2" name="unit[]">
                        <option></option>
                        <option value="0001">KG</option>
                        <option value="0002">Yard</option>
                        <option value="0002">Roll</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <input class="form-control" name="price[]" placeholder="Price" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <input class="form-control" name="total[]" placeholder="Total" type="text" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2 pull-right">
                      <input class="form-control" name="total_all" placeholder="Total" type="text" value="">
                    </div>
                  </div>
                </fieldset>


                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-12">
                      <button class="btn btn-default">
                        Reset
                      </button>
                      <button class="btn btn-primary" type="submit">
                        <i class="fa fa-send"></i>
                        Buat
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
                    <th data-hide="phone">Kode</th>
                    <th data-class="expand">Nama {{ $title }}</th>
                    <th>Status</th>
                    <th data-hide="phone">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>SIP0001</td>
                    <td>{{ $title }} 1</td>
                    <td>Suspend</td>
                    <td><a href="javascript:void(0);" class="btn btn-primary btn-xs"><i class="fa fa-gear"></i></a>&nbsp;<a href="javascript:void(0);" class="btn btn-default disabled btn-xs"><i class="fa fa-print"></i></a>&nbsp;<a href="javascript:void(0);" onclick="verifikasi('0001')" class="btn btn-warning btn-xs"><i class="fa fa-check-square-o"></i></a></td>
                  </tr>
                  <tr>
                    <td>SIP0002</td>
                    <td>{{ $title }} 2</td>
                    <td>Acc</td>
                    <td><a href="javascript:void(0);" class="btn btn-primary btn-xs"><i class="fa fa-gear"></i></a>&nbsp;<a href="javascript:void(0);" class="btn btn-success btn-xs"><i class="fa fa-print"></i></a>&nbsp;<a href="javascript:void(0);" class="btn btn-default disabled btn-xs"><i class="fa fa-check-square-o"></i></a></td>
                  </tr>
                  <tr>
                    <td>SIP0003</td>
                    <td>{{ $title }} 3</td>
                    <td>Acc</td>
                    <td><a href="javascript:void(0);" class="btn btn-primary btn-xs"><i class="fa fa-gear"></i></a>&nbsp;<a href="javascript:void(0);" class="btn btn-success btn-xs"><i class="fa fa-print"></i></a>&nbsp;<a href="javascript:void(0);" class="btn btn-default disabled btn-xs"><i class="fa fa-check-square-o"></i></a></td>
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
