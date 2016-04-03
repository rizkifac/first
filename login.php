<?php
session_start();
require("assets/include/koneksi.php");
if (isset($_POST['login'])){
  $UserName = htmlentities($_POST['username']);
  $Password = htmlentities($_POST['password']).$salt;
  $Password = sha1($Password);
  $qry = $conn->query("SELECT * FROM tbl_user where username='$UserName' AND password='$Password' LIMIT 1") or die (mysql_error());
  $data=$qry->fetch_array();
  if ($UserName==!$data['username'] && $Password==!$data['password'] ) {
    echo "<script>alert('Gagal Masuk, Cek kembali User Name dan Password Anda');</script>";
  }
  elseif ($UserName==$data['username'] && $Password==!$data['password']) {
    echo "<script>alert('Gagal Masuk, Cek kembali User Name dan Password Anda');</script>";
  }
  elseif ($UserName==!$data['username'] && $Password==$data['password']) {
    echo "<script>alert('Gagal Masuk, Cek kembali User Name dan Password Anda');</script>";
  }
  elseif ($UserName==$data['username'] && $Password==$data['password']) {

    $_SESSION['id']       = $data['id'];
    $_SESSION['nama']     = $data['nama'];
    $_SESSION['email']    = $data['email'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['level']    = $data['level'];
    $_SESSION['id_prov']  = $data['id_prov'];
    $_SESSION['id_kab']   = $data['id_kab'];

    if($data['level'] == 1){
      echo "<script>document.location.href='master/index.php';</script>";
    } elseif($data['level'] == 2) {
      echo "<script>document.location.href='adminprov/index.php';</script>";
    } else {
      echo "<script>document.location.href='adminkab/index.php';</script>";
    }
  } else {
    echo "<script>alert('Gagal Masuk, Cek kembali User Name dan Password Anda');</script>";
    exit();
  }
}
?>

<form action="" method="post" id="form-login" class="navbar-form navbar-right" role="form" style="margin-top:20px; display:none;">
  <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input type="text" autofocus required class="form-control" name="username" value="" placeholder="Username" size="10">
  </div>
  <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input type="password" required class="form-control" name="password" value="" placeholder="Password" size="10">
  </div>
  <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>
