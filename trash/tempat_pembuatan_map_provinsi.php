<div class="well well-sm text-center"><h4>Contoh Tampilan Provinsi</h4></div>

<?php
require("assets/include/koneksi.php");
$q_prov = $conn->query("SELECT * FROM provinsi WHERE id_prov='$_GET[prov]'");
$d_prov = $q_prov->fetch_assoc();
?>
<div style="clear: both; width: 1110px; height: 50px; border: 1px solid black;" id="selections"></div>
<img src="assets/img/<?php echo $d_prov['deskripsi']; ?>.png" usemap="#peta" border="0" id="peta-provinsi" />
<map name="peta" id="id-peta-provinsi">

<?php
require("assets/include/koneksi.php");
$q_kab = $conn->query("SELECT * FROM kabupaten WHERE id_prov='$_GET[prov]'");
while ($d_kab = $q_kab->fetch_assoc()) {
  $q_kec = $conn->query("SELECT * FROM kecamatan WHERE id_kab='$d_kab[id_kab]'");
  $j_kec = mysqli_num_rows($q_kec);

  $title = "Nama Kabupaten / Kota = ".$d_kab['nama']." , Jumlah Kecamatan = ".$j_kec.".";
?>
<!-- TAMPILAN PETA PERPROVINSI -->
<area shape="poly" href="#" onclick="#" class="tooltip" data-toggle="tooltip" title="<?php echo $title; ?>" name="<?php echo $d_kab['deskripsi']; ?>" coords="<?php echo $d_kab['coords']; ?>" alt="<?php echo $d_map['deskripsi']; ?>" />

<?php
}
?>
</map>


<script type="text/javascript">
  // a cross reference of area names to text to be shown for each area
    var defaultDipTooltip = 'Sorot Mouse ke daerah provinsi yang ingin dilihat, kemudian klik.';
    var image = $('#peta-provinsi');
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
