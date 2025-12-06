<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hidrologi</title>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Tinggi Muka Air</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ch.php">Curah Hujan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kekeruhan.php">Kekeruhan Air</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="hidrologi.php">Hidrologi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container mt-3">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Grafik Hidrologi</h5>
                            <hr>
                            <div id="grafik">
                                <?php
                                    include "koneksi.php";
                                    $tma=mysqli_query($koneksi,"SELECT * FROM tma");
                                    while($row_tma=mysqli_fetch_array($tma)){
                                        $data_tma[]=array(
                                        $row_tma['waktu'],
                                        floatval($row_tma['nilai'])
                                        );
                                    }
                                    $json1 = json_encode($data_tma);
                                ?>
                                <?php
                                    include "koneksi.php";
                                    $kekeruhan=mysqli_query($koneksi,"SELECT * FROM kekeruhan");
                                    while($row_kekeruhan=mysqli_fetch_array($kekeruhan)){
                                        $data_kekeruhan[]=array(
                                        $row_kekeruhan['waktu'],
                                        floatval($row_kekeruhan['nilai'])
                                        );
                                    }
                                    $json2 = json_encode($data_kekeruhan);
                                ?>
                                <?php
                                    include "koneksi.php";
                                    $ch=mysqli_query($koneksi,"SELECT * FROM ch");
                                    while($row_ch=mysqli_fetch_array($ch)){
                                        $data_ch[]=array(
                                        $row_ch['waktu'],
                                        floatval($row_ch['nilai'])
                                        );
                                    }
                                    $json3 = json_encode($data_ch);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    
    <script type="text/javascript">
        Highcharts.chart('grafik',{
            chart:{
                zoomType:'x'
            },
            title:{
                text:'Hidrologi Bengawan Solo'
            },
            subtitle:{
                text:'Latihan Highcharts'
            },
            yAxis:[
            {
                title: {
                text: 'Nilai Ketinggian (meter)'
                }
            },
            {
                reversed:true,
                title: {
                    text: 'Curah Hujan (mm)'
                },
                opposite:true
            },
            {
                title: {
                    text: 'Tingkat Kekeruhan (NTU)'
                }
            },
            {
                type:'column',
            }],
            xAxis:{
                type:'category',
                accessibility:{
                    rangeDescription:'Waktu'
                }
            },
            legend:{
                layout:'vertical',
                align:'right',
                verticalAlign:'middle'
            },
            plotOptions:{
                column:{
                    plotPadding:'0,1',
                    color:'green'
                }
            },
            series:[{
                name:'Kekeruhan Air',
                tooltip:{
                    pointFormat:'{point.y} NTU',
                    shared: true
                },
                type:'area',
                threshold:2,
                color:'#b5651d',
                fillColor:{
                    linearGradient:{
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops:[
                        [0, '#b5651d'],
                        [1, '#ffffff']
                    ] 
                },
                data:<?= $json2 ?>
            },{
                type:'column',
                tooltip:{
                    pointFormat:'{point.y} mm',
                    shared: true
                },
                name:'Curah Hujan',
                data:<?= $json3 ?>,
                yAxis:1
            },{
                type:'line',
                tooltip:{
                    pointFormat:'{point.y} Meter',
                    shared: true
                },
                name:'Tinggi Muka Air',
                lineWidth:2,
                data:<?= $json1 ?>
            }],
            responsive:{
                rules:[{
                    condition:{
                        maxWidth:500
                    },
                    chartOptions:{
                        legend:{
                            layout:'horizontal',
                            align:'center',
                            verticalAlign:'bottom'
                        }
                    }
                }]
            }
        });
    </script>
  </body>
</html>