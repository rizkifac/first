<?php
include"assets/include/koneksi.php";
$respon = htmlentities($_POST['respon']);

switch ($respon){

// PENCARIAN BERDASARKAN PROVINSI
case"report-provinsi";
	$prov = htmlentities($_POST['provinsi']);
	if(empty($prov)){
		 echo "<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>UPS!</strong> Mohon Pilih Provinsi.
				</div>";

	} else {

	$tanggal_awal = strtotime($_POST['tanggal-awal']);
	if(empty($tanggal_awal)){ $tanggal_awal = "0000-00-00"; }
	$tanggal_akhir = strtotime($_POST['tanggal-akhir']);
	if(empty($tanggal_akhir)){ $tanggal_akhir = "9999-99-99"; }

		$lihat=$conn->query("SELECT id_pelanggaran_jenis , COUNT( id_pelanggaran_jenis ) AS qty FROM tbl_pelanggaran
						WHERE id_prov = '$prov' AND UNIX_TIMESTAMP(tanggal_pelanggaran) between '$tanggal_awal' AND '$tanggal_akhir' GROUP BY id_pelanggaran_jenis");
		$jumlah = mysqli_num_rows($lihat);
		if($jumlah){
?>
	<script>
	$(function () {
		$('#hasil').highcharts({
				chart: {
						type: 'column'
				},
				title: {
						<?php $q = $conn->query("SELECT nama FROM tbl_provinsi WHERE id_prov='$prov'"); $q2 = $q->fetch_array(); ?>
						text: 'Jumlah Pelanggaran Untuk Provinsi <?php echo $q2['nama']; ?> Tanggal <?php echo date('d-m-Y', $tanggal_awal); ?> sampai <?php echo date('d-m-Y', $tanggal_akhir); ?>'
				},
				subtitle: {
						text: 'Sistem Pengawasan Pemilu'
				},
				xAxis: {
						type: 'category',
						labels: {
								rotation: -15,
								style: {
										fontSize: '13px',
										fontFamily: 'Verdana, sans-serif'
								}
						}
				},
				yAxis: {
						min: 0,
						title: {
								text: 'Jumlah Pelanggaran'
						}
				},
				legend: {
						enabled: false
				},
				tooltip: {
						pointFormat: 'Jumlah Pelanggaran: <b>{point.y:.1f}</b>'
				},
				series: [{
						name: 'Population',
						data: [
							<?php
							while($data	= $lihat->fetch_assoc()){
							$lihatnama 	= $conn->query("SELECT * FROM tbl_pelanggaran_jenis WHERE id_pelanggaran_jenis= '$data[id_pelanggaran_jenis]'");
							$datanama 	= $lihatnama->fetch_assoc();
							$ddd[] = $datanama['nama'];
							?>
									['<?php echo join($ddd, ',') ?>', <?php echo $data['qty']; ?>],

							<?php
							}
							?>
						],
						dataLabels: {
								enabled: true,
								rotation: -90,
								color: '#FFFFFF',
								align: 'right',
								format: '{point.y:.1f}', // one decimal
								y: 10, // 10 pixels down from the top
								style: {
										fontSize: '13px',
										fontFamily: 'Verdana, sans-serif'
								}
						}
				}]
		});
	});
	</script>

	<?php
	} else {
		echo "<h2 class='text-center'>Tidak Ada Data Pelanggaran</h2>"; // JIka tidak ada pelanggaran
	}
	} // jika ada post provinsi
break;




// PENCARIAN BERDASARKAN KOTA
case"report-kota";
	if(empty($_POST['kota'])){
		echo "<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong>UPS!</strong> Mohon Pilih Kab / Kota.
			</div>";
	} else {
		$kota=htmlentities($_POST['kota']);

		$tanggal_awal = strtotime($_POST['tanggal-awal']);
		if(empty($tanggal_awal)){ $tanggal_awal = "0000-00-00"; }
		$tanggal_akhir = strtotime($_POST['tanggal-akhir']);
		if(empty($tanggal_akhir)){ $tanggal_akhir = "9999-99-99"; }

		$lihat=$conn->query("SELECT id_pelanggaran_jenis , COUNT( id_pelanggaran_jenis ) AS qty from tbl_pelanggaran
						WHERE id_kab = '$kota' AND UNIX_TIMESTAMP(tanggal_pelanggaran) between '$tanggal_awal' AND '$tanggal_akhir' GROUP BY id_pelanggaran_jenis")
						or die (mysql_error());
		$jumlah = mysqli_num_rows($lihat);
		if($jumlah){
?>
		<script>
		$(function () {
			$('#hasil').highcharts({
					chart: {
							type: 'column'
					},
					title: {
							<?php $q = $conn->query("SELECT nama FROM tbl_kabupaten WHERE id_kab='$kota'"); $q2 = $q->fetch_array(); ?>
					  	text: 'Jumlah Pelanggaran Untuk <?php echo $q2['nama']; ?> Tanggal <?php echo date('d-m-Y', $tanggal_awal); ?> sampai <?php echo date('d-m-Y', $tanggal_akhir); ?>'
					},
					subtitle: {
							text: 'Sistem Pengawasan Pemilu'
					},
					xAxis: {
							type: 'category',
							labels: {
									rotation: -15,
									style: {
											fontSize: '13px',
											fontFamily: 'Verdana, sans-serif'
									}
							}
					},
					yAxis: {
							min: 0,
							title: {
									text: 'Jumlah Pelanggaran'
							}
					},
					legend: {
							enabled: false
					},
					tooltip: {
							pointFormat: 'Jumlah Pelanggaran: <b>{point.y:.1f}</b>'
					},
					series: [{
							name: 'Population',
							data: [
								<?php
								while($data	=$lihat->fetch_assoc()){
								$lihatnama 	= $conn->query("SELECT * FROM tbl_pelanggaran_jenis WHERE id_pelanggaran_jenis= '$data[id_pelanggaran_jenis]'");
								$datanama 	= $lihatnama->fetch_assoc();
								?>
										['<?php echo $datanama['nama']; ?>', <?php echo $data['qty']; ?>],
								<?php
								}
								?>
							],
							dataLabels: {
									enabled: true,
									rotation: -90,
									color: '#FFFFFF',
									align: 'right',
									format: '{point.y:.1f}', // one decimal
									y: 10, // 10 pixels down from the top
									style: {
											fontSize: '13px',
											fontFamily: 'Verdana, sans-serif'
									}
							}
					}]
			});
		});
		</script>

	<?php
	} else {
		echo "<h2 class='text-center'>Tidak Ada Data Pelanggaran</h2>"; // JIka tidak ada pelanggaran
	}
	} // jika ada post provinsi
break;




// PENCARIAN BERDASARKAN TANGGAL
case"report-tgl";
		$tanggal_awal = strtotime($_POST['tanggal-awal']);
		if(empty($tanggal_awal)){ $tanggal_awal = strtotime('2015-01-01'); }
		$tanggal_akhir = strtotime($_POST['tanggal-akhir']);
		if(empty($tanggal_akhir)){ $tanggal_awal = strtotime('3000-12-31'); }

		$lihat=  $conn->query("SELECT id_pelanggaran_jenis , COUNT( id_pelanggaran_jenis ) AS qty from tbl_pelanggaran
						 WHERE UNIX_TIMESTAMP(tanggal_pelanggaran) between '$tanggal_awal' AND '$tanggal_akhir' GROUP BY id_pelanggaran_jenis");
		$jumlah = mysqli_num_rows($lihat);
		if($jumlah){
		?>
		<script type="text/javascript">
		$(function () {
		$('#hasil').highcharts({
				chart: {
						type: 'column'
				},
				title: {
						text: 'Pelanggaran Se Indonesia Tanggal <?php echo date('d-m-Y', $tanggal_awal); ?> sampai <?php echo date('d-m-Y', $tanggal_akhir); ?>'
				},
				subtitle: {
						text: 'Sistem Pengawasan Pemilu'
				},
				xAxis: {
						type: 'category',
						labels: {
								rotation: -15,
								style: {
										fontSize: '13px',
										fontFamily: 'Verdana, sans-serif'
								}
						}
				},
				yAxis: {
						min: 0,
						title: {
								text: 'Jumlah Pelanggaran'
						}
				},
				legend: {
						enabled: false
				},
				tooltip: {
						pointFormat: 'Jumlah Pelanggaran: <b>{point.y:.1f}</b>'
				},
				series: [{
						name: 'Population',
						data: [
							<?php
							while($data	= $lihat->fetch_assoc()){
							$lihatnama 	= $conn->query("SELECT * FROM tbl_pelanggaran_jenis WHERE id_pelanggaran_jenis= '$data[id_pelanggaran_jenis]'");
							$datanama 	= $lihatnama->fetch_assoc();
							?>
									['<?php echo $datanama['nama']; ?>', <?php echo $data['qty']; ?>],
							<?php
							}
							?>
						],
						dataLabels: {
								enabled: true,
								rotation: -90,
								color: '#FFFFFF',
								align: 'right',
								format: '{point.y:.1f}', // one decimal
								y: 10, // 10 pixels down from the top
								style: {
										fontSize: '13px',
										fontFamily: 'Verdana, sans-serif'
								}
						}
				}]
		});
		});
		</script>
		<div id="hasil"></div>
		<?php
		} else {
			echo "<h2 class='text-center'>Tidak Ada Data Pelanggaran</h2>"; // JIka tidak ada pelanggaran
		}
	break;

} //AKHIR SWITCH
?>
