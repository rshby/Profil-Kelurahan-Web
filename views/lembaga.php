<div class="col-lg-8 <?=$order?> feature_area">
    <h2 class="section-title text-letter-spacing-sm my-0 text-dark colour-primary text-uppercase d-flex bd-highlight">
        <div class="flex-grow-1 bd-highlight"><?=$listTitle?></div>
    </h2>
    <hr class="mt-2" />
    <a onclick="window.history.back()" class="bd-highlight d-flex justify-content-end"><u><i class="fa fa-chevron-left"></i> Kembali</u></a>

    <div class="navbar">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('profil/web_kelurahan');?>">Gambaran Umum</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('profil/web_kelurahan/masalah');?>">Masalah dan Potensi SDM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?=base_url('profil/web_kelurahan/lembaga');?>">Lembaga</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sarana dan Prasarana</a>
            <div class="dropdown-menu">
             <a class="dropdown-item" href="<?=base_url('profil/web_kelurahan/potensi_sarpras');?>">Potensi Sarana dan Prasarana</a>
             <a class="dropdown-item" href="<?=base_url('profil/web_kelurahan/kesehatan_sarpras');?>">Kesehatan</a>
             <a class="dropdown-item" href="<?=base_url('profil/web_kelurahan/pendidikan_sarpras');?>">Pendidikan</a>
             <a class="dropdown-item" href="#">Hiburan dan Wisata</a>
             <a class="dropdown-item" href="<?=base_url('profil/web_kelurahan/kebersihan_sarpras');?>">Kebersihan</a>
            </div>
           </li>
           <li class="nav-item">
            <a class="nav-link" href="<?=base_url('profil/web_kelurahan/tempat_strategis');?>">Tempat Strategis</a>
          </li>
        </ul>
    </div>

    <!-- Menu Lembaga Pendidikan -->
    <div id="menu-lembaga-pendidikan">
        <div class="row">
            <div class="col rounded-lg" style="
            background-color: #4B7447;
            padding-left: 15px;
            box-shadow: 6px 6px 4px grey;
            margin-top: 15px;">
                <h4 class="tulisan-menu" style="
                font-size: 16pt;
                color: white;
                padding: 8px;
                font-weight: bold;
                ">Lembaga Pendidikan</h4> 
            </div>
        </div>
        <div class="row isi-lembaga-pendidikan mt-3">
            <div class="col">
               <h5 style="color: black; font-weight: bold;">Pendidikan Formal</h5>
                <table class="table table-bordered">
                 <thead>
                  <tr>
                   <th scope="col" style="text-align: center;">Jenis</th>
                   <th scope="col" style="text-align: center;">Jumlah</th>
                   <th scope="col" style="text-align: center;">Jumlah Tenaga Pengajar</th>
                   <th scope="col" style="text-align: center;">Jumlah Siswa</th>
                 </tr>
                </thead>
                <tbody>
                 <tr>
                   <th scope="row" style="text-align: center;">Taman Kanak-Kanak</th>
                 </tr>
                 <tr>
                   <th scope="row" style="text-align: center;">Sekolah Dasar</th>
                 </tr>
                 <tr>
                   <th scope="row" style="text-align: center;">Sekolah Menengah Pertama</th>
                 </tr>
                 <tr>
                   <th scope="row" style="text-align: center;">Sekolah Menengah Atas</th>
                 </tr>
                 <tr>
                   <th scope="row" style="text-align: center;">Perguruan Tinggi</th>
                 </tr>
                </tbody>           
             </table> 
            </div>
        </div>
    </div>

    <!-- Menu Lembaga Keagamaan -->
    <div id="menu-lembaga-keagamaan" class="mt-3">
        <div class="row">
            <div class="col rounded-lg" style="
            background-color: #4B7447;
            padding-left: 15px;
            box-shadow: 6px 6px 4px grey;
            margin-top: 15px;">
                <h4 class="tulisan-menu" style="
                font-size: 16pt;
                color: white;
                padding: 8px;
                font-weight: bold;
                ">Lembaga Keagamaan</h4> 
            </div>
        </div>
        <div class="row isi-lembaga-keagamaan mt-3">
            <!-- Isi ditampilkan lewat jQuery -->
        </div>
    </div>

    <!-- Chart Grafik -->
    <div id="chart-lembaga-keagamaan" class="mt-3">
        <div class="row judul-chart" style="margin-top: 40px;">
            <!-- Judul ditampilkan lewat jQuery -->
        </div>
        <div class="row isi-chart">
            <div class="col" style="width: 500px; height: 400px;">
                <canvas id="chart-keagamaan"></canvas>    
            </div>
        </div>
    </div>

    <!-- Menu Lembaga Kemananan Masyarakat -->
    <div id="menu-lembaga-keamanan" class="mt-3">
        <div class="row">
            <div class="col rounded-lg" style="
            background-color: #4B7447;
            padding-left: 15px;
            box-shadow: 6px 6px 4px grey;
            margin-top: 15px;">
                <h4 class="tulisan-menu" style="
                font-size: 16pt;
                color: white;
                padding: 8px;
                font-weight: bold;
                ">Lembaga Kemananan Masyarakat</h4> 
            </div>
        </div>
        <div class="row isi-lembaga-keamanan mt-3">
            <!-- Isi ditampilkan lewat jQuery -->
        </div>
    </div>

    <!-- Chart Grafik -->
    <div id="chart-lembaga-keamanan" class="mt-3">
        <div class="row judul-chart" style="margin-top: 40px;">
            <!-- Judul ditampilkan lewat jQuery -->
        </div>
        <div class="row isi-chart">
            <div class="col" style="width: 500px; height: 400px;">
                <canvas id="chart-keamanan"></canvas>    
            </div>
        </div>
    </div>

