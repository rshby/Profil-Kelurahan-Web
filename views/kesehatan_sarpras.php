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
        <a class="nav-link" href="<?=base_url('profil/web_kelurahan/lembaga');?>">Lembaga</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sarana dan Prasarana</a>
        <div class="dropdown-menu">
         <a class="dropdown-item" href="<?=base_url('profil/web_kelurahan/potensi_sarpras');?>">Potensi Sarana dan Prasarana</a>
         <a class="dropdown-item active" href="<?=base_url('profil/web_kelurahan/kesehatan_sarpras');?>">Kesehatan</a>
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

<div id="menu-prasarana-kesehatan">
  <div class="row">
    <div class="col rounded-lg" style="
    background-color: #4B7447;
    padding-left: 15px;
    box-shadow: 6px 6px 4px grey;
    margin-top: 15px;
    ">
    <h4 class="tulisan-menu" style="
    font-size: 16pt;
    color: white;
    padding: 8px;
    font-weight: bold;
    ">Prasarana dan Sarana Kesehatan</h4> 
  </div>
</div>
<div class="row mt-3">
  <div class="col isi-puskesmas">

  </div>
</div>
<div class="row tabel-prasarana">
  <div class="col">

  </div>
</div>
<div class="row mt-3">
  <div class="col">
    <h5 style="color: black; font-weight: bold;">Sarana Kesehatan</h5>
  </div>
</div>
<div class="row tabel-sarana">
  <div class="col">

  </div>
</div>
<div class="row mt-3">
  <div class="col">
    <h5 style="color: black; font-weight: bold;">Data Kesehatan Keluarga</h5>
    <h6 style="color: black;">Status Gizi</h6>
  </div>
</div>
<div class="row">
  <div class="col tabel-status-gizi">

  </div>
</div>
<div class="row mt-3">
  <div class="col isi-kesehatan-keluarga">

  </div>
</div>
<div class="row mt-3">
  <div class="col">
    <h6 style="color: black;">10 Penyakit Terbesar</h6>
  </div>
</div>
<div class="row">
  <div class="col tabel-penyakit">

  </div>
</div>
<!-- Chart Grafik -->
    <div id="chart-penyakit" class="mt-3">
        <div class="row judul-chart" style="margin-top: 40px;">
            <!-- Judul ditampilkan lewat jQuery -->
        </div>
        <div class="row isi-chart">
            <div class="col" style="width: 500px; height: 400px;">
                <canvas id="myChart"></canvas>    
            </div>
        </div>
    </div>
<!-- div menu -->   
</div>

<!-- div Pembatas -->   
</div>

