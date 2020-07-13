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
                Maaf, belum ada lokasi tempat penting.
                <br>
                Silakan tambahkan tempat penting melalui aplikasi JSS Android.
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
                       <h5 class="card-title" style="font-weight: bold; color: black;"><?=$value["title"]?></h5>
                       <h6 class="card-subtitle mb-2 text-muted"><?=$value["address"]?></h6>
                       <p class="card-text" style="color: black;"><?=$value["no_telp"]?></p>
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