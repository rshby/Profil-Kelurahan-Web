<div class="col-lg-8 <?=$order?> feature_area">
    <h2 class="section-title text-letter-spacing-sm my-0 text-dark colour-primary text-uppercase d-flex bd-highlight">
        <div class="flex-grow-1 bd-highlight"><?=$listTitle?></div>
    </h2>
    <hr class="mt-2" />
    <a onclick="window.history.back()" class="bd-highlight d-flex justify-content-end"><u><i class="fa fa-chevron-left"></i> Kembali</u></a>

    <div class="justify-content-center text-center mt-12">

    <?php
        if (empty($data)) {
    ?>
        <div>
            <p>
                Maaf, data Kepala Instansi tidak ditemukan.
            </p>
        </div>
    <?php
        } else {
    ?>

    <?php
            //foreach ($data as $value) {
    ?>
        <div class="row mt-6">
            <!-- Data isi Tempat Ditampilkan lewat jQuery Ajax -->
            <div class="offset-md-2 col-sm-8">
                <div class="card border-dark rounded" style="box-shadow: 6px 6px 4px grey;">
                    <div class="card-body">
                        <a href="<?=$data['foto']?>" data-fancybox="images" data-type="image" data-caption="<?=$data["nama"]?>">
                            <img src="<?=$data["foto"]?>" class="album-photos" style="max-height: 400px; height: 400px; width: 300px;"/>
                        </a>
                       <h5 class="card-title" style="font-weight: bold; color: black;"><?=$data["nama"]?></h5>
                       <h6 class="card-subtitle mb-2 text-muted">Tempat/tanggal lahir : <?=ucfirst(strtolower($data["tempat_lahir"]))?>, <?=idn_date($data["tanggal_lahir"])?></h6>
                       <h6 class="card-subtitle mb-2 text-muted">Nomor Telpon : <?=$data["telp"]?><?=(empty($data["telp"]) || empty($data["hp"]) ? "" : " / ")?><?=$data["hp"]?></h6>
                       <h6 class="card-subtitle mb-2 text-muted">Pendidikan : <?=$data["pendidikan"]?></h6>
                    </div>
                </div>
            </div>
        </div>
    <?php
            //}
    ?>
    <?php
        }
    ?>
    </div>
</div>