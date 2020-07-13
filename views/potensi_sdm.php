
<?php
    if (isset($param['stacked']) && $param['stacked']) {
        $stacked = true;
    } else {
        $stacked = false;
    }
?>
<div class="col-lg-8 <?=$order?> feature_area">
    <h2 class="section-title text-letter-spacing-sm my-0 text-dark colour-primary text-uppercase d-flex bd-highlight">
        <div class="flex-grow-1 bd-highlight"><?=$listTitle?></div>
    </h2>
    <hr class="mt-2" />
    <a onclick="window.history.back()" class="bd-highlight d-flex justify-content-end"><u><i class="fa fa-chevron-left"></i> Kembali</u></a>

    <div class="justify-content-center text-center chart-menu mt-3">
        <?php foreach ($submenu as $key => $value): ?>
            <a href="<?=base_url('profil/potensi_sdm/index/'.$value['url'].'/'.$view);?>" class="btn btn-sm <?=$value['url'] == $param['url'] ? 'btn-warning' : 'btn-info';?> mr-1 mb-2"><?=$value['name']?></a>
        <?php endforeach ?>
    </div>
    <div class="chart py-3">
        <span class="text-center" id="loadMsg"><h4><i class="fa fa-circle-o-notch fa-spin"></i>&nbsp; Memuat, mohon tunggu ...</h4></span>
        <canvas id="myChart" <?=$param['type'] == "horizontalBar" ? "" : "height='60vh' width='80vw'";?>></canvas>
    </div>
    
    <div class="data-table mt-3">
        <div class="py-4 text-center">
            <h4>Data <?=$param['name']?></h4>
        </div>
        <table class="table bstable table-bordered" id="table-statistik-warga" data-url="<?=base_url('profil/potensi_sdm/getDTData/'.$param['url']);?>" data-pagination="false" data-locale="id-ID" data-sort-order="desc" data-row-style="rowStyle">
            <thead>
                <tr>
                    <!-- <th data-field="<?=$param['url'];?>" data-sortable="true"><?=$param['name']?></th> -->
                    <?php
                        if ($stacked) {
                    ?>
                    <th data-field="label" data-sortable="true"><?= $param['name']?></th>
                    <th data-field="jumlah_laki" data-sortable="true" data-align="right">LAKI-LAKI</th>
                    <th data-field="jumlah_perempuan" data-sortable="true" data-align="right">PEREMPUAN</th>
                    <?php
                        } else {
                    ?>
                    <th data-field="<?=$param['url'];?>" data-sortable="true"><?= $param['name']?></th>
                    <?php
                        }
                    ?>
                    <th data-field="jumlah" data-sortable="true" data-align="right">Jumlah</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<?php 

$stacked_switch = "";
$stacked_yAxes = "";

if ($stacked) {
    $stacked_switch = ', 
            stacked: true';
    $stacked_yAxes = ',
        yAxes: [{
            gridLines: {
                display:false,
                color: "#fff",
                zeroLineColor: "#fff",
                zeroLineWidth: 0
            },
            ticks: {
                fontFamily: "\'Open Sans Bold\', sans-serif",
                fontSize:11
            },
            stacked: true
        }]';
}

$tipe = array(
    "pie" => "type: '".$param['type']."',
        options: {
            responsive: true,
            title: {
                display: true,
                fontSize: 18,
                text: '".$param['name']."'
                },
            legend: {
                display: true
                },
                showAllTooltips: true
            },"
    ,
    "horizontalBar" => "type: '".$param['type']."',
        options: {
            title: {
                display: true,
                fontSize: 18,
                text: '".$param['name']."'
                },
                legend: {
                    display: false
                    },
                    /*tooltips: {
                        callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.xLabel;
                        }
                    }
                },*/
                scales: {
                    xAxes: [{
                        ticks: {
                            //suggestedMin: 0,
                            //suggestedMax: 100,
                            min: 0
                        }".$stacked_switch."
                    }]".$stacked_yAxes."
                },

                showAllTooltips: true
            },"
    ,
    "bar" => "type: '".$param['type']."',
        options: {
            responsive: true,
            title: {
                display: true,
                fontSize: 18,
                text: '".$param['name']."'
                },
            legend: { display: false},
            showAllTooltips: true
        },"
    ,
); 

$tipe = $tipe[$param['type']];

if ($stacked) {
    $tipe .= '
    
    animation: {
        duration: 1,
        onComplete: function () {
            var chartInstance = this.chart;
            var ctx = chartInstance.ctx;
            ctx.textAlign = "left";
            ctx.font = "9px Open Sans";
            ctx.fillStyle = "#fff";

            Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
                var meta = chartInstance.controller.getDatasetMeta(i);
                Chart.helpers.each(meta.data.forEach(function (bar, index) {
                    data = dataset.data[index];
                    //if(i==0){
                        //ctx.fillText(data, 50, bar._model.y+4);
                    //} else {
                        ctx.fillText(data, bar._model.x-25, bar._model.y+4);
                    //}
                }),this)
            }),this);
        }
    },';
}

