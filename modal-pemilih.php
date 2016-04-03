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

  <div id="daftar-pemilih" style="width:60%"></div>
    <script type="text/javascript">
    $(function () {
        $('#daftar-pemilih').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'DPT'
            },
            subtitle: {
                text: '<?php echo $nama_prov; ?>'
            },
            xAxis: {
                categories: [
                    'Kota 1',
                    'kota 2',
                    'Kota3',
                    'Kota 4',
                    'Kota 5',
                    'Kota 6',
                    'Kota 7',
                    'Kota 8',
                    'Kota 9',
                    'Kota 10',
                    'Kota 11',
                    'Kota 12'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Jiwa</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Jumlah Penduduk',
                color: '#ccc',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

            }, {
                name: 'Jumlah DPT',
                data: [83.6, 0, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

            }]
        });
    });
    </script>
    <div class="well well-sm">
      <small>JUMLAH</small> <b class="pull-right">67</b>
    </div>
