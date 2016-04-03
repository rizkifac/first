<?php
include "../assets/include/koneksi.php";
$id_prov 	= $_POST['id_prov'];
$id_kab 	= "";
$query 		= $conn->query("SELECT * FROM tbl_kabupaten WHERE id_prov = '$id_prov' ORDER BY nama ASC");
$jumlah 	= mysqli_num_rows($query);
if($jumlah){
	echo "<option value=''>-- Pilih Kabupaten/Kota --</option>";
	while ($data = $query->fetch_array()) {
		if($data['id_kab']==$id_kab) {
			$cek = "selected";
		} else { $cek=""; }
		echo "<option value='$data[id_kab]' $cek>$data[nama]</option>";
	}
} else {
	echo "<option value=''>Tidak tersedia untuk provinsi ini</option>";
}
?>
