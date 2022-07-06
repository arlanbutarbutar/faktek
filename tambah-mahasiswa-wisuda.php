<?php require_once("controller/script.php");
  require_once("controller/redirect-unusers.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="Tambah Mahasiswa Wisuda"; $_SESSION['page-to']="tambah-mahasiswa-wisuda.php"; $_SESSION['search']=2;
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
                    <form class="forms-sample"  method="POST">
                      <div class="form-group">
                        <label>NIM dan Nama</label>
                        <select name="noreg" class="form-control" required>
                          <option value="">Pilih Mahasiswa</option>
                          <?php foreach($selectNewMahasiswa as $row_newMhs):?>
                          <option value="<?= $row_newMhs['noreg']?>"><?= $row_newMhs['noreg'].' - '.$row_newMhs['nama']?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Tgl Lulus</label>
                        <input type="date" name="tgl_lulus" value="<?php if(isset($_POST['tgl_lulus'])){echo $_POST['tgl_lulus'];}?>" class="form-control" placeholder="Tanggal Lulus" required>
                      </div>
                      <div class="form-group">
                        <label>IPK</label>
                        <input type="text" name="ipk" value="<?php if(isset($_POST['ipk'])){echo $_POST['ipk'];}?>" class="form-control" placeholder="ipk" required>
                      </div>
                      <div class="form-group">
                        <label>Tahun Wisuda</label>
                        <input type="date" name="tahun_wisuda" value="<?php if(isset($_POST['tahun_wisuda'])){echo $_POST['tahun_wisuda'];}?>" class="form-control" placeholder="Tahun Wisuda" required>
                      </div>
                      <div class="form-group">
                        <label>Wisuda Ke</label>
                        <input type="number" name="wisuda_ke" value="<?php if(isset($_POST['wisuda_ke'])){echo $_POST['wisuda_ke'];}?>" class="form-control" placeholder="Wisuda Ke" required>
                      </div>
                      <button type="submit" name="simpan-mhsWisuda" class="btn btn-primary me-2">Tambah</button>
                      <button type="button" onclick="window.location.href='mahasiswa-wisuda.php'" class="btn btn-light">Kembali</button>
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

