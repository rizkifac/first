<div class="well well-sm text-center"><h4>Laporan Pelanggaran</h4></div>

<button type="button" id="b-tgl" class="btn btn-primary btn-sm">Berdasarkan Tanggal</button>
<button type="button" id="b-prov" class="btn btn-primary btn-sm">Berdasarkan Provinsi</button>
<button type="button" id="b-kota" class="btn btn-primary btn-sm">Berdasarkan Kab / Kota</button>


<div class="row" style="padding:10px; margin:5px;">

<div id="div-tgl" class="form-report">
<form role="form" method="post" action="" class="form-inline" id="form-tgl">
  <input type="hidden" value="report-tgl" name="respon" />

      <div class="form-group">
      <input type="text" name="tanggal-awal" id="tanggal-awal-tgl" class="form-control input-sm" placeholder="Tanggal Awal" required />
        <script>
          $('#tanggal-awal-tgl').datepicker({
          dateFormat: "yy-mm-dd",
            'autoclose': true
          });
        </script>
  	  </div>
      <div class="form-group">
      <input type="text" name="tanggal-akhir" id="tanggal-akhir-tgl" class="form-control input-sm" placeholder="Tanggal Akhir" required />
        <script>
          $('#tanggal-akhir-tgl').datepicker({
          dateFormat: "yy-mm-dd",
            'autoclose': true
          });
        </script>
  	</div>
       <input type="submit" value="Grafik" name="submit" class="btn btn-success btn-sm">
       <input type="button" value="Tabel" name="tabel-tgl" id="tabel-tgl" class="btn btn-success btn-sm">
</form>
</div>


<div id="div-prov" class="form-report">
<form role="form" method="post" action="" class="form-inline" id="form-prov">
  <input type="hidden" value="report-provinsi" name="respon" />
  <div class="form-group">
	<label for="provinsi"><h4>Provinsi :</h4></label>
    <select name="provinsi" id="provinsi" class="form-control input-sm" required>
    	<option value="">Pilih Provinsi</option>
    	<?php
    		include "assets/include/koneksi.php";
    		$prov     = "";
    		$resprov  = $conn->query("SELECT * FROM tbl_provinsi ORDER BY nama ASC");
    		while ($dataprov = $resprov->fetch_array()) {
    		if($dataprov['id_prov']==$prov) {
    			$cek = "selected";
    		} else { $cek=""; }
    		echo "<option value='$dataprov[id_prov]' $cek>$dataprov[nama]</option>";
    		}
    	?>
    </select>
	</div>

  <div class="form-group">
  <input type="text" name="tanggal-awal" id="tanggal-awal" class="form-control input-sm" placeholder="Tanggal Awal" required />
    <script>
      $('#tanggal-awal').datepicker({
          dateFormat: "yy-mm-dd",
          'autoclose': true
      });
    </script>
	</div>

  <div class="form-group">
  <input type="text" name="tanggal-akhir" id="tanggal-akhir" class="form-control input-sm" placeholder="Tanggal Akhir" required />
    <script>
      $('#tanggal-akhir').datepicker({
        dateFormat: "yy-mm-dd",
        'autoclose': true
      });
    </script>
	</div>
     <input type="submit" value="Grafik" name="submit" class="btn btn-success btn-sm">
     <input type="button" value="Tabel" name="tabel-prov" id="tabel-prov" class="btn btn-success btn-sm">
</form>
</div>

<div id="div-kota" class="form-report">
<form role="form" method="post" action="" class="form-inline" id="form-kota">
  <input type="hidden" value="report-kota" name="respon" />
  <div class="form-group">
	   <label for="provinsi"><h4>Provinsi :</h4></label>
     <select name="kprovinsi" id="kprovinsi" class="form-control input-sm" required>
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

  <div class="form-group">
	   <label for="kota"><h4>Kab / Kota :</h4></label>
     <select name="kota" id="kota" class="form-control input-sm" required>

     </select>
	</div>

  <div class="form-group">
    <input type="text" name="tanggal-awal" id="tanggal-awal-kota" class="form-control input-sm" placeholder="Tanggal Awal" required />
      <script>
        $('#tanggal-awal-kota').datepicker({
          dateFormat: "yy-mm-dd",
          'autoclose': true
        });
      </script>
	</div>

  <div class="form-group">
    <input type="text" name="tanggal-akhir" id="tanggal-akhir-kota" class="form-control input-sm" placeholder="Tanggal Akhir" required />
      <script>
        $('#tanggal-akhir-kota').datepicker({
          dateFormat: "yy-mm-dd",
          'autoclose': true
        });
    </script>
	</div>

  <input type="submit" value="Grafik" name="submit" class="btn btn-success btn-sm">
