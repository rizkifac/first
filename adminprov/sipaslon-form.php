<?php
if(!isset($_GET['id']) || $_GET['id']==''){
  exit("ERROR Q1");
}
$id_pemilu = htmlentities($_GET['id']);
?>
<div class="text-center"><h4>FORM INPUT PASANGAN CALON</h4></div>
<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
    </div>
    <div class="panel-body">
      <form id="sipaslon_tambah" class="form-horizontal" method="POST" action="sipaslon-proses.php" enctype="multipart/form-data" name="myForm">
        <input type="hidden" name="id_pemilu" value="<?php echo $id_pemilu;?>">

  <div class="col-sm-12">
					<div class="page-header">Data Umum</div>
          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Nomor Urut Pasangan <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <input type="text" class="form-control" name="nomor_urut" value="" title="Nomor Urut Pasangan" required/>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Provinsi <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <input type="text" class="form-control" name="prov" value="<?php echo $d_prov['nama']; ?>" title="Provinsi" readonly disabled />
            </div>
          </div><!-- form-group -->

          <?php
            require("../assets/include/koneksi.php");
            $qry = $conn->query("SELECT id_kab FROM tbl_pemilu WHERE id_pemilu = '$id_pemilu' ORDER BY tanggal_pemilu DESC");
            while($data=$qry->fetch_assoc()){
              if($data['id_kab']!='0'){
                $q_kab = $conn->query("SELECT * FROM tbl_kabupaten WHERE id_kab = '$data[id_kab]'");
                $d_kab = $q_kab->fetch_array();
          			$nama_kab = $d_kab['nama'];
                ?>
                <div class="form-group form-group-sm">
                  <label class="col-sm-4 col-md-4 control-label"> Kabupaten / Kota <span class="required">*</span></label>
                  <div class="col-sm-8 col-md-8">
                  <input type="text" class="form-control" name="kab" value="<?php echo $d_kab['nama']; ?>" title="Provinsi" readonly disabled />
                  </div>
                </div><!-- form-group -->
                <?php
              }
            }
            $conn->close();
          ?>

  </div>

  <div class="col-sm-6">

          <div class="page-header">Data Calon</div>
					<div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Nama <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <input type="text" class="form-control" name="nama" value="" title="Nama Calon" required/>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Jenis Kelamin <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
							<label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Pria">Pria</label>
							<label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Wanita">Wanita</label>
            </div>
          </div><!-- form-group -->

					<div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Tempat Lahir <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <input type="text" class="form-control" name="tempat_lahir" value="" title="Tempat Lahir Calon" required/>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Tanggal Lahir <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8 form-inline">
              <select id="day" class="form-control" name="day" required>
                <option value=""></option>
                <option value="01">1</option>
                <option value="02">2</option>
                <option value="03">3</option>
                <option value="04">4</option>
                <option value="05">5</option>
                <option value="06">6</option>
                <option value="07">7</option>
                <option value="08">8</option>
                <option value="09">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>

              <select id="month" class="form-control" name="month" required>
                <option value=""></option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>

              <select id="year" class="form-control" name="year" required>
                <option value=""></option>
                <?php
                for($tahun=1920; $tahun <= 2018; $tahun++){
                  echo "<option value='$tahun'>$tahun</option>";
                }
                ?>
              </select>

              <input type="hidden" id="tanggal_lahir" width="50px" />

            </div>
          </div><!-- form-group -->


          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Pekerjaan <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <input type="text" class="form-control" name="pekerjaan" value="" title="Pekerjaan Calon" required/>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Petahana <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <select id="petahana" class="form-control" name="petahana" required title="Petahana Calon">
              <option value="Tidak">Tidak</option>
              <option value="Ya">Ya</option>
            </select>
            </div>
          </div><!-- form-group -->

          <div id="hub_petahana" class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Hub Petahana <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <select class="form-control" name="hub_petahana" title="Petahana Calon">
              <option value="">--Pilih Hubungan--</option>
              <option value="Suami">Suami</option>
              <option value="Istri">Istri</option>
              <option value="Bapak">Bapak</option>
              <option value="Ibu">Ibu</option>
              <option value="Bapak Mertua">Bapak Mertua</option>
              <option value="Ibu Mertua">Ibu Mertua</option>
              <option value="Anak">Anak</option>
              <option value="Menantu">Menantu</option>
              <option value="Paman">Paman</option>
              <option value="Bibi">Bibi</option>
              <option value="Kaka Kandung">Kaka Kandung</option>
              <option value="Ibu Kandung">Ibu Kandung</option>
              <option value="Ipar">Ipar</option>
            </select>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Pengurus Partai <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <select id="pengurus_partai" class="form-control" name="pengurus_partai" required title="Pengurus Partai">
              <option value="Tidak">Tidak</option>
              <option value="Ya">Ya</option>
            </select>
            </div>
          </div><!-- form-group -->

          <div id="jabatan_partai" class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Jabatan Di Partai <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <textarea name="jabatan_partai" class="form-control" title="Jabatan Partai Calon"></textarea>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Pengusung <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <select id="pengusung" class="form-control" name="pengusung" required title="Pengusung">
              <option value="Perorangan">Perorangan</option>
              <option value="Partai">Partai</option>
              <option value="Koalisi">Koalisi</option>
            </select>
            </div>
          </div><!-- form-group -->

          <div id="partai_pengusung" class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Parpol <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
						<select class="form-control" name="pengusung_parpol" title="Parpol" >
							<option value="">-- Pilih Parpol --</option>
							<?php
              require("../assets/include/koneksi.php");
							$q_parpol = "SELECT id_parpol, nama_parpol FROM tbl_parpol ORDER BY nama_parpol ASC";
							$r_parpol = $conn->query($q_parpol) or die ("Gagal Query".mysqli_error());
							while ($d_parpol = $r_parpol->fetch_array()) {
								echo "<option value='$d_parpol[id_parpol]'>$d_parpol[nama_parpol]</option>";
							}
							?>
						</select>
            </div>
          </div><!-- form-group -->

          <div id="koalisi_pengusung" class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Parpol <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
							<?php
							$q_parpol2 = "SELECT id_parpol, nama_parpol FROM tbl_parpol ORDER BY nama_parpol ASC";
							$r_parpol2 = $conn->query($q_parpol2) or die ("Gagal Query".mysqli_error());
							while ($d_parpol2 = $r_parpol2->fetch_array()) {
                ?>
                <div class="checkbox">
                  <label><input type="checkbox" value="<?php echo $d_parpol2['id_parpol']; ?>" name="pengusung_koalisi[]"><?php echo $d_parpol2['nama_parpol']; ?></label>
                </div>
                <?php
							}
							?>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Foto Calon <span class="required">*</span><</label>
            <div class="col-sm-8 col-md-8">
            <input type="file" class="form-control" name="foto" title="Foto Calon" required />
            </div>
          </div><!-- form-group -->

				</div>
				<div class="col-sm-6">

          <div class="page-header">Data Calon Wakil</div>
					<div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Nama <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <input type="text" class="form-control" name="nama_wakil" value="" title="Nama Calon Wakil" required/>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Jenis Kelamin <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
							<label class="radio-inline"><input type="radio" name="jenis_kelamin_wakil" value="Pria">Pria</label>
							<label class="radio-inline"><input type="radio" name="jenis_kelamin_wakil" value="Wanita">Wanita</label>
            </div>
          </div><!-- form-group -->

					<div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Tempat Lahir <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <input type="text" class="form-control" name="tempat_lahir_wakil" value="" title="Tempat Lahir Calon" required/>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Tanggal Lahir <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8 form-inline">
              <select id="day_wakil" class="form-control" name="day_wakil" required>
                <option value=""></option>
                <option value="01">1</option>
                <option value="02">2</option>
                <option value="03">3</option>
                <option value="04">4</option>
                <option value="05">5</option>
                <option value="06">6</option>
                <option value="07">7</option>
                <option value="08">8</option>
                <option value="09">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>

              <select id="month_wakil" class="form-control" name="month_wakil" required>
                <option value=""></option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>

              <select id="year_wakil" class="form-control" name="year_wakil" required>
                <option value=""></option>
                <?php
                for($tahun=1920; $tahun <= 2018; $tahun++){
                  echo "<option value='$tahun'>$tahun</option>";
                }
                ?>
              </select>

              <input type="hidden" id="tanggal_lahir_wakil" width="50px" />

            </div>
          </div><!-- form-group -->


          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Pekerjaan <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <input type="text" class="form-control" name="pekerjaan_wakil" value="" title="Pekerjaan Calon Wakil" required />
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Petahana <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <select id="petahana_wakil" class="form-control" name="petahana_wakil" required title="Petahana Calon Wakil">
              <option value="Tidak">Tidak</option>
              <option value="Ya">Ya</option>
            </select>
            </div>
          </div><!-- form-group -->

          <div id="hub_petahana_wakil" class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Hub Petahana <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <select class="form-control" name="hub_petahana_wakil" title="Hubungan Petahana Calon Wakil">
              <option value="">--Pilih Hubungan--</option>
              <option value="Suami">Suami</option>
              <option value="Istri">Istri</option>
              <option value="Bapak">Bapak</option>
              <option value="Ibu">Ibu</option>
              <option value="Bapak Mertua">Bapak Mertua</option>
              <option value="Ibu Mertua">Ibu Mertua</option>
              <option value="Anak">Anak</option>
              <option value="Menantu">Menantu</option>
              <option value="Paman">Paman</option>
              <option value="Bibi">Bibi</option>
              <option value="Kaka Kandung">Kaka Kandung</option>
              <option value="Ibu Kandung">Ibu Kandung</option>
              <option value="Ipar">Ipar</option>
            </select>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Pengurus Partai <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <select id="pengurus_partai_wakil" class="form-control" name="pengurus_partai_wakil" required title="Pengurus Partai Calon Wakil">
              <option value="Tidak">Tidak</option>
              <option value="Ya">Ya</option>
            </select>
            </div>
          </div><!-- form-group -->

          <div id="jabatan_partai_wakil" class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Jabatan Di Partai <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <textarea name="jabatan_partai_wakil" class="form-control" title="Jabatan Calon Wakil"></textarea>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Pengusung <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
            <select id="pengusung_wakil" class="form-control" name="pengusung_wakil" required title="Pengusung">
              <option value="Perorangan">Perorangan</option>
              <option value="Partai">Partai</option>
              <option value="Koalisi">Koalisi</option>
            </select>
            </div>
          </div><!-- form-group -->

          <div id="partai_pengusung_wakil" class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Parpol <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
						<select class="form-control" name="pengusung_parpol_wakil" title="Parpol" >
							<option value="">-- Pilih Parpol --</option>
							<?php
							$q_parpol = "SELECT id_parpol, nama_parpol FROM tbl_parpol ORDER BY nama_parpol ASC";
							$r_parpol = $conn->query($q_parpol) or die ("Gagal Query".mysqli_error());
							while ($d_parpol = $r_parpol->fetch_array()) {
								echo "<option value='$d_parpol[id_parpol]'>$d_parpol[nama_parpol]</option>";
							}
							?>
						</select>
            </div>
          </div><!-- form-group -->

          <div id="koalisi_pengusung_wakil" class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Parpol <span class="required">*</span></label>
            <div class="col-sm-8 col-md-8">
							<?php
							$q_parpol2 = "SELECT id_parpol, nama_parpol FROM tbl_parpol ORDER BY nama_parpol ASC";
							$r_parpol2 = $conn->query($q_parpol2) or die ("Gagal Query".mysqli_error());
							while ($d_parpol2 = $r_parpol2->fetch_array()) {
                ?>
                <div class="checkbox">
                  <label><input type="checkbox" value="<?php echo $d_parpol2['id_parpol']; ?>" name="pengusung_koalisi_wakil[]"><?php echo $d_parpol2['nama_parpol']; ?></label>
                </div>
                <?php
							}
              $conn->close();
							?>
            </div>
          </div><!-- form-group -->

          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> Foto Wakil <span class="required">*</span><</label>
            <div class="col-sm-8 col-md-8">
            <input type="file" class="form-control" name="foto_wakil" title="Foto Calon Wakil" required />
            </div>
          </div><!-- form-group -->

    </div>
    <div class="col-sm-12">

          <!-- <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"></label>
            <div class="col-sm-8 col-md-8">
              <div class="g-recaptcha" data-sitekey="6LfjaRsTAAAAAOkQ7dxtyhBEEpDKBLFLa8L1k2_Q"></div>
            </div>
          </div> -->


          <div class="form-group form-group-sm">
            <label class="col-sm-4 col-md-4 control-label"> </label>
            <div class="col-sm-8 col-md-8">
            <button class="btn btn-default" type="submit" id="submit" name="submit_sipaslon"><i class="glyphicon glyphicon-save"></i> Simpan</button>
						<button class="btn btn-default" type="reset" id="reset" name="reset"><i class="glyphicon glyphicon-remove"></i> Reset</button>
            </div>
          </div>

					</form>

					<br>
					<div id="hasil"/></div> <!--Hasil Inputan Keluar Disini-->

        </div><!-- col-sm-6 -->
    </div><!-- panel body -->
  </div> <!-- panel -->
