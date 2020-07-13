<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="shortcut icon" href="pemkot.png"/>
  <title>Masalah dan Potensi SDM</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light border border-dark">
    <div class="container">
      <div class="row">
        <div class="col-3">
          <a class="navbar-brand" href="#">
            <img src="pemkot.png" width="40" height="50" class="d-inline-block align-top" alt="">
          </a>    
        </div>
        <div class="col-9">
          <p class="judul-navbar"> Kelurahan <br>Yogyakarta</p>
        </div>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="gambaranumum.php">Gambaran Umum<span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link active nav-aktif" href="masalah.php">Masalah dan Potensi SDM</a>
          <a class="nav-item nav-link" href="lembaga.php">Lembaga</a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sarana dan Prasarana
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="potensi_sarpras.php">Potensi Prasarana dan Sarana</a>
              <a class="dropdown-item" href="kesehatan_sarpras.php">Kesehatan</a>
              <a class="dropdown-item" href="pendidikan_sarpras.php">Pendidikan</a>
              <a class="dropdown-item" href="hiburan_sarpras.php">Hiburan dan Wisata</a>
              <a class="dropdown-item" href="kebersihan_sarpras.php">Kebersihan</a>
            </div>
          </li>
          <a class="nav-item nav-link" href="tempat_strategis.php">Tempat Strategis</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="tulisan-bergerak">
    <script type="text/javascript">
      function jam() {
        var time = new Date(),
        hours = time.getHours(),
        minutes = time.getMinutes(),
        seconds = time.getSeconds();
        document.querySelectorAll('.jam')[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);

        function harold(standIn) {
          if (standIn < 10) {
            standIn = '0' + standIn
          }
          return standIn;
        }
      }
      setInterval(jam, 1000);
    </script>
    <?php
    $tanggal = mktime(date('m'), date("d"), date('Y'));
    date_default_timezone_set("Asia/Jakarta");
    function tglIndonesia($str){
     $tr   = trim($str);
     $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
     return $str;
   }
   ?>

   <div class="container">
    <div class="row">
      <div class="col-4">
        <b> <?php echo tglIndonesia(date('D, d F Y')); ?> </b>/<b>  <span class="jam">/</span> WIB</b>
      </div>
      <div class="col-8">
        <marquee> Sawiji Ing Greget Raharjo Awit Karep : Satu Dalam Tekad dan Semangat, Sukses Sejahtera Karena Kemauan ♦ ♦ Jam Pelayanan Senin - Kamis Pukul 08:00 - 15:00 WIB , Jumat Pukul 08:00 - 11:30 WIB dan 13:00 - 14:00 WIB ♦</marquee>   
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-9">

      <!-- Menu Masalah yang Ditemukan -->
      <div class="menu rounded-lg">
        <h4 class="tulisan-menu">Masalah yang Ditemukan</h4>
      </div>
      <br>
      <div class="row isi">
        <div class="col">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" style="text-align: center;">Jenis</th>
                <th scope="col" style="text-align: center;">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Lansia (Jiwa)</th>
              </tr>
              <tr>
                <th scope="row">Difabel (Jiwa)</th>
              </tr>
              <tr>
                <th scope="row">Kronis (Jiwa)</th>
              </tr>
              <tr>
                <th scope="row">Tidak Bersekolah Lagi Usia 7-18 Thn (Jiwa)</th>
              </tr>
              <tr>
                <th scope="row">Penduduk Berpendapatan Rp 300.000,- Usia 15-60 Thn (Jiwa)</th>
              </tr>
              <tr>
                <th scope="row">Rumah Tidak Layak Huni</th>
              </tr>
            </tbody>           
          </table>
          <br>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" style="text-align: center;">Jenis</th>
                <th scope="col" style="text-align: center;">Jumlah</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <th scope="row">Sumber Air Minum Kurang Sehat (KK)</th>
              </tr>
              <tr>
                <th scope="row">Penerangan Utama Listrik Non-PLN (KK)</th>
              </tr>
              <tr>
                <th scope="row">Penerangan Utama Bukan Listrik (KK)</th>
              </tr>

            </tbody>           
          </table>
          <br>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" style="text-align: center;">Jenis</th>
                <th scope="col" style="text-align: center;">Jumlah</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <th scope="row">Energi Utama Untuk Memasak Bukan Listrik/GAS (KK)</th>
              </tr>
              <tr>
                <th scope="row">Energi Utama Untuk Memasak GAS 3 KG (KK)</th>
              </tr>
              <tr>
                <th scope="row">Jaban Tidak Aman (KK)</th>
              </tr>
              <tr>
                <th scope="row">Peserta Program KKS/KPS (Jiwa)</th>
              </tr>
              <tr>
                <th scope="row">Peserta Program KIP/BSM (Jiwa)</th>
              </tr>
              <tr>
                <th scope="row">Peserta Program KIS/BPJS Kesehatan (Jiwa)</th>
              </tr>
              <tr>
                <th scope="row">Peserta BPJS Kesehatan Peserta Mandiri (Jiwa)</th>
              </tr>
              <tr>
                <th scope="row">Peserta Program BPJS Ketenagakerjaan (Jiwa)</th>
              </tr>
              <tr>
                <th scope="row">Peserta Program Pemilik Kartu Asuransi Lainnya (Jiwa)</th>
              </tr>
              <tr>
                <th scope="row">Peserta Program PKH (Jiwa)</th>
              </tr>
              <tr>
                <th scope="row">Peserta Program Raskin/BPNT (Jiwa)</th>
              </tr>
              <tr>
                <th scope="row">Peserta Program KUR (Jiwa)</th>
              </tr>
            </tbody>           
          </table>
          <br>
        </div>
      </div>

      <!-- Menu Potensi Sumber Daya Manusia -->
      <div class="menu rounded-lg">
        <h4 class="tulisan-menu">Potensi Sumber Daya Manusia</h4>
      </div> 
      <div class="row isi">
        <div class="col">
          <div class="justify-content-center text-center chart-menu mt-3">
            <a href="#" class="btn btn-sm btn-info mr-1 mb-2">Jenis Kelamin</a>
            <a href="#" class="btn btn-sm btn-info mr-1 mb-2">Kelompok Umur</a>
            <a href="#" class="btn btn-sm btn-info mr-1 mb-2">Pendidikan</a>
            <a href="#" class="btn btn-sm btn-info mr-1 mb-2">Pekerjaan</a>
            <a href="#" class="btn btn-sm btn-info mr-1 mb-2">Tenaga Kerja</a>
          </div>
        </div>
      </div>
      <br>

      <div class="row mt-3" id="data-jenis-kelamin">
        <!-- Data ditampilkan lewat jquery -->
      </div>

      <div class="row" id="data-kepala-keluarga">
        <!-- Data kepala keluraga ditampilkan lewat jquery -->
      </div>

      <div class="row mt-3" id="data-kelompok-umur">
        <div class="col">
          <h5 class="text-center">Data Kelompok Umur</h5>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" style="text-align: center;">Kategori</th>
                <th scope="col" style="text-align: center;">Laki-laki</th>
                <th scope="col" style="text-align: center;">Perempuan</th>
                <th scope="col" style="text-align: center;">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">0-4 Tahun</th>
              </tr>
              <tr>
                <th scope="row">5-9 Tahun</th>
              </tr>
              <tr>
                <th scope="row">10-14 Tahun</th>
              </tr>
              <tr>
                <th scope="row">15-19 Tahun</th>
              </tr>
              <tr>
                <th scope="row">20-24 Tahun</th>
              </tr>
              <tr>
                <th scope="row">25-29 Tahun</th>
              </tr>
              <tr>
                <th scope="row">30-34 Tahun</th>
              </tr>
              <tr>
                <th scope="row">35-39 Tahun</th>
              </tr>
              <tr>
                <th scope="row">40-44 Tahun</th>
              </tr>
              <tr>
                <th scope="row">45-49 Tahun</th>
              </tr>
              <tr>
                <th scope="row">50-54 Tahun</th>
              </tr>
              <tr>
                <th scope="row">55-59 Tahun</th>
              </tr>
              <tr>
                <th scope="row">60-64 Tahun</th>
              </tr>
              <tr>
                <th scope="row">65-69 Tahun</th>
              </tr>
              <tr>
                <th scope="row">70-74 Tahun</th>
              </tr>
              <tr>
                <th scope="row">75-79 Tahun</th>
              </tr>
              <tr>
                <th scope="row">80 Tahun Keatas</th>
              </tr>
            </tbody>           
          </table>
        </div>
      </div>

      <div class="row mt-3" id="data-pendidikan">
        <!-- Data pendidikan ditampilkan lewat jQuery -->
      </div>      

      <div class="row mt-3" id="data-pekerjaan">
        <!-- Data Pekerjaan ditampilkan lewat jQuery -->
        
      </div>      

      <div class="row mt-3" id="data-tenaga-kerja">
        <dic class="col">
          <h5 class="text-center">Data Tenaga Kerja</h5>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" style="text-align: center;">Usia</th>
                <th scope="col" style="text-align: center;">Jumlah</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <th scope="row">0-14 Tahun (Belum Produktif)</th>
              </tr>
              <tr>
                <th scope="row">15-64 Tahun (Produktif)</th>
              </tr>
              <tr>
                <th scope="row">64 Tahun Keatas (Tidak Produktif)</th>
              </tr>
            </tbody>           
          </table>
        </dic>
      </div>
    </div>

    <div class="col">
      <div class="bilah border border-dark rounded-lg">

        <div class="menu-samping rounded-lg">
          <h6 class="tulisan-samping">Recent Post</h6>
        </div>
        <div class="isi-samping border border-dark rounded-lg">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> 
        </div>

        <div class="menu-samping rounded-lg">
          <h6 class="tulisan-samping">Jadwal Terdekat</h6>
        </div>
        <div class="isi-samping border border-dark rounded-lg">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> 
        </div>

        <div class="menu-samping rounded-lg">
          <h6 class="tulisan-samping">Sosial Media</h6>
        </div>
        <div class="isi-samping border border-dark rounded-lg">
          <center>
            <a href="#"><img src="instagram.png" width="150px"></a>
            <p>@xxxx</p>
          </center> 
        </div>         
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<div class="footer">
  <center>
    <p style="font-weight: bold;">Kelurahan Cokrodiningratan Kecamatan Jetis © 2018 ~ 2020 Pemerintah Kota Yogyakarta</p>
    <p>Kelurahan Cokrodiningratan Jt.2/129 Kecamatan Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233 Telp. (0274) 517609 Fax. (0274) 517609 Email : cokrodiningratan@jogjakota.go.id</p>
  </center>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document).ready(function()
  {
    // Membuat variabel untuk menampung jumlah
    let jml_laki = 0;
    let jml_perem = 0;
    let jml_kep_kel = 0;
    let total_jenis_kelamin = 0;

    // Membuat variabel untuk menampung jumlah brdasarkan pendidikan
    let jml_blm_sekolah = 0;
    let jml_blm_tamat_sd = 0;
    let jml_sd = 0;
    let jml_smp = 0;
    let jml_sma = 0;
    let jml_diploma1 = 0;
    let jml_akademi = 0;
    let jml_s1 = 0;
    let jml_s2 = 0;
    let jml_s3 = 0;

    // Membuat variabel untuk menampung jumlah berdasarkan pekerjaan
    let jml_mrumahtangga = 0;
    let jml_pelajar = 0;
    let jml_pensiun = 0;
    let jml_belum_bekerja = 0;
    let jml_tni = 0;
    let jml_polri = 0;
    let jml_pns = 0;
    let jml_buruh = 0;
    let jml_petani = 0;
    let jml_bumn = 0;
    let jml_swasta = 0;
    let jml_wiraswasta = 0;
    let jml_tenaga_medis = 0;
    let jml_pekerjaan_lain = 0;

    var form = new FormData();
    form.append("no_prop", "34");
    form.append("no_kab", "71");
    form.append("no_kec", "13");
    form.append("no_kel", "1007");
    form.append("no_rw", "013");

    var settings = {
      "url": "https://datawarehouse.jogjakota.go.id/index.php/capilrt?no_prop=34&no_kab=71&no_kec=13&no_kel=1007&no_rw=013",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "multipart/form-data; boundary=--------------------------880804722055367583969919"
      },
      "processData": false,
      "mimeType": "multipart/form-data",
      "contentType": false,
      "data": form
    };

    $.ajax(settings).done(function (response)
    {
      // Membuat filter data berdasarkan kepala keluarga, laki laki, perempuan
      const kepala_keluarga = this.filter(k => k.st_hbkel === "KEPALA KELUARGA");
      const laki_laki = this.filter(l => l.jk === "LAKI-LAKI");
      const perempuan = this.filter(p => p.jk === "PEREMPUAN");

      // Membuat filter data untuk pendidikan
      const blm_sekolah = this.filter(b => b.pendidikan === "TIDAK/BLM SEKOLAH");
      const blm_tamat_sd = this.filter(b => b.pendidikan === "BELUM TAMAT SD/SEDERAJAT");
      const tamat_sd = this.filter(t => t.pendidikan === "TAMAT SD/SEDERAJAT");
      const smp = this.filter(s => s.pendidikan === "SLTP/SEDERAJAT");
      const sma = this.filter(s => s.pendidikan === "SLTA/SEDERAJAT");
      const diploma1 = this.filter(d => d.pendidikan === "DIPLOMA I/II");
      const akademi = this.filter(a => a.pendidikan === "AKADEMI/DIPLOMA III/SARJANA MUDA");
      const s1 = this.filter(s => s.pendidikan === "DIPLOMA IV/STRATA I");
      const s2 = this.filter(s => s.pendidikan === "STRATA-II");
      const s3 = this.filter(s => s.pendidikan === "STRATA-III");

      //Membuat filter data berdasarkan pekerjaan
      const mengurus_rumah_tangga = this.filter(m => m.pekerjaan === "MENGURUS RUMAH TANGGA");
      const pelajar = this.filter(p => p.pekerjaan === "PELAJAR/MAHASISWA");
      const pensiun = this.filter(p => p.pekerjaan === "PENSIUNAN");
      const belum_bekerja = this.filter(b => b.pekerjaan === "BELUM/TIDAK BEKERJA");
      const tni = this.filter(t => t.pekerjaan === "TENTARA NASIONAL INDONESIA (TNI)");
      const polri = this.filter(p => p.pekerjaan === "KEPOLISIAN RI (POLRI)");
      const pns = this.filter(p => p.pekerjaan === "PEGAWAI NEGERI SIPIL (PNS)");
      const buruh = this.filter(b => b.pekerjaan === "BURUH HARIAN LEPAS" && b.pekerjaan === "BURUH TANI/PERKEBUNAN");
      const petani = this.filter(p => p.pekerjaan === "PETANI/PEKEBUN");
      const bumn = this.filter(b => b.pekerjaan === "KARYAWAN BUMN" && b.pekerjaan === "KARYAWAN BUMD");
      const swasta = this.filter(s => s.pekerjaan === "KARYAWAN SWASTA");
      const wiraswasta = this.filter(w => w.pekerjaan === "WIRASWASTA");
      const tenaga_medis = this.filter(t => t.pekerjaan === "DOKTER");

      // Perulangan untuk menghitung jumlah kepala keluarga
      $.each(kepala_keluarga, function(i, kpl)
      {
        jml_kep_kel = i+1;
      });

      // Perulangan untuk menghitung jumlah laki-laki
      $.each(laki_laki, function(i, lk)
      {
        jml_laki = i+1;
      });

      // Perulangan untuk menghitung jumlah perempuan
      $.each(perempuan, function(i, pr)
      {
        jml_perem = i+1;
      });

      // Perulangan untuk menghitung jumlah belum sekolah
      $.each(blm_sekolah, function(i, b)
      {
        jml_blm_sekolah = i+1;
      });

      // Perulangan untuk menghitung jumlah belum tamat SD
      $.each(blm_tamat_sd, function(i, b)
      {
        jml_blm_tamat_sd = i+1;
      });

      // Perulangan untuk menghitung jumlah tamat SD
      $.each(tamat_sd, function(i, t)
        {
          jml_sd = i+1;
        });

      // Perulangan untuk menghitung jumlah SMP
      $.each(smp, function(i, s)
        {
          jml_smp = i+1;
        });

      // Perulangan untuk menghitung jumlah SMA
      $.each(sma, function(i, s)
      {
        jml_sma = i+1;
      });

      // Perulangan untuk menghitung jumlah Diploma 1
      $.each(diploma1, function(i, d)
      {
        jml_diploma1 = i+1;
      });

      // Perulangan untuk menghitung jumlah akademi
      $.each(akademi, function(i, a)
      {
        jml_akademi = i+1;
      });

      // Perulangan untuk menghitung jumlah S1
      $.each(s1, function(i, s)
        {
          jml_s1 = i+1;
        });

      // Perulangan untuk menghitung jumlah S2
      $.each(s2, function(i, s)
        {
          jml_s2 = i+1;
        });

      // Perulangan untuk menghitung jumlah S3
      $.each(s3, function(i, s)
        {
          jml_s3 = i+1;
        });

      // Perulangan untuk menghitung jumlah Mengurus rumah tangga
      $.each(mengurus_rumah_tangga, function(i, m)
        {
          jml_mrumahtangga = i+1;
        });

      // Perulangan untuk menghitung jumlah pelajar
      $.each(pelajar, function(i, p)
        {
          jml_pelajar = i+1;
        });

      // Perulangan untuk menghitung jumlah pensiun
      $.each(pensiun, function(i, p)
        {
          jml_pensiun = i+1;
        });

      // Perulangan untuk menghitung jumlah belum Bekerja
      $.each(belum_bekerja, function(i, b)
        {
          jml_belum_bekerja = i+1;
        });

      // Perulangan untuk menghitung jumlah TNI
      $.each(tni, function(i, t)
        {
          jml_tni = i+1;
        });

      // Perulangan untuk menghitung jumlah POLRI
      $.each(polri, function(i, p)
        {
          jml_polri = i+1;
        });

      // Perulangan untuk menghitung jumlah PNS
      $.each(pns, function(i, p)
        {
          jml_pns = i+1;
        });

      // Perulangan untuk menghitung jumlah Buruh
      $.each(buruh, function(i, b)
        {
          jml_buruh = i+1;
        });

      // Perulangan untuk menghitung jumlah Petani
      $.each(petani, function(i, p)
        {
          jml_petani = i+1;
        });

      // Perulangan untuk menghitung jumlah Karyawan BUMN BUMD
      $.each(bumn, function(i, b)
        {
          jml_bumn = i+1;
        });

      // Perulangan untuk menghitung jumlah karyawan Swasta
      $.each(swasta, function(i, s)
        {
          jml_swasta = i+1;
        });

      // Perulangan untuk menghitung jumlah Wiraswasta
      $.each(wiraswasta, function(i, w)
        {
          jml_wiraswasta = i+1;
        });

      // Perulangan untuk menghitung jumlah tenaga medis
      $.each(tenaga_medis, function(i, t)
        {
          jml_tenaga_medis = i+1;
        });

      // Menghitung jumlah total berdasarkan jenis kelamin
      total_jenis_kelamin = jml_laki + jml_perem;

      // Tampilkan pada div dengan id=data-jenis-kelamin
      $('$data-jenis-kelamin').html(`
        <div class="col">
          <h5 class="text-center">Data Jenis Kelamin</h5>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" style="text-align: center;">Jenis Kelamin</th>
                <th scope="col" style="text-align: center;">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Laki-laki</th>
                <td class="text-right"><h6>`+ jml_laki +`</h6></td>
              </tr>
              <tr>
                <th scope="row">Perempuan</th>
                <td class="text-right"><h6>`+ jml_perem +`</h6></td>
              </tr>
              <tr>
                <th scope="row">Total</th>
                <td class="text-right"><h6>`+ total_jenis_kelamin +`</h6></td>
              </tr>
            </tbody>           
          </table>    
        </div>
        `);

      // Tampilkan data kepala keluarga pada div id=data-kepala-keluarga
      $('#data-kepala-keluarga').html(`
        <div class="col">
          <h6>Jumlah Kepala Keluarga : `+ jml_kep_kel +`</h6>
        </div>
        `);

      // Tampilkan data pendidikan pada div id=data-pendidikan
      $('#data-pendidikan').html(`
        <div class="col">
          <h5 class="text-center">Data Pendidikan</h5>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" style="text-align: center;">Pendidikan</th>
                <th scope="col" style="text-align: center;">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Tidak Sekolah</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_blm_sekolah +`</td>
              </tr>
              <tr>
                <th scope="row">Belum Tamat SD/MI</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_blm_tamat_sd +`</td>
              </tr>
              <tr>
                <th scope="row">Tamat SD/MI</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_sd +`</td>
              </tr>
              <tr>
                <th scope="row">SMP/MTs</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_smp +`</td>
              </tr>
              <tr>
                <th scope="row">SMA/SMK/MA</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_sma +`</td>
              </tr>
              <tr>
                <th scope="row">Diploma I/II</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_diploma1 +`</td>
              </tr>
              <tr>
                <th scope="row">Akademi/Dplm III/S.Mud</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_akademi +`</td>
              </tr>
              <tr>
                <th scope="row">Diploma IV/Strata I </th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_s1 +`</td>
              </tr>
              <tr>
                <th scope="row">Strata II</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_s2 +`</td>
              </tr>
              <tr>
                <th scope="row">Strata III</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_s3 +`</td>
              </tr>
            </tbody>           
          </table>
        </div>
        `);

      // Tampilkan data Pekerjaan pada div id=data-pekerjaan
      $('#data-pekerjaan').html(`
        <div class="col">
          <h5 class="text-center">Data Pekerjaan</h5>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" style="text-align: center;">Pekerjaan</th>
                <th scope="col" style="text-align: center;">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Mengurus Rumah Tangga</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_mrumahtangga +`</td>
              </tr>
              <tr>
                <th scope="row">Pelajar/Mahasiswa</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_pelajar +`</td>
              </tr>
              <tr>
                <th scope="row">Pensiun</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_pensiun +`</td>
              </tr>
              <tr>
                <th scope="row">Belum Bekerja</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_belum_bekerja +`</td>
              </tr>
              <tr>
                <th scope="row">TNI</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_tni +`</td>
              </tr>
              <tr>
                <th scope="row">POLRI</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_polri +`</td>
              </tr>
              <tr>
                <th scope="row">Pegawai Negeri Sipil (PNS)</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_pns +`</td>
              </tr>
              <tr>
                <th scope="row">Buruh/Tukang Berkeahlian Khusus</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_buruh +`</td>
              </tr>
              <tr>
                <th scope="row">Sektor Pertanian/Peternakan/Perikanan</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_buruh +`</td>
              </tr>
              <tr>
                <th scope="row">Karyawan BUMN/BUMD</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_bumn +`</td>
              </tr>
              <tr>
                <th scope="row">Karyawan Swasta</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_swasta +`</td>
              </tr>
              <tr>
                <th scope="row">Wiraswasta</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_wiraswasta +`</td>
              </tr>
              <tr>
                <th scope="row">Tenaga Medis</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_tenaga_medis +`</td>
              </tr>
              <tr>
                <th scope="row">Pekerjaan Lain</th>
                <td class="text-right text-center" style="font-weight: bold;">`+ jml_pekerjaan_lain +`</td>
              </tr>
            </tbody>           
          </table>
        </div>
        `);
    });
  });
</script>
</body>
</html>
