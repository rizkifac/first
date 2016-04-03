<?php
if(!isset($_POST['id_kab']) || !isset($_POST['id_prov']) || $_POST['id_kab']=='' || $_POST['id_prov']==''){
  exit("ERROR Q1");
}
  require_once('assets/include/koneksi.php');
  $id_kab  = htmlentities($_POST['id_kab']);
  $id_prov = htmlentities($_POST['id_prov']);

  $q_prov = $conn->query("SELECT nama FROM tbl_provinsi WHERE id_prov='$id_prov'");
  if(mysqli_num_rows($q_prov)==0){
    exit("ERRORR Q2");
  } else {
    if($d_prov = $q_prov->fetch_assoc()){
      $nama_prov = $d_prov['nama'];
    }
  }

  $q_kab = $conn->query("SELECT nama FROM tbl_kabupaten WHERE id_prov='$id_prov' ORDER BY id_kab ASC");
  if(mysqli_num_rows($q_kab)==0){
    exit("ERRORR Q2");
  } else {
    while($d_kab = $q_kab->fetch_array()){
        $nama_kab[]  = $d_kab['nama'];
    }
  }

?>

<ol>
    <li>Surat Suara</li>
    <li>Tinta</li>
    <li>Formulir</li>
    <li>Template</li>
    <li>Hologram</li>
    <li>Segel</li>
    <li>Sampul</li>
    <li>Kotak Dan Bilik Suara</li>
</ol>