</form>
</div>


<div id="hasil"></div>


<script type="text/javascript">
<!--
	$('.form-report').hide();

	$('#b-prov').click(function(){
		$('.form-report').hide();
		$('#div-prov').show('slow');
	});
	$('#b-kota').click(function(){
		$('.form-report').hide();
		$('#div-kota').show('slow');
	});
	$('#b-tgl').click(function(){
		$('.form-report').hide();
		$('#div-tgl').show('slow');
	});

  // GORM TANGGAL
	$('#form-tgl').submit(function(){
		$.ajax({
			type: 'POST',
			url: 'lap-pelanggaran-grafik.php',
			data: $(this).serialize(),
			beforeSend: function() {
				$('#hasil').html('<div class="text-center"><img src="assets/img/loading.gif" alt="loading..." width="20%" /></div>');
			},
			success: function(data) {
				$('#hasil').html(data).show('slow');
			}
		});
		return false;
	});
	$('#tabel-tgl').click(function(){
		var tanggal_awal = document.getElementById('tanggal-awal-tgl').value;
		var tanggal_akhir = document.getElementById('tanggal-akhir-tgl').value;
		var semua = 'tanggal-awal=' + tanggal_awal + '&tanggal-akhir=' + tanggal_akhir + '&respon=report-tabel-tgl';
		$.ajax({
			type: 'POST',
			url: 'lap-pelanggaran-tabel.php',
			data: semua,
			beforeSend: function() {
				$('#hasil').html('<div class="text-center"><img src="assets/img/loading.gif" alt="loading..." width="20%" /></div>');
			},
			success: function(data) {
				$('#hasil').html(data).show('slow');
			}
		});
		return false;
	});

  // FORM PROVINSI
	$('#form-prov').submit(function(){
		$.ajax({
			type: 'POST',
			url: 'lap-pelanggaran-grafik.php',
			data: $(this).serialize(),
			beforeSend: function() {
				$('#hasil').html('<div class="text-center"><img src="assets/img/loading.gif" alt="loading..." width="20%" /></div>');
			},
			success: function(data) {
				$('#hasil').html(data).show('slow');
			}
		});
		return false;
	});
	$('#tabel-prov').click(function(){
		var tanggal_awal = document.getElementById('tanggal-awal').value;
		var tanggal_akhir = document.getElementById('tanggal-akhir').value;
		var id_prov = document.getElementById('provinsi').value;
		var semua = 'tanggal-awal=' + tanggal_awal + '&tanggal-akhir=' + tanggal_akhir + '&respon=report-tabel-prov' + '&id_prov=' + id_prov;
		$.ajax({
			type: 'POST',
			url: 'lap-pelanggaran-tabel.php',
			data: semua,
			beforeSend: function() {
				$('#hasil').html('<div class="text-center"><img src="assets/img/loading.gif" alt="loading..." width="20%" /></div>');
			},
			success: function(data) {
				$('#hasil').html(data).show('slow');
			}
		});
		return false;
	});

	// FORM KABUPATEN / KOTA
	$('#kprovinsi').change(function(){
		var id_prov = $(this).val();
		$.ajax({
			type: 'POST',
			url: 'ambil_kota.php',
			data: 'id_prov=' + id_prov,
			beforeSend: function() {
				$('#tunggu').fadeIn();
				$('#kota').hide();
			},
			success: function(data) {
				$('#tunggu').hide();
				$('#kota').html(data);
				$('#kota').show();
				}
		});
	});

	$('#form-kota').submit(function(){
		$.ajax({
			type: 'POST',
			url: 'lap-pelanggaran-grafik.php',
			data: $(this).serialize(),
			beforeSend: function() {
				$('#hasil').html('<div class="text-center"><img src="assets/img/loading.gif" alt="loading..." width="20%" /></div>');
			},
			success: function(data) {
				$('#hasil').html(data).show('slow');
			}
		});
		return false;
	});
-->
</script>
