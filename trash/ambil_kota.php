<?php
include "assets/include/koneksi.php";
$id_prov = $_POST['id_prov'];

$id_kab = "";
$lihatkab = "SELECT * FROM kabupaten WHERE id_prov = '$id_prov' ORDER BY nama ASC";
$query = $conn->query($lihatkab) or die ("Gagal Query".mysql_error());
$jumlah = mysqli_num_rows($query);
if($jumlah){
	echo "<option value=''>-- Pilih Kabupaten/Kota --</option>";
	while ($data = $query->fetch_array()) {
		echo "<option value='$data[id_kab]'>$data[nama]</option>";
	}
} else {
	echo "<option value=''>Tidak tersedia untuk provinsi ini</option>";
}
?>
