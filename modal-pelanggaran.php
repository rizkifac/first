<?php
if(!isset($_POST['id_kab']) || !isset($_POST['id_prov']) || $_POST['id_kab']=='' || $_POST['id_prov']==''){
  exit("ERROR Q1");
}
  require_once('assets/include/koneksi.php');
  $id_kab  = htmlentities($_POST['id_kab']);
  $id_prov = htmlentities($_POST['id_prov']);

  $q_prov = $conn->query("SELECT nama FROM tbl_provinsi WHERE id_prov='$id_prov'");
  if(mysqli_num_rows($q_prov)==0){
    exit("ERRORR Q2");
  } else {
    if($d_prov = $q_prov->fetch_assoc()){
      $nama_prov = $d_prov['nama'];
    }
  }

  $q_kab = $conn->query("SELECT nama FROM tbl_kabupaten WHERE id_prov='$id_prov' ORDER BY id_kab ASC");
  if(mysqli_num_rows($q_kab)==0){
    exit("ERRORR Q2");
  } else {
    while($d_kab = $q_kab->fetch_array()){
        $nama_kab[]  = $d_kab['nama'];
    }
  }

?>

  <div id="laporan-pelanggaran" style="width:60%"></div>
    <script type="text/javascript">
      $(function () {
        $('#laporan-pelanggaran').highcharts({
        		chart: {
        				type: 'column'
        		},
        		title: {
        				text: 'Jumlah Pelanggaran Untuk Provinsi'
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
        								['Pelanggaran 1', 4],
                        ['Pelanggaran 2', 6],
                        ['Pelanggaran 3', 2],
                        ['Pelanggaran 4', 1],
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
