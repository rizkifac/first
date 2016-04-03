<?php
if(!isset($_GET['id']) || $_GET['id']==''){
  exit("ERROR Q1");
} else {
  $id_prov = htmlentities($_GET['id']);
}
require("../assets/include/koneksi.php");
$q_prov = $conn->query("SELECT nama FROM tbl_provinsi WHERE id_prov='$id_prov'");
while ($d_prov = $q_prov->fetch_assoc()) {
  $nama_prov = $d_prov['nama'];
}
?>

<div class="page-header">
  <h2> Data User Untuk Provinsi <?php echo $nama_prov; ?> <small></small></h2>
</div>

<table class="table table-striped flex">
  <thead>
    <tr>
      <th>No</th>
      <th>Kab / Kota</th>
      <th>Set User</th>
    </tr>
  </thead>

  <tbody>
<?php
$qry = "SELECT * FROM tbl_kabupaten WHERE id_prov='$id_prov'";
$res = $conn->query($qry);
while($data=$res->fetch_assoc()){
?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $data['nama']; ?></td>
      <td>
        <?php
        $q_user = $conn->query("SELECT id FROM tbl_user WHERE id_kab='$data[id_kab]' AND level='3'");
        if (mysqli_num_rows($q_user)==0) {
          echo "<a href='#' name='$data[nama]' id='$data[id_kab]' class='btn btn-link btn-user-tambah'><span class='fa fa-plus-square'></span><a>";
        } else {
          $d_user = $q_user->fetch_assoc();
          echo "<a href='#' name='$data[nama]' id='$d_user[id]' class='btn btn-link btn-user-data'><span class='fa fa-user'></span></a>";
        }
        ?>

      </td>
    </tr>
<?php
}
?>

  </tbody>
</table>


<script type="text/javascript">
<!--
    $('.btn-user-data').click(function(){
      var id = $(this).attr('id');
      var nama = $(this).attr('name');
      $.ajax({
        type: 'POST',
        url: 'user-data.php',
        data: "id=" + id,
        beforeSend: function() {
          $('body').waitMe({
            effect:'timer'
          });
        },
        success: function(data) {
          $('body').waitMe('hide');
          $('#user-data').modal();
          $("#user-data .modal-title").html( "User " + nama );
          $("#user-data .modal-body").html( data );
          }
      });
      return false;
    });

    $('.btn-user-tambah').click(function(){
      var id_kab = $(this).attr('id');
      var id_prov = '<?php echo $id_prov; ?>';
      var nama = $(this).attr('name');
      $.ajax({
        type: 'POST',
        url: 'user-tambah.php',
        data: "id_kab=" + id_kab + "&id_prov=" + id_prov,
        beforeSend: function() {
          $('body').waitMe({
            effect:'timer'
          });
        },
        success: function(data) {
          $('body').waitMe('hide');
          $('#user-data').modal();
          $("#user-data .modal-title").html( "Tambah User " + nama );
          $("#user-data .modal-body").html( data );
          }
      });
      return false;
    });
-->
</script>


<div id="user-data" class="modal fade" role="dialog">
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
