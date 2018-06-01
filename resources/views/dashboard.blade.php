@extends('layouts.super_admin.app')

@section('content')
<!-- MAIN CONTENT -->
<div id="content">

  <div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
      <h1 class="page-title txt-color-blueDark">
        <i class="fa fa-dashboard "></i>
          {{ $title }}
      </h1>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
      <ul id="sparks" class="">
        <li class="sparks-info">
          <h5> Stock All<span class="txt-color-blue">10.000 Kg</span></h5>
          <div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
            1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
          </div>
        </li>
        <li class="sparks-info">
          <h5> Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;24</span></h5>
          <div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
            110,150,300,130,400,240,220,310,220,300, 270, 210
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- END MAIN CONTENT -->
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection
