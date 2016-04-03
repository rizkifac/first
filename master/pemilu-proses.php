<?php
session_start();
include"../assets/include/koneksi.php";
$respon = htmlentities($_POST['respon']);

switch ($respon){

	case"pemilu-tambah";
		$jenis = htmlentities($_POST['jenis']);
		$tahun = htmlentities($_POST['tahun']);
    $id_prov = htmlentities($_POST['provinsi']);
    if(isset($_POST['kabupaten'])){
      $id_kab = htmlentities($_POST['kabupaten']);
    } else {
      $id_kab ='00';
    }



		if(empty($jenis) || empty($tahun) || empty($id_prov)){
			echo "<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>UPS!</strong> JANGAN ADA DATA YANG KOSONG.
				</div>";
        exit();
		} else {
      // $tanggal_pelaksanaan   = $year ."-".$month ."-". $day;
			$q_pemilu_tambah = $conn->query("INSERT INTO tbl_pemilu VALUES('','$jenis','$id_prov','$id_kab','$tahun',NOW(),'')");
			if($q_pemilu_tambah){
				echo "<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>SUCCESS !</strong> Data Berhasil Disimpan.
					</div>";
			} else {
				echo "<div class='alert alert-danger'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>ERROR!</strong> Data Gagal Disimpan.
					</div>";
			}
		}
	break;

	// case"user-hapus";
	//  $id = htmlentities($_POST['id']);
	//  $q_user_hapus = $conn->query("DELETE FROM tbl_user WHERE id='$id'");
	//  if($q_user_hapus){
	// 	 echo "<div class='alert alert-success'>
	// 		 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	// 		 <strong>SUCCESS !</strong> Data Berhasil Dihapus.
	// 		 </div>";
	//  } else {
	// 	 echo "<div class='alert alert-danger'>
	// 		 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	// 		 <strong>ERROR!</strong> Data Gagal Dihapus.
	// 		 </div>";
	//  }
	// break;

}
?>
