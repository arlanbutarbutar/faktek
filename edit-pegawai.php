<?php require_once("controller/script.php");
  if(!isset($_GET['id-pegawai'])){header("Location: pegawai.php");}
  require_once("controller/redirect-unusers.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="Edit Pegawai"; $_SESSION['page-to']="edit-pegawai.php?id-pegawai=".$_GET['id-pegawai']; $_SESSION['search']=2;
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
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <?php if(mysqli_num_rows($editPegawai)>0){while($row=mysqli_fetch_assoc($editPegawai)){?>
                    <form class="forms-sample"  method="POST">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" value="<?= $row['nama']?>" class="form-control" placeholder="Nama" required>
                      </div>
                      <div class="form-group">
                        <label>NIP</label>
                        <input type="number" name="nip" value="<?= $row['nip']?>" class="form-control" placeholder="Nip" required>
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" value="<?= $row['alamat']?>" class="form-control" placeholder="Alamat" required>
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk" class="form-control" required>
                          <option value="">Pilih Jenis Kelamin</option>
                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="jabatan" value="<?= $row['jabatan']?>" class="form-control" placeholder="Jabatan" required>
                      </div>
                      <div class="form-group">
                        <label>No Handphone</label>
                        <input type="number" name="no_hp" value="<?= $row['no_hp']?>" class="form-control" placeholder="No Handphone" required>
                      </div>
                      <div class="form-group">
                        <label>TTL (Tempat Tanggal Lahir)</label>
                        <input type="text" name="ttl" value="<?= $row['ttl']?>" class="form-control" placeholder="Tempat Tanggal Lahir" required>
                      </div>
                      <input type="hidden" name="id-pegawai" value="<?= $row['id_pegawai']?>">
                      <input type="hidden" name="oldNip" value="<?= $row['nip']?>">
                      <button type="submit" name="ubah-pegawai" class="btn btn-primary me-2">Ubah</button>
                      <button type="button" onclick="window.location.href='pegawai.php'" class="btn btn-light">Kembali</button>
                    </form>
                  <?php }}?>
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

