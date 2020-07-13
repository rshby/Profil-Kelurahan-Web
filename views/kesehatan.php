
<?php
    if (isset($param['stacked']) && $param['stacked']) {
        $stacked = true;
    } else {
        $stacked = false;
    }
?>

<?php
    if (isset($param['grouped']) && $param['grouped']) {
        $grouped = true;
    } else {
        $grouped = false;
    }
?>
<div class="col-lg-8 <?=$order?> feature_area">
    <h2 class="section-title text-letter-spacing-sm my-0 text-dark colour-primary text-uppercase d-flex bd-highlight">
        <div class="flex-grow-1 bd-highlight"><?=$listTitle?></div>
    </h2>
    <hr class="mt-2" />
    <a onclick="window.history.back()" class="bd-highlight d-flex justify-content-end"><u><i class="fa fa-chevron-left"></i> Kembali</u></a>

    <div class="chart py-3">
        <span class="text-center" id="loadMsg"><h4><i class="fa fa-circle-o-notch fa-spin"></i>&nbsp; Memuat, mohon tunggu ...</h4></span>
        <canvas id="myChart" <?=$param['type'] == "horizontalBar" ? "" : "height='60vh' width='80vw'";?>></canvas>
    </div>
    
    <div class="data-table mt-3">
        <div class="py-4 text-center">
            <h4><?=$param['name']?></h4>
        </div>
        <table class="table bstable table-bordered" id="table-statistik-warga" data-url="<?=base_url('profil/kesehatan/getDTData/'.$param['url']);?>" data-pagination="false" data-locale="id-ID" data-sort-order="desc" data-row-style="rowStyle">
            <thead>
                <tr>
                    <?php
                        if ($stacked || $grouped) {
                    ?>
                    <th data-field="label" data-sortable="true"><?= $param['name']?></th>
                    <th data-field="semester_1" data-sortable="true" data-align="right">Semester 1</th>
                    <th data-field="semester_2" data-sortable="true" data-align="right">Semester 2</th>
                    <?php
                        } else {
                    ?>
                    <th data-field="label" data-sortable="true"><?= $listTitle?></th>
                    <?php
                        }
                    ?>
                    <?php
                        foreach (listBulan() as $key => $value) {
                    ?>
                    <th data-field="<?=(int)$key?>" data-align="right"><?=$value?></th>
                    <?php
                        }
                    ?>
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
                beginAtZero: true,
                min: 0,
                fontFamily: "\'Open Sans Bold\', sans-serif",
                fontSize:11
            },
            stacked: true
        }]';
}

$tipe = array(
    "line" => "type: '".$param['type']."',
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
            showAllTooltips: true,
            /*},*/
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        min: 0
                        }
                    }]
                }
            },"
    ,
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
                            beginAtZero: true,
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
            url: "<?= base_url('profil/kesehatan/getChartData/'.$param['url']);?>",
            method: "GET",
            timeout: 600000,
            success: function(result) {
                $("#loadMsg").html("");
                var data_obj = JSON.parse(result);
                var data = Object.entries(data_obj);
                var <?= $param['url']?> = [];

                var jumlah = [];
                var warna = [];
                var tepi = [];
                var label = [];

                var total = 0;

                <?php
                    if ($stacked || $grouped) {
                ?>
                    jumlah['semester_1'] = [];
                    jumlah['semester_2'] = [];
                    warna['semester_1'] = [];
                    warna['semester_2'] = [];
                    tepi['semester_1'] = [];
                    tepi['semester_2'] = [];
                    label['semester_1'] = [];
                    label['semester_2'] = [];

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

                //console.log(JSON.stringify(data));

                //console.log(Object.entries(data)[0][1]);
                /*console.log(data);
                console.log(data.length);*/

                <?php echo $param['url']?> = [<?php echo "\"".implode("\",\"", $param['labels'])."\""?>];
                <?php $bulan = listBulan(); ?>

                for(var i = 0; i < data.length; i++) {

                    /*<?php //echo $param['url']?>.push(data[i].<?php //echo $param['url']?>);*/

                    /*console.log(value);
                    console.log(key);*/
                    //console.log(Object.entries(data)[i][1]);

                    <?php
                        if ($stacked || $grouped) {
                    ?>
                    warna_dinamis = dynamicColors("0.5");
                    jumlah[data[i][0]].push((data[i].jumlah == 0) ? 0 : data[i].jumlah );
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
                    var jml = [];
                    //console.log(data[i]);
                    for (var m = 0; m < 12; m++) {
                        for (var j = 0; j < data[i][1].length; j++) {
                            if (data[i][1][j].bulan == m) {
                                jml[m] = ((data[i][1][j].jumlah == 0 || data[i][1][j].jumlah == undefined) ? 0 : data[i][1][j].jumlah );
                                total += data[i][1][j].jumlah;
                            }
                        }
                    }

                    jumlah.push(jml);
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
                    //labels: <?php //echo $param['url']?>,

                    labels: [<?php echo "\"".implode("\",\"", $bulan)."\""?>],
                    datasets : [

                    <?php
                        if ($stacked || $grouped) {
                    ?>

                        {
                            label: "semester_1",
                            fillColor: dynamicColors("0.5"),
                            strokeColor: dynamicColors(),
                            pointColor: dynamicColors(),
                            backgroundColor: warna["semester_1"],
                            borderColor: tepi["semester_1"],
                            borderWidth: 1,
                            data: jumlah["semester_1"]
                        },
                        {
                            label: "semester_2",
                            fillColor: dynamicColors("0.5"),
                            strokeColor: dynamicColors(),
                            pointColor: dynamicColors(),
                            backgroundColor: warna["semester_2"],
                            borderColor: tepi["semester_2"],
                            borderWidth: 1,
                            data: jumlah["semester_2"]
                        }

                    <?php
                        } else {

                    ?>
                    <?php

                            foreach ($param['labels'] as $key => $value) {

                    ?>

                        {
                            
                            label: '<?=$value?>',
                    <?php
                        if ($param['type'] == "line") {
                    ?>
                            /*fillColor: gradient,*/
                            fill: false,
                    <?php
                        } else {
                    ?>
                            fillColor: dynamicColors("0.5"),
                    <?php
                        }
                    ?>
                            strokeColor: dynamicColors(),
                            pointColor: dynamicColors(),
                            backgroundColor: warna[<?=$key?>],
                            borderColor: tepi[<?=$key?>],
                            borderWidth: 1,
                            data: jumlah[<?=$key?>]
                        },

                    <?php
                            }
                    ?>

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

                /*** Gradient ***/
                var baseColor = dynamicColors();
                var gradient = document.getElementById("myChart").getContext("2d").createLinearGradient(0, 0, 0, 100);
                    gradient.addColorStop(0, baseColor.replace(",0", ",1"));   
                    gradient.addColorStop(1, baseColor);

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

