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

  $q_pemilu = $conn->query("SELECT id_pemilu FROM tbl_pemilu WHERE id_kab = '$id_kab' LIMIT 1");
  if(mysqli_num_rows($q_pemilu)<=0){
    exit("BELUM ADA PASANGAN CALON");
  }
  $d_pemilu = $q_pemilu->fetch_assoc();

  $q_sipaslon = $conn->query("SELECT * FROM tbl_pasangan WHERE id_pemilu='$d_pemilu[id_pemilu]' ORDER BY nomor_urut ASC");
  if (mysqli_num_rows($q_sipaslon)==0) {
    echo "BELUM ADA DATA";
    exit();
  } else {
  ?>

  <div class="table-responsive">
  <table class="table table-striped" style="width:100%;">

  <?php
  while ($d_sipaslon = $q_sipaslon->fetch_assoc()) {
    $q_calon = $conn->query("SELECT * FROM tbl_calon WHERE id_calon='$d_sipaslon[id_ketua]'");
    $d_calon = $q_calon->fetch_assoc();
    $q_wakil = $conn->query("SELECT * FROM tbl_calon WHERE id_calon='$d_sipaslon[id_wakil]'");
    $d_wakil = $q_wakil->fetch_assoc();
  ?>

      <tr>
        <td>
          <small class="text-center text-success">No Urut</small> <br>
          <div class="btn">
            <h3><?php echo $d_sipaslon['nomor_urut']; ?></h3>
          </div>
        </td>
          <td width="15%"><img class="img-responsive" src="img_sipaslon/<?php echo $d_calon['pict']; ?>" style="width:120px;" /></td>
          <td>
              <table style="font-size:12px;">
                  <tr>
                      <td>Calon</td>
                      <td>:&nbsp</td>
                      <td>Ketua</td>
                  </tr>
                  <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td><?php echo $d_calon['nama']; ?></td>
                  </tr>
                  <tr>
                      <td>TTL</td>
                      <td>:</td>
                      <td><?php echo $d_calon['ttl']; ?></td>
                  </tr>
                  <tr>
                      <td>Jenis Kelamin</td>
                      <td>:</td>
                      <td><?php echo $d_calon['jenis_kelamin']; ?></td>
                  </tr>
                  <tr>
                      <td>Pekerjaan</td>
                      <td>:</td>
                      <td><?php echo $d_calon['pekerjaan']; ?></td>
                  </tr>
                  <tr>
                      <td>Petahana</td>
                      <td>:</td>
                      <td><?php echo $d_calon['petahana']; ?></td>
                  </tr>
                  <tr>
                      <td>Hubungan Petahana</td>
                      <td>:</td>
                      <td><?php echo $d_calon['hub_petahana']; ?></td>
                  </tr>
                  <tr>
                      <td>Pengurus Partai</td>
                      <td>:</td>
                      <td><?php echo $d_calon['pengurus_partai']; ?></td>
                  </tr>
                  <tr>
                      <td>Jabatan Partai</td>
                      <td>:</td>
                      <td><?php echo $d_calon['jabatan_partai']; ?></td>
                  </tr>
                  <tr>
                      <td>Pengusung</td>
                      <td>:</td>
                      <td><?php echo $d_calon['pengusung']; ?></td>
                  </tr>
                  <tr>
                      <td>Partai</td>
                      <td>:</td>
                      <td><?php echo $d_calon['parpol']; ?></td>
                  </tr>
              </table>
          </td>
          <td  width="15%"><img class="img-responsive" src="img_sipaslon/<?php echo $d_wakil['pict']; ?>" style="width:120px;" /></td>
          <td>
            <table style="font-size:12px;">
                <tr>
                    <td>Calon</td>
                    <td>:&nbsp</td>
                    <td>Wakil</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $d_wakil['nama']; ?></td>
                </tr>
                <tr>
                    <td>TTL</td>
                    <td>:</td>
                    <td><?php echo $d_wakil['ttl']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?php echo $d_wakil['jenis_kelamin']; ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?php echo $d_wakil['pekerjaan']; ?></td>
                </tr>
                <tr>
                    <td>Petahana</td>
                    <td>:</td>
                    <td><?php echo $d_wakil['petahana']; ?></td>
                </tr>
                <tr>
                    <td>Hubungan Petahana</td>
                    <td>:</td>
                    <td><?php echo $d_wakil['hub_petahana']; ?></td>
                </tr>
                <tr>
                    <td>Pengurus Partai</td>
                    <td>:</td>
                    <td><?php echo $d_wakil['pengurus_partai']; ?></td>
                </tr>
                <tr>
                    <td>Jabatan Partai</td>
                    <td>:</td>
                    <td><?php echo $d_wakil['jabatan_partai']; ?></td>
                </tr>
                <tr>
                    <td>Pengusung</td>
                    <td>:</td>
                    <td><?php echo $d_wakil['pengusung']; ?></td>
                </tr>
                <tr>
                    <td>Partai</td>
                    <td>:</td>
                    <td><?php echo $d_wakil['parpol']; ?></td>
                </tr>
            </table>
            </td>
      </tr>

  <?php
      } //LOOP
  } // jika ADA
  ?>

  </table>
  </div>
