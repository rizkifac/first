<?php
include"assets/include/koneksi.php";
	if(empty($_POST['provinsi'])){
		echo "<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong>UPS!</strong> Mohon Pilih Provinsi.
			</div>";
	} else {
  $prov = $_POST['provinsi'];


	$q_proses = $conn->query("SELECT id_pelanggaran_jenis , COUNT( id_pelanggaran_jenis ) AS qty FROM tbl_pelanggaran_data WHERE id_prov = '$prov' GROUP BY id_pelanggaran_jenis");
	$j_proses = mysqli_num_rows($q_proses);
	if($j_proses){
    $q = $conn->query("SELECT nama FROM provinsi WHERE id_prov='$prov'");
    $q2 = $q->fetch_array();
	?>




<div id="container"></div>

<script type="text/javascript">
$(function () {
  $('#container').highcharts({
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'Jumlah Pelanggaran Untuk Provinsi <?php echo $q2['nama']; ?>'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: true,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                  style: {
                      color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                  }
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [
            <?php
            while($d_proses=$q_proses->fetch_array()){
            $q_nama = $conn->query("SELECT * FROM tbl_pelanggaran_jenis WHERE id = '$d_proses[id_pelanggaran_jenis]'");
            $d_nama = $q_nama->fetch_array();
            ?>
          { name: '<?php echo $d_nama['nama']; ?>', y: <?php echo $d_proses['qty']; ?>},
          <?php } ?>
          ]
      }]
  });
});
</script>

<?php
} else {
  echo "<h2 class='text-center'>Tidak Ada Data Pelanggaran</h2>"; // JIka tidak ada pelanggaran
}

}

?>
