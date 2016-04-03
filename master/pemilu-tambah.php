<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <p><i class="fa fa-lock"></i> Tambah Pemilu</p>
      <div id="hasil"></div>
    </div>
    <div class="panel-body">
      <form id="pemilu-tambah" class="form-horizontal" method="POST" action="#">
        <input type="hidden" value="pemilu-tambah" name="respon" />
        <div class="col-sm-6">

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Jenis Pemilihan </label>
            <div class="col-sm-8 col-md-8">
            <select class="form-control" name="jenis" id="jenis" required>
              <option value=""></option>
              <?php
              require("../assets/include/koneksi.php");
              $q_jenis = $conn->query("SELECT id_pemilu_jenis, nama_pemilu_jenis FROM tbl_pemilu_jenis");
              while ($d_jenis = $q_jenis->fetch_assoc()) {
                echo "<option value='$d_jenis[id_pemilu_jenis]'>$d_jenis[nama_pemilu_jenis]</option>";
              }
              ?>
            </select>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Provinsi </label>
            <div class="col-sm-8 col-md-8">
              <select name="provinsi" id="provinsi" class="form-control input-sm" required>
             	<option value=""></option>
             	<?php
             		$prov = "";
             		$myQry = $conn->query("SELECT * FROM tbl_provinsi ORDER BY nama ASC");
             		while ($myData = $myQry->fetch_array()) {
             		if ($myData['id_prov']== $prov) {
             			$cek = "selected";
             		} else { $cek=""; }
             		echo "<option value='$myData[id_prov]' $cek>$myData[nama]</option>";
             		}
             	?>
               </select>
            </div>
          </div><!-- form-group -->

          <div id="form_kabupaten" class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Kabupaten / Kota</label>
            <div id="load_kabupaten"></div>
            <div class="col-sm-8 col-md-8">
              <select name="kabupaten" id="kabupaten" class="form-control input-sm">

              </select>
            </div>
          </div><!-- form-group -->


          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Tahun Pelaksanaan <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8 form-inline">

              <select id="year" class="form-control" name="tahun" required>
                <option value=""></option>
                <option value="2017">2017</option>
              </select>


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

  $('#jenis').change(function(){
    var isi = $(this).val()
    if(isi == '1'){
      $('#form_kabupaten').hide();
      $('#kabupaten').removeClass('required');
    }else{
      $('#form_kabupaten').show();
      $('#kabupaten').addClass('required');
    }
  });


  // FORM KABUPATEN / KOTA
  $('#provinsi').change(function(){
    var id_prov = $(this).val();
    $.ajax({
      type: 'POST',
      url: 'ambil_kota.php',
      data: 'id_prov=' + id_prov,
      beforeSend: function() {
        $('#load_kabupaten').html('<div class="text-center"><img src="../assets/img/loading.gif" alt="loading..." width="10%" /></div>');
      },
      success: function(data) {
        $('#load_kabupaten').hide();
        $('#kabupaten').hide();
        $('#kabupaten').html(data);
        $('#kabupaten').show();
        }
    });
  });

	$('#pemilu-tambah').submit(function(){
		$.ajax({
			type: 'POST',
			url: 'pemilu-proses.php',
			data: $(this).serialize(),
			beforeSend: function() {
				$('#hasil').html('<div class="text-center"><img src="../assets/img/loading.gif" alt="loading..." width="8%" /></div>');
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
