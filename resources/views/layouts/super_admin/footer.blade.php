
		<!-- PAGE FOOTER -->
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<span class="txt-color-white">{{ config('app.name', 'CV. Azhtech Transformasi Insani') }} © 2018</span>
				</div>
			</div>
		</div>
		<!-- END PAGE FOOTER -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		<div id="shortcut">
			<ul>
				<li>
					<a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
				</li>
				<li>
					<a href="calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
				</li>
				<li>
					<a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
				</li>
				<li>
					<a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
				</li>
				<li>
					<a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
				</li>
				<li>
					<a href="profile.html" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
				</li>
			</ul>
		</div>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="{{ asset('temp/js/plugin/pace/pace.min.js') }}"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
    var s = '{{ asset("temp/js/libs/jquery-3.2.1.min.js") }}';
			if (!window.jQuery) {
				document.write('<script src="'+s+'"><\/script>');
			}
		</script>

		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script>
    var s = '{{ asset("temp/js/libs/jquery-ui.min.js") }}';
			if (!window.jQuery.ui) {
				document.write('<script src="'+s+'"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="{{ asset('temp/js/app.config.js') }}"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="{{ asset('temp/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js') }}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{ asset('temp/js/bootstrap/bootstrap.min.js') }}"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="{{ asset('temp/js/notification/SmartNotification.min.js') }}"></script>

		<!-- JARVIS WIDGETS -->
		<script src="{{ asset('temp/js/smartwidgets/jarvis.widget.min.js') }}"></script>

		<!-- EASY PIE CHARTS -->
		<script src="{{ asset('temp/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>

		<!-- SPARKLINES -->
		<script src="{{ asset('temp/js/plugin/sparkline/jquery.sparkline.min.js') }}"></script>

		<!-- JQUERY VALIDATE -->
		<script src="{{ asset('temp/js/plugin/jquery-validate/jquery.validate.min.js') }}"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="{{ asset('temp/js/plugin/masked-input/jquery.maskedinput.min.js') }}"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="{{ asset('temp/js/plugin/select2/select2.min.js') }}"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="{{ asset('temp/js/plugin/bootstrap-slider/bootstrap-slider.min.js') }}"></script>

		<!-- browser msie issue fix -->
		<script src="{{ asset('temp/js/plugin/msie-fix/jquery.mb.browser.min.js') }}"></script>

		<!-- FastClick: For mobile devices -->
		<script src="{{ asset('temp/js/plugin/fastclick/fastclick.min.js') }}"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only -->
		<script src="{{ asset('temp/js/demo.min.js') }}"></script>

		<!-- MAIN APP JS FILE -->
		<script src="{{ asset('temp/js/app.min.js') }}"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="{{ asset('temp/js/speech/voicecommand.min.js') }}"></script>

		<!-- SmartChat UI : plugin -->
		<script src="{{ asset('temp/js/smart-chat-ui/smart.chat.ui.min.js') }}"></script>
		<script src="{{ asset('temp/js/smart-chat-ui/smart.chat.manager.min.js') }}"></script>

		<!-- PAGE RELATED PLUGIN(S)  -->
		<script src="{{ asset('temp/js/plugin/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('temp/js/plugin/datatables/dataTables.colVis.min.js') }}"></script>
		<script src="{{ asset('temp/js/plugin/datatables/dataTables.tableTools.min.js') }}"></script>
		<script src="{{ asset('temp/js/plugin/datatables/dataTables.bootstrap.min.js') }}"></script>
		<script src="{{ asset('temp/js/plugin/datatable-responsive/datatables.responsive.min.js') }}"></script>
		<script src="{{ asset('js/sweetalert2.all.js') }}"></script>

		<!-- VALIDATOR  -->
		<script src="{{ asset('assets/validator/validator.min.js') }}"></script>

		<!-- NUMERAL  -->
		<script src="{{ asset('js/numeral.min.js') }}"></script>

		<!-- DATERANGE -->
		<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/daterangepicker.min.js') }}"></script>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker.css') }}" />

		<!-- BASE FUNCTION AZHTECH  -->
		<script>
		var baseurl = '{{ url("/") }}';
		</script>
		<script src="{{ asset('js/basefunction.js') }}"></script>

		<script>

		// DO NOT REMOVE : GLOBAL FUNCTIONS!

		$(document).ready(function() {

			pageSetUp();

			// PAGE RELATED SCRIPTS

			// class switcher for radio and checkbox
			$('input[name="demo-switcher-1"]').change( function() {
				  //alert($(this).val())
				  $this = $(this);

				  myNewClass = $this.attr('id');

				  $('.demo-switcher-1 input[type="checkbox"]').removeClass();
				  $('.demo-switcher-1 input[type="checkbox"]').addClass("checkbox "+ myNewClass);

				  $('.demo-switcher-1 input[type="radio"]').removeClass();
				  $('.demo-switcher-1 input[type="radio"]').addClass("radiobox "+ myNewClass);

			})

		})


		  /* // DOM Position key index //

		  l - Length changing (dropdown)
		  f - Filtering input (search)
		  t - The Table! (datatable)
		  i - Information (records)
		  p - Pagination (paging)
		  r - pRocessing
		  < and > - div elements
		  <"#id" and > - div with an id
		  <"class" and > - div with a class
		  <"#id.class" and > - div with an id and class

		  Also see: http://legacy.datatables.net/usage/features
		  */

		  /* BASIC ;*/
		    var responsiveHelper_dt_basic = undefined;
		    var responsiveHelper_datatable_fixed_column = undefined;
		    var responsiveHelper_datatable_col_reorder = undefined;
		    var responsiveHelper_datatable_tabletools = undefined;

		    var breakpointDefinition = {
		      tablet : 1024,
		      phone : 480
		    };

		    $('#dt_basic').dataTable({
		      "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
		        "t"+
		        "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
		      "autoWidth" : true,
		          "oLanguage": {
		          "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
		      },
		      "preDrawCallback" : function() {
		        // Initialize the responsive datatables helper once.
		        if (!responsiveHelper_dt_basic) {
		          responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
		        }
		      },
		      "rowCallback" : function(nRow) {
		        responsiveHelper_dt_basic.createExpandIcon(nRow);
		      },
		      "drawCallback" : function(oSettings) {
		        responsiveHelper_dt_basic.respond();
		      }
		    });

		  /* END BASIC */

		  /* TABLETOOLS */
		  $('#datatable_tabletools').dataTable({

		    // Tabletools options:
		    //   https://datatables.net/extensions/tabletools/button_options
		    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
		        "t"+
		        "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
		    "oLanguage": {
		      "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
		    },
		        "oTableTools": {
		           "aButtons": [
		             "copy",
		             "csv",
		             "xls",
		                {
		                    "sExtends": "pdf",
		                    "sTitle": "SmartAdmin_PDF",
		                    "sPdfMessage": "SmartAdmin PDF Export",
		                    "sPdfSize": "letter"
		                },
		              {
		                    "sExtends": "print",
		                    "sMessage": "{{ config('app.name') }} <i>(press Esc to close)</i>"
		                }
		             ],
		            "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
		        },
		    "autoWidth" : true,
		    "preDrawCallback" : function() {
		      // Initialize the responsive datatables helper once.
		      if (!responsiveHelper_datatable_tabletools) {
		        responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
		      }
		    },
		    "rowCallback" : function(nRow) {
		      responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
		    },
		    "drawCallback" : function(oSettings) {
		      responsiveHelper_datatable_tabletools.respond();
		    }
		  });

		  /* END TABLETOOLS */


		</script>
