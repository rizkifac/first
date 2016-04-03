<div class="page-header">
  <h2> Data User <small></small></h2>
</div>

<table class="table table-striped flex">
  <thead>
    <tr>
      <th>No</th>
      <th>Provinsi</th>
      <th>Set User</th>
      <th>Kab / Kota</th>
    </tr>
  </thead>

  <tbody>
<?php
require "../assets/include/koneksi.php";
$qry = "SELECT * FROM tbl_provinsi";
$res = $conn->query($qry);
while($data=$res->fetch_assoc()){
?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $data['nama']; ?></td>
      <td>
        <?php
        $q_user = $conn->query("SELECT id FROM tbl_user WHERE id_prov='$data[id_prov]' AND level='2'");
        if (mysqli_num_rows($q_user)==0) {
          echo "<a href='#' name='$data[nama]' id='$data[id_prov]' class='btn btn-link btn-user-tambah'><span class='fa fa-plus-square'></span><a>";
        } else {
          $d_user = $q_user->fetch_assoc();
          echo "<a href='#' name='$data[nama]' id='$d_user[id]' class='btn btn-link btn-user-data'><span class='fa fa-user'></span></a>";
        }
        ?>

      </td>
      <td>
        <a href="?page=user-prov&id=<?php echo $data['id_prov'] ?>" class="btn btn-link"><span class="fa fa-list"></span></a>
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
          $("#user-data .modal-title").html( "User Provinsi " + nama );
          $("#user-data .modal-body").html( data );
          }
      });
      return false;
    });

    $('.btn-user-tambah').click(function(){
      var id = $(this).attr('id');
      var nama = $(this).attr('name');
      $.ajax({
        type: 'POST',
        url: 'user-tambah.php',
        data: "id_prov=" + id,
        beforeSend: function() {
          $('body').waitMe({
            effect:'timer'
          });
        },
        success: function(data) {
          $('body').waitMe('hide');
          $('#user-data').modal();
          $("#user-data .modal-title").html( "Tambah User Provinsi " + nama );
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
