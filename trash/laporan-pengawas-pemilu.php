<div class="well well-sm text-center"><h4>Laporan Pengawas Pemilu</h4></div>
<?php echo $_SERVER['PATH_INFO']; ?>
<form role="form" method="post" action="contoh.php" class="form-inline" id="lap_panwas">
<table>
  <tr>
    <td><label for="provinsi"><h4>Provinsi</h4></label></td>
    <td>: <select name="provinsi" id="provinsi" class="form-control input-sm">
      <option value="">-- Pilih Provinsi --</option>
        <?php
          include "assets/include/koneksi.php";
          $prov = "";
          $mySql = "SELECT * FROM provinsi ORDER BY nama ASC";
          $myQry = $conn->query($mySql) or die ("Gagal Query".mysql_error());
          while ($myData = $myQry->fetch_array()) {
          if ($myData['id_prov']== $prov) {
            $cek = "selected";
          } else { $cek=""; }
          echo "<option value='$myData[id_prov]' $cek>$myData[nama]</option>";
          }
        ?>
      </select>
    </td>
  </tr>
  <tr>
    <td><label for="kota"><h4>Pilih Kab / Kota</h4></label></td>
    <td>: <select name="kota" id="kota" class="form-control input-sm">
        <option value=""></option>
        </select>
    </td>
  </tr>
  <tr>
    <td><label for="kecamatan"><h4>Pilih Kecamatan</h4></label></td>
    <td>: <select name="kecamatan" id="kec" class="form-control input-sm">
      <option value=""></option>
      </select>
    </td>
  </tr>
  <tr>
    <td><label for="kota"><h4>Pilih Kelurahan</h4></label></td>
    <td>: <select name="kelurahan" id="kel" class="form-control input-sm">
        </select>
      </td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" value="Grafik" name="submit" class="btn btn-success btn-sm"></td>
  </tr>
</table>
</form>


<div id="hasil_report"></div> <!--HASIL DISINI-->


<script type="text/javascript">
<!--

$('#lap_panwas').submit(function(){
  $.ajax({
    type: 'POST',
    url: $(this).attr('action'),
    data: $(this).serialize(),
    beforeSend: function() {
      $('#hasil_report').html('<div class="text-center"><img src="assets/img/loading.gif" alt="loading..." width="20%" /></div>');
    },
    success: function(data) {
      $('#hasil_report').html(data).show('slow');
    }
  });
  return false;
});

	// KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA KAB/KOTA
	$('#provinsi').change(function(){
		var id_prov = $(this).val();
		$.ajax({
			type: 'POST',
			url: 'ambil_kota.php',
			data: 'id_prov=' + id_prov,
			beforeSend: function() {
				$('#tunggu').fadeIn();
			},
			success: function(data) {
				$('#tunggu').hide();
				$('#kota').html(data);
				$('#kota').show();
				}
		});
	});

  $('#kota').change(function(){
    var id_kab = $(this).val();
    $.ajax({
      type: 'POST',
      url: 'ambil_kecamatan.php',
      data: 'id_kab=' + id_kab,
      beforeSend: function() {
        $('#tunggu').fadeIn();
      },
      success: function(data) {
        $('#tunggu').hide();
        $('#kec').html(data);
        $('#kec').show();
        }
    });
  });

  $('#kec').change(function(){
    var id_kec = $(this).val();
    $.ajax({
      type: 'POST',
      url: 'ambil_kelurahan.php',
      data: 'id_kec=' + id_kec,
      beforeSend: function() {
        $('#tunggu').fadeIn();
      },
      success: function(data) {
        $('#tunggu').hide();
        $('#kel').html(data);
        $('#kel').show();
        }
    });
  });
-->
</script>
