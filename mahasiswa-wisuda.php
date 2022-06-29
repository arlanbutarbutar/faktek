<?php require_once("controller/script.php");
  require_once("controller/redirect-unusers.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="Mahasiswa Wisuda"; $_SESSION['page-to']="mahasiswa-wisuda"; $_SESSION['search']=1;
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
                    <button type="submit" onclick="window.location.href='tambah-mahasiswa-wisuda'" class="btn btn-primary btn-icon-text btn-rounded">
                      Tambah
                    </button>
                    <a href="export-pdf?page-to=<?= $_SESSION['page-to']?>" class="btn btn-danger btn-icon-text btn-rounded">Export PDF</a>
                    <a href="export-excel?page-to=<?= $_SESSION['page-to']?>" class="btn btn-success btn-icon-text btn-rounded">Export Excel</a>
                    <a href="import-excel" class="btn btn-success btn-icon-text btn-rounded">Import Excel</a>
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
                            <th scope="col">Program Studi</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">TTL</th>
                            <th scope="col">Tgl Masuk</th>
                            <th scope="col">Tgl Lulus</th>
                            <th scope="col">IPK</th>
                            <th scope="col">Predikat</th>
                            <th scope="col">Tahun Wisuda</th>
                            <th scope="col">Wisuda Ke</th>                        
                            <th scope="col">Lama Studi</th>
                            <th colspan="2">Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="search-page">
                          <?php if(mysqli_num_rows($wisudaMahasiswa)==0){?>
                          <tr>
                            <th colspan="15">Belum ada data.</th>
                          </tr>
                          <?php }$no=1; if(mysqli_num_rows($wisudaMahasiswa)>0){while($row=mysqli_fetch_assoc($wisudaMahasiswa)){?>
                            <tr>
                              <th scope="row"><?= $no;?></th>
                              <td><?= $row['prodi']?></td> 
                              <td><?= $row['noreg']?></td>
                              <td><?= $row['nama']?></td>
                              <td><?= $row['jk']?></td>
                              <td><?= $row['ttl']?></td>
                              <td><?= $row['tgl_masuk']?></td>
                              <td><?= $row['tgl_lulus']?></td>
                              <td><?= $row['ipk']?></td>
                              <td><?= $row['predikat_lulus']?></td>
                              <td><?= $row['tahun_wisuda']?></td>
                              <td><?= $row['wisuda_ke']?></td>
                              <td><?= $row['lama_studi']?></td>
                              <td>
                                <a href="edit-mahasiswa-wisuda?id-mhs-wisuda=<?= $row['id_mhs']?>" class="btn btn-warning btn-sm">Ubah</a>
                              </td>
                              <td>
                                <form action="" method="POST">
                                  <input type="hidden" name="id-mhs" value="<?= $row['id_mhs']?>">
                                  <button type="submit" name="hapus-mhsWisuda" class="btn btn-danger btn-sm" data-toggle="modal">Hapus</button>
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

