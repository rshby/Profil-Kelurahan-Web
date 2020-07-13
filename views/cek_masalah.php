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
             <a class="dropdown-item" href="<?=base_url('profil/web_kelurahan/kebersihan_sarpras');?>">Kebersihan</a>
            </div>
           </li>
           <li class="nav-item">
            <a class="nav-link" href="<?=base_url('profil/web_kelurahan/tempat_strategis');?>">Tempat Strategis</a>
          </li>
        </ul>
    </div>  

<div id="daftar-rw">    
 <div class="row mt-3">
  <div class="col">
   <h4 style="color: black;">Daftar RW</h4> 
  </div>
 </div>
 <div class="row card-rw">
   
 </div>
</div>
<!-- Div Batas -->
</div>

<script type="text/javascript">
  $(document).ready(function()
    {
      var settings = {
      "url": "<?=base_url('profil/web_kelurahan/get_jml')?>",
       "method": "GET",
       "timeout": 0,};

       $.ajax(settings).done(function (response) 
       {
        let daftar_rw = JSON.parse(response);

        console.log(daftar_rw);
        $.each(daftar_rw, function(i, n)
        {
          $("#daftar-rw .card-rw").append(`
            <div class="col-sm-4">
              <div class="card mb-2 border-dark" style="box-shadow: 6px 6px 4px grey;">
               <div class="card-body">
                  <h5 class="card-title">Statistik Warga</h5>
                  <p class="card-text">RW : 0`+ this.no_rw+`</p>
                  <a href="<?=base_url('profil/web_kelurahan/info_masalah/0`+this.no_rw+`');?>" class="btn btn-success text-light">Lihat Data</a>
               </div>
               </div>
             </div>
            `);
        });
       });
    });
</script>