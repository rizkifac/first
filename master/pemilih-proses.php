<?php
include"../assets/include/koneksi.php";
$respon = htmlentities($_POST['respon']);

switch ($respon){

	case"ubah-dpt";
		$id_kab  = htmlentities($_POST['id_kab']);
		$dpt     = htmlentities($_POST['dpt']);

		if(empty($id_kab) || empty($dpt)){
			echo "<img src='../assets/img/nok.png' width='20px' alt='Gagal' />";
		} else {
			$q_ubah_dpt = $conn->query("UPDATE tbl_kabupaten SET jumlah_dpt='$dpt' WHERE id_kab='$id_kab'");
			if($q_ubah_dpt){
				echo "<img src='../assets/img/ok.png' width='20px' alt='Sukses' />";
			} else {
				echo "<img src='../assets/img/nok.png' width='20px' alt='Gagal' />";
			}
		}
	break;

  case"ubah-pdd";
		$id_kab  = htmlentities($_POST['id_kab']);
		$pdd     = htmlentities($_POST['pdd']);

		if(empty($id_kab) || empty($pdd)){
			echo "<img src='../assets/img/nok.png' width='20px' alt='Gagal' />";
		} else {
			$q_ubah_pdd = $conn->query("UPDATE tbl_kabupaten SET jumlah_penduduk='$pdd' WHERE id_kab='$id_kab'");
			if($q_ubah_pdd){
				echo "<img src='../assets/img/ok.png' width='20px' alt='Sukses' />";
			} else {
				echo "<img src='../assets/img/nok.png' width='20px' alt='Gagal' />";
			}
		}
	break;


}
?>
