<?php require_once("controller/script.php");
  if(!isset($_GET['id-mhs-wisuda'])){header("Location: mahasiswa-wisuda");}
  require_once("controller/redirect-unusers.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="Edit Mahasiswa Wisuda"; $_SESSION['page-to']="edit-mahasiswa-wisuda?id-mhs-wisuda=".$_GET['id-mhs-wisuda']; $_SESSION['search']=2;
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
                    <?php if(mysqli_num_rows($wisudaEditMahasiswa)>0){while($row=mysqli_fetch_assoc($wisudaEditMahasiswa)){?>
                    <form class="forms-sample"  method="POST">
                      <div class="form-group">
                        <label>Program Studi</label>
                        <select name="id-prodi" class="form-control" required>
                          <?php 
                            $id_prodi=$row['id_prodi'];
                            $selectProdi=mysqli_query($conn, "SELECT * FROM prodi WHERE id_prodi!='$id_prodi'");
                            $selectProdi_view=mysqli_query($conn, "SELECT * FROM prodi WHERE id_prodi='$id_prodi'");
                            $row_pv=mysqli_fetch_assoc($selectProdi_view);
                          ?>
                          <option value="<?= $row_pv['id_prodi']?>"><?= $row_pv['prodi']?></option>
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
                          <option value="<?= $row['jk']?>"><?php if($row['jk']=="L"){echo "Laki-Laki";}else if($row['jk']=="P"){echo "Perempuan";}?></option>
                          <option value="<?php if($row['jk']=="L"){echo "P";}else if($row['jk']=="P"){echo "L";}?>"><?php if($row['jk']=="L"){echo "Perempuan";}else if($row['jk']=="P"){echo "Laki-Laki";}?></option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>TTL (Tempat Tanggal Lahir)</label>
                        <input type="text" name="ttl" value="<?= $row['ttl']?>" class="form-control" placeholder="Tempat Lahir" required>
                      </div>
                      <div class="form-group">
                        <label>Tgl Masuk</label>
                        <input type="date" name="tgl_masuk" value="<?php $tgl_masuk=date_create($row['tgl_masuk']); echo date_format($tgl_masuk, "Y-m-d");?>" class="form-control" placeholder="Tanggal Masuk" required>
                      </div>
                      <div class="form-group">
                        <label>Tgl Lulus</label>
                        <input type="date" name="tgl_lulus" value="<?php $tgl_lulus=date_create($row['tgl_lulus']); echo date_format($tgl_lulus, "Y-m-d"); ?>" class="form-control" placeholder="Tanggal Lulus" required>
                      </div>
                      <div class="form-group">
                        <label>IPK</label>
                        <input type="text" name="ipk" value="<?= $row['ipk']?>" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Predikat Lulus</label>
                        <input type="text" name="predikat" value="<?= $row['predikat_lulus']?>" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Tahun Wisuda</label>
                        <input type="number" name="tahun_wisuda" value="<?= $row['tahun_wisuda']?>" class="form-control" placeholder="Tahun Wisuda" required>
                      </div>
                      <div class="form-group">
                        <label>Wisuda Ke</label>
                        <input type="number" name="wisuda_ke" value="<?= $row['wisuda_ke']?>" class="form-control" placeholder="Wisuda Ke" required>
                      </div>
                      <div class="form-group">
                        <label>Lama Studi</label>
                        <input type="number" name="lama_studi" value="<?= $row['lama_studi']?>" class="form-control" placeholder="Lama Studi" required>
                      </div>
                      <input type="hidden" name="id-mhs" value="<?= $row['id_mhs']?>">
                      <input type="hidden" name="oldNoreg" value="<?= $row['noreg']?>">
                      <button type="submit" name="ubah-mhsWisuda" class="btn btn-primary me-2">Ubah</button>
                      <button type="button" onclick="window.location.href='mahasiswa-wisuda'" class="btn btn-light">Kembali</button>
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

