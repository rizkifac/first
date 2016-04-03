<?php

include "assets/include/koneksi.php";
$id_kec = $_POST['id_kec'];

$id_kel = "";
$q_kel = "SELECT * FROM kelurahan WHERE id_kec = '$id_kec' ORDER BY nama ASC";
$query = $conn->query($q_kel) or die ("Gagal Query".mysql_error());
$j_kel = mysqli_num_rows($query);
if($j_kel){
	echo "<option value=''>-- Pilih Kelurahan --</option>";
	while ($data = $query->fetch_array()) {
		echo "<option value='$data[id_kel]'>$data[nama]</option>";
	}
} else {
	echo "<option value=''>Tidak tersedia untuk Kecamatan ini</option>";
}
?>
