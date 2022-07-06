<?php require_once("controller/script.php");
  require_once("controller/redirect-unusers.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="Pegawai"; $_SESSION['page-to']="pegawai"; $_SESSION['search']=1;
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
                    <button type="submit" onclick="window.location.href='tambah-pegawai.php'" class="btn btn-primary btn-icon-text btn-rounded">
                      Tambah
                    </button>
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
                            <th scope="col">Nama</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">JK</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">NO HP</th>
                            <th scope="col">TTL</th>
                            <th colspan="2">Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="search-page">
                          <?php if(mysqli_num_rows($pegawai)==0){?>
                          <tr>
                              <th colspan="10">Belum ada data.</th>
                          </tr>
                          <?php }$no=1; if(mysqli_num_rows($pegawai)>0){while($row=mysqli_fetch_assoc($pegawai)){?>
                            <tr>
                              <th scope="row"><?= $no;?></th>
                              <td><?= $row['nama']?></td>
                              <td><?= $row['nip']?></td>
                              <td><?= $row['alamat']?></td>
                              <td><?= $row['jk']?></td>
                              <td><?= $row['jabatan']?></td>
                              <td><?= $row['no_hp']?></td>
                              <td><?= $row['ttl']?></td>
                              <td>
                                <a href="edit-pegawai.php?id-pegawai=<?= $row['id_pegawai']?>" class="btn btn-warning btn-sm">Ubah</a>
                              </td>
                              <td>
                                <form action="" method="POST">
                                  <input type="hidden" name="id-pegawai" value="<?= $row['id_pegawai']?>">
                                  <button type="submit" name="hapus-pegawai" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                              </td>
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

