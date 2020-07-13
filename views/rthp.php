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
                Maaf, belum ada lokasi Ruang Terbuka Hijau (RTH).
            </p>
        </div>
    <?php
        } else {
    ?>

    <?php
            foreach ($data as $value) {
    ?>
        <div class="row mt-6">
            <!-- Data isi Tempat Ditampilkan lewat jQuery Ajax -->
            <div class="col-sm-6">
                <div class="card border-dark rounded" style="box-shadow: 6px 6px 4px grey;">
                    <div class="card-body">
                        <a href="<?=$value['imgsrc']?>" data-fancybox="images" data-type="image" data-caption="<?=$value["nama"]?>">
                            <img src="<?=$value["imgsrc"]?>" class="album-photos"/>
                        </a>
                        <h5 class="card-title" style="font-weight: bold; color: black;"><?=$value["nama"]?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Luas : <?=$value["luas"]?> m<sup>2</sup></h6>
                        <p class="card-text" style="color: black;"><?=$value["keterangan"]?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php
            }
    ?>
    <?php
        }
    ?>
    </div>
</div>