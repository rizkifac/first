<?php
session_start();
if (isset($_SESSION['id']) &&
		$_SESSION['level'] == 1)
{
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Administrator</title>
	<link rel="shortcut icon" href="../assets/img/icon-bw.ico">

	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/jquery.timepicker.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-submenu.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/tooltipster.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/jquery.dataTables.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/waitMe.css" />

	<script type="text/javascript" src="../assets/js/jquery-2.2.0.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.timepicker.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap-submenu.min.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.tooltipster.min.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.imagemapster.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../assets/js/waitMe.js"></script>


	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	    $('.flex').dataTable();
	});
	function logout(){
	tanya=confirm("Apakah anda yakin akan keluar?")
	if (tanya !="0")
	{
		top.location="logout.php"
	}
	}
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
		 <a href="index.php"><img class="img-responsive" src="../assets/img/logo.png" style="width:80px;" /></a>
	 </div>
	 <div class="collapse navbar-collapse" id="myNavbarUp">
		 <ul class="nav navbar-nav">
			 <li>&nbsp;</li>
			 <li><h3 style="color:#ccc;">Administrator SIVP 2017</h3></li>
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
			 <li><button id="btn-login" style="margin-top:20px;" class="btn btn-danger" onclick="logout()">Signout</button></li>
		 </ul>
	 </div>
 </div>
</nav>

<div style="margin-top:100px;">
<div class="row">

	<!--NAVBAR-->
  <div class="col-sm-2">
    <div class="sidebar-nav">
      <div class="navbar navbar-custom" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="visible-xs navbar-brand"><i class="glyphicon glyphicon-home"></i> Beranda</span>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
          <ul class="nav navbar-nav">
						<li><a href="?page=user"> User</a></li>
						<li><a href="?page=pemilu"> Pemilu</a></li>
            <li><a href="?page=pemilih"> Pemilih</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>

	<!--KONTEN-->
  <div class="col-sm-10" style="background:#fff; padding:30px;">

		<?php
		if(isset($_GET['page'])){ $page=htmlentities($_GET['page']);
		}else{ $page="user"; }
		$file="$page.php";
		$cek=strlen($page);
		if($cek>100 || !file_exists($file) || empty($page)){ include ("user.php");
		}else{ include ($file); }
		?>
  </div>
</div>
</div>



</div>
<!-- AKHIR CONTAINER -->
</body>
</html>

<?php }else{ ?>
<script language="javascript">document.location.href='../index.php'</script>
<?php } ?>
