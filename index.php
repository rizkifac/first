<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sistem Informasi Visual Pemilu 2017</title>
	<link rel="shortcut icon" href="assets/img/icon-bw.ico">

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.timepicker.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-submenu.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/tooltipster.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/waitMe.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/hover.css" />

	<script type="text/javascript" src="assets/js/jquery-2.2.0.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui.js"></script>
	<script type="text/javascript" src="assets/js/jquery.timepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-submenu.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.tooltipster.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery.imagemapster.js"></script>
  <script type="text/javascript" src="assets/js/waitMe.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>

	<script>
	$(document).ready(function() {
			$('.tooltip').tooltipster();
			$("#btn-login").click(function(){
					if ($("#form-login").is(":hidden")){
						$("#form-login").show("slow");
					} else {
						$("#form-login").hide("slow");
					}
			});
	});
	</script>

	<style media="screen">
		.col-md-3{
			margin: 25px 0px 25px 0px;
		}
	</style>

</head>
<body>

<nav class="navbar navbar-upper navbar-fixed-top">
 <div class="container-fluid">
	 <div class="navbar-header">
		 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbarUp">
			 <span class="icon-bar"></span>
			 <span class="icon-bar"></span>
			 <span class="icon-bar"></span>
		 </button>
		 <a href="index.php"><img class="img-responsive" src="assets/img/logo.png" style="width:80px;" /></a>
	 </div>
	 <div class="collapse navbar-collapse" id="myNavbarUp">
		 <ul class="nav navbar-nav">
			 <li>&nbsp;</li>
			 <li><h3 style="color:#ccc;">SISTEM INFORMASI VISUAL PILKADA 2017</h3></li>
		 </ul>
		 <ul class="nav navbar-nav navbar-right">
			 <li><button class="btn btn-warning btn-sm margin" style="margin-top:20px;" data-toggle="modal" data-target="#myModal">Apa Itu SIVP 2017?</button></li>
			 <li>
				 	<?php include("login.php"); ?>
			 </li>
			 <li><button id="btn-login" class="btn btn-sm btn-danger margin" style="margin-top:20px;" >SIGN IN</button></li>
		 </ul>
	 </div>
 </div>
</nav>

<!-- DIV CONTAINER -->
<div class="container-fluid">
<div style="margin-top:100px;"></div>


		<div class="col-sm-12">
		<?php
		if       (isset($_GET['p']) && $_GET['p'] != ""){
							echo "<div class='container'>";
							include ("provinsi.php");
							echo "</div>";
		} elseif (isset($_GET['page']) && $_GET['page']!=''){
							$page=htmlentities($_GET['page']);
							$file="$page.php";
							$cek=strlen($page);
							if($cek>100 || !file_exists($file) || empty($page)){ //tidak ada apa-apa
							}else{

								include ('menu.php');

								echo "<div class='col-sm-10'>";
									include ($file);
								echo "</div>";
							}
		} else {
						echo "<div class='container'>";
						include ("welcome.php");
						echo "</div>";
		}
		?>
		</div>

</div><!-- AKHIR CONTAINER -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Singkat Tentang Sistem Pengawasan Pemilu</h4>
      </div>
      <div class="modal-body">
        <p>Siwaslu merupakan ......</p>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
					eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
					aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,
					qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore
					magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
					nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
					vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
					<br>
					Visi :
					<ol>
						<li>Jika ingin disi mengenai visi dari pembuatan aplikasi simonas</li>
					</ol>
					Misi :
					<ul>
						<li>Misi 1</li>
						<li>Misi 2</li>
						<li>Misi 3</li>
						<li>Misi 4</li>
					</ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
