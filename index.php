<?php require_once("controller/script.php");
  require_once("controller/redirect-unusers.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="Dashboard"; $_SESSION['page-to']="./"; $_SESSION['search']=2;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once("resources/header.php");?>
  </head>
  <body>
    <?php require_once("resources/topbar.php");?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <?php require_once("resources/sidebar.php");?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h4 class="font-weight-bold mb-0"><?= $_SESSION['page-name']?></h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <a href="index.php?chart=1" style="text-decoration: none;">
                      <p class="card-title text-md-center text-xl-left">Teknik Arsitektur</p>
                      <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $countProdiArsitek?></h3>
                        <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <a href="index.php?chart=2" style="text-decoration: none;">
                      <p class="card-title text-md-center text-xl-left">Teknik Sipil</p>
                      <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $countProdiSipil?></h3>
                        <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <a href="index.php?chart=3" style="text-decoration: none;">
                      <p class="card-title text-md-center text-xl-left">Teknik Ilmu Komputer</p>
                      <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $countProdiIlkom?></h3>
                        <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <?php if(isset($_GET['chart'])){if($_GET['chart']==1){?>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Teknik Arsitektur</p>
                    <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                    <canvas id="sales-chart"></canvas>
                    <?php 
                      $mhsWisuda3=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE id_prodi='11' AND lama_studi='3'");
                      $count_mhsWisuda3=mysqli_num_rows($mhsWisuda3);
                      $mhsWisuda4=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE id_prodi='11' AND lama_studi='4'");
                      $count_mhsWisuda4=mysqli_num_rows($mhsWisuda4);
                      $mhsWisuda5=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE id_prodi='11' AND lama_studi='5'");
                      $count_mhsWisuda5=mysqli_num_rows($mhsWisuda5);
                      $mhsWisuda6=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE id_prodi='11' AND lama_studi='6'");
                      $count_mhsWisuda6=mysqli_num_rows($mhsWisuda6);
                    ?>
                    <script type="text/javascript">
                      (function($) {
                        'use strict';
                        $(function() {

                          if ($("#sales-chart").length) {
                            var SalesChartCanvas = $("#sales-chart").get(0).getContext("2d");
                            var SalesChart = new Chart(SalesChartCanvas, {
                              type: 'bar',
                              label: 'Lama Studi',
                              data: {
                                labels: ["3 Tahun", "4 Tahun", "5 Tahun", "6 Tahun"],
                                datasets: [{
                                    label: 'Mahasiswa Wisuda',
                                    data: [<?= $count_mhsWisuda3?>, <?= $count_mhsWisuda4?>, <?= $count_mhsWisuda5?>, <?= $count_mhsWisuda6?>],
                                    backgroundColor: '#316FFF'
                                  }
                                ]
                              },
                              options: {
                                responsive: true,
                                maintainAspectRatio: true,
                                layout: {
                                  padding: {
                                    left: 0,
                                    right: 0,
                                    top: 20,
                                    bottom: 0
                                  }
                                },
                                scales: {
                                  yAxes: [{
                                    display: true,
                                    gridLines: {
                                      display: false,
                                      drawBorder: false
                                    },
                                    ticks: {
                                      display: false,
                                      min: 0,
                                      max: 500
                                    }
                                  }],
                                  xAxes: [{
                                    stacked: false,
                                    ticks: {
                                      beginAtZero: true,
                                      fontColor: "#9fa0a2"
                                    },
                                    gridLines: {
                                      color: "rgba(0, 0, 0, 0)",
                                      display: false
                                    },
                                    barPercentage: 1
                                  }]
                                },
                                legend: {
                                  display: false
                                },
                                elements: {
                                  point: {
                                    radius: 0
                                  }
                                }
                              },
                            });
                            document.getElementById('sales-legend').innerHTML = SalesChart.generateLegend();
                          }

                        });
                      })(jQuery);
                    </script>
                  </div>
                </div>
              </div>
            </div>
            <?php }if($_GET['chart']==2){?>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Teknik Sipil</p>
                    <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                    <canvas id="sales-chart"></canvas>
                    <?php 
                      $mhsWisuda3=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE id_prodi='12' AND lama_studi='3'");
                      $count_mhsWisuda3=mysqli_num_rows($mhsWisuda3);
                      $mhsWisuda4=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE id_prodi='12' AND lama_studi='4'");
                      $count_mhsWisuda4=mysqli_num_rows($mhsWisuda4);
                      $mhsWisuda5=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE id_prodi='12' AND lama_studi='5'");
                      $count_mhsWisuda5=mysqli_num_rows($mhsWisuda5);
                      $mhsWisuda6=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE id_prodi='12' AND lama_studi='6'");
                      $count_mhsWisuda6=mysqli_num_rows($mhsWisuda6);
                    ?>
                    <script type="text/javascript">
                      (function($) {
                        'use strict';
                        $(function() {

                          if ($("#sales-chart").length) {
                            var SalesChartCanvas = $("#sales-chart").get(0).getContext("2d");
                            var SalesChart = new Chart(SalesChartCanvas, {
                              type: 'bar',
                              label: 'Lama Studi',
                              data: {
                                labels: ["3 Tahun", "4 Tahun", "5 Tahun", "6 Tahun"],
                                datasets: [{
                                    label: 'Mahasiswa Wisuda',
                                    data: [<?= $count_mhsWisuda3?>, <?= $count_mhsWisuda4?>, <?= $count_mhsWisuda5?>, <?= $count_mhsWisuda6?>],
                                    backgroundColor: '#316FFF'
                                  }
                                ]
                              },
                              options: {
                                responsive: true,
                                maintainAspectRatio: true,
                                layout: {
                                  padding: {
                                    left: 0,
                                    right: 0,
                                    top: 20,
                                    bottom: 0
                                  }
                                },
                                scales: {
                                  yAxes: [{
                                    display: true,
                                    gridLines: {
                                      display: false,
                                      drawBorder: false
                                    },
                                    ticks: {
                                      display: false,
                                      min: 0,
                                      max: 500
                                    }
                                  }],
                                  xAxes: [{
                                    stacked: false,
                                    ticks: {
                                      beginAtZero: true,
                                      fontColor: "#9fa0a2"
                                    },
                                    gridLines: {
                                      color: "rgba(0, 0, 0, 0)",
                                      display: false
                                    },
                                    barPercentage: 1
                                  }]
                                },
                                legend: {
                                  display: false
                                },
                                elements: {
                                  point: {
                                    radius: 0
                                  }
                                }
                              },
                            });
                            document.getElementById('sales-legend').innerHTML = SalesChart.generateLegend();
                          }

                        });
                      })(jQuery);
                    </script>
                  </div>
                </div>
              </div>
            </div>
            <?php }if($_GET['chart']==3){?>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Teknik Ilmu Komputer</p>
                    <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                    <canvas id="sales-chart"></canvas>
                    <?php 
                      $mhsWisuda3=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE id_prodi='13' AND lama_studi='3'");
                      $count_mhsWisuda3=mysqli_num_rows($mhsWisuda3);
                      $mhsWisuda4=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE id_prodi='13' AND lama_studi='4'");
                      $count_mhsWisuda4=mysqli_num_rows($mhsWisuda4);
                      $mhsWisuda5=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE id_prodi='13' AND lama_studi='5'");
                      $count_mhsWisuda5=mysqli_num_rows($mhsWisuda5);
                      $mhsWisuda6=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE id_prodi='13' AND lama_studi='6'");
                      $count_mhsWisuda6=mysqli_num_rows($mhsWisuda6);
                    ?>
                    <script type="text/javascript">
                      (function($) {
                        'use strict';
                        $(function() {

                          if ($("#sales-chart").length) {
                            var SalesChartCanvas = $("#sales-chart").get(0).getContext("2d");
                            var SalesChart = new Chart(SalesChartCanvas, {
                              type: 'bar',
                              label: 'Lama Studi',
                              data: {
                                labels: ["3 Tahun", "4 Tahun", "5 Tahun", "6 Tahun"],
                                datasets: [{
                                    label: 'Mahasiswa Wisuda',
                                    data: [<?= $count_mhsWisuda3?>, <?= $count_mhsWisuda4?>, <?= $count_mhsWisuda5?>, <?= $count_mhsWisuda6?>],
                                    backgroundColor: '#316FFF'
                                  }
                                ]
                              },
                              options: {
                                responsive: true,
                                maintainAspectRatio: true,
                                layout: {
                                  padding: {
                                    left: 0,
                                    right: 0,
                                    top: 20,
                                    bottom: 0
                                  }
                                },
                                scales: {
                                  yAxes: [{
                                    display: true,
                                    gridLines: {
                                      display: false,
                                      drawBorder: false
                                    },
                                    ticks: {
                                      display: false,
                                      min: 0,
                                      max: 500
                                    }
                                  }],
                                  xAxes: [{
                                    stacked: false,
                                    ticks: {
                                      beginAtZero: true,
                                      fontColor: "#9fa0a2"
                                    },
                                    gridLines: {
                                      color: "rgba(0, 0, 0, 0)",
                                      display: false
                                    },
                                    barPercentage: 1
                                  }]
                                },
                                legend: {
                                  display: false
                                },
                                elements: {
                                  point: {
                                    radius: 0
                                  }
                                }
                              },
                            });
                            document.getElementById('sales-legend').innerHTML = SalesChart.generateLegend();
                          }

                        });
                      })(jQuery);
                    </script>
                  </div>
                </div>
              </div>
            </div>
            <?php }}?>
          </div>
          <!-- content-wrapper ends -->
          <?php require_once("resources/footer.php");?>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <?php require_once("resources/footer.js.php");?>
  </body>
</html>

