<div class="page-header">
  <h2> Data Pemilih <small></small></h2>
</div>
<div id="hasil"></div>

<table class="table table-striped flex">
  <thead>
    <tr>
      <th>No</th>
      <th>Provinsi</th>
      <th>Set</th>
    </tr>
  </thead>

  <tbody>
<?php
require "../assets/include/koneksi.php";
$qry = "SELECT * FROM tbl_provinsi";
$res = $conn->query($qry);
while($data=$res->fetch_assoc()){
?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $data['nama']; ?></td>
      <td>
        <a href="?page=pemilih-prov&id=<?php echo $data['id_prov']; ?>" class="btn btn-link"><span class="fa fa-cogs"></span></a>
      </td>
    </tr>
<?php
}
?>

  </tbody>
</table>
