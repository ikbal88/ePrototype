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
            <div class="widget-body" id="modalEdit">
                <form id="formEdit" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <fieldset>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Nama Aplikasi</label>
                    <div class="col-md-7">
                      <input class="form-control" id="name_aplikasi" name="name_aplikasi" placeholder="Masukkan Nama Aplikasi" type="text" autofocus required maxlength="50">
                      <input type="hidden" id="id_hidden" name="id_hidden" value="Norway">
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Nama Perusahaan</label>
                    <div class="col-md-7">
                      <input class="form-control" id="name_perusahaan" name="name_perusahaan" placeholder="Masukkan Nama Perusahaan" type="text" autofocus required maxlength="50">
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Alamat</label>
                    <div class="col-md-7">
                      <input class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" type="text" autofocus required maxlength="50">
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">No Telepon</label>
                    <div class="col-md-7">
                      <input class="form-control" id="telp" name="telp" placeholder="Masukkan No Telepon" type="text" autofocus required maxlength="50">
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Email</label>
                    <div class="col-md-7">
                      <input class="form-control" id="email" name="email" placeholder="Masukkan Email" type="text" autofocus required maxlength="50">
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Logo Aplikasi</label>
                    <div class="col-md-7">
                      <input class="form-control" id="logo_aplikasi" name="logo_aplikasi" placeholder="Masukkan Logo Aplikasi" type="text" autofocus required maxlength="50">
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Background Front</label>
                    <div class="col-md-7">
                      <input class="form-control" id="background_front" name="background_front" placeholder="Masukkan Background Front" type="text" autofocus required maxlength="50">
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Logo Perusahaan</label>
                    <div class="col-md-7">
                      <input class="form-control" id="logo_perusahaan" name="logo_perusahaan" placeholder="Masukkan Logo Perusahaan" type="text" autofocus required maxlength="50">
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>


                </fieldset>

                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-12">
                      <a id="btnResetAdd" class="btn btn-default">
                        Batal
                      </a>
                      <button id="btnAdd" type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i>
                        Simpan
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


    <!-- end row -->

  </section>
  <!-- end widget grid -->

</div>

@include('setting.userGeneral');

<!-- END MAIN CONTENT -->
@endsection

@section('script')
<script>

  save_method = 'edit';
  $('input[name=_method]').val('PATCH');
  $('#modalEdit form')[0].reset();
  $.ajax({
    url: "{{ url('profil') }}" + "/edit",
    type: "GET",
    dataType: "JSON",
    success: function(data) {
      $('#id_hidden').val(data.id);
      $('#name_aplikasi').val(data.name_aplikasi);
      $('#name_perusahaan').val(data.name_perusahaan);
      $('#alamat').val(data.alamat);
      $('#telp').val(data.telp);
      $('#email').val(data.email);
      $('#logo_aplikasi').val(data.logo_aplikasi);
      $('#background_front').val(data.background_front);
      $('#logo_perusahaan').val(data.logo_perusahaan);

    },
    error : function() {
      swal({
          title: 'Oops...',
          text: 'Nothing Data',
          type: 'error',
          timer: '1500'
      });
    }
  });


function deleteData(id){
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
          $.ajax({
              url : "{{ url('user') }}" + '/' + id,
              type : "POST",
              data : {'_method' : 'DELETE', '_token' : csrf_token},
              success : function(data) {
                  table.ajax.reload();
                  swal({
                      title: 'Success!',
                      text: data.message,
                      type: 'success',
                      timer: '1500'
                  })
              },
              error : function () {
                  swal({
                      title: 'Oops...',
                      text: data.message,
                      type: 'error',
                      timer: '1500'
                  })
              }
          });
        }
    });
  }

$(function(){
      $('#btnResetAdd').on('click', function (e) {
        $('#formAdd')[0].reset();
      });

      $('#formAdd').validator().on('submit', function (e) {
        $('input[name=_method]').val('POST');
          if (!e.isDefaultPrevented()){
              var id = $('#id').val();
              url = "{{ url('profil') }}";

              $.ajax({
                  url : url,
                  type : "POST",
                  data : $('#formAdd').serialize(),
                  success : function(data) {
                      table.ajax.reload();
                      $('#formAdd')[0].reset();
                      if (data.status == true) {
                        swal({
                          title: 'Success!',
                          text: data.message,
                          type: 'success',
                          timer: '1500'
                        });
                        $('#id').val(data.newid);
                        $('#name').focus();
                      } else {
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        });
                        $('#id').val(id);
                        $('#name').focus();
                      }
                  },
                  error : function(data){
                      swal({
                          title: 'Oops...',
                          text: data.message,
                          type: 'error',
                          timer: '1500'
                      })
                  }
              });
              return false;
          }
      });

      $('#modalEdit form').validator().on('submit', function (e) {
          if (!e.isDefaultPrevented()){
              var id = $('#id_hidden').val();
              url = "{{ url('profil') . '/' }}" + id;

              $.ajax({
                  url : url,
                  type : "POST",
                  data : $('#modalEdit form').serialize(),
                  success : function(data) {
                      $('#modalEdit').modal('hide');
                      table.ajax.reload();
                      swal({
                          title: 'Success!',
                          text: data.message,
                          type: 'success',
                          timer: '1500'
                      })
                  },
                  error : function(data){
                      swal({
                          title: 'Oops...',
                          text: data.message,
                          type: 'error',
                          timer: '1500'
                      })
                  }
              });
              return false;
          }
      });
  });
</script>
@endsection
