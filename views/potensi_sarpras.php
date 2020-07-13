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
             <a class="dropdown-item active" href="<?=base_url('profil/web_kelurahan/potensi_sarpras');?>">Potensi Sarana dan Prasarana</a>
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

<div id="menu-potensi">
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
        ">Potensi Sarana dan Prasarana</h4> 
        </div>
    </div>
    <div class="row judul-peribadatan mt-3">
        <div class="col">
          <h5 style="color: black; font-weight: bold;">Prasarana Peribadatan</h5>
        </div>
    </div>
    <div class="row">
      <div class="col isi-peribadatan">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" style="text-align: center;">Tempat Peribadatan</th>
                <th scope="col" style="text-align: center;">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Masjid</th>
                <td class="text-center" style="font-weight: bold; color: black">10</td>
              </tr>
              <tr>
                <th scope="row">Langgar/Surau/Mushola</th>
                <td class="text-center" style="font-weight: bold; color: black">10</td>
              </tr>
              <tr>
                <th scope="row">Gereja Kristen Protestan</th>
                <td class="text-center" style="font-weight: bold; color: black">10</td>
              </tr>
            </tbody>           
        </table>
      </div>
    </div>
    <div class="row judul-olahraga mt-3">
        <div class="col">
          <h5 style="color: black; font-weight: bold;">Prasarana Peribadatan</h5>
        </div>
    </div>
    <div class="row">
      <div class="col isi-olahraga">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" style="text-align: center;">Tempat Olahraga</th>
                <th scope="col" style="text-align: center;">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Lapangan Bulu Tangkis</th>
                <td class="text-center" style="font-weight: bold; color: black">10</td>
              </tr>
              <tr>
                <th scope="row">Meja Pingpong</th>
                <td class="text-center" style="font-weight: bold; color: black">10</td>
              </tr>
              <tr>
                <th scope="row">Lapangan Tenis</th>
                <td class="text-center" style="font-weight: bold; color: black">10</td>
              </tr>
              <tr>
                <th scope="row">Lapangan Voli</th>
                <td class="text-center" style="font-weight: bold; color: black">10</td>
              </tr>
              <tr>
                <th scope="row">Lapangan Basket</th>
                <td class="text-center" style="font-weight: bold; color: black">10</td>
              </tr>
              <tr>
                <th scope="row">Pusat Kebugaran</th>
                <td class="text-center" style="font-weight: bold; color: black">10</td>
              </tr>
              <tr>
                <th scope="row">Lapangan Futsal</th>
                <td class="text-center" style="font-weight: bold; color: black">10</td>
              </tr>
            </tbody>           
        </table>
      </div>
    </div>
<!-- div Menu -->    
</div>

<!-- div Pembatas -->   
</div>