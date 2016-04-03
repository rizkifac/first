<?php
$conn = new mysqli('localhost','root','','u7887468_siwaslu');
if ($conn->connect_error) {
  printf("Gagal Koneksi: %s\n", mysqli_connect_error());
  exit();
}
$salt = "*a21y12u93&&r22i04z92k12i06*q(-_-)p";
$no = 1;
?>
