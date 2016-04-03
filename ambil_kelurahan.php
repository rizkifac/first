<?php
include "assets/include/koneksi.php";
$id_kec 	= $_POST['id_kec'];
$id_kel 	= "";
$query 		= $conn->query("SELECT * FROM tbl_kelurahan WHERE id_kec = '$id_kec' ORDER BY nama ASC");
$j_kel 		= mysqli_num_rows($query);
if($j_kel){
	echo "<option value=''>-- Pilih Kelurahan --</option>";
	while ($data = $query->fetch_array()) {
		if($data['id_kel']==$id_kel) {
			$cek = "selected";
		} else { $cek=""; }
		echo "<option value='$data[id_kel]' $cek>$data[nama]</option>";
	}
} else {
	echo "<option value=''>Tidak tersedia untuk Kecamatan ini</option>";
}
?>
