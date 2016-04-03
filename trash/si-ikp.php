<div class="well well-sm text-center"><h4>Sistem Informasi Indek Kerawanan Pemilu Provinsi <?php echo $d_provinsi['nama']; ?></div>


<form role="form" method="post" action="#" class="form-inline" id="form-kota">
<input type="hidden" value="" name="" />

  <div class="form-group">
	<label for="provinsi"><h4>Provinsi :</h4></label>
  <select name="kprovinsi" id="kprovinsi" class="form-control input-sm">
    	<option value="" class="form-control">Pilih Provinsi</option>
	<?php
		require("assets/include/koneksi.php");
		$prov = "";
		$sql = "SELECT * FROM provinsi ORDER BY nama ASC";
		$res = $conn->query($sql) or die ("Gagal Query".mysql_error());
  		while ($data = $res->fetch_array()) {
    		if ($data['id_prov']== $prov) {
    			$cek = "selected";
    		} else { $cek=""; }
    		echo "<option value='$data[id_prov]' $cek>$data[nama]</option>";
  		}
	?>
    </select>
	</div>

  <div class="form-group">
	   <label for="kota"><h4>Kab / Kota :</h4></label>
     <select name="kota" id="hasil-kota" class="form-control input-sm">
     </select>
	</div>

     <input type="button" value="Grafik" name="submit" class="btn btn-success btn-sm">
     <input type="button" value="Tabel" name="submit" class="btn btn-success btn-sm">
     <div id="tunggu"></div>
</form>

<div id="hasil-report"></div> <!--HASIL DISINI-->

<script type="text/javascript">
<!--

	// KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA
	$('#kprovinsi').change(function(){
		var id_prov = $(this).val();
		$.ajax({
			type: 'POST',
			url: 'ambil_kota.php',
			data: 'id_prov=' + id_prov,
			beforeSend: function() {
				$('#tunggu').html('<img src="assets/img/loading.gif" alt="loading..." width="5%" />');
			},
			success: function(data) {
        $('#tunggu').hide();
        $('#hasil-kota').html(data);
        $('#hasil-kota').show();
				}
		});
	});

	$('#form-kota').submit(function(){
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			beforeSend: function() {
				$('#tunggu').html('<img src="assets/img/loading.gif" alt="loading..." width="5%" />');
			},
			success: function(data) {
				$('#hasil-report').html(data).show('slow');
			}
		});
		return false;
	});
-->
</script>
