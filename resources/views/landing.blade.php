<!DOCTYPE html>

<html lang="en">
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="stylesheet" href="plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="plugins/bootstrap-3.3.5-dist/css/bootstrap-theme.css">
	<link rel="stylesheet" href="plugins/bootgrid/css/jquery.bootgrid.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="plugins/font-awesome-4.4.0/css/font-awesome.min.css">


	<link rel="stylesheet" href="plugins/jquery-ui-1.12.1/jquery-ui.min.css">

	<style type="text/css" class="init">

		.modal-header {
			min-height: 16.42857143px;
			padding: 5px;
			border-bottom: 1px solid #e5e5e5;
		}
		.modal-body {
			position: relative;
			padding: 10px;
		}

		.form-group{
			margin-bottom: 5px;
		}
		
		.form-mandatory{
			background-color: lightyellow;
		}
		
		.form-disabled{
			background-color: #DDD;
			color: #999;
		}
		
		.modal-open {
		  overflow: scroll;
		}
		.justbc{
			background-color: #dff0d8 !important;
		}
		label.error{
			color: rgb(169, 68, 66);
		}
		#mykad_reponse{
			color: rgb(169, 68, 66);
			font-weight: bolder;
		}
		.addressinp{
			margin-bottom: 5px;
		}
	</style>
    <title>@yield('title')</title>

</head>


<body class="header-fixed">
	
	@yield('body')

</body>


<script type="text/ecmascript" src="plugins/jquery-3.2.1.min.js"></script> 
<script type="text/ecmascript" src="plugins/jquery-migrate-3.0.0.js"></script>
<script type="text/ecmascript" src="plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script type="text/javascript">$.fn.modal.Constructor.prototype.enforceFocus = function() {};</script>

<script type="text/ecmascript" src="plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script type="text/ecmascript" src="plugins/numeral.min.js"></script>
<script type="text/ecmascript" src="plugins/moment.js"></script>

<script type="text/javascript" src="plugins/datatables/js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="plugins/jquery-validator/jquery.validate.min.js"></script>
<script type="text/javascript" src="plugins/jquery-validator/additional-methods.min.js"></script>

<script type="text/javascript" src="plugins/bootgrid/js/jquery.bootgrid.js"></script>
<!-- <script type="text/javascript" src="js/myjs/modal-fix.js"></script>
<script type="text/javascript" src="js/myjs/global.js"></script> -->
@yield('script')

</html>