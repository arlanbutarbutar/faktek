<?php require_once("controller/script.php");
  if(!isset($_GET['id-user'])){header("Location: users");}
  require_once("controller/redirect-unusers.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="Edit User"; $_SESSION['page-to']="edit-user?id-user=".$_GET['id-user']; $_SESSION['search']=2;
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
                    <?php if(mysqli_num_rows($editUser)>0){while($row=mysqli_fetch_assoc($editUser)){?>
                    <form class="forms-sample"  method="POST">
                      <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" value="<?= $row['nama']?>" placeholder="Nama" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?= $row['email']?>" placeholder="Email" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="id-active">Status</label>
                        <select name="id-active" id="id-active" class="form-control" required>
                          <option value="">Pilih Status</option>
                          <?php foreach($viewUser_active as $rowAct):?>
                          <option value="<?= $rowAct['id_active']?>"><?= $rowAct['status']?></option>
                          <?php endforeach;?>
                        </select>
                      </div> 
                      <div class="form-group">
                        <label for="id-role">Role</label>
                        <select name="id-role" id="id-role" class="form-control" required>
                          <option value="">Pilih Status</option>
                          <?php foreach($viewUser_role as $rowRole):?>
                          <option value="<?= $rowRole['id_role']?>"><?= $rowRole['role']?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                      <input type="hidden" name="id-user" value="<?= $row['id_user']?>">
                      <input type="hidden" name="oldEmail" value="<?= $row['email']?>">
                      <button type="submit" name="ubah-user" class="btn btn-primary me-2">Ubah</button>
                      <button type="button" onclick="window.location.href='users'" class="btn btn-light">Kembali</button>
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

