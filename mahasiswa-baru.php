<?php require_once("controller/script.php");
  require_once("controller/redirect-unusers.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="Mahasiswa Baru"; $_SESSION['page-to']="mahasiswa-baru.php"; $_SESSION['search']=1;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once("resources/header.php");?>
  </head>
  <body>
    <?php if(isset($_SESSION['message-success'])){?>
    <div class="message-success" data-message-success="<?= $_SESSION['message-success']?>"></div>
    <?php } if(isset($_SESSION['message-info'])){?>
    <div class="message-info" data-message-info="<?= $_SESSION['message-info']?>"></div>
    <?php } if(isset($_SESSION['message-warning'])){?>
    <div class="message-warning" data-message-warning="<?= $_SESSION['message-warning']?>"></div>
    <?php } if(isset($_SESSION['message-danger'])){?>
    <div class="message-danger" data-message-danger="<?= $_SESSION['message-danger']?>"></div>
    <?php } require_once("resources/topbar.php");?>
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
                  <div>
                    <button type="submit" onclick="window.location.href='tambah-mahasiswa-baru.php'" class="btn btn-primary btn-icon-text btn-rounded">
                      Tambah
                    </button>
                    <a href="export-pdf-baru.php" class="btn btn-danger btn-icon-text btn-rounded" target="_blank">Export PDF</a>
                    <a href="export-excel-baru.php" class="btn btn-success btn-icon-text btn-rounded" target="_blank">Export Excel</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped text-center">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Noreg</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">JK</th>
                            <th scope="col">TTL</th>
                            <th scope="col">Tgl Masuk</th>
                            <th scope="col">Asal Sekolah</th>
                            <th scope="col">Nilai Tes</th>
                            <th colspan="2">Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="search-page">
                          <?php if(mysqli_num_rows($newMahasiswa)==0){?>
                          <tr>
                            <th colspan="11">Belum ada data.</th>
                          </tr>
                          <?php }$no=1; if(mysqli_num_rows($newMahasiswa)>0){while($row=mysqli_fetch_assoc($newMahasiswa)){?>
                            <tr>
                              <th scope="row"><?= $no;?></th>
                              <td><?= $row['noreg']?></td>
                              <td><?= $row['nama']?></td>
                              <td><?= $row['prodi']?></td>
                              <td><?= $row['jk']?></td>
                              <td><?= $row['ttl']?></td>
                              <td><?php $tgl_masuk=date_create($row['tgl_masuk']); $tgl_masuk=date_format($tgl_masuk, "d M Y"); echo $tgl_masuk;?></td>
                              <td><?= $row['asal_sklh']?></td>
                              <td><?= $row['nilai_tes']?></td>
                              <td>
                                <a href="edit-mahasiswa-baru.php?id-mhs-baru=<?= $row['id_mhs']?>" class="btn btn-warning btn-sm">Ubah</a>
                              </td>
                              <td>
                                <form action="" method="POST">
                                  <input type="hidden" name="id-mhs" value="<?= $row['id_mhs']?>">
                                  <button type="submit" name="hapus-mhsBaru" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                              </td>
                            </tr>
                          <?php $no++; }}?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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

