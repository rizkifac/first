<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sistem Monitoring Nasional</title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">


	<script type="text/javascript" src="assets/js/jquery-2.2.0.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery.nicescroll.js"></script>
	<script type="text/javascript" src="assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/js/jquery.imagemapster.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
			$('.flex').dataTable();
			$(".scrol").niceScroll();
			$('.tooltip').tooltip();

			$("#btn-login").click(function(){
					if ($("#form-login").is(":hidden")){
						$("#form-login").show("slow");
					} else {
						$("#form-login").hide("slow");
					}
			});
	});
	</script>

</head>
<body>

<!-- DIV CONTAINER -->
<div class="container-fluid">

<nav class="navbar navbar-upper navbar-fixed-top">
 <div class="container-fluid">
	 <div class="navbar-header">
		 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbarUp">
			 <span class="icon-bar"></span>
		 </button>
		 <a href="index.php"><img class="img-responsive" src="assets/img/logo.png" style="width:80px;" /></a>
	 </div>
	 <div class="collapse navbar-collapse" id="myNavbarUp">
		 <ul class="nav navbar-nav">
			 <li>&nbsp;</li>
			 <li><h3 style="color:#ccc;">SISTEM MONITORING NASIONAL</h3></li>
		 </ul>
		 <ul class="nav navbar-nav navbar-right">
			 <li>
					<form class="navbar-form navbar-right" role="form"  style="margin-top:20px;">
					<div class="input-group">
						 <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
						 <input type="text" required class="form-control" name="search" value="" placeholder="Cari">
					</div>
						 <button type="submit" class="btn btn-primary">Cari</button>
					</form>
			 </li>
			 <li>
				 	<?php include("login.php"); ?>
			 </li>
			 <li><button id="btn-login" style="margin-top:20px;" class="btn btn-danger">Signin</button></li>
		 </ul>
	 </div>
 </div>
</nav>

<div style="margin-top:100px;">
<div class="row">

	<!--NAVBAR-->
	<?php
	if (isset($_GET['prov'])){
		include"menu-bar.php";
	}
	?>

	<!--KONTEN-->


</div>
</div>



</div>
<!-- AKHIR CONTAINER -->
</body>
</html>
