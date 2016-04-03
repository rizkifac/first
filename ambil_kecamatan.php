<?php
include "assets/include/koneksi.php";
$id_kab 	= $_POST['id_kab'];
$id_kec 	= "";
$query 		= $conn->query("SELECT * FROM tbl_kecamatan WHERE id_kab = '$id_kab' ORDER BY nama ASC");
$j_kec 		= mysqli_num_rows($query);
if($j_kec){
	echo "<option value=''>-- Pilih Kecamatan --</option>";
	while ($data = $query->fetch_array()) {
		if($data['id_kec']==$id_kec) {
			$cek = "selected";
		} else { $cek=""; }
		echo "<option value='$data[id_kec]' $cek>$data[nama]</option>";
	}
} else {
	echo "<option value=''>Tidak tersedia untuk Kabupaten / Kota ini ini</option>";
}
?>
