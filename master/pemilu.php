<div class="page-header">
  <h2> Data Pemilihan Umum <small></small></h2>
</div>

<a href="?page=pemilu-tambah" class="btn btn-primary btn-sm" style="margin-bottom:10px;">Tambah Data Pemilihan Umum</a>

<table class="table table-striped flex">
  <thead>
    <tr>
      <th>No</th>
      <th>Pemilu</th>
      <th>Provinsi</th>
      <th>Kab / Kota</th>
      <th>Tahun Pemilu</th>
    </tr>
  </thead>

  <tbody>
<?php
require "../assets/include/koneksi.php";
$qry = "SELECT tbl_pemilu.* , tbl_pemilu_jenis.* FROM tbl_pemilu INNER JOIN tbl_pemilu_jenis ON tbl_pemilu.id_pemilu_jenis=tbl_pemilu_jenis.id_pemilu_jenis ORDER BY tbl_pemilu_jenis.id_pemilu_jenis ";
$res = $conn->query($qry);
while($data=$res->fetch_assoc()){
?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td>
        <?php
          $q_jenis = $conn->query("SELECT nama_pemilu_jenis FROM tbl_pemilu_jenis WHERE id_pemilu_jenis='$data[id_pemilu_jenis]'");
          $d_jenis = $q_jenis->fetch_assoc();
          echo $d_jenis['nama_pemilu_jenis'];
        ?>
      </td>
      <td>
        <?php
          $q_prov   = $conn->query("SELECT nama FROM tbl_provinsi WHERE id_prov='$data[id_prov]'");
          $d_prov   = $q_prov->fetch_assoc();
          echo $d_prov['nama'];
        ?>
      </td>
      <td>
        <?php
          $q_kab   = $conn->query("SELECT nama FROM tbl_kabupaten WHERE id_kab='$data[id_kab]'");
          $d_kab   = $q_kab->fetch_assoc();
          echo $d_kab['nama'];
        ?>
      </td>
      <td><?php echo $data['tanggal_pemilu']; ?></td>
    </tr>
<?php
}
?>

  </tbody>
</table>
