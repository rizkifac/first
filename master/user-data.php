<?php
if(!isset($_POST['id'])){
  exit("ERROR Q1");
}
$id = htmlentities($_POST['id']);
require_once("../assets/include/koneksi.php");
$q_user = $conn->query("SELECT * FROM tbl_user WHERE id='$id'");
while ($d_user = $q_user->fetch_assoc()) {
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"></h3>
  </div>
  <div class="panel-body">
    <table class="table table-bordered" id="tbl_<?php echo $id; ?>">
      <tr>
        <td>Nama</td>
        <td>: <?php echo $d_user['nama']; ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td>: <?php echo $d_user['email']; ?></td>
      </tr>
      <tr>
        <td>Level</td>
        <td>: <?php echo $d_user['level']; ?></td>
      </tr>
      <tr>
        <td>Username</td>
        <td>: <?php echo $d_user['username']; ?></td>
      </tr>
      <tr>
        <td>Password <i>(Enkrip)</i></td>
        <td>: <?php echo $d_user['password']; ?></td>
      </tr>
    </table>
  </div>
  <div class="panel-footer">
    <div id="hasil"></div>
  </div>
</div>
<?php
}
?>

<a href="#" class="btn btn-sm btn-primary">Edit</a>
<button type="button" class="btn btn-sm btn-warning user-hapus" value="<?php echo $id; ?>" name="user-hapus">Hapus</button>

<script type="text/javascript">
  $('.user-hapus').click(function(){
    tanya=confirm("Apakah anda yakin akan menghapus data ini?")
    if (tanya !="0")
    {
      var id = $(this).val();
      var respon = $(this).attr('name');
      var semua = 'id=' + id + '&respon=' + respon;
      $.ajax({
        type: 'POST',
        url: 'user-proses.php',
        data: semua,
        beforeSend: function() {
          $('#hasil').html('<div class="text-center"><img src="../assets/img/loading.gif" alt="loading..." width="10%" /></div>');
          $('#tbl_' + id).css('background','#FF9FA9');
        },
        success: function(data) {
          $('#hasil').hide();
          $('#hasil').html(data);
          $('#hasil').show('slow');
          $('#tbl_' + id).fadeOut('slow');
          }
      });
      return false;
    }
  });
</script>
