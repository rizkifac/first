<?php
if(isset($_POST['id_prov'])){
  $id_prov = htmlentities($_POST['id_prov']);
} else {
  $id_prov = '-';
}
if(isset($_POST['id_kab'])){
  $id_kab = htmlentities($_POST['id_kab']);
} else {
  $id_kab = '-';
}
?>
<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <p><i class="fa fa-lock"></i> Tambah User</p>
    </div>
    <div class="panel-body">
      <form id="user-tambah" class="form-horizontal" method="POST" action="user-proses.php">
        <div class="col-sm-6">
          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Nama </label>
            <div class="col-sm-8 col-md-8">
            <input type="text" class="form-control" name="nama" value="" title="Nama User" required/>
            <input type="hidden" value="user-tambah" name="respon" />
            <input type="hidden" value="<?php echo $id_prov; ?>" name="id_prov" />
            <input type="hidden" value="<?php echo $id_kab; ?>" name="id_kab" />
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Email </label>
            <div class="col-sm-8 col-md-8">
            <input type="text" class="form-control" name="email" value="" title="Email User" required/>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Level </label>
            <div class="col-sm-8 col-md-8">
            <select class="form-control" name="level">
              <option value="">Pilih Level</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
            </div>
          </div><!-- form-group -->


          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Username </label>
            <div class="col-sm-8 col-md-8">
            <input type="text" class="form-control" name="username" value="" title="Username User" required/>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Password </label>
            <div class="col-sm-8 col-md-8">
            <input type="password" class="form-control" name="password" value="" title="Password User" required/>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Konfirmasi Password </label>
            <div class="col-sm-8 col-md-8">
            <input type="password" class="form-control" name="repassword" value="" title="Ulangi Password Admin" required/>
            </div>
          </div><!-- form-group -->


          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> </label>
            <div class="col-sm-8 col-md-8">
            <button class="btn btn-theme03" type="submit" name="submit" style="float:left;"><i class="fa fa-save"></i> Simpan</button>
            </div>
          </div><!-- form-group -->
        </div><!-- col-sm-6 -->
      </form>
    </div><!-- panel body -->
    <div class="panel-footer"><div id="hasil"></div></div>
  </div> <!-- panel -->
</div> <!-- col md 12 -->


<script type="text/javascript">
<!--

	$('#user-tambah').submit(function(){
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			beforeSend: function() {
				$('#hasil').html('<div class="text-center"><img src="../assets/img/loading.gif" alt="loading..." width="10%" /></div>');
			},
			success: function(data) {
        $('#hasil').hide();
        $('#hasil').html(data).show('slow');
			}
		});
		return false;
	});
-->
</script>
