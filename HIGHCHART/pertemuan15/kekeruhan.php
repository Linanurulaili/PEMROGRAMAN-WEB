<?php
require_once('koneksi.php');
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Data Tables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <!-- Highcharts -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

  <title>Pertemuan 15 | Highcharts</title>
</head>

<body>
  <!-- Navbar -->
  <header>
    <nav class=" navbar navbar-expand-lg navbar-dark bg-dark">
      <div class=" container-fluid">
        <div class=" collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class=" nav-item"><a class=" nav-link" href="index.php">Tinggi Muka Air</a></li>
            <li class=" nav-item"><a class=" nav-link" href="ch.php">Curah Hujan</a></li>
            <li class=" nav-item"><a class=" nav-link" href="kekeruhan.php">Kekeruhan Air</a></li>
            <li class=" nav-item"><a class=" nav-link" href="hidrologi.php">Hidorologi</a></li>
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
              <div class="card-title">Grafik Kekeruhan</div>
              <hr>

              <?php

              $kekeruhan = mysqli_query($koneksi, 'select * from kekeruhan');
              while ($row=mysqli_fetch_array($kekeruhan)){
                $data[] = array(
                    $row['waktu'],
                    floatval($row['nilai'])
                );
              }
              $json = json_encode($data);

              ?>

              <div id="grafik"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- Data Tables -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!-- Highcharts -->
  <script type="text/javascript">
        Highcharts.chart('grafik',{
            chart:{
                type: 'area',
                zoomType:'xy',
            },
            title:{
                text:'Kekeruhan Air'
            },
            subtitle:{
                text:'Latihan Highcharts'
            },
            yAxis:{
                title: {
                    text: 'Nilai Kekeruhan'
                }
            },
            xAxis:{
                type:'category',
                accessibility:{
                    rangeDescription:'Waktu'
                }
            },
            tooltip:{
                pointFormat:'{point.y} NTU',
                shared:true
            },
            legend:{
                layout:'vertical',
                align:'right',
                verticalAlign:'middle'
            },
            plotOptions: {
              series: {
                label: {
                  connectorAllowed: false
                }
              }
            },
            series:[{
                name:'Kekeruhan Air',
                type:'area',
                threshold:null,
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
                data : <?= $json ?>
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