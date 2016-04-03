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

  $q_kab = $conn->query("SELECT nama FROM tbl_kabupaten WHERE id_kab='$id_kab' ORDER BY id_kab ASC");
  if(mysqli_num_rows($q_kab)<=0){
    exit("ERRORR Q2");
  } else {
    while($d_kab = $q_kab->fetch_array()){
        $nama_kab  = $d_kab['nama'];
    }
  }
?>

<div class="waitMe-icon text-center">
  <a href="#" class="hvr-float-shadow btn btn-link btn-primary btn_simwaslu">   <img src="assets/img/icon_simwaslu.png" width="170px" /></a>
  <a href="#" class="hvr-float-shadow btn btn-link btn-primary btn_ikp">        <img src="assets/img/icon_ikp.png" width="170px" /></a>
  <a href="#" class="hvr-float-shadow btn btn-link btn-primary btn_sipaslon">   <img src="assets/img/icon_sipaslon.png" width="170px" /></a>
  <a href="#" class="hvr-float-shadow btn btn-link btn-primary btn_pemilih">    <img src="assets/img/icon_dpt.png" width="170px" /></a>
  <a href="#" class="hvr-float-shadow btn btn-link btn-primary btn_logistik">   <img src="assets/img/icon_logistik.png" width="170px" /></a>
  <a href="#" class="hvr-float-shadow btn btn-link btn-primary btn_pelanggaran"><img src="assets/img/icon_pelanggaran.png" width="170px" /></a>
</div>

<script type="text/javascript">
<!--
    $('.btn_sipaslon').click(function(){
      var id_prov   = <?php echo $id_prov; ?>;
      var id_kab 	  = <?php echo $id_kab; ?>;
      $.ajax({
        type: 'POST',
        url: 'modal-sipaslon.php',
        data: "id_kab=" + id_kab + "&id_prov=" + id_prov,
  			beforeSend: function() {
          $('.waitMe-icon').waitMe({
            effect:'timer'
          });
  			},
        success: function(response) {
          $('.waitMe-icon').waitMe('hide');
          $('#provinsi-data-icon').modal();
          $("#provinsi-data-icon .modal-title").html("DAFTAR PASANGAN CALON <?php echo $nama_kab; ?>");
          $("#provinsi-data-icon .modal-body").html( response );
          }
      });
      return false;
    });

    $('.btn_ikp').click(function(){
      var id_prov   = <?php echo $id_prov; ?>;
      var id_kab 	  = <?php echo $id_kab; ?>;
      $.ajax({
        type: 'POST',
        url: 'modal-ikp.php',
        data: "id_kab=" + id_kab + "&id_prov=" + id_prov,
  			beforeSend: function() {
          $('.waitMe-icon').waitMe({
            effect:'timer'
          });
  			},
        success: function(response) {
          $('.waitMe-icon').waitMe('hide');
          $('#provinsi-data-icon').modal();
          $("#provinsi-data-icon .modal-title").html("INDEKS KERAWANAN PEMILU <?php echo $nama_prov; ?>");
          $("#provinsi-data-icon .modal-body").html( response );
          }
      });
      return false;
    });

    $('.btn_logistik').click(function(){
      var id_prov   = <?php echo $id_prov; ?>;
      var id_kab 	  = <?php echo $id_kab; ?>;
      $.ajax({
        type: 'POST',
        url: 'modal-logistik.php',
        data: "id_kab=" + id_kab + "&id_prov=" + id_prov,
  			beforeSend: function() {
          $('.waitMe-icon').waitMe({
            effect:'timer'
          });
  			},
        success: function(response) {
          $('.waitMe-icon').waitMe('hide');
          $('#provinsi-data-icon').modal();
          $("#provinsi-data-icon .modal-title").html("DISTRIBUSI LOGISTIK  <?php echo $nama_kab; ?>");
          $("#provinsi-data-icon .modal-body").html( response );
          }
      });
      return false;
    });

    $('.btn_pemilih').click(function(){
      var id_prov   = <?php echo $id_prov; ?>;
      var id_kab 	  = <?php echo $id_kab; ?>;
      $.ajax({
        type: 'POST',
        url: 'modal-pemilih.php',
        data: "id_kab=" + id_kab + "&id_prov=" + id_prov,
  			beforeSend: function() {
          $('.waitMe-icon').waitMe({
            effect:'timer'
          });
  			},
        success: function(response) {
          $('.waitMe-icon').waitMe('hide');
          $('#provinsi-data-icon').modal();
          $("#provinsi-data-icon .modal-title").html("JUMLAH DPT <?php echo $nama_prov; ?>");
          $("#provinsi-data-icon .modal-body").html( response );
          }
      });
      return false;
    });

    $('.btn_pelanggaran').click(function(){
      var id_prov   = <?php echo $id_prov; ?>;
      var id_kab 	  = <?php echo $id_kab; ?>;
      $.ajax({
        type: 'POST',
        url: 'modal-pelanggaran.php',
        data: "id_kab=" + id_kab + "&id_prov=" + id_prov,
        beforeSend: function() {
          $('.waitMe-icon').waitMe({
            effect:'timer'
          });
        },
        success: function(response) {
          $('.waitMe-icon').waitMe('hide');
          $('#provinsi-data-icon').modal();
          $("#provinsi-data-icon .modal-title").html("DATA PELANGGARAN <?php echo $nama_prov; ?>");
          $("#provinsi-data-icon .modal-body").html( response );
          }
      });
      return false;
    });

    $('.btn_simwaslu').click(function(){
      var id_prov   = <?php echo $id_prov; ?>;
      var id_kab 	  = <?php echo $id_kab; ?>;
      $.ajax({
        type: 'POST',
        url: 'modal-pelanggaran.php',
        data: "id_kab=" + id_kab + "&id_prov=" + id_prov,
        beforeSend: function() {
          $('.waitMe-icon').waitMe({
            effect:'timer'
          });
        },
        success: function(response) {
          $('.waitMe-icon').waitMe('hide');
          $('#provinsi-data-icon').modal();
          $("#provinsi-data-icon .modal-title").html("PENGAWAS PEMILU  <?php echo $nama_prov; ?>");
          $("#provinsi-data-icon .modal-body").html( "Belum Tersedia Untuk sementara" );
          }
      });
      return false;
    });
-->
</script>
