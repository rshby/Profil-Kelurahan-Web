<div class="col-lg-8 <?=$order?> feature_area">

    <h2 class="section-title text-letter-spacing-sm my-0 text-dark colour-primary text-uppercase d-flex bd-highlight">
        <div class="flex-grow-1 bd-highlight"><?=$listTitle?></div>
    </h2>
    <hr class="mt-2" />

    <a onclick="window.history.back()" class="bd-highlight d-flex justify-content-end"><u><i class="fa fa-chevron-left"></i> Kembali</u></a>

    <div class="navbar">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="<?=base_url('profil/web_kelurahan');?>">Gambaran Umum</a>
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

<div id="menu-profil-lurah">
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
        ">Profil Lurah</h4> 
        </div>
    </div>

    <div class="row isi-profil mt-3">
        <!-- Data Profil Atasan Ditampilkan lewat jQuery Ajax -->
    </div>
</div>

<div id="menu-lembaya-kemasyarakatan">
    <div class="row" class="mt-3">
        <div class="col rounded-lg" style="
        background-color: #4B7447;
        padding-left: 15px;
        box-shadow: 6px 6px 4px grey;
        margin-top: 25px;
        ">
        <h4 class="tulisan-menu" style="
        font-size: 16pt;
        color: white;
        padding: 8px;
        font-weight: bold;
        ">Data Lembaga Kemasyarakatan</h4> 
        </div>
    </div>

    <div class="row isi-lembaga-kemasyarakatan mt-3">
        <div class="col">
            <h5 class="text-center" style="font-weight: bold;">Lembaga Pemberdayaan Masyarakat Kelurahan (LPMK)</h5>
            <!-- <h6 style="padding-left: 10px">Jumlah :</h6> -->
            
        </div>
    </div>
    <div class="row isi-lembaga-kemasyarakatan mt-3">
        <div class="col">
            <h5 class="text-center" style="font-weight: bold;">Kampung</h5>
            <!-- <h6 style="padding-left: 10px">Jumlah :</h6> -->
            
        </div>
    </div>
    <div class="row mt-3 jumlah-rt">
        <div class="col">
           <h5 class="text-center" style="font-weight: bold;">Jumlah Rt dan Rw</h5>
        </div>
    </div>
    <div class="row"> 
     <div class="col isi-jumlah-rt">
          
     </div>  
    </div>  
</div>

<!-- div Pembatas -->   
</div>

<script type="text/javascript">
    $(document).ready(function()
    {
       var settings = {
        "url": "<?=base_url('profil/web_kelurahan/getAtasan');?>",
        "method": "GET",
        "timeout": 0,
    };

    $.ajax(settings).done(function (response) 
    {
        var hasil = JSON.parse(response);
        console.log(hasil);
        console.log(hasil.status);

        if(hasil.status == true)
        {
            let profil = hasil.data;
            console.log(hasil);

            $('#menu-profil-lurah .isi-profil').append(`
                <div class="col-sm-4 foto-atasan">
                <img src="`+ profil[0].foto +`" class="rounded img-thumbnail" style="width: 200px;">
                </div>

                <div class="col-sm-8 detail-atasan">
                <div class="row">
                <div class="col-sm-4 tulisan-kiri">    
                Nama<br>
                NIP<br>
                Tempat Lahir <br>
                Tanggal Lahir <br>
                Agama <br>
                Pendidikan <br>
                Alamat <br>
                Telepon
                </div>
                <div class="col-sm-8 tulisan-kanan">
                : `+ profil[0].nama +` <br>
                : `+ profil[0].nip +` <br>
                : `+ profil[0].tempat_lahir +` <br>
                : `+ profil[0].tanggal_lahir +` <br>
                : `+ profil[0].agama +` <br>
                : `+ profil[0].pendidikan +` <br>
                : `+ profil[0].alamat +` <br>
                : `+ profil[0].hp +`
                </div>   
                </div>
                </div>
                `);
        }else
        {
            $('#menu-profil-lurah .isi-profil').html(`
                <h3 class="text-center">`+ hasil.msg +`</h3>
                `);
        }
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function()
    {
        let jumlahrt = 0;
        let jumlahrw = 0;

        var settings = {
        "url": "<?=base_url('profil/web_kelurahan/get_jml')?>",
        "method": "GET",
        "timeout": 0,};

        $.ajax(settings).done(function (response) 
        {
        let hasil = JSON.parse(response);
             
         $.each(hasil, function(i, n)
         {
                jumlahrt += parseInt(this.jml_rt);
                jumlahrw = i;
         });

         $('#menu-lembaya-kemasyarakatan .isi-jumlah-rt').html(
            `
            <center> 
             <table class="table table-bordered justify-content-center" style="width: 400px;">
                 <thead>
                  <tr>
                   <th scope="col" style="text-align: center;">Jenis</th>
                   <th scope="col" style="text-align: center;">Jumlah</th>
                 </tr>
                </thead>
                <tbody>
                 <tr>
                   <th scope="row" style="text-align: center;">Rukun Tetangga (RT)</th>
                   <td class="text-center" style="font-weight: bold;">`+ jumlahrt+`</td>
                 </tr>
                 <tr>
                   <th scope="row" style="text-align: center;">Rukun Warga (RW)</th>
                   <td class="text-center" style="font-weight: bold;">`+jumlahrw+`</td>
                 </tr>
                </tbody>           
             </table>
            </center>
            `);
        });
    });
</script>