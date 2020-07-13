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
  <title>Tempat Strategis</title>
  <script src="http://maps.googleapis.com/maps/api/js"></script>
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
          <a class="nav-item nav-link" href="masalah.php">Masalah dan Potensi SDM</a>
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
          <a class="nav-item nav-link active nav-aktif" href="tempat_strategis.php">Tempat Strategis</a>
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
      <div class="menu rounded-lg">
        <h4 class="tulisan-menu">Tempat Strategis</h4>
      </div>
      <br>
      <h5>Daftar Tempat Strategis</h5>
      <br>
      <div class="row isi-tempat">
        <!-- Isi ditampilkan lewat tempat_strategis.js -->
     </div>

     <br>

     <!-- Menampilkan google maps lokasi penting -->
    <!-- <script>
      function initialize()
      {
        var propertiPeta = {
            center:new google.maps.LatLng(-7.796764,110.369156), //latitude dan longitude center google maps 
            zoom:14,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          };
          var peta = new google.maps.Map(document.getElementById("tempatpenting"), propertiPeta);

          // membuat Marker
          var marker=new google.maps.Marker(
          {
            
            position: new google.maps.LatLng(-7.7930153553774195,110.36601237231787), //latitude dan longitude ambil data dari web service
            map: peta,
            animation: google.maps.Animation.BOUNCE
          });
        }
    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
  </script> -->
  <center>
    <div id="tempatpenting" style="width:580px;height:400px;"></div>
  </center>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="assets/tempat_strategis.js"></script>
</body>
</html>