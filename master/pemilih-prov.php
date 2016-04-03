<?php
  if(!isset($_GET['id']) || $_GET['id'] == ''){
    exit("<div class='alert alert-warning'><h3 class='text-center'>Something's Wrong</h3></div>");
  }
require("../assets/include/koneksi.php");
$id_prov  = htmlentities($_GET['id']);
$q_prov = $conn->query("SELECT nama FROM tbl_provinsi WHERE id_prov='$id_prov'");
if(mysqli_num_rows($q_prov)==0){
  exit("<div class='alert alert-warning'><h3 class='text-center'>Something's Wrong</h3></div>");
} else {
  if($d_prov = $q_prov->fetch_assoc()){
    $nama_prov = $d_prov['nama'];
  }
}
?>

<div class="page-header">
  <h2> Data Pemilih Provinsi <?php echo $nama_prov; ?></h2>
</div>


<table class="table table-striped flex">
  <thead>
    <tr>
      <th>No</th>
      <th>Kabupaten / Kota</th>
      <th>Jumlah DPT</th>
      <th>Jumlah Penduduk</th>
    </tr>
  </thead>

  <tbody>
<?php
$q_kab = $conn->query("SELECT * FROM tbl_kabupaten WHERE id_prov='$id_prov'");
while($d_kab=$q_kab->fetch_assoc()){
?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $d_kab['nama']; ?></td>
      <td>
            <div id="div-show-dpt-<?php echo $d_kab['id_kab']; ?>" class="div-show-dpt">
              <?php echo $d_kab['jumlah_dpt']; ?>
              <button type="button" name="<?php echo $d_kab['id_kab']; ?>" class="btn btn-link btn-dpt"><span class="fa fa-cog"></span></button>
            </div>
            <div id="div-form-dpt-<?php echo $d_kab['id_kab']; ?>" class="div-form-dpt">
                <form class="form-inline form-dpt" action="" method="post" name="<?php echo $d_kab['id_kab']; ?>">
                    <input type="hidden" name="respon" value="ubah-dpt">
                    <input type="hidden" name="id_kab" value="<?php echo $d_kab['id_kab']; ?>">
                    <input type="text" name="dpt" value="<?php echo $d_kab['jumlah_dpt']; ?>" class="form-control input-sm" required>
                    <button type="submit" name="submit" class="btn btn-link"><span class="fa fa-save"></span></button>
                </form>
                <div class="hasil" id="hasil-dpt-<?php echo $d_kab['id_kab']; ?>"></div>
            </div>
      </td>
      <td>
            <div id="div-show-pdd-<?php echo $d_kab['id_kab']; ?>" class="div-show-pdd">
              <?php echo $d_kab['jumlah_penduduk']; ?>
              <button type="button" name="<?php echo $d_kab['id_kab']; ?>" class="btn btn-link btn-pdd"><span class="fa fa-cog"></span></button>
            </div>
            <div id="div-form-pdd-<?php echo $d_kab['id_kab']; ?>" class="div-form-pdd">
                <form class="form-inline form-pdd" action="" method="post" name="<?php echo $d_kab['id_kab']; ?>">
                    <input type="hidden" name="respon" value="ubah-pdd">
                    <input type="hidden" name="id_kab" value="<?php echo $d_kab['id_kab']; ?>">
                    <input type="text" name="pdd" value="<?php echo $d_kab['jumlah_penduduk']; ?>" class="form-control input-sm" required>
                    <button type="submit" name="submit" class="btn btn-link"><span class="fa fa-save"></span></button>
                </form>
                <div class="hasil" id="hasil-pdd-<?php echo $d_kab['id_kab']; ?>"></div>
            </div>
      </td>
    </tr>
<?php
  $total_dpt      ="";
  $total_penduduk ="";
  $total_dpt      += $d_kab['jumlah_dpt'];
  $total_penduduk += $d_kab['jumlah_penduduk'];
}
?>
  </tbody>
</table>

Total Jumlah DPT = <?php echo $total_dpt; ?>
<br>
Total Jumlah Penduduk = <?php echo $total_penduduk; ?>

<script type="text/javascript">
  $('.div-form-dpt').hide();
  $('.div-form-pdd').hide();

  $('.btn-dpt').click(function(){
      var id = $(this).attr('name');
      $('#div-show-dpt-' + id).hide();
      $('#div-form-dpt-' + id).show();
  });
  $('.btn-pdd').click(function(){
      var id = $(this).attr('name');
      $('#div-show-pdd-' + id).hide();
      $('#div-form-pdd-' + id).show();
  });

  $('.form-dpt').submit(function(){
    var id = $(this).attr('name');
		$.ajax({
			type: 'POST',
			url: 'pemilih-proses.php',
			data: $(this).serialize(),
			beforeSend: function() {
				$('#hasil-dpt-' + id).html("<img src='../assets/img/loading.gif' width='20px' alt='Gagal' />");
			},
			success: function(data) {
        $('#hasil-dpt-' + id).hide();
        $('#hasil-dpt-' + id).html(data).show('slow');
				}
		});
		return false;
	});

  $('.form-pdd').submit(function(){
    var id = $(this).attr('name');
		$.ajax({
			type: 'POST',
			url: 'pemilih-proses.php',
			data: $(this).serialize(),
			beforeSend: function() {
				$('#hasil-pdd-' + id).html("<img src='../assets/img/loading.gif' width='20px' alt='Gagal' />");
			},
			success: function(data) {
        $('#hasil-pdd-' + id).hide();
        $('#hasil-pdd-' + id).html(data).show('slow');
				}
		});
		return false;
	});

</script>
