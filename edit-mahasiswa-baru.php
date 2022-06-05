<?php require_once("controller/script.php");
  if(!isset($_GET['id-mhs-baru'])){header("Location: mahasiswa-baru.php");}
  require_once("controller/redirect-unusers.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="Edit Mahasiswa Baru"; $_SESSION['page-to']="edit-mahasiswa-baru.php?id-mhs-baru=".$_GET['id-mhs-baru']; $_SESSION['search']=2;
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
                    <?php if(mysqli_num_rows($newEditMahasiswa)>0){while($row=mysqli_fetch_assoc($newEditMahasiswa)){?>
                    <form class="forms-sample"  method="POST">
                      <div class="form-group">
                        <label>Program Studi</label>
                        <select name="id-prodi" class="form-control" required>
                          <option value="">Pilih Prodi</option>
                          <?php foreach($selectProdi as $row_prodi):?>
                          <option value="<?= $row_prodi['id_prodi']?>"><?= $row_prodi['prodi']?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Noreg</label>
                        <input type="number" name="noreg" value="<?= $row['noreg']?>" class="form-control" placeholder="Nomor Registrasi" required>
                      </div>
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" value="<?= $row['nama']?>" class="form-control" placeholder="Nama" required>
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk" class="form-control" required>
                          <option value="">Pilih Jenis Kelamin</option>
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>TTL (Tempat Tanggal Lahir)</label>
                        <input type="text" name="ttl" value="<?= $row['ttl']?>" class="form-control" placeholder="Tempat Lahir" required>
                      </div>
                      <div class="form-group">
                        <label>Tgl Masuk</label>
                        <input type="date" name="tgl_masuk" value="<?= $row['tgl_masuk']?>" class="form-control" placeholder="Tanggal Masuk" required>
                      </div>
                      <div class="form-group">
                        <label>Asal Sekolah</label>
                        <input type="text" name="asal-sekolah" value="<?= $row['asal_sklh']?>" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Nilai Tes</label>
                        <input type="number" name="nilai-tes" value="<?= $row['nilai_tes']?>" class="form-control" required>
                      </div>
                      <input type="hidden" name="id-mhs" value="<?= $row['id_mhs']?>">
                      <input type="hidden" name="oldNoreg" value="<?= $row['noreg']?>">
                      <button type="submit" name="ubah-mhsBaru" class="btn btn-primary me-2">Ubah</button>
                      <button type="button" onclick="window.location.href='mahasiswa-baru.php'" class="btn btn-light">Kembali</button>
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