<script type="text/javascript">
  $(document).ready(function()
  {
   var settings = {
    "url": "<?=base_url('profil/web_kelurahan/getKesehatan');?>",
    "method": "GET",
    "timeout": 0,
  };

  $.ajax(settings).done(function (response) 
  {
    let hasil = JSON.parse(response);
    let hasil_kesehatan = hasil.data;
    let kunjungan = hasil_kesehatan.filter(d => d.nama_param === "Data Kunjungan Puskesmas");
    let klinik = hasil_kesehatan.filter(p => p.nama_param === "Klinik Pratama");
    let apotek = hasil_kesehatan.filter(a => a.nama_param === "Apotek");
    let posyandu = hasil_kesehatan.filter(b => b.nama_param === "Posyandu");
    let dokter = hasil_kesehatan.filter(c => c.nama_param === "Praktek Mandiri Dokter");
    let praktekbidan = hasil_kesehatan.filter(d => d.nama_param === "Praktek Mandiri Bidan");
    let dokterumum = hasil_kesehatan.filter(e => e.nama_param === "Dokter Umum");
    let doktergigi = hasil_kesehatan.filter(f => f.nama_param === "Dokter Gigi");
    let bidan = hasil_kesehatan.filter(g => g.nama_param === "Bidan");
    let perawat = hasil_kesehatan.filter(h => h.nama_param === "Perawat");
    let dokterpraktek = hasil_kesehatan.filter(j => j.nama_param === "Jumlah dokter praktek");
    let labkesehatan = hasil_kesehatan.filter(k => k.nama_param === "Laboratorium Kesehatan");
    let badutasgtpendek = hasil_kesehatan.filter(l => l.nama_param === "Baduta dg Status Gizi Sangat Pendek (SP)");
    let badutapendek = hasil_kesehatan.filter(m => m.nama_param === "Baduta dg Status Gizi Pendek (P)");
    let badutanormal = hasil_kesehatan.filter(o => o.nama_param === "Baduta dg Status Gizi Normal (N)");
    let badutatinggi = hasil_kesehatan.filter(p => p.nama_param === "Baduta dg Status Gizi Tinggi (T)");
    let balitasgtpendek = hasil_kesehatan.filter(q => q.nama_param === "Balita dg Status Gizi Sangat Pendek (SP)");
    let balitapendek = hasil_kesehatan.filter(r => r.nama_param === "Balita dg Status Gizi Pendek (P)");
    let balitanormal = hasil_kesehatan.filter(s => s.nama_param === "Balita dg Status Gizi Normal (N)");
    let balitatinggi = hasil_kesehatan.filter(t => t.nama_param === "Balita dg Status Gizi Tinggi (T)");
    let ibuhamil = hasil_kesehatan.filter(u => u.nama_param === "Ibu Hamil");
    let remajawanita = hasil_kesehatan.filter(v => v.nama_param === "Remaja Wanita (10-18 th)");

    let caries = hasil_kesehatan.filter(a => a.nama_param === "Caries (<=12  th)");
    let denguesuspek = hasil_kesehatan.filter(b => b.nama_param === "Dengue Suspek");
    let dengueterkonfirm = hasil_kesehatan.filter(c => c.nama_param === "Dengue Terkonfirmasi");
    let diabetes = hasil_kesehatan.filter(d => d.nama_param === "Diabetes Melitus");
    let gangguanjiwa = hasil_kesehatan.filter(e => e.nama_param === "Gangguan Jiwa");
    let hipertensi = hasil_kesehatan.filter(f => f.nama_param === "Hipertensi");
    let obesitas = hasil_kesehatan.filter(g => g.nama_param === "Obesitas (BMI >=30)");
    let overweight = hasil_kesehatan.filter(h => h.nama_param === "Overweight (BMI 25-29)");
    let suspekdengue = hasil_kesehatan.filter(j => j.nama_param === "Suspek Dengue");
    let leptospirosis = hasil_kesehatan.filter(k => k.nama_param === "Leptospirosis Terkonfirmasi");

    if(hasil.status == true)
    {
      $.each(kunjungan, function(i, n)
      {
        $('#menu-prasarana-kesehatan .isi-puskesmas').html(`
          <h5 style="color: black;">Prasarana Kesehatan</h5>
          <p style="font-weight: bold; color: black;">Puskesmas <br>
          Jumlah Kunjungan Puskesmas : `+ this.nilai +`</p>
          `);
      });

      $.each(hasil_kesehatan, function(i, x)
      {
        $('#menu-prasarana-kesehatan .tabel-prasarana').html(`
          <table class="table table-bordered">
          <thead>
          <tr>
          <th scope="col" style="text-align: center;">Prasarana</th>
          <th scope="col" style="text-align: center;">Jumlah</th>
          </tr>
          </thead>    
          <tbody>
          <tr>
          <th scope="row">Klinik Pratama</th>
          <td class="text-center" style="font-weight: bold">`+ klinik[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Apotik</th>
          <td class="text-center" style="font-weight: bold">`+ apotek[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Posyandu</th>
          <td class="text-center" style="font-weight: bold">`+ posyandu[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Rumah/Kantor Praktek Dokter</th>
          <td class="text-center" style="font-weight: bold">`+ dokter[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Rumah/Kantor Praktek Bidan</th>
          <td class="text-center" style="font-weight: bold">`+ praktekbidan[0].nilai +`</td>
          </tr>
          </tbody>           
          </table>
          `);
        $('#menu-prasarana-kesehatan .tabel-sarana').html(`
          <table class="table table-bordered">
          <thead>
          <tr>
          <th scope="col" style="text-align: center;">Sarana</th>
          <th scope="col" style="text-align: center;">Jumlah</th>
          </tr>
          </thead>      
          <tbody>
          <tr>
          <th scope="row">Dokter Umum</th>
          <td class="text-center" style="font-weight: bold">`+ dokterumum[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Dokter Gigi</th>
          <td class="text-center" style="font-weight: bold">`+ doktergigi[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Bidan</th>
          <td class="text-center" style="font-weight: bold">`+ bidan[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Perawat</th>
          <td class="text-center" style="font-weight: bold">`+ bidan[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Dokter Praktek</th>
          <td class="text-center" style="font-weight: bold">`+ dokterpraktek[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Laboratorium Kesehatan</th>
          <td class="text-center" style="font-weight: bold">`+ labkesehatan[0].nilai +`</td>
          </tr>
          </tbody>           
          </table>
          `);
        $('#menu-prasarana-kesehatan .tabel-status-gizi').html(`
          <table class="table table-bordered">
          <thead>
          <tr>
          <th scope="col" style="text-align: center;">Status Gizi</th>
          <th scope="col" style="text-align: center;">Normal</th>
          <th scope="col" style="text-align: center;">Pendek</th>
          <th scope="col" style="text-align: center;">Sangat Pendek</th>
          <th scope="col" style="text-align: center;">Tinggi</th>
          </tr>
          </thead>
          <tbody>
          <tr>
          <th scope="row">Baduta</th>
          <td class="text-center" style="font-weight: bold">`+ badutanormal[0].nilai +`</td>
          <td class="text-center" style="font-weight: bold">`+ badutapendek[0].nilai +`</td>
          <td class="text-center" style="font-weight: bold">`+ badutasgtpendek[0].nilai +`</td>
          <td class="text-center" style="font-weight: bold">`+ badutatinggi[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Balita</th>
          <td class="text-center" style="font-weight: bold">`+ balitanormal[0].nilai +`</td>
          <td class="text-center" style="font-weight: bold">`+ balitapendek[0].nilai +`</td>
          <td class="text-center" style="font-weight: bold">`+ balitasgtpendek[0].nilai +`</td>
          <td class="text-center" style="font-weight: bold">`+ balitatinggi[0].nilai +`</td>
          </tr>
          </tbody>           
          </table>
          `);
        $('#menu-prasarana-kesehatan .isi-kesehatan-keluarga').html(`
          <p style="font-weight: bold; color: black;">Jumlah Ibu Hamil : `+ ibuhamil[0].nilai +`</p>
          <p style="font-weight: bold; color: black;">Jumlah Remaja Wanita : `+ remajawanita[0].nilai +`</p>
          `);
        $('#menu-prasarana-kesehatan .tabel-penyakit').html(`
          <table class="table table-bordered">
          <thead>
          <tr>
          <th scope="col" style="text-align: center;">Penyakit</th>
          <th scope="col" style="text-align: center;">Jumlah</th>
          </tr>
          </thead>      
          <tbody>
          <tr>
          <th scope="row">Caries (<=12  th)</th>
          <td class="text-center" style="font-weight: bold">`+  caries[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Dengue Suspek</th>
          <td class="text-center" style="font-weight: bold">`+ denguesuspek[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Dengue Terkonfirmasi</th>
          <td class="text-center" style="font-weight: bold">`+ dengueterkonfirm[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Diabetes Melitus</th>
          <td class="text-center" style="font-weight: bold">`+ diabetes[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Gangguan Jiwa</th>
          <td class="text-center" style="font-weight: bold">`+ gangguanjiwa[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Hipertensi</th>
          <td class="text-center" style="font-weight: bold">`+ hipertensi[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Leptospirosis Terkonfirmasi</th>
          <td class="text-center" style="font-weight: bold">`+ leptospirosis[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Obesitas (BMI >=30)</th>
          <td class="text-center" style="font-weight: bold">`+ obesitas[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Overweight (BMI 25-29)</th>
          <td class="text-center" style="font-weight: bold">`+ overweight[0].nilai +`</td>
          </tr>
          <tr>
          <th scope="row">Suspek Dengue</th>
          <td class="text-center" style="font-weight: bold">`+ suspekdengue[0].nilai +`</td>
          </tr>
          </tbody>           
          </table>
          `);
        
        $('#chart-penyakit .judul-chart').html(`
                <div class="col">
                <h4 class="text-center" style="color: black; font-weight: bold;">Grafik 10 Penyakit Terbesar</h4>
                </div>    
                `);  
          var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                labels: ["Caries", "Dengue Suspek", "Dengue Terkonfirmasi", "Diabetes Melitus", "Gangguan Jiwa", "Hipertensi", "Leptospirosis", "Obesitas", "Overweight", "Suspek Dengue"],
                datasets: [{
                label: "Grafik 10 Penyakit Terbesar",
                data: [caries[0].nilai, denguesuspek[0].nilai, dengueterkonfirm[0].nilai, diabetes[0].nilai, gangguanjiwa[0].nilai, hipertensi[0].nilai, leptospirosis[0].nilai, obesitas[0].nilai, overweight[0].nilai, suspekdengue[0].nilai],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(75, 50, 50, 100)',
                  'rgba(75, 100, 100, 1)',
                  'rgba(75, 150, 150, 1)',
                  'rgba(250, 100, 100, 1)',
                  'rgba(255, 0, 0, 1)',
                  'rgba(100, 255, 200, 1)'
                ],
                borderColor: [
                'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(75, 50, 50, 100)',
                  'rgba(75, 100, 100, 1)',
                  'rgba(75, 150, 150, 1)',
                  'rgba(250, 100, 100, 1)',
                  'rgba(255, 0, 0, 1)',
                  'rgba(100, 255, 200, 1)'
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
      });
    }else
    {
      $('#menu-prasarana-kesehatan .isi-puskesmas').html(`
        <h3 class="text-center">`+ hasil.msg +`</h3>
        `);
    }
  });
});
</script>