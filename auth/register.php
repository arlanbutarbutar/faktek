<?php require_once("../controller/script.php");
    $_SESSION['auth']=1; $_SESSION['page-name']="Register"; $_SESSION['page-to']="register.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <?php require_once("../resources/header-auth.php");?>
  </head>
  <body class="h-100">
    <?php if(isset($_SESSION['message-success'])){?>
    <div class="message-success" data-message-success="<?= $_SESSION['message-success']?>"></div>
    <?php } if(isset($_SESSION['message-info'])){?>
    <div class="message-info" data-message-info="<?= $_SESSION['message-info']?>"></div>
    <?php } if(isset($_SESSION['message-warning'])){?>
    <div class="message-warning" data-message-warning="<?= $_SESSION['message-warning']?>"></div>
    <?php } if(isset($_SESSION['message-danger'])){?>
    <div class="message-danger" data-message-danger="<?= $_SESSION['message-danger']?>"></div>
    <?php }?>
    <div class="authincation h-100">
      <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
          <div class="col-md-6">
            <div class="authincation-content">
              <div class="row no-gutters">
                <div class="col-xl-12">
                  <div class="auth-form">
                    <h4 class="text-center mb-4">Daftar Akun Baru</h4>
                    <div class="alert alert-success solid fade show" id="r-alert" style="display:none">
                      <span></span>
                      <span></span>
                    </div>
                    <form action="" method="POST" class="text-center">
                      <div class="form-group">
                        <label class="nama"><strong>Nama</strong></label>
                        <input type="text" name="nama" id="nama" class="form-control text-center" placeholder="Nama Kamu" required>
                      </div>
                      <div class="form-group">
                        <label class="email"><strong>e-Mail</strong></label>
                        <input type="email" name="email" id="email" class="form-control text-center" placeholder="e-Mail" required>
                      </div>
                      <div class="form-group">
                        <label class="password"><strong>Kata Sandi</strong></label>
                        <input type="password" name="password" id="password" class="form-control text-center" placeholder="Kata Sandi" required>
                      </div>
                      <div class="text-center mt-4">
                        <button type="submit" name="register" class="btn btn-primary btn-block">Daftar</button>
                      </div>
                    </form>
                    <div class="new-account mt-3">
                      <p class="text-center">Sudah punya akun? <a href="login.php" class="text-primary">Login</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <p class="text-center text-muted mt-3">2022 &copy; Fakultas Teknik Universitas Katolik Widya Mandira</p>
          </div>
        </div>
      </div>
    </div>
    <?php require_once("../resources/footer-auth.php");?>
  </body>
</html>