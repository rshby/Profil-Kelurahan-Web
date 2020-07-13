<div class="col-lg-8 <?=$order?> feature_area">

    <h2 class="section-title text-letter-spacing-sm my-0 text-dark colour-primary text-uppercase d-flex bd-highlight">
        <div class="flex-grow-1 bd-highlight">Info RW <?=$listTitle?></div>
    </h2>
    <hr class="mt-2" />

    <a onclick="window.history.back()" class="bd-highlight d-flex justify-content-end"><u><i class="fa fa-chevron-left"></i> Kembali</u></a>

    <div class="navbar">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('profil/web_kelurahan');?>">Gambaran Umum</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?=base_url('profil/web_kelurahan/masalah');?>">Masalah dan Potensi SDM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('profil/web_kelurahan/lembaga');?>">Lembaga</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sarana dan Prasarana</a>
            <div class="dropdown-menu">
             <a class="dropdown-item" href="<?=base_url('profil/web_kelurahan/potensi_sarpras');?>">Potensi Sarana dan Prasarana</a>
             <a class="dropdown-item" href="<?=base_url('profil/web_kelurahan/kesehatan_sarpras');?>">Kesehatan</a>
             <a class="dropdown-item" href="<?=base_url('profil/web_kelurahan/pendidikan_sarpras');?>">Pendidikan</a>
             <a class="dropdown-item" href="#">Hiburan dan Wisata</a>
             <a class="dropdown-item" href="#">Kebersihan</a>
            </div>
           </li>
           <li class="nav-item">
            <a class="nav-link" href="<?=base_url('profil/web_kelurahan/tempat_strategis');?>">Tempat Strategis</a>
          </li>
        </ul>
    </div> 

<div id="menu-masalah">
    <div class="row" id="judul-masslah">
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
        ">Masalah yang Ditemukan</h4> 
        </div>
    </div>
    <div class="row isi-masalah mt-3">
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
                <td class="text-center" style="font-weight: bold">10</td>
              </tr>
              <tr>
                <th scope="row">Difabel (Jiwa)</th>
                <td class="text-center" style="font-weight: bold">10</td>
              </tr>
              <tr>
                <th scope="row">Kronis (Jiwa)</th>
                <td class="text-center" style="font-weight: bold">10</td>
              </tr>
              <tr>
                <th scope="row">Tidak Bersekolah Lagi Usia 7-18 Thn (Jiwa)</th>
                <td class="text-center" style="font-weight: bold">10</td>
              </tr>
              <tr>
                <th scope="row">Penduduk Berpendapatan Rp 300.000,- Usia 15-60 Thn (Jiwa)</th>
                <td class="text-center" style="font-weight: bold">10</td>
              </tr>
              <tr>
                <th scope="row">Rumah Tidak Layak Huni</th>
                <td class="text-center" style="font-weight: bold">10</td>
              </tr>
            </tbody>           
          </table>
      </div>
    </div>
    <div class="row mt-3">
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
                <th scope="row">Sumber Air Minum Kurang Sehat (KK)</th>
                <td class="text-center" style="font-weight: bold">10</td>
              </tr>
              <tr>
                <th scope="row">Penerangan Utama Listrik Non-PLN (KK)</th>
                <td class="text-center" style="font-weight: bold">10</td>
              </tr>
              <tr>
                <th scope="row">Penerangan Utama Bukan Listrik (KK)</th>
                <td class="text-center" style="font-weight: bold">10</td>
              </tr>
            </tbody>           
        </table>
      </div>
    </div>
     <div class="row mt-3">
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
      </div>
    </div>
</div> 
<div id="menu-potensi">
    <div class="row" id="judul-potensi">
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
        ">Potensi Sumber Daya Manusia</h4> 
        </div>
    </div>
    <br>
    <div class="row mt-3" id="data-jenis-kelamin">
        <!-- Data ditampilkan lewat jquery -->
      </div>

      <div class="row" id="data-kepala-keluarga">
        <!-- Data kepala keluraga ditampilkan lewat jquery -->
      </div>
            <div class="row mt-3" id="data-pendidikan">
        <!-- Data pendidikan ditampilkan lewat jQuery -->
      </div>      

      <div class="row mt-3" id="data-pekerjaan">
        <!-- Data Pekerjaan ditampilkan lewat jQuery -->
        
      </div>     
</div>
<!-- Div Batas -->
</div>

<script type="text/javascript">
  $(document).ready(function()
  {
    let no_rw = ;

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

    var settings = {
    "url": "<?=base_url('profil/web_kelurahan/getDataWarga/`+ no_rw +`')?>",
    "method": "GET",
    "timeout": 0,};

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
      console.log(response);
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