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
             <a class="dropdown-item" href="<?=base_url('profil/web_kelurahan/kesehatan_sarpras');?>">Kesehatan</a>
             <a class="dropdown-item" href="<?=base_url('profil/web_kelurahan/pendidikan_sarpras');?>">Pendidikan</a>
             <a class="dropdown-item" href="#">Hiburan dan Wisata</a>
             <a class="dropdown-item" href="#">Kebersihan</a>
            </div>
           </li>
           <li class="nav-item">
            <a class="nav-link active" href="<?=base_url('profil/web_kelurahan/tempat_strategis');?>">Tempat Strategis</a>
          </li>
        </ul>
    </div>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <h1 class="text-center">Cari Tempat</h1>
        <div class="input-group">
            <input type="text" id="search-input" class="form-control" placeholder="Cari tempat apa?">
            <span class="input-group-btn">
              <button id="search-button" class="btn btn-secondary" type="button">Cari</button>
            </span>
        </div>
    </div>
</div>    

<div id="menu-tempat-strategis" class="mt-3">
    <div class="row">
        <div class="col rounded-lg" style="
        background-color: #4B7447;
        padding-left: 15px;
        /*box-shadow: 6px 6px 4px grey;*/
        margin-top: 15px;
        ">
        <h4 class="tulisan-menu" style="
        font-size: 16pt;
        color: white;
        padding: 8px;
        font-weight: bold;
        ">Tempat Strategis</h4> 
        </div>
    </div>

    <div class="row isi-tempat mt-3">
        <!-- Data isi Tempat Ditampilkan lewat jQuery Ajax -->
        <div class="col-sm-4">
            <div class="card border-dark rounded" style="box-shadow: 6px 6px 4px grey;">
                <div class="card-body">
                   <h5 class="card-title" style="font-weight: bold; color: black;">Tugu Jogjakarta</h5>
                   <h6 class="card-subtitle mb-2 text-muted">0272 3380689</h6>
                   <p class="card-text" style="color: black;">Cokrodiningratan, Kec. Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233</p>
                </div>
            </div>
        </div>
    </div>
</div> 
</div>

<script type="text/javascript">
    $(document).ready(function()
        {
            
        });
</script>