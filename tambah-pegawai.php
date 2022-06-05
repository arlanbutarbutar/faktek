<?php require_once("controller/script.php");
  require_once("controller/redirect-unusers.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="Tambah Pegawai"; $_SESSION['page-to']="tambah-pegawai.php"; $_SESSION['search']=2;
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
                    <form class="forms-sample" method="POST">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" value="<?php if(isset($_POST['nama'])){echo $_POST['nama'];}?>" class="form-control" placeholder="Nama" required>
                      </div>
                      <div class="form-group">
                        <label>NIP</label>
                        <input type="number" name="nip" value="<?php if(isset($_POST['nip'])){echo $_POST['nip'];}?>" class="form-control" placeholder="Nip" required>
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" value="<?php if(isset($_POST['alamat'])){echo $_POST['alamat'];}?>" class="form-control" placeholder="Alamat" required>
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
                        <input type="text" name="jabatan" value="<?php if(isset($_POST['jabatan'])){echo $_POST['jabatan'];}?>" class="form-control" placeholder="Jabatan" required>
                      </div>
                      <div class="form-group">
                        <label>No Handphone</label>
                        <input type="number" name="no_hp" value="<?php if(isset($_POST['no_hp'])){echo $_POST['no_hp'];}?>" class="form-control" placeholder="No Handphone" required>
                      </div>
                      <div class="form-group">
                        <label>TTL (Tempat Tanggal Lahir)</label>
                        <input type="text" name="ttl" value="<?php if(isset($_POST['ttl'])){echo $_POST['ttl'];}?>" class="form-control" placeholder="Tempat Tanggal Lahir" required>
                      </div>
                      <button type="submit" name="simpan-pegawai" class="btn btn-primary me-2">Tambah</button>
                      <button type="button" onclick="window.location.href='pegawai.php'" class="btn btn-light">Kembali</button>
                    </form>
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

