<div class="page-header">
  <h2> Data Pemilihan Umum <small></small></h2>
</div>

<table class="table table-striped flex">
  <thead>
    <tr>
      <th>No</th>
      <th>Pemilu</th>
      <th>Provinsi</th>
      <th>Kab / Kota</th>
      <th>Tanggal Pemilu</th>
      <th>Pasangan Calon</th>
    </tr>
  </thead>

  <tbody>
<?php
require "../assets/include/koneksi.php";
$qry = "SELECT * FROM tbl_pemilu WHERE id_kab = '$_SESSION[id_kab]' ORDER BY tanggal_pemilu DESC";
$res = $conn->query($qry);
while($data=$res->fetch_assoc()){
?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td>
        <?php
        $q_jenis = $conn->query("SELECT nama_pemilu_jenis FROM tbl_pemilu_jenis WHERE id_pemilu_jenis='$data[id_pemilu_jenis]'");
        while($d_jenis = $q_jenis->fetch_assoc()){
          echo $d_jenis['nama_pemilu_jenis'];
        }
        ?>
      </td>
      <td><?php echo $nama_prov; ?></td>
      <td><?php echo $nama_kab; ?></td>
      <td><?php echo $data['tanggal_pemilu']; ?></td>
      <td>
        <a href="?page=sipaslon-form&id=<?php echo $data['id_pemilu'] ?>" class="btn btn-link"><span class="fa fa-plus-square"></span></a>
        <a href="?page=sipaslon&id=<?php echo $data['id_pemilu'] ?>" class="btn btn-link" alt="Lihat Pangan Yang Sudah Terdaftar"><span class="fa fa-eye"></span></a>
      </td>
    </tr>
<?php
}
?>

  </tbody>
</table>
