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

  <div id="ikp-data" style="width:60%"></div>
    <script type="text/javascript">
    $(function () {
      $('#ikp-data').highcharts({
          title: {
              text: 'IKP',
              x: -20 //center
          },
          subtitle: {
              text: '<?php echo $nama_prov; ?>',
              x: -20
          },
          xAxis: {
              categories: ["<?php echo implode($nama_kab, '","'); ?>"]
          },
          yAxis: {
              title: {
                  text: 'Jumlah IKP'
              },
              plotLines: [{
                  value: 0,
                  width: 1,
                  color: '#808080'
              }]
          },
          tooltip: {
              valueSuffix: ''
          },
          legend: {
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'middle',
              borderWidth: 0
          },
          series: [
          <?php
          $q_ikp_jenis = $conn->query("SELECT * FROM tbl_ikp_jenis ORDER BY id_ikp_jenis ASC");
          while ($d_ikp_jenis = $q_ikp_jenis->fetch_assoc()) {
              echo "{";
              echo "name:";
              echo "'".$d_ikp_jenis['nama_ikp']. "',";
              echo "data:[";
                  $q_ikp_kab = $conn->query("SELECT id_kab, nama FROM tbl_kabupaten WHERE id_prov='$id_prov' ORDER BY id_kab ASC");
                  while($d_ikp_kab = $q_ikp_kab->fetch_array()){
                      $q_ikp  = $conn->query("SELECT COUNT(id_ikp) AS qty FROM tbl_ikp WHERE id_kab='$d_ikp_kab[id_kab]' AND id_ikp_jenis='$d_ikp_jenis[id_ikp_jenis]'");
                      while ($d_ikp = $q_ikp->fetch_assoc()){
                          echo $d_ikp['qty']. " , ";
                        }
                      }
              echo "]";
              echo "},";
          }
          ?>
          ]
      });
    });
    </script>

Untuk detail tentang Indeks Kerawanan Pemilu silahkan klik infoweb IKP Bawaslu disini
