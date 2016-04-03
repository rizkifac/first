<?php
include"assets/include/koneksi.php";
$no=1;$total= "";$nop=1;
$respon = htmlentities($_POST['respon']);
switch ($respon){

// PENCARIAN BERDASARKAN PROVINSI
case"report-tabel-prov";
	$id_prov 				= htmlentities($_POST['id_prov']);
	$tanggal_awal 	= strtotime($_POST['tanggal-awal']);
	$tanggal_akhir 	= strtotime($_POST['tanggal-akhir']);
	if(empty($id_prov)){
		echo "<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong>UPS!</strong> Mohon Pilih Provinsi.
			</div>";
	} else {
		if(empty($_POST['tanggal-awal'])){
			$tanggal_awal = strtotime('2015-01-01');
		} else {
			$tanggal_awal = strtotime($_POST['tanggal-awal']);
		}
 		if(empty($_POST['tanggal-akhir'])){
			$tanggal_akhir = strtotime('3000-12-31');
		} else {
			$tanggal_akhir = strtotime($_POST['tanggal-akhir']);
		}
		$lihat=$conn->query("SELECT id_kab, SUM( id_pelanggaran_jenis = '1' ) AS satu,
										SUM( id_pelanggaran_jenis = '2' ) AS dua,
										SUM( id_pelanggaran_jenis = '3' ) AS tiga,
										COUNT(id_pelanggaran_jenis) AS jml FROM tbl_pelanggaran WHERE
										id_prov = '$id_prov' AND UNIX_TIMESTAMP(tanggal_pelanggaran) between
										'$tanggal_awal' AND '$tanggal_akhir' GROUP BY id_kab");
		$jumlah = mysqli_num_rows($lihat);
		if($jumlah){
			$lihatprov = $conn->query("SELECT * FROM tbl_provinsi WHERE id_prov= '$id_prov'");
			$dataprov = $lihatprov->fetch_array();
?>
			<h3 class="text-center">Daftar Pelanggaran Seluruh Kab / Kota Provinsi <?php echo $dataprov['nama']; ?>  </h3>
			<div class="table-responsive">
			<table class="table table-hover">
				<tr>
                    <th>No</th>
                    <th>Kota</th>
					<?php
                    $lihatpelanggaran = $conn->query("SELECT * FROM tbl_pelanggaran_jenis ORDER BY id_pelanggaran_jenis ASC");
                    while($datapelanggaran = $lihatpelanggaran->fetch_array()){
                        echo "<th>$datapelanggaran[nama]</th>";
                    }
                    ?>
                    <th>Jumlah</th>
                </tr>
<?php
				while($data		= $lihat->fetch_array()){
					$lihatkota 	= $conn->query("SELECT nama FROM tbl_kabupaten WHERE id_kab='$data[id_kab]'");
					$datakota		= $lihatkota->fetch_array();
?>
                <tr>
                    <td><?php echo $no; $no++?></td>
                    <td><?php echo $datakota['nama'] ?></td>
                    <td class="text-center"><?php echo $data['satu'] ?></td>
                    <td class="text-center"><?php echo $data['dua'] ?></td>
                    <td class="text-center"><?php echo $data['tiga'] ?></td>
                    <td class="text-center"><b><?php echo $data['jml'] ?></b></td>
                </tr>
<?php
				$total= $data['jml']+$total;
				}
?>
    			<tr>
    				<td colspan="5">Jumlah Pelanggaran Tanggal <?php echo date('d-F-Y',($tanggal_awal)). " Sampai " .date('d-F-Y', ($tanggal_akhir))." =";  ?>
                    </td>
        			<td class="text-center"><b><?php echo $total; ?></b></td>
    			</tr>
            </table>
            </div>
	<?php
		} else {
			echo "<h2 class='text-center'>Tidak Ada Data Pelanggaran</h2>"; // JIka tidak ada pelanggaran
		}
	}
	break;



// PENCARIAN BERDASARKAN TANGGAL
case"report-tabel-tgl";
 	if(empty($_POST['tanggal-awal'])){
		$tanggal_awal = date('yyyy-mm-dd',strtotime('2015-01-01'));
	} else {
		$tanggal_awal = strtotime($_POST['tanggal-awal']);
	}
 	if(empty($_POST['tanggal-akhir'])){
		$tanggal_akhir = date('yyyy-mm-dd',strtotime('3000-12-31'));
	} else {
		$tanggal_akhir = strtotime($_POST['tanggal-akhir']);
	}
	$lihat = $conn->query("SELECT id_prov, SUM( id_pelanggaran_jenis = '1' ) AS satu,
										SUM( id_pelanggaran_jenis = '2' ) AS dua,
										SUM( id_pelanggaran_jenis = '3' ) AS tiga,
										COUNT(id_pelanggaran_jenis) AS jml FROM tbl_pelanggaran WHERE
										UNIX_TIMESTAMP(tanggal_pelanggaran) between
										'$tanggal_awal' AND '$tanggal_akhir' GROUP BY id_prov");
	$jumlah = mysqli_num_rows($lihat);
	if($jumlah){
?>
		<h3 class="text-center">Daftar Pelanggaran Seluruh Provinsi</h3>
		<div class="table-responsive">
		<table class="table table-hover">
            <tr>
                <th>No</th>
                <th>Provinsi</th>
<?php
        $lihatpelanggaran = $conn->query("SELECT * FROM tbl_pelanggaran_jenis ORDER BY id_pelanggaran_jenis ASC");
				while($datapelanggaran = $lihatpelanggaran->fetch_array()){
					echo "<th>$datapelanggaran[nama]</th>";
				}
?>
                <th>Jumlah</th>
                <th class="avoid-this">Detail</th>
            </tr>
<?php
		while($data  = $lihat->fetch_array()){
			$lihatprov = $conn->query("SELECT * FROM tbl_provinsi WHERE id_prov= '$data[id_prov]'");
			$dataprov  = $lihatprov->fetch_array();
?>
            <tr>
                <td><?php echo $no; $no++?></td>
                <td><?php echo $dataprov['nama'] ?></td>
                <td class="text-center"><?php echo $data['satu'] ?></td>
                <td class="text-center"><?php echo $data['dua'] ?></td>
                <td class="text-center"><?php echo $data['tiga'] ?></td>
                <td class="text-center"><b><?php echo $data['jml'] ?></b></td>
                <td class="text-center"><button class="btn btn-info btn-sm avoid-this" type="button" data-toggle="modal" data-target="#myModal<?php echo $nop; ?>">Detail</button>
         			            <!-- Modal -->
                                <div id="myModal<?php echo $nop; ?>" class="modal fade" role="dialog" style="color:#000;">
                                <div class="modal-dialog">

                                <div class="modal-content"><!-- Modal content-->
                                <div class="modal-header"> <!-- Modal header-->
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Provinsi</h4><h2 class="text-center"> <kbd><?php echo $dataprov['nama']; ?></kbd></h2>
                                </div>
                                <button class="print-link btn-sm avoid-this btn btn-default" onclick="$('#myModal<?php echo $nop; $nop++ ?>').print({noPrintSelector: '.avoid-this'});"> Print </button>
                                <div class="modal-body"><!-- Modal body-->

                                   <table class="table">
                                        <tr class="active">
                                            <th>No</th>
                                            <th>Kota</th>
                                            <?php
                                            $lihatpelanggaran2 = $conn->query("SELECT * FROM tbl_pelanggaran_jenis ORDER BY id_pelanggaran_jenis ASC");
                                            while($datapelanggaran2 = $lihatpelanggaran2->fetch_array()){
                                                echo "<th>$datapelanggaran2[nama]</th>";
                                            }
                                            ?>
                                            <th>Jumlah</th>
                                        </tr>

                                <!-- LISTING MENAMPILKAN MENU UNTUK MODALS ATAU ALERT -->
                                <?php
								$nod=1;
								$lihatkab = $conn->query("SELECT id_kab, SUM( id_pelanggaran_jenis = '1' ) AS satus,
																SUM( id_pelanggaran_jenis = '2' ) AS duas,
																SUM( id_pelanggaran_jenis = '3' ) AS tigas,
																COUNT(id_pelanggaran_jenis) AS jmls FROM tbl_pelanggaran WHERE
																id_prov = '$data[id_prov]' AND UNIX_TIMESTAMP(tanggal_pelanggaran) between
																'$tanggal_awal' AND '$tanggal_akhir' GROUP BY id_kab");
                                while($datakab = $lihatkab->fetch_array()){
																		$lihatkota = $conn->query("SELECT nama FROM tbl_kabupaten WHERE id_kab='$datakab[id_kab]'") or die ("Terjadi Kesalahan");
																		$datakota=$lihatkota->fetch_array();

                                ?>
                                        <tr>
                                            <td><?php echo $nod++; ?></td>
                                            <td><?php echo $datakota['nama'] ?></td>
                                            <td class="text-center"><?php echo $datakab['satus'] ?></td>
                                            <td class="text-center"><?php echo $datakab['duas'] ?></td>
                                            <td class="text-center"><?php echo $datakab['tigas'] ?></td>
                                            <td class="text-center"><b><?php echo $datakab['jmls'] ?></b></td>
                                        </tr>
                                <?php } ?>
                                   </table>
                                </div>
                                <div class="modal-footer"><!-- Modal footer-->
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                </div>
                                </div>
                                </div>
                                </div>
                                <!-- Modal -->

								</td>
            </tr>

<?php
		$total= $data['jml']+$total;
		}
?>

            <tr>
                <td colspan="5">Jumlah Pelanggaran Tanggal <?php echo date('d-F-Y',($tanggal_awal)). " Sampai " .date('d-F-Y', ($tanggal_akhir))." =";  ?></td>
                <td class="text-center"><b><?php echo $total; ?></b></td>
            </tr>
        </table>
        </div>
<?php
	} else {
		echo "<h2 class='text-center'>Tidak Ada Data Pelanggaran</h2>"; // JIka tidak ada pelanggaran
	}
	break;


} // AKHIR RESPON
