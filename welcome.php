<div class="well well-sm text-center"><h4>Selamat Datang Di Sistem Informasi Visual Pilkada 2017</h4>
    Untuk Melihat Informasi Pemilu, Silakan Klik Pada Peta Untuk Provinsi Yang Ingin Anda Lihat
</div>

<img src="assets/maps/map.png" usemap="#peta" border="0" class="img-responsive" id="peta-indonesia" />
<map name="peta" id="id-peta-indonesia">

<?php
require("assets/include/koneksi.php");
$q_map    = $conn->query("SELECT * FROM tbl_provinsi ORDER BY id_prov ASC");
while ($d_map = $q_map->fetch_assoc()) {
  $q_kota = $conn->query("SELECT * FROM tbl_kabupaten WHERE id_prov='$d_map[id_prov]' AND id_jenis='2'");
  $j_kota = mysqli_num_rows($q_kota);
  $q_kab  = $conn->query("SELECT * FROM tbl_kabupaten WHERE id_prov='$d_map[id_prov]' AND id_jenis='1'");
  $j_kab  = mysqli_num_rows($q_kab);
  $title  = "Nama Provinsi = ".$d_map['nama']." , Jumlah Kota = ".$j_kota." , Jumlah Kabupaten = ".$j_kab." .";
?>
<!-- TAMPILAN PETA PERPROVINSI -->
<area shape="poly" href="#" onclick="document.location.href='index.php?p=<?php echo $d_map['id_prov']; ?>'" class="tooltip" data-toggle="tooltip" title="<?php echo $title; ?>" name="<?php echo $d_map['deskripsi']; ?>" coords="<?php echo $d_map['coords']; ?>" alt="<?php echo $d_map['deskripsi']; ?>" />
<?php } ?>
</map>

<script type="text/javascript">
<!--
    var defaultDipTooltip = 'Sorot Mouse ke daerah provinsi yang ingin dilihat, kemudian klik.';
    var image = $('#peta-indonesia');
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