?>

<script>
    $(document).ready(function() {
        $(function() {
            $("#table-statistik-warga").bootstrapTable();
        });

        $.ajax({
            url: "<?= base_url('profil/potensi_sdm/getChartData/'.$param['url']);?>",
            method: "GET",
            timeout: 600000,
            success: function(result) {
                $("#loadMsg").html("");
                var data = JSON.parse(result);
                var <?= $param['url']?> = [];

                var jumlah = [];
                var warna = [];
                var tepi = [];
                var label = [];

                var total = 0;

                <?php
                    if ($stacked) {
                ?>
                    jumlah['LAKI-LAKI'] = [];
                    jumlah['PEREMPUAN'] = [];
                    warna['LAKI-LAKI'] = [];
                    warna['PEREMPUAN'] = [];
                    tepi['LAKI-LAKI'] = [];
                    tepi['PEREMPUAN'] = [];
                    label['LAKI-LAKI'] = [];
                    label['PEREMPUAN'] = [];

                <?php
                    } else {
                ?>

                /*var jumlah = [];
                var warna = [];
                var tepi = [];
*/
                <?php
                    }
                ?>

                //console.log(data);

                for(var i = 0; i < data.length; i++) {
                    /*<?php //echo $param['url']?>.push(data[i].<?php //echo $param['url']?>);*/
                    <?php echo $param['url']?> = [<?php echo "\"".implode("\",\"", $param['labels'])."\""?>];

                    <?php
                        if ($stacked) {
                    ?>
                    warna_dinamis = dynamicColors("0.5");
                    jumlah[data[i].field].push((data[i].jumlah == 0) ? 0 : data[i].jumlah );
                    total += data[i].jumlah;
                    warna[data[i].field].push(warna_dinamis);
                    tepi[data[i].field].push(warna_dinamis.replace("0.5", "1"));
                    label[data[i].field].push(data[i].label);

                    /*console.log(jumlah);
                    console.log(warna);
                    console.log(tepi);*/

                    <?php
                        } else {
                    ?>

                    jumlah.push((data[i].jumlah == 0) ? 0 : data[i].jumlah );
                    total += data[i].jumlah;
                    warna.push(dynamicColors("0.5"));
                    tepi.push(warna[i].replace("0.5", "1"));

                    <?php
                        }
                    ?>
                }

                /*alert(JSON.stringify(jumlah));
                alert("my object: %o", jumlah);*/

                if ("<?php echo $param['type'];?>" == "horizontalBar") {
                    $("#myChart").attr("height", (data.length *<?php echo ($stacked) ? 10 : 15 ;?>+40)+"px");
                }

                var chartdata = {
                    labels: <?php echo $param['url']?>,
                    datasets : [

                    <?php
                        if ($stacked) {
                    ?>

                        {
                            label: "LAKI-LAKI",
                            fillColor: dynamicColors("0.5"),
                            strokeColor: dynamicColors(),
                            pointColor: dynamicColors(),
                            backgroundColor: warna["LAKI-LAKI"],
                            borderColor: tepi["LAKI-LAKI"],
                            borderWidth: 1,
                            data: jumlah["LAKI-LAKI"]
                        },
                        {
                            label: "PEREMPUAN",
                            fillColor: dynamicColors("0.5"),
                            strokeColor: dynamicColors(),
                            pointColor: dynamicColors(),
                            backgroundColor: warna["PEREMPUAN"],
                            borderColor: tepi["PEREMPUAN"],
                            borderWidth: 1,
                            data: jumlah["PEREMPUAN"]
                        }


                    <?php
                        } else {
                    ?>

                        {
                            label: '<?php echo $param['name']?>',
                            fillColor: dynamicColors("0.5"),
                            strokeColor: dynamicColors(),
                            pointColor: dynamicColors(),
                            backgroundColor: warna,
                            borderColor: tepi,
                            borderWidth: 1,
                            data: jumlah
                        }

                    <?php
                        }
                    ?>

                    ]
                };

                var ctx = $("#myChart");
                var barGraph = new Chart(ctx, {
                    <?=$tipe;?>
                    data: chartdata
                });
                // ctx.generateLegend();
                setTimeout(function() {
                    var count = '<tr><td class="text-right">JUMLAH</td><td class="text-right">'+ total +'</td></tr>';
                    $('#table-statistik').find('tbody').append(count);
                }, 1000);

            },
            error: function(data) {
                $("#loadMsg").html("Gagal mengambil data. Coba muat ulang halaman dengan menekan F5.");
            }
        });


        var dynamicColors = function(a="1") {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgba(" + r + "," + g + "," + b + "," + a + ")";
        }

    });
</script>