</div> <!-- col md 12 -->


<script type="text/javascript">
  // Atribut Calon
  $('#hub_petahana').hide();
  $('#jabatan_partai').hide();
  $('#partai_pengusung').hide();
  $('#koalisi_pengusung').hide();

  $('#petahana').change(function(){
    var isi = $(this).val()
    if(isi == 'Ya'){
      $('#hub_petahana').show();
    }else{
      $('#hub_petahana').hide();
    }
  });
  $('#pengurus_partai').change(function(){
    var isi = $(this).val()
    if(isi == 'Ya'){
      $('#jabatan_partai').show();
    }else{
      $('#jabatan_partai').hide();
    }
  });
  $('#pengusung').change(function(){
    var isi = $(this).val()
    if(isi == 'Partai'){
      $('#partai_pengusung').show();
      $('#koalisi_pengusung').hide();
    }else if(isi == 'Koalisi'){
      $('#partai_pengusung').hide();
      $('#koalisi_pengusung').show();
    }else {
      $('#partai_pengusung').hide();
      $('#koalisi_pengusung').hide();
    }
  });
  $('#tanggal_lahir').datepicker({
          buttonImage: '../assets/img/calendar.png',
          buttonImageOnly: true,
          showOn: 'button',
      onSelect: function(dateText, inst) {
          var pieces = dateText.split('/');
          $('#day').val(pieces[1]);
          $('#month').val(pieces[0]);
          $('#year').val(pieces[2]);
      }
  })

  // Atribut Wakil
  $('#hub_petahana_wakil').hide();
  $('#jabatan_partai_wakil').hide();
  $('#partai_pengusung_wakil').hide();
  $('#koalisi_pengusung_wakil').hide();

  $('#petahana_wakil').change(function(){
    var isi = $(this).val()
    if(isi == 'Ya'){
      $('#hub_petahana_wakil').show();
    }else{
      $('#hub_petahana_wakil').hide();
    }
  });
  $('#pengurus_partai_wakil').change(function(){
    var isi = $(this).val()
    if(isi == 'Ya'){
      $('#jabatan_partai_wakil').show();
    }else{
      $('#jabatan_partai_wakil').hide();
    }
  });
  $('#pengusung_wakil').change(function(){
    var isi = $(this).val()
    if(isi == 'Partai'){
      $('#partai_pengusung_wakil').show();
      $('#koalisi_pengusung_wakil').hide();
    }else if(isi == 'Koalisi'){
      $('#partai_pengusung_wakil').hide();
      $('#koalisi_pengusung_wakil').show();
    }else {
      $('#partai_pengusung_wakil').hide();
      $('#koalisi_pengusung_wakil').hide();
    }
  });
  $('#tanggal_lahir_wakil').datepicker({
          buttonImage: '../assets/img/calendar.png',
          buttonImageOnly: true,
          showOn: 'button',
      onSelect: function(dateText, inst) {
          var pieces = dateText.split('/');
          $('#day_wakil').val(pieces[1]);
          $('#month_wakil').val(pieces[0]);
          $('#year_wakil').val(pieces[2]);
      }
  })

  $("#sipaslon_tambah").submit(function(){
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: formData,
        async: false,
        beforeSend: function() {
          $('#hasil').html('<div class="text-center"><img src="../assets/img/loading.GIF" alt="loading..." width="10%" /></div>');
        },
        success: function(data) {
          $('#hasil').hide();
          $('#hasil').html(data).show('slow');
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
});
</script>
