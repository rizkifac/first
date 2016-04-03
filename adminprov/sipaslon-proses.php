<?php

// if (isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response']){
//
// $secret   = "6LfjaRsTAAAAALN8oZI2rW7ZgHDRRnf3P-19Aixx";
// $ip       = $_SERVER['REMOTE_ADDR'];
// $captcha  = $_POST['g-recaptcha-response'];
// $resp     = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
// $arr      = json_decode($resp,TRUE);
//   if($arr['success']){

if(isset($_POST['nomor_urut'])){

include"../assets/include/koneksi.php";

$ok = 1;
$nomor_urut             = htmlentities($_POST['nomor_urut']);
$id_pemilu              = htmlentities($_POST['id_pemilu']);

// POST CALON
$nama                   = htmlentities($_POST['nama']);
$jenis_kelamin          = htmlentities($_POST['jenis_kelamin']);
$tempat_lahir           = htmlentities($_POST['tempat_lahir']);
$day                    = htmlentities($_POST['day']);
$month                  = htmlentities($_POST['month']);
$year                   = htmlentities($_POST['year']);
$pekerjaan              = htmlentities($_POST['pekerjaan']);
$petahana               = htmlentities($_POST['petahana']);
$pengurus_partai        = htmlentities($_POST['pengurus_partai']);
$pengusung              = htmlentities($_POST['pengusung']);


// POST WAKIL
$nama_wakil             = htmlentities($_POST['nama_wakil']);
$jenis_kelamin_wakil    = htmlentities($_POST['jenis_kelamin_wakil']);
$tempat_lahir_wakil     = htmlentities($_POST['tempat_lahir_wakil']);
$day_wakil              = htmlentities($_POST['day_wakil']);
$month_wakil            = htmlentities($_POST['month_wakil']);
$year_wakil             = htmlentities($_POST['year_wakil']);
$pekerjaan_wakil        = htmlentities($_POST['pekerjaan_wakil']);
$petahana_wakil         = htmlentities($_POST['petahana_wakil']);
$pengurus_partai_wakil  = htmlentities($_POST['pengurus_partai_wakil']);
$pengusung_wakil        = htmlentities($_POST['pengusung_wakil']);


if (empty($nomor_urut) ||
    empty($id_pemilu) ||

    empty($nama) ||
    empty($jenis_kelamin) ||
    empty($pekerjaan) ||
    empty($petahana) ||
    empty($pengurus_partai) ||
    empty($pengusung) ||
    empty($tempat_lahir) ||
    empty($day) ||
    empty($month) ||
    empty($year) ||

    empty($nama_wakil) ||
    empty($jenis_kelamin_wakil) ||
    empty($pekerjaan_wakil) ||
    empty($petahana_wakil) ||
    empty($pengurus_partai_wakil) ||
    empty($tempat_lahir_wakil) ||
    empty($day_wakil) ||
    empty($month_wakil) ||
    empty($year_wakil) ||
    empty($pengusung_wakil))
{
  $ok = 0;
  echo "<div class='alert alert-danger'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>ERROR !</strong> Mohon Lengkapi Data Yang Dibutuhkan.
    </div>";
    exit();
} else {

  // HANDLING PILIHAN TINGKAT UNTUK CALON
  if($petahana=='Ya'){
    $hub_petahana    = htmlentities($_POST['hub_petahana']);
    if($hub_petahana==''){
        $ok = 0;
        exit("<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>ERROR !</strong> Hubungan Petahana Mohon Diisi.
        </div>");
    }
  }else{
    $hub_petahana     = '-';
  }
  // if petahana

  if($pengurus_partai=='Ya'){
    $jabatan_partai   = htmlentities($_POST['jabatan_partai']);
    if($jabatan_partai==""){
        $ok = 0;
        exit("<div class='alert alert-danger'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>ERROR !</strong> Jabatan Partai Calon Mohon Diisi.
          </div>");
    }
  }else{
    $jabatan_partai     = '-';
  } // if pengurus Partai

  if($pengusung=='Perorangan'){
    $parpol      = '-';
  }elseif($pengusung=='Partai'){
    $parpol     = htmlentities($_POST['pengusung_parpol']);
  }else{
    if(isset($_POST['pengusung_koalisi'])==''){
        $ok = 0;
        exit("<div class='alert alert-danger'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>ERROR !</strong> Mohon Pengusung Partai Dari Calon Diisi.
          </div>");
    } else{
      $parpol     = $_POST['pengusung_koalisi'];
      $array = array();
      foreach ($parpol as $value) {
        $array[] = (int) $value;
      }
      $parpol = implode(',', $array);
    }
  }
  if($parpol==''){
      $ok = 0;
      exit("<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>ERROR !</strong> Mohon Pengusung Partai Dari Calon Diisi.
        </div>");
  }

  // HANDLING PILIHAN TINGKAT UNTUK WAKIL
  if($petahana_wakil=='Ya'){
    $hub_petahana_wakil     = htmlentities($_POST['hub_petahana_wakil']);
    if($hub_petahana_wakil==''){
        $ok = 0;
        exit("<div class='alert alert-danger'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>ERROR !</strong> Hubungan Petahana Wakil Mohon Diisi.
          </div>");
    }
  }else{ $hub_petahana_wakil     = '-'; }


  if($pengurus_partai_wakil=='Ya'){
    $jabatan_partai_wakil   = htmlentities($_POST['jabatan_partai_wakil']);
    if($jabatan_partai_wakil==''){
        $ok = 0;
        exit("<div class='alert alert-danger'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>ERROR !</strong> Jabatan Partai Wakil Mohon Diisi.
          </div>");
    }
  }else{ $jabatan_partai_wakil     = '-'; }

  if($pengusung_wakil=='Perorangan'){
    $parpol_wakil      = '-';
  }elseif($pengusung_wakil=='Partai'){
    $parpol_wakil     = htmlentities($_POST['pengusung_parpol_wakil']);
  }else{
    if(isset($_POST['pengusung_koalisi_wakil'])==''){
        $ok = 0;
        exit("<div class='alert alert-danger'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>ERROR !</strong> Mohon Pengusung Koalisi Partai Dari Calon Wakil Diisi.
          </div>");
    } else{
      $parpol_wakil     = $_POST['pengusung_koalisi_wakil'];
    }
  }
  if($parpol_wakil==''){
      $ok = 0;
      exit("<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>ERROR !</strong> Mohon Pengusung Partai Dari Calon Wakil Diisi.
        </div>");
  }




  // $tmp_foto              = $_FILES['foto']['tmp_name'];
  // $foto                  = $_FILES['foto']['name'];
  // $tmp_foto_wakil        = $_FILES['foto_wakil']['tmp_name'];
  // $foto_wakil            = $_FILES['foto_wakil']['name'];

  $target_dir = "../img_sipaslon/";
  $target_calon = $target_dir . basename($_FILES["foto"]["name"]);
  $target_wakil = $target_dir . basename($_FILES["foto_wakil"]["name"]);
  $imageFileTypeCalon = pathinfo($target_calon,PATHINFO_EXTENSION);
  $imageFileTypeWakil = pathinfo($target_wakil,PATHINFO_EXTENSION);

  $pict_calon           = basename($_FILES["foto"]["name"]);
  $pict_wakil           = basename($_FILES["foto_wakil"]["name"]);

  // Check apakah ini benar foto atau palsu Gambar 1
  if(isset($_POST["nomor_urut"])) {
      $check = getimagesize($_FILES["foto"]["tmp_name"]);
      if($check === false) {
        $ok = 0;
        exit("<div class='alert alert-danger'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>ERROR !</strong> Foto Calon Bermasalah.
          </div>");
      }
  }
  // Gambar 2
  if(isset($_POST["nomor_urut"])) {
      $check = getimagesize($_FILES["foto_wakil"]["tmp_name"]);
      if($check === false) {
        $ok = 0;
        exit("<div class='alert alert-danger'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>ERROR !</strong> Foto Calon Wakil Bermasalah.
          </div>");
      }
  }

  // Check jika foto sudah ada Gambar 1
  if (file_exists($target_calon)) {
      $ok = 0;
      exit("<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>ERROR !</strong> Maaf, Foto Calon Sudah Ada, Ganti Foto Calon Atau Ganti Nama Foto Calon Dan Silakan Ulangi Kembali.
        </div>");
  }
  // Gambar 2
  if (file_exists($target_wakil)) {
      $ok = 0;
      exit("<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>ERROR !</strong> Maaf, Foto Wakil Sudah Ada, Ganti Foto Wakil Atau Ganti Nama Foto Wakil Dan Silakan Ulangi Kembali..
        </div>");
  }
  // Check ukuran foto Gambar 1
  if ($_FILES["foto"]["size"] > 4000000) {
      $ok = 0;
      exit("<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>ERROR !</strong> Maaf Ukuran Foto Calon Terlalu Besar.
        </div>");
  }
  // Gambar 2
  if ($_FILES["foto_wakil"]["size"] > 4000000) {
      $ok = 0;
      exit("<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>ERROR !</strong> Maaf Ukuran Foto Calon Wakil Terlalu Besar.
        </div>");
  }
  // mengikuti format foto / gambar
  if($imageFileTypeCalon != "jpg" && $imageFileTypeCalon != "png" && $imageFileTypeCalon != "jpeg" && $imageFileTypeCalon != "gif" && $imageFileTypeWakil != "jpg" && $imageFileTypeWakil != "png" && $imageFileTypeWakil != "jpeg" && $imageFileTypeWakil != "gif" ) {
      $ok = 0;
      exit("<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>ERROR !</strong> Maaf, Hanya JPG, JPEG, PNG & GIF Yang Boleh Di Upload..
        </div>");
  }
  // Check jika tida ada error
  if ($ok == 0) {
    exit("<div class='alert alert-danger'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>ERROR !</strong> Terjadi Kesalahan ..
      </div>");
  // jika tidak ada error
  } else {
      if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_calon) && move_uploaded_file($_FILES["foto_wakil"]["tmp_name"], $target_wakil)) {
        $tanggal_lahir          = $tempat_lahir ." ". $day ." ".$month ." ". $year;
        $tanggal_lahir_wakil    = $tempat_lahir_wakil ." ". $day_wakil ." ".$month_wakil ." ". $year_wakil;
        $q_calon = "INSERT INTO tbl_calon VALUES ('','$nama','$tanggal_lahir','$jenis_kelamin','$pekerjaan','$petahana','$hub_petahana','$pengurus_partai','$jabatan_partai','$pengusung','$parpol','$pict_calon',NOW(),'')";
        $q_wakil = "INSERT INTO tbl_calon VALUES ('','$nama_wakil','$tanggal_lahir_wakil','$jenis_kelamin_wakil','$pekerjaan_wakil','$petahana_wakil','$hub_petahana_wakil','$pengurus_partai_wakil','$jabatan_partai_wakil','$pengusung_wakil','$parpol_wakil','$pict_wakil',NOW(),'')";
        $q_simpan_calon = $conn->query($q_calon);
        $id_calon = $conn->insert_id;
        $q_simpan_wakil = $conn->query($q_wakil);
        $id_wakil = $conn->insert_id;
        $q_pasangan = $conn->query("INSERT INTO tbl_pasangan VALUES ('','$id_pemilu','$nomor_urut','$id_calon','$id_wakil')");
        if($q_simpan_calon && $q_simpan_wakil && $q_pasangan){
          echo "<div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>SUCCESS !</strong> Data Berhasil Disimpan ..
            </div>";
        } else {
          echo "<div class='alert alert-danger'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>ERROR !</strong> TERJADI KESALAHAN SAAT PROSES PENYIMPANAN ..
            </div>";
        }
      } else {
          echo "TERJADI ERROR SAAT UPLOAD.";
      }
  }


} // value kosong


$conn->close();
} // SUBMIT


// } else {
//   echo "<div class='alert alert-danger'>
//     <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
//     <strong>ERROR !</strong> Spam.
//     </div>";
// }
//
// } else {
//   echo "<script language='javascript'>document.location.href='index.php'</script>";
// }

?>
