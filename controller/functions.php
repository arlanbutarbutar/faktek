<?php 
if(!isset($_SESSION["id-user"])){
  function registration($data){global $conn;
    $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
    $email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['email']))));
    $checkEmail=mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($checkEmail)>0){
      $_SESSION['message-danger']="Maaf, email yang kamu masukan sudah terdaftar!";
      $_SESSION['time-message']=time();
      return false;
    }
    $pass=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['password']))));
    $check_lenght_pass=strlen($pass);
    if($check_lenght_pass<8){
      $_SESSION['message-danger']="Maaf, password kamu terlalu pendek (Min: 8)!";
      $_SESSION['time-message']=time();
      return false;
    }
    $password=password_hash($pass, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO users(nama,email,password) VALUES('$nama','$email','$password')");
    return mysqli_affected_rows($conn);
  }
  function login($data){global $conn;
    $email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['email']))));
    $password=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['password']))));
    $checkEmail=mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($checkEmail)==0){
      $_SESSION['message-danger']="Maaf, email yang kamu masukan belum terdaftar!";
      $_SESSION['time-message']=time();
      return false;
    }else if(mysqli_num_rows($checkEmail)>0){
      $row=mysqli_fetch_assoc($checkEmail);
      if($row['id_active']==2){
        $_SESSION['message-danger']="Maaf, akun kamu belum diaktifkan oleh admin!";
        $_SESSION['time-message']=time();
        return false;
      }else if($row['id_active']==1){
        if(password_verify($password, $row['password'])){
          $_SESSION['id-user']=$row['id_user'];
          $_SESSION['id-role']=$row['id_role'];
          $_SESSION['nama']=$row['nama'];
          return mysqli_affected_rows($conn);
        }else{
          $_SESSION['message-danger']="Maaf, kata sandi yang Anda masukkan tidak cocok.";
          $_SESSION['time-message']=time();
          header("Location: ".$_SESSION['page-to']); return false;
        }
      }
    }
  }
  // function __($data){global $conn;}
}
if(isset($_SESSION['id-user'])){
  function mahasiswa_baru($data){global $conn;
    $id_prodi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-prodi']))));
    if($id_prodi==""){
      $_SESSION['message-danger']="Maaf, anda belum memilih program studi.";
      $_SESSION['time-message']=time();
      return false;
    }
    $noreg=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['noreg']))));
    $checkNoreg=mysqli_query($conn, "SELECT * FROM mahasiswa_baru WHERE noreg='$noreg'");
    if(mysqli_num_rows($checkNoreg)>0){
      $_SESSION['message-danger']="Maaf, nomor regis mahasiswa yang anda masukkan sudah ada.";
      $_SESSION['time-message']=time();
      return false;
    }
    $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
    $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
    if($jk==""){
      $_SESSION['message-danger']="Maaf, anda belum memilih jenis kelamin.";
      $_SESSION['time-message']=time();
      return false;
    }
    $tempat_lahir=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tempat-lahir']))));
    $tgl_lahir=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl-lahir']))));
    $tgl_lahir=date_create($tgl_lahir);
    $tgl_lahir=date_format($tgl_lahir, "d M Y");
    $ttl=$tempat_lahir." ".$tgl_lahir;
    $tgl_masuk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl_masuk']))));
    $tgl_masuk=date_create($tgl_masuk);
    $tgl_masuk=date_format($tgl_masuk, "d M Y");
    $asal_sekolah=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['asal-sekolah']))));
    $nilai_tes=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nilai-tes']))));
    mysqli_query($conn, "INSERT INTO mahasiswa_baru(id_prodi,noreg,nama,jk,ttl,tgl_masuk,asal_sklh,nilai_tes) VALUES('$id_prodi','$noreg','$nama','$jk','$ttl','$tgl_masuk','$asal_sekolah','$nilai_tes')");
    return mysqli_affected_rows($conn);
  }
  function mahasiswa_baru_ubah($data){global $conn;
    $id_mhs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mhs']))));
    $id_prodi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-prodi']))));
    if($id_prodi==""){
      $_SESSION['message-danger']="Maaf, anda belum memilih program studi.";
      $_SESSION['time-message']=time();
      return false;
    }
    $noreg=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['noreg']))));
    $oldNoreg=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['oldNoreg']))));
    if($noreg!=$oldNoreg){
      $checkNoreg=mysqli_query($conn, "SELECT * FROM mahasiswa_baru WHERE noreg='$noreg'");
      if(mysqli_num_rows($checkNoreg)>0){
        $_SESSION['message-danger']="Maaf, nomor regis mahasiswa yang anda masukkan sudah ada.";
        $_SESSION['time-message']=time();
        return false;
      }
    }
    $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
    $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
    if($jk==""){
      $_SESSION['message-danger']="Maaf, anda belum memilih jenis kelamin.";
      $_SESSION['time-message']=time();
      return false;
    }
    $ttl=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ttl']))));
    $tgl_masuk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl_masuk']))));
    $tgl_masuk=date_create($tgl_masuk);
    $tgl_masuk=date_format($tgl_masuk, "d M Y");
    $asal_sekolah=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['asal-sekolah']))));
    $nilai_tes=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nilai-tes']))));
    mysqli_query($conn, "UPDATE mahasiswa_baru SET id_prodi='$id_prodi', noreg='$noreg', nama='$nama', jk='$jk', ttl='$ttl', tgl_masuk='$tgl_masuk', asal_sklh='$asal_sekolah', nilai_tes='$nilai_tes' WHERE id_mhs='$id_mhs'");
    return mysqli_affected_rows($conn);
  }
  function mahasiswa_baru_hapus($data){global $conn;
    $id_mhs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mhs']))));
    mysqli_query($conn, "DELETE FROM mahasiswa_baru WHERE id_mhs='$id_mhs'");
    return mysqli_affected_rows($conn);
  }
  function mahasiswa_wisuda($data){global $conn;
    $noreg=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['noreg']))));
    $checkNoreg=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE noreg='$noreg'");
    if(mysqli_num_rows($checkNoreg)>0){
      $_SESSION['message-danger']="Maaf, mahasiswa yang anda masukkan sudah ada.";
      $_SESSION['time-message']=time();
      return false;
    }
    $selectMhs=mysqli_query($conn, "SELECT * FROM mahasiswa_baru WHERE noreg='$noreg'");
    $row=mysqli_fetch_assoc($selectMhs);
    $id_prodi=$row['id_prodi'];
    $noreg=$row['noreg'];
    $nama=$row['nama'];
    $jk=$row['jk'];
    $ttl=$row['ttl'];
    $tgl_masuk=$row['tgl_masuk'];
    $tahun_masuk=date_create($tgl_masuk);
    $tahun_masuk=date_format($tahun_masuk, "Y");
    $tahun_sekarang=date("Y");
    $tahun_lulus=$tahun_sekarang-$tahun_masuk;
    if($tahun_lulus<=3){
      $_SESSION['message-danger']="Maaf, sepertinya anda memasukan data yang salah.";
      $_SESSION['time-message']=time();
      return false;
    }
    $tgl_lulus=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl_lulus']))));
    $tgl_lulus=date_create($tgl_lulus);
    $tgl_lulus=date_format($tgl_lulus, "d M Y");
    $ipk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ipk']))));
    $predikat=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['predikat']))));
    $tahun_wisuda=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tahun_wisuda']))));
    $tahun_wisuda=date_create($tahun_wisuda);
    $tahun_wisuda=date_format($tahun_wisuda, "Y");
    $wisuda_ke=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['wisuda_ke']))));
    $lama_studi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['lama_studi']))));
    if($lama_studi!=$tahun_lulus){
      $_SESSION['message-danger']="Maaf, lama studi yang anda masukan tidak sesuai.";
      $_SESSION['time-message']=time();
      return false;
    }
    if($lama_studi<=3){
      $_SESSION['message-danger']="Maaf, lama studi yang anda masukan belum benar.";
      $_SESSION['time-message']=time();
      return false;
    }
    mysqli_query($conn, "INSERT INTO mahasiswa_wisuda(id_prodi,noreg,nama,jk,ttl,tgl_masuk,tgl_lulus,ipk,predikat_lulus,tahun_wisuda,wisuda_ke,lama_studi) VALUES('$id_prodi','$noreg','$nama','$jk','$ttl','$tgl_masuk','$tgl_lulus','$ipk','$predikat','$tahun_wisuda','$wisuda_ke','$lama_studi')");
    mysqli_query($conn, "DELETE FROM mahasiswa_baru WHERE noreg='$noreg'");
    return mysqli_affected_rows($conn);
  }
  function mahasiswa_wisuda_ubah($data){global $conn;
    $id_mhs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mhs']))));
    $id_prodi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-prodi']))));
    if($id_prodi==""){
      $_SESSION['message-danger']="Maaf, anda belum memilih program studi.";
      $_SESSION['time-message']=time();
      return false;
    }
    $noreg=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['noreg']))));
    $oldNoreg=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['oldNoreg']))));
    if($noreg!=$oldNoreg){
      $checkNoreg=mysqli_query($conn, "SELECT * FROM mahasiswa_baru WHERE noreg='$noreg'");
      if(mysqli_num_rows($checkNoreg)>0){
        $_SESSION['message-danger']="Maaf, nomor regis mahasiswa yang anda masukkan sudah ada.";
        $_SESSION['time-message']=time();
        return false;
      }
    }
    $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
    $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
    if($jk==""){
      $_SESSION['message-danger']="Maaf, anda belum memilih jenis kelamin.";
      $_SESSION['time-message']=time();
      return false;
    }
    $ttl=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ttl']))));
    $tgl_masuk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl_masuk']))));
    $tgl_masuk=date_create($tgl_masuk);
    $tgl_masuk=date_format($tgl_masuk, "d M Y");
    $tahun_masuk=date_create($tgl_masuk);
    $tahun_masuk=date_format($tahun_masuk, "Y");
    $tahun_sekarang=date("Y");
    $tahun_lulus=$tahun_sekarang-$tahun_masuk;
    if($tahun_lulus<=3){
      $_SESSION['message-danger']="Maaf, sepertinya anda memasukan data yang salah.";
      $_SESSION['time-message']=time();
      return false;
    }
    $tgl_lulus=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl_lulus']))));
    $tgl_lulus=date_create($tgl_lulus);
    $tgl_lulus=date_format($tgl_lulus, "d M Y");
    $ipk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ipk']))));
    $predikat=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['predikat']))));
    $tahun_wisuda=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tahun_wisuda']))));
    $tahun_wisuda=date_create($tahun_wisuda);
    $tahun_wisuda=date_format($tahun_wisuda, "Y");
    $wisuda_ke=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['wisuda_ke']))));
    $lama_studi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['lama_studi']))));
    if($lama_studi!=$tahun_lulus){
      $_SESSION['message-danger']="Maaf, lama studi yang anda masukan tidak sesuai.";
      $_SESSION['time-message']=time();
      return false;
    }
    if($lama_studi<=3){
      $_SESSION['message-danger']="Maaf, lama studi yang anda masukan belum benar.";
      $_SESSION['time-message']=time();
      return false;
    }
    mysqli_query($conn, "UPDATE mahasiswa_wisuda SET id_prodi='$id_prodi', noreg='$noreg', nama='$nama', jk='$jk', ttl='$ttl', tgl_masuk='$tgl_masuk', tgl_lulus='$tgl_lulus', ipk='$ipk', predikat_lulus='$predikat', tahun_wisuda='$tahun_wisuda', wisuda_ke='$wisuda_ke', lama_studi='$lama_studi' WHERE id_mhs='$id_mhs'");
    return mysqli_affected_rows($conn);
  }
  function mahasiswa_wisuda_hapus($data){global $conn;
    $id_mhs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mhs']))));
    mysqli_query($conn, "DELETE FROM mahasiswa_wisuda WHERE id_mhs='$id_mhs'");
    return mysqli_affected_rows($conn);
  }
  function pegawai($data){global $conn;
    $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
    $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nip']))));
    $checkNip=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE nip='$nip'");
    if(mysqli_num_rows($checkNip)>0){
      $_SESSION['message-danger']="Maaf, NIP yang anda masukkan sudah ada.";
      $_SESSION['time-message']=time();
      return false;
    }
    $alamat=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['alamat']))));
    $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
    if($jk==""){
      $_SESSION['message-danger']="Maaf, anda belum memilih jenis kelamin.";
      $_SESSION['time-message']=time();
      return false;
    }
    $jabatan=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jabatan']))));
    $no_hp=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['no_hp']))));
    $check_lenght_phone=strlen($no_hp);
    if($check_lenght_phone<11 || $check_lenght_phone>12){
      $_SESSION['message-danger']="Maaf, anda tidak memasukan nomor handphone dengan benar!";
      $_SESSION['time-message']=time();
      return false;}
    $ttl=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ttl']))));
    mysqli_query($conn, "INSERT INTO pegawai(nama,nip,alamat,jk,jabatan,no_hp,ttl) VALUES('$nama','$nip','$alamat','$jk','$jabatan','$no_hp','$ttl')");
    return mysqli_affected_rows($conn);
  }
  function pegawai_ubah($data){global $conn;
    $id_pegawai=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-pegawai']))));
    $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
    $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nip']))));
    $oldNip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['oldNip']))));
    if($nip!=$oldNip){
      $checkNip=mysqli_query($conn, "SELECT * FROM pegawai WHERE nip='$nip'");
      if(mysqli_num_rows($checkNip)>0){
        $_SESSION['message-danger']="Maaf, NIP yang anda masukkan sudah ada.";
        $_SESSION['time-message']=time();
        return false;
      }
    }
    $alamat=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['alamat']))));
    $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
    if($jk==""){
      $_SESSION['message-danger']="Maaf, anda belum memilih jenis kelamin.";
      $_SESSION['time-message']=time();
      return false;
    }
    $jabatan=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jabatan']))));
    $no_hp=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['no_hp']))));
    $check_lenght_phone=strlen($no_hp);
    if($check_lenght_phone<11 || $check_lenght_phone>12){
      $_SESSION['message-danger']="Maaf, anda tidak memasukan nomor handphone dengan benar!";
      $_SESSION['time-message']=time();
      return false;}
    $ttl=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ttl']))));
    mysqli_query($conn, "UPDATE pegawai SET nama='$nama', nip='$nip', alamat='$alamat', jk='$jk', jabatan='$jabatan', no_hp='$no_hp', ttl='$ttl' WHERE id_pegawai='$id_pegawai'");
    return mysqli_affected_rows($conn);
  }
  function pegawai_hapus($data){global $conn;
    $id_pegawai=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-pegawai']))));
    mysqli_query($conn, "DELETE FROM pegawai WHERE id_pegawai='$id_pegawai'");
    return mysqli_affected_rows($conn);
  }
  function users_ubah($data){global $conn;
    $id_user=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-user']))));
    $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
    $email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['email']))));
    $oldEmail=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['oldEmail']))));
    if($email!=$oldEmail){
      $checkEmail=mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
      if(mysqli_num_rows($checkEmail)>0){
        $_SESSION['message-danger']="Maaf, email yang kamu masukan sudah terdaftar!";
        $_SESSION['time-message']=time();
        return false;
      }
    }
    $id_active=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-active']))));
    $id_role=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-role']))));
    mysqli_query($conn, "UPDATE users SET nama='$nama', email='$email', id_active='$id_active', id_role='$id_role' WHERE id_user='$id_user'");
    return mysqli_affected_rows($conn);
  }
  function users_hapus($data){global $conn;
    $id_user=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-user']))));
    mysqli_query($conn, "DELETE FROM users WHERE id_user='$id_user'");
    return mysqli_affected_rows($conn);
  }
  function import_wisuda(){global $conn;
    require "vendor/autoload.php";
    $ekstensi="";
    $file_name=$_FILES['import-excel']['name'];
    $file_data=$_FILES['import-excel']['tmp_name'];
    if(empty($file_name)){
      $_SESSION['message-danger']="Maaf, kamu belum memasukan file excel!";
      $_SESSION['time-message']=time();
      return false;
    }else{
      $ekstensi=pathinfo($file_name)['extension'];
    }
    $ekstensi_allowed=array("xls","xlsx");
    if(!in_array($ekstensi,$ekstensi_allowed)){
      $_SESSION['message-danger']="Maaf, file yang kamu memasukan bukan excel!";
      $_SESSION['time-message']=time();
      return false;
    }
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
    $spreadsheet=$reader->load($file_data);
    $sheetData=$spreadsheet->getActiveSheet()->toArray();
    for($i=1;$i<count($sheetData);$i++){
      $prodi=$sheetData[$i]['1'];
      $noreg=$sheetData[$i]['2'];
      $nama=$sheetData[$i]['3'];
      $jk=$sheetData[$i]['4'];
      $ttl=$sheetData[$i]['5'];
      $tgl_masuk=$sheetData[$i]['6'];
      $tgl_lulus=$sheetData[$i]['7'];
      $ipk=$sheetData[$i]['8'];
      $predikat=$sheetData[$i]['9'];
      $tahun_wisuda=$sheetData[$i]['10'];
      $wisuda_ke=$sheetData[$i]['11'];
      $lama_studi=$sheetData[$i]['12'];
      $id_prodi=str_replace(array("Teknik Sipil","Arsitektur","Ilmu Komputer"),array("11","12","13"),$prodi);
      mysqli_query($conn, "INSERT INTO mahasiswa_wisuda(id_prodi,noreg,nama,jk,ttl,tgl_masuk,tgl_lulus,ipk,predikat_lulus,tahun_wisuda,wisuda_ke,lama_studi) VALUES('$id_prodi','$noreg','$nama','$jk','$ttl','$tgl_masuk','$tgl_lulus','$ipk','$predikat','$tahun_wisuda','$wisuda_ke','$lama_studi')");
    }
    return mysqli_affected_rows($conn);
  }
  // function __($data){global $conn;}
}