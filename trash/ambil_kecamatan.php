<?php
include "assets/include/koneksi.php";
$id_kab = $_POST['id_kab'];

$id_kec = "";
$q_kec = "SELECT * FROM kecamatan WHERE id_kab = '$id_kab' ORDER BY nama ASC";
$query = $conn->query($q_kec) or die ("Gagal Query".mysql_error());
$j_kec = mysqli_num_rows($query);
if($j_kec){
	echo "<option value=''>-- Pilih Kecamatan --</option>";
	while ($data = $query->fetch_array()) {
		echo "<option value='$data[id_kec]'>$data[nama]</option>";
	}
} else {
	echo "<option value=''>Tidak tersedia untuk Kabupaten / Kota ini ini</option>";
}
?>
