<div class="col-sm-2">
  <div class="sidebar-nav">
    <div class="navbar navbar-custom" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <span class="visible-xs navbar-brand"><i class="glyphicon glyphicon-home"></i> Beranda</span>
      </div>
      <div class="navbar-collapse collapse sidebar-navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> BERANDA</a></li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> ORGANISASI, SDM DAN DATIN <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li class="dropdown-submenu">
                <a href="#">Perencanaan</a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="index.php?prov=<?php echo $_GET['prov']; ?>&page=osd-anggaran">Anggaran</a></li>
                    <li><a target="_blank" href="http://www.taufiqoey.com/kinerja">MONEV</a></li>
                  </ul>
              </li>
              <li class="dropdown-submenu">
                <a href="#">SDM</a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="index.php?prov=<?php echo $_GET['prov']; ?>&page=osd-data-pegawai-bawaslu">Data Pegawai Bawaslu</a></li>
                    <li><a href="index.php?prov=<?php echo $_GET['prov']; ?>&page=osd-data-pengawas-pemilu">Data Pengawas Pemilu</a></li>
                  </ul>
              </li>
              <li class="dropdown-submenu">
                <a href="#">Keuangan</a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="index.php?prov=<?php echo $_GET['prov']; ?>&page=osd-realisasi-nphd">Realisasi NPHD</a></li>
                  </ul>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> SOSIALISASI, HUMAS DAN HUBAL <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="index.php?prov=<?php echo $_GET['prov']; ?>&page=shh-sosialisasi">Sosialisasi</a></li>
              <li><a href="index.php?prov=<?php echo $_GET['prov']; ?>&page=shh-humas">HUMAS</a></li>
              <li><a href="index.php?prov=<?php echo $_GET['prov']; ?>&page=shh-hubal">HUBAL</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> HUKUM DAN PENANGANAN PELANGGARAN <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Hukum</a></li>
              <li class="dropdown-submenu">
                <a href="#">Temuan Dan Laporan</a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Laporkan Pelanggaran</a></li>
                  <li><a href="#">Laporan Pelanggaran</a></li>
                </ul>
              </li>
              <li><a href="#">Penyelesaian Sengketa</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> PENGAWASAN<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li class="dropdown-submenu">
                  <a href="#">Pemilu</a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">IKP</a></li>
                    <li><a href="#">Daftar Pemilih</a></li>
                    <li class="dropdown-submenu">
                        <a href="#">Pencalonan</a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Dasar Hukum</a></li>
                          <li><a href="#">Kalender Pengawasan</a></li>
                          <li><a href="#">Alat Kerja Pengawasan</a></li>
                          <li><a href="#">On The Week Report</a></li>
                          <li><a href="#">Jurnal Pengawasan</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Kampanye</a></li>
                    <li><a href="#">Dana Kampanye</a></li>
                    <li><a href="#">Logistic</a></li>
                    <li><a href="#">Peta Pemilihan</a></li>
                    <li><a href="#">Pungut Hitung</a></li>
                    <li><a href="#">Rekap / Penetapan</a></li>
                  </ul>
              </li>
              <li class="dropdown-submenu">
                  <a href="#">Pilkada</a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">IKP</a></li>
                    <li><a href="#">Daftar Pemilih</a></li>
                    <li class="dropdown-submenu">
                        <a href="#">Pencalonan</a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Dasar Hukum</a></li>
                          <li><a href="#">Kalender Pengawasan</a></li>
                          <li><a href="#">Alat Kerja Pengawasan</a></li>
                          <li><a href="#">On The Week Report</a></li>
                          <li><a href="#">Jurnal Pengawasan</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Kampanye</a></li>
                    <li><a href="#">Dana Kampanye</a></li>
                    <li><a href="#">Logistic</a></li>
                    <li><a href="#">Peta Pemilihan</a></li>
                    <li><a href="#">Pungut Hitung</a></li>
                    <li><a href="#">Rekap / Penetapan</a></li>
                  </ul>
              </li>
              <li><a href="#">Penyelesaian Sengketa</a></li>
            </ul>
          </li>

          <!-- <li><a href="index.php?prov=<?php echo $_GET['prov']; ?>&page=sidalu"><span class="glyphicon glyphicon-flag"></span> DAERAH PEMILU</a></li>
          <li><a href="index.php?prov=<?php echo $_GET['prov']; ?>&page=siwaslu"><span class="glyphicon glyphicon-tower"></span> PENGAWAS PEMILU</a></li>
          <li><a href="index.php?prov=<?php echo $_GET['prov']; ?>&page=sipaslon"><span class="glyphicon glyphicon-user"></span> PASANGAN CALON</a></li>
          <li><a href="index.php?prov=<?php echo $_GET['prov']; ?>&page=si-ikp"><span class="glyphicon glyphicon-info-sign"></span> INDEK KERAWANAN PEMILU</a></li> -->
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
