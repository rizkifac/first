<div class="well well-sm text-center"><h4>Selamat Datang Pada Halaman Utama Provinsi <?php echo $d_provinsi['nama']; ?></h4></div>

<?php
require("assets/include/koneksi.php");
$q_prov = $conn->query("SELECT * FROM provinsi WHERE id_prov='$_GET[prov]'");
$d_prov = $q_prov->fetch_assoc();
?>

<img src="assets/img/<?php echo $d_prov['deskripsi']; ?>.png" usemap="#provinsi" border="0" id="img_<?php echo $_GET['prov']; ?>" />
<map name="provinsi" id="id_<?php echo $d_prov['deskripsi']; ?>">

<?php
require("assets/include/koneksi.php");
$q_kab = $conn->query("SELECT * FROM kabupaten WHERE id_prov='$_GET[prov]'");
while ($d_kab = $q_kab->fetch_assoc()) {
  $q_kec = $conn->query("SELECT * FROM kecamatan WHERE id_kab='$d_kab[id_kab]'");
  $j_kec = mysqli_num_rows($q_kec);
  $title = "Nama Kabupaten / Kota = ".$d_kab['nama']." , Jumlah Kecamatan = ".$j_kec." .";
?>

<!-- TAMPILAN PETA PERPROVINSI -->
<area name="<?php echo $d_kab['deskripsi'];?>" coords="<?php echo $d_kab['coords']; ?>" alt="<?php echo $d_kab['deskripsi']; ?>" shape="poly" href="#" onclick="document.location.href='index.php?prov=<?php echo $_GET['prov'];?>&kab=<?php echo $d_kab['id_kab']; ?>'" class="tooltip" data-toggle="tooltip" title="<?php echo $title; ?>" />

<?php } ?>

</map>


<script type="text/javascript">
<!--
    var defaultDipTooltip = 'Sorot Mouse ke daerah provinsi yang ingin dilihat, kemudian klik.';
    var image = $('#img_<?php echo $_GET['prov']; ?>');
    image.mapster(
    {
        fillOpacity: 0.4,
        fillColor: "ffffff",
        stroke: true,
        strokeColor: "ffffff",
        strokeOpacity: 0.8,
        strokeWidth: 2,
        singleSelect: true,
        mapKey: 'name',
        listKey: 'name'
    });
-->
</script>
