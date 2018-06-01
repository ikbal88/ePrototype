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
          <div class="widget-body">

            <form class="form-horizontal">

              <fieldset>
                <legend>Default Form Elements</legend>
                <div class="form-group">
                  <label class="col-md-2 control-label">Text field</label>
                  <div class="col-md-10">
                    <input class="form-control" placeholder="Default Text Field" type="text">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Auto Complete</label>
                  <div class="col-md-10">
                    <input class="form-control" placeholder="Type somethine..." type="text"  list="list">
                    <datalist id="list">
                      <option value="Alexandra">Alexandra</option>
                      <option value="Alice">Alice</option>
                      <option value="Anastasia">Anastasia</option>
                    </datalist>
                    <p class="note"><strong>Note:</strong> works in Chrome, Firefox, Opera and IE10.</p>
                  </div>

                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Password field</label>
                  <div class="col-md-10">
                    <input class="form-control" placeholder="Password field" type="password" value="mypassword">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Textarea</label>
                  <div class="col-md-10">
                    <textarea class="form-control" placeholder="Textarea" rows="4"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">File input</label>
                  <div class="col-md-10">
                    <input type="file" class="btn btn-default" id="exampleInputFile1">
                    <p class="help-block">
                      some help text here.
                    </p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Checkbox Styles</label>
                  <div class="col-md-10">

                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="checkbox style-0" checked="checked">
                        <span>Checkbox 1</span>
                      </label>
                    </div>

                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="checkbox style-0">
                        <span>Checkbox 2</span>
                      </label>
                    </div>

                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Inline</label>
                  <div class="col-md-10">
                    <label class="checkbox-inline">
                      <input type="checkbox" class="checkbox style-0">
                      <span>Checkbox 1</span>
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox" class="checkbox style-0">
                      <span>Checkbox 2</span>
                    </label>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-md-2 control-label">Radios Styles</label>
                  <div class="col-md-10">
                    <div class="radio">
                      <label>
                        <input type="radio" class="radiobox style-0" checked="checked" name="style-0">
                        <span>Radiobox 1</span>
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" class="radiobox style-0" name="style-0">
                        <span>Radiobox 2</span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Inline</label>
                  <div class="col-md-10">
                    <label class="radio radio-inline">
                      <input type="radio" class="radiobox" name="style-0a">
                      <span>Radiobox 1</span>
                    </label>
                    <label class="radio radio-inline">
                      <input type="radio" class="radiobox" name="style-0a">
                      <span>Radiobox 2</span>
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label" for="select-1">Select</label>
                  <div class="col-md-10">

                    <select class="form-control" id="select-1">
                      <option>Amsterdam</option>
                      <option>Atlanta</option>
                    </select>

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="multiselect1">Multiple select</label>
                  <div class="col-md-10">
                    <select multiple="multiple" id="multiselect1" class="form-control custom-scroll" title="Click to Select a City">
                      <option>Amsterdam</option>
                      <option selected="selected">Atlanta</option>
                      <option>Baltimore</option>
                      <option>Boston</option>
                      <option>Buenos Aires</option>
                    </select>
                  </div>
                </div>

              </fieldset>

              <div class="form-actions">
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-default">
                      Batal
                    </button>
                    <button class="btn btn-primary" type="submit">
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
                <td>0001</td>
                <td>{{ $title }} 1</td>
                <td>Aktif</td>
                <td><a href="javascript:void(0);" class="btn btn-primary btn-xs"><i class="fa fa-gear"></i></a>&nbsp;<a href="javascript:void(0);" class="btn btn-success btn-xs"><i class="fa fa-print"></i></a>&nbsp;<a href="javascript:void(0);" class="btn btn-warning btn-xs"><i class="fa fa-check-square-o"></i></a></td>
              </tr>
              <tr>
                <td>0002</td>
                <td>{{ $title }} 2</td>
                <td>Aktif</td>
                <td><a href="javascript:void(0);" class="btn btn-primary btn-xs"><i class="fa fa-gear"></i></a>&nbsp;<a href="javascript:void(0);" class="btn btn-success btn-xs"><i class="fa fa-print"></i></a>&nbsp;<a href="javascript:void(0);" class="btn btn-warning btn-xs"><i class="fa fa-check-square-o"></i></a></td>
              </tr>
              <tr>
                <td>0003</td>
                <td>{{ $title }} 3</td>
                <td>Non Aktif</td>
                <td><a href="javascript:void(0);" class="btn btn-primary btn-xs"><i class="fa fa-gear"></i></a>&nbsp;<a href="javascript:void(0);" class="btn btn-success btn-xs"><i class="fa fa-print"></i></a>&nbsp;<a href="javascript:void(0);" class="btn btn-warning btn-xs"><i class="fa fa-check-square-o"></i></a></td>
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

</script>
@endsection
