<style media="screen">
.modal-icon  {
  /*   display: block;*/
  padding-right: 0px;
  background-color: rgba(4, 4, 4, 0.8);
  }

  .modal-dialog-icon  {
              top: 20%;
              width: 100%;
              position: absolute;
  }
  .modal-content-icon  {
              border-radius: 0px;
              border: none;
              top: 40%;
  }
  .modal-body-icon  {
              background-color: rgb(233, 155, 50);
              color: white;
  }

</style>

<?php
if(!isset($_GET['p']) || $_GET['p'] == ''){
  echo "<div class='alert alert-warning'><h3 class='text-center'>Something's Wrong</h3></div>";
  exit();
} else {
  $p = htmlentities($_GET['p']);
  require_once("assets/include/koneksi.php");
  $q_prov = $conn->query("SELECT id_prov, nama, deskripsi FROM tbl_provinsi WHERE id_prov='$p'");
  if(mysqli_num_rows($q_prov)==0){
    echo "<div class='alert alert-warning'><h3 class='text-center'>Something's Wrong</h3></div>";
    exit();
  }
  $d_prov = $q_prov->fetch_assoc();
}
?>

<div class="well well-sm text-center"><h4>Provinsi <?php echo $d_prov['nama']; ?></h4>
    Klik Pada Peta Bagian Kabupaten / Kota Untuk Detail Informasi
</div>

<div class="waitMe">
<img src="assets/maps/<?php echo $d_prov['deskripsi']; ?>.PNG" usemap="#provinsi" class="img-responsive" border="0" id="img_<?php echo $p; ?>" />
<map name="provinsi" attr="id_<?php echo $d_prov['deskripsi']; ?>">

<?php
$q_kab    = $conn->query("SELECT * FROM tbl_kabupaten WHERE id_prov='$p'");
while ($d_kab = $q_kab->fetch_assoc()) {
  $q_kec  = $conn->query("SELECT * FROM tbl_kecamatan WHERE id_kab='$d_kab[id_kab]'");
  $j_kec  = mysqli_num_rows($q_kec);
  $title  = $d_kab['nama']." , Jumlah Kecamatan = ".$j_kec." .";
?>

<!-- TAMPILAN PETA PERPROVINSI -->
<area shape="poly"  href="#" id="<?php echo $d_kab['id_kab']; ?>" name="<?php echo $d_kab['nama'];?>" coords="<?php echo $d_kab['coords']; ?>" alt="<?php echo $d_kab['deskripsi']; ?>" class="tooltip btn_kab" data-toggle="tooltip" title="<?php echo $title; ?>" />
<?php } ?>
</map>
</div> <!--div waitMe-->


<script type="text/javascript">
<!--
    var defaultDipTooltip = 'Sorot Mouse ke daerah provinsi yang ingin dilihat, kemudian klik.';
    var image = $('#img_<?php echo $p; ?>');
    image.mapster(
    {
        fillOpacity: 0.4,
        fillColor: "ffffff",
        stroke: true,
        strokeColor: "ffffff",
        strokeOpacity: 0.8,
        strokeWidth: 2,
        singleSelect: true,
        mapKey: 'name',
        listKey: 'name'
    });

    $('.btn_kab').click(function(){
      var id_prov   = <?php echo $p; ?>;
      var id_kab 	  = $(this).attr('id');
      var nama_kab  = $(this).attr('name');
      $.ajax({
        type: 'POST',
        url: 'provinsi-data.php',
        data: "id_kab=" + id_kab + "&id_prov=" + id_prov,
  			beforeSend: function() {
          $('.waitMe').waitMe({
            effect:'timer'
          });
  			},
        success: function(data) {
          $('.waitMe').waitMe('hide');
          $('#provinsi-data').modal();
          $("#provinsi-data .modal-title").html( nama_kab );
          $("#provinsi-data .modal-body").html( data );
          }
      });
      return false;
    });

-->
</script>

<!-- Modal Menampilkan ICON -->
<div id="provinsi-data" class="modal modal-icon fade" role="dialog">
  <div class="modal-dialog modal-dialog-icon">
    <div class="modal-content modal-content-icon">
      <div class="modal-body modal-body-icon">
        <!-- KONTEN DISISNI DARI provinsi-data.php -->
      </div>
    </div>
  </div>
</div>

<!-- Modal Menampilkan data Per icon -->
<div id="provinsi-data-icon" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center"></h4>
      </div>
      <div class="modal-body">
        <!-- KONTEN DISISNI DARI provinsi-data.php -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
