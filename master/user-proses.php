<?php
session_start();
include"../assets/include/koneksi.php";
$respon = htmlentities($_POST['respon']);

switch ($respon){

	case"user-tambah";
		$nama = htmlentities($_POST['nama']);
		$email = htmlentities($_POST['email']);
		$level = htmlentities($_POST['level']);
		$username = htmlentities($_POST['username']);
		$password = htmlentities($_POST['password']);
		$repassword = htmlentities($_POST['repassword']);
    $id_prov = htmlentities($_POST['id_prov']);
    $id_kab = htmlentities($_POST['id_kab']);


		if(empty($nama) || empty($level) || empty($username) || empty($password) || empty($repassword) || empty($id_prov) || empty($id_kab)){
			echo "<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>UPS!</strong> JANGAN ADA DATA YANG KOSONG.
				</div>";
        exit();
		} elseif ($password != $repassword) {
			echo "<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>UPS!</strong> Konfirmasi Password Tidak Sesuai.
				</div>";
        exit();
		} else {
			$password = $_POST['password'].$salt;
		  $password = sha1($password);
			$q_user_tambah = $conn->query("INSERT INTO tbl_user VALUES('','$nama','$email','$username','$password','$level','$id_prov','$id_kab',NOW(),'')");
			if($q_user_tambah){
				echo "<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>SUCCESS !</strong> Data Berhasil Disimpan.
					</div>";
			} else {
				echo "<div class='alert alert-danger'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>ERROR!</strong> Data Gagal Disimpan.
					</div>";
			}
		}
	break;

	case"user-hapus";
	 $id = htmlentities($_POST['id']);
	 $q_user_hapus = $conn->query("DELETE FROM tbl_user WHERE id='$id'");
	 if($q_user_hapus){
		 echo "<div class='alert alert-success'>
			 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			 <strong>SUCCESS !</strong> Data Berhasil Dihapus.
			 </div>";
	 } else {
		 echo "<div class='alert alert-danger'>
			 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			 <strong>ERROR!</strong> Data Gagal Dihapus.
			 </div>";
	 }
	break;

// case"profil-edit";
// 		$nama = $_POST['nama'];
// 		$email = $_POST['email'];
// 		$username = $_POST['username'];
// 		$level = $_POST['level'];
// 		$password_baru = $_POST['password_baru'];
// 		$repassword = $_POST['repassword'];
// 		$password_lama = $_POST['password_lama'].$salt;
// 		$password_lama = sha1($password_lama);
//
//
// 		if(empty($nama) || empty($username) || empty($level) || empty($password_lama) || empty($password_baru) || empty($repassword)){
// 			echo "<div class='alert alert-warning'>
// 				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
// 				<strong>UPS!</strong> JANGAN ADA DATA YANG KOSONG.
// 				</div>";
// 		} else {
//
// 		$password_baru = $_POST['password_baru'].$salt;
// 		$password_baru = sha1($password_baru);
// 		$repassword = $_POST['repassword'].$salt;
// 		$repassword = sha1($repassword);
//
// 		$q_profil_lihat = $conn->query("SELECT * FROM tbl_users WHERE id='$_SESSION[id]' AND password='$password_lama' LIMIT 1");
// 		if (mysqli_num_rows($q_profil_lihat) == 1){
// 			if($password_baru<>$repassword){
// 				echo "<div class='alert alert-warning'>
// 					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
// 					<strong>Ups !!</strong> PASSWORD BARU TIDAK SAMA.
// 					</div>";
// 			} else {
// 				$q_profil = $conn->query("UPDATE tbl_users SET
// 															nama='$nama',
// 															username='$username',
// 															email='$email',
// 															password='$password_baru'
// 															WHERE
// 															id='$_SESSION[id]'");
// 					if($q_profil){
// 						echo "<div class='alert alert-success'>
// 							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
// 							<strong>BERHASIL !!!</strong> DATA ANDA BERHASIL DI UPDATE.
// 							</div>";
// 					} else {
// 						echo "<div class='alert alert-danger'>
// 							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
// 							<strong>ERROR !!!</strong> TERJADI KESALAHAN PADA SISTEM, MOHON ULANGI KEMBALI.
// 							</div>";
// 					}
// 			}
// 		} else {
// 			echo "<div class='alert alert-warning'>
// 				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
// 				<strong>UPS !!</strong> PASSWORD LAMA YANG ANDA MASUKAN SALAH, MOHON COBA KEMBALI.
// 				</div>";
// 		}
//
// 		}
// break;


}
?>
