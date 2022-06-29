<?php if(!isset($_SESSION[''])){session_start();}
require_once("db_connect.php"); require_once("functions.php");
if (isset($_SESSION['time-message'])) {
  if((time()-$_SESSION['time-message'])>2){
    if(isset($_SESSION['message-success'])){unset($_SESSION['message-success']);}
    if(isset($_SESSION['message-info'])){unset($_SESSION['message-info']);}
    if(isset($_SESSION['message-warning'])){unset($_SESSION['message-warning']);}
    if(isset($_SESSION['message-danger'])){unset($_SESSION['message-danger']);}
    if(isset($_SESSION['message-dark'])){unset($_SESSION['message-dark']);}
    unset($_SESSION['time-alert']);
  }
}
if(!isset($_SESSION["id-user"])){
  if(isset($_POST['register'])){
    if(registration($_POST)>0){
      $_SESSION['message-success']="Akun anda berhasil dibuat, silakan menunggu beberapa saat sampai akun anda diaktifkan oleh admin.";
      $_SESSION['time-message']=time();
      header("Location: login"); exit;
    }else{
      $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }
  }
  if(isset($_POST['login'])){
    if(login($_POST)>0){
      header("Location: ../"); exit;
    }
  }
}
if(isset($_SESSION['id-user'])){
  $id_user=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['id-user']))));
  $new_mhs=mysqli_query($conn, "SELECT * FROM mahasiswa_baru");
  $count_mhs=mysqli_num_rows($new_mhs);
  $wsd_mhs=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda");
  $count_wsd=mysqli_num_rows($wsd_mhs);
  $newMahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa_baru JOIN prodi ON mahasiswa_baru.id_prodi=prodi.id_prodi ORDER BY mahasiswa_baru.id_mhs DESC");
  $selectProdi=mysqli_query($conn, "SELECT * FROM prodi");
  if(isset($_POST['simpan-mhs-baru'])){
    if(mahasiswa_baru($_POST)>0){
      $_SESSION['message-success']="Data mahasiswa baru berhasil dimasukan.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }else{
      $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }
  }
  if(isset($_GET['id-mhs-baru'])){
    $id_mhs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id-mhs-baru']))));
    $newEditMahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa_baru JOIN prodi ON mahasiswa_baru.id_prodi=prodi.id_prodi WHERE mahasiswa_baru.id_mhs='$id_mhs'");
  }
  if(isset($_POST['ubah-mhsBaru'])){
    if(mahasiswa_baru_ubah($_POST)>0){
      $_SESSION['message-success']="Data mahasiswa baru berhasil diubah.";
      $_SESSION['time-message']=time();
      header("Location: mahasiswa-baru"); exit();
    }else{
      $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }
  }
  if(isset($_POST['hapus-mhsBaru'])){
    if(mahasiswa_baru_hapus($_POST)>0){
      $_SESSION['message-success']="Data mahasiswa baru berhasil dihapus.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }else{
      $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }
  }
  $wisudaMahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda JOIN prodi ON mahasiswa_wisuda.id_prodi=prodi.id_prodi ORDER BY mahasiswa_wisuda.id_mhs DESC");
  $selectNewMahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa_baru");
  if(isset($_POST['simpan-mhsWisuda'])){
    if(mahasiswa_wisuda($_POST)>0){
      $_SESSION['message-success']="Data mahasiswa wisuda berhasil dimasukan.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }else{
      $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }
  }
  if(isset($_GET['id-mhs-wisuda'])){
    $id_mhs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id-mhs-wisuda']))));
    $wisudaEditMahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda JOIN prodi ON mahasiswa_wisuda.id_prodi=prodi.id_prodi WHERE mahasiswa_wisuda.id_mhs='$id_mhs'");
  }
  if(isset($_POST['ubah-mhsWisuda'])){
    if(mahasiswa_wisuda_ubah($_POST)>0){
      $_SESSION['message-success']="Data mahasiswa wisuda berhasil diubah.";
      $_SESSION['time-message']=time();
      header("Location: mahasiswa-wisuda"); exit();
    }else{
      $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }
  }
  if(isset($_POST['hapus-mhsWisuda'])){
    if(mahasiswa_wisuda_hapus($_POST)>0){
      $_SESSION['message-success']="Data mahasiswa wisuda berhasil dihapus.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }else{
      $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }
  }
  if(isset($_POST['import-wisuda'])){
    if(import_wisuda($_POST)>0){
      $_SESSION['message-success']="File excel berhasil di import.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }else{
      $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }
  }
  $pegawai=mysqli_query($conn, "SELECT * FROM pegawai ORDER BY id_pegawai DESC");
  if(isset($_POST['simpan-pegawai'])){
    if(pegawai($_POST)>0){
      $_SESSION['message-success']="Data pegawai berhasil dimasukan.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }else{
      $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }
  }
  if(isset($_GET['id-pegawai'])){
    $id_pegawai=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id-pegawai']))));
    $editPegawai=mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'");
  }
  if(isset($_POST['ubah-pegawai'])){
    if(pegawai_ubah($_POST)>0){
      $_SESSION['message-success']="Data pegawai berhasil diubah.";
      $_SESSION['time-message']=time();
      header("Location: pegawai"); exit();
    }else{
      $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }
  }
  if(isset($_POST['hapus-pegawai'])){
    if(pegawai_hapus($_POST)>0){
      $_SESSION['message-success']="Data pegawai berhasil dihapus.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }else{
      $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }
  }
  $viewUser_active=mysqli_query($conn, "SELECT * FROM users_active");
  $viewUser_role=mysqli_query($conn, "SELECT * FROM users_role");
  $viewUsers=mysqli_query($conn, "SELECT * FROM users JOIN users_active ON users.id_active=users_active.id_active JOIN users_role ON users.id_role=users_role.id_role WHERE id_user!='$id_user'");
  if(isset($_GET['id-user'])){
    $id_user_edit=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id-user']))));
    $editUser=mysqli_query($conn, "SELECT * FROM users WHERE id_user='$id_user_edit'");
  }
  if(isset($_POST['ubah-user'])){
    if(users_ubah($_POST)>0){
      $_SESSION['message-success']="Data user berhasil diubah.";
      $_SESSION['time-message']=time();
      header("Location: users"); exit();
    }else{
      $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }
  }
  if(isset($_POST['hapus-user'])){
    if(users_hapus($_POST)>0){
      $_SESSION['message-success']="Data user berhasil dihapus.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }else{
      $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }
  }
  $viewProdiSipil=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE id_prodi='11'");
  $countProdiSipil=mysqli_num_rows($viewProdiSipil);
  $viewProdiArsitek=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE id_prodi='12'");
  $countProdiArsitek=mysqli_num_rows($viewProdiArsitek);
  $viewProdiIlkom=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE id_prodi='13'");
  $countProdiIlkom=mysqli_num_rows($viewProdiIlkom);
  $viewProdiSipil_baru=mysqli_query($conn, "SELECT * FROM mahasiswa_baru WHERE id_prodi='11'");
  $countProdiSipil_baru=mysqli_num_rows($viewProdiSipil_baru);
  $viewProdiArsitek_baru=mysqli_query($conn, "SELECT * FROM mahasiswa_baru WHERE id_prodi='12'");
  $countProdiArsitek_baru=mysqli_num_rows($viewProdiArsitek_baru);
  $viewProdiIlkom_baru=mysqli_query($conn, "SELECT * FROM mahasiswa_baru WHERE id_prodi='13'");
  $countProdiIlkom_baru=mysqli_num_rows($viewProdiIlkom_baru);
  $wisudaMahasiswaSipil=mysqli_query($conn, "SELECT * FROM data_wisuda JOIN mahasiswa_wisuda ON data_wisuda.noreg=mahasiswa_wisuda.noreg JOIN prodi ON data_wisuda.id_prodi=prodi.id_prodi WHERE data_wisuda.id_prodi='11'");
  $wisudaMahasiswaArsitek=mysqli_query($conn, "SELECT * FROM data_wisuda JOIN mahasiswa_wisuda ON data_wisuda.noreg=mahasiswa_wisuda.noreg JOIN prodi ON data_wisuda.id_prodi=prodi.id_prodi WHERE data_wisuda.id_prodi='12'");
  $wisudaMahasiswaIlkom=mysqli_query($conn, "SELECT * FROM data_wisuda JOIN mahasiswa_wisuda ON data_wisuda.noreg=mahasiswa_wisuda.noreg JOIN prodi ON data_wisuda.id_prodi=prodi.id_prodi WHERE data_wisuda.id_prodi='13'");
  if(isset($_POST['cari-data-sipil'])){
    $keyword=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['keyword']))));
    $wisudaMahasiswaSipil=mysqli_query($conn, "SELECT * FROM data_wisuda 
      JOIN mahasiswa_wisuda ON data_wisuda.noreg=mahasiswa_wisuda.noreg 
      JOIN prodi ON data_wisuda.id_prodi=prodi.id_prodi 
      WHERE data_wisuda.id_prodi='11' 
      AND mahasiswa_wisuda.lama_studi='$keyword'
      OR mahasiswa_wisuda.wisuda_ke='$keyword'
      OR mahasiswa_wisuda.tahun_wisuda='$keyword'
    ");
  }
}
    
