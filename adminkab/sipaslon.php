<?php
if(!isset($_GET['id']) || $_GET['id']==''){
  exit("ERROR Q1");
}
require("../assets/include/koneksi.php");
$id_pemilu  = htmlentities($_GET['id']);

$q_pemilu = $conn->query("SELECT tbl_pemilu.id_pemilu_jenis, tbl_pemilu_jenis.id_pemilu_jenis, tbl_pemilu_jenis.nama_pemilu_jenis FROM tbl_pemilu, tbl_pemilu_jenis WHERE tbl_pemilu.id_pemilu_jenis=tbl_pemilu_jenis.id_pemilu_jenis");
$d_pemilu = $q_pemilu->fetch_assoc();

$q_sipaslon = $conn->query("SELECT * FROM tbl_pasangan WHERE id_pemilu='$id_pemilu' ORDER BY nomor_urut ASC");
if (mysqli_num_rows($q_sipaslon)==0) {
  echo "BELUM ADA DATA";
  exit();
} else {
?>

<b class="page-header">
<div class="text-center"><h4>DAFTAR PASANGAN CALON</h4></div>
</b>

<div class="table-responsive">
<table class="table table-striped" style="width:100%;">

<?php
while ($d_sipaslon = $q_sipaslon->fetch_assoc()) {
  $q_calon = $conn->query("SELECT * FROM tbl_calon WHERE id_calon='$d_sipaslon[id_ketua]'");
  $d_calon = $q_calon->fetch_assoc();
  $q_wakil = $conn->query("SELECT * FROM tbl_calon WHERE id_calon='$d_sipaslon[id_wakil]'");
  $d_wakil = $q_wakil->fetch_assoc();
?>

    <tr>
        <td>
          <small class="text-center text-success">No Urut</small> <br>
          <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <h3><?php echo $d_sipaslon['nomor_urut']; ?></h3> <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Update</a></li>
              <li><a href="#">Hapus</a></li>
            </ul>
          </div>
        </td>
        <td width="15%"><img class="img-responsive" src="../img_sipaslon/<?php echo $d_calon['pict']; ?>" style="width:120px;" /></td>
        <td>
            <table style="font-size:12px;">
                <tr>
                    <td>Calon</td>
                    <td>:&nbsp &nbsp</td>
                    <td>Ketua</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $d_calon['nama']; ?></td>
                </tr>
                <tr>
                    <td>TTL</td>
                    <td>:</td>
                    <td><?php echo $d_calon['ttl']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?php echo $d_calon['jenis_kelamin']; ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?php echo $d_calon['pekerjaan']; ?></td>
                </tr>
                <tr>
                    <td>Petahana</td>
                    <td>:</td>
                    <td><?php echo $d_calon['petahana']; ?></td>
                </tr>
                <tr>
                    <td>Hubungan Petahana</td>
                    <td>:</td>
                    <td><?php echo $d_calon['hub_petahana']; ?></td>
                </tr>
                <tr>
                    <td>Pengurus Partai</td>
                    <td>:</td>
                    <td><?php echo $d_calon['pengurus_partai']; ?></td>
                </tr>
                <tr>
                    <td>Jabatan Partai</td>
                    <td>:</td>
                    <td><?php echo $d_calon['jabatan_partai']; ?></td>
                </tr>
                <tr>
                    <td>Pengusung</td>
                    <td>:</td>
                    <td><?php echo $d_calon['pengusung']; ?></td>
                </tr>
                <tr>
                    <td>Partai</td>
                    <td>:</td>
                    <td><?php echo $d_calon['parpol']; ?></td>
                </tr>
            </table>
        </td>
        <td  width="15%"><img class="img-responsive" src="../img_sipaslon/<?php echo $d_wakil['pict']; ?>" style="width:120px;" /></td>
        <td>
          <table style="font-size:12px;">
              <tr>
                  <td>Calon</td>
                  <td>: &nbsp &nbsp</td>
                  <td>Wakil</td>
              </tr>
              <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td><?php echo $d_wakil['nama']; ?></td>
              </tr>
              <tr>
                  <td>TTL</td>
                  <td>:</td>
                  <td><?php echo $d_wakil['ttl']; ?></td>
              </tr>
              <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td><?php echo $d_wakil['jenis_kelamin']; ?></td>
              </tr>
              <tr>
                  <td>Pekerjaan</td>
                  <td>:</td>
                  <td><?php echo $d_wakil['pekerjaan']; ?></td>
              </tr>
              <tr>
                  <td>Petahana</td>
                  <td>:</td>
                  <td><?php echo $d_wakil['petahana']; ?></td>
              </tr>
              <tr>
                  <td>Hubungan Petahana</td>
                  <td>:</td>
                  <td><?php echo $d_wakil['hub_petahana']; ?></td>
              </tr>
              <tr>
                  <td>Pengurus Partai</td>
                  <td>:</td>
                  <td><?php echo $d_wakil['pengurus_partai']; ?></td>
              </tr>
              <tr>
                  <td>Jabatan Partai</td>
                  <td>:</td>
                  <td><?php echo $d_wakil['jabatan_partai']; ?></td>
              </tr>
              <tr>
                  <td>Pengusung</td>
                  <td>:</td>
                  <td><?php echo $d_wakil['pengusung']; ?></td>
              </tr>
              <tr>
                  <td>Partai</td>
                  <td>:</td>
                  <td><?php echo $d_wakil['parpol']; ?></td>
              </tr>
          </table>
          </td>
    </tr>

<?php
    } //LOOP
} // jika ADA
?>

</table>
</div>