<!-- div untuk batas -->
</div>

<script type="text/javascript">
    $(document).ready(function()
    {
       var form = new FormData();
       var settings = {
       "url": "<?=base_url('profil/web_kelurahan/getDataLinmas');?>",
       "method": "GET",
       "timeout": 0,
       "headers": {
       "Content-Type": "multipart/form-data; boundary=--------------------------249036010171816774250347"
       },
       "processData": false,
       "mimeType": "multipart/form-data",
       "contentType": false,
       "data": form
       };

       $.ajax(settings).done(function (response)
       {
          let hasil = JSON.parse(response);
          let data = hasil.data;

          if(hasil.status == true)
          {
            $.each(data, function(i, n)
            {
                $('#menu-lembaga-keamanan .isi-lembaga-keamanan').append(`
                <div class="col-sm-6">
                 <div class="card border-dark rounded" style="box-shadow: 6px 6px 4px grey;">
                  <div class="card-body">
                   <h5 class="card-title text-center" style="font-weight: bold; color: black;">Semester : `+ this.Semester +`</h5>
                   <p class="card-text" style="color: black;">
                     Jumlah Anggota Linmas : `+ this.JumlahAnggotaLinmas +` <br>
                     Jumlah Pos Kamling : `+ this.JumlahPosKamling +` <br>
                     Jumlah Operasi Penertiban : `+ this.JumlahOperasiPenertiban +` <br>
                     Pencurian : `+ this.Pencurian +`
                   </p>
                  </div>
                 </div>
                </div>
                `);

                $('#chart-lembaga-keamanan .judul-chart').html(`
                <div class="col">
                <h4 class="text-center" style="color: black; font-weight: bold;">Grafik Semester `+ this.Semester +`</h4>
                </div>    
                `);  
            });

                var ctx = document.getElementById("chart-keamanan").getContext('2d');
                var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                labels: ["Anggota Linmas", "Pos Kamling", "Operasi Penertiban", "Pencurian"],
                datasets: [{
                label: data[1].Semester,
                data: [data[1].JumlahAnggotaLinmas, data[1].JumlahPosKamling, data[1].JumlahOperasiPenertiban, data[1].Pencurian],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 1)'
                ],
                borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 2
                }]
                },
                options: {
                scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero:true
                         }
                    }]
                    }
                }
                });
          }else
          {
            $('#menu-lembaga-keamanan .isi-lembaga-keamanan').html(`
             <h2>`+ hasil.msg +`</h2>   
            `);
          }  
       });
    });
</script>