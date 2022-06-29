<?php require_once("controller/script.php");
  require_once("controller/redirect-unusers.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $prodi="";
  if(isset($_GET['prodi'])){
    $prodi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['prodi']))));
    $prodi=str_replace("-", " ", $prodi);
    $newMahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa_baru JOIN prodi ON mahasiswa_baru.id_prodi=prodi.id_prodi WHERE prodi.prodi='$prodi' ORDER BY mahasiswa_baru.id_mhs DESC");
  }
  $_SESSION['page-name']="Export Excel Mahasiswa Baru"; $_SESSION['page-to']="export-excel-baru"; $_SESSION['search']=2;
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Mahasiswa-".$prodi.".xls");
?>
<center>
  <h3>Data Mahasiswa Baru Program Studi <?= $prodi?></h3>
</center>
<table border="1">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Noreg</th>
      <th scope="col">Nama</th>
      <th scope="col">Prodi</th>
      <th scope="col">JK</th>
      <th scope="col">TTL</th>
      <th scope="col">Tgl Masuk</th>
      <th scope="col">Asal Sekolah</th>
      <th scope="col">Nilai Tes</th>
    </tr>
  </thead>
  <tbody>
    <?php if(mysqli_num_rows($newMahasiswa)==0){?>
    <tr>
      <th colspan="11">Belum ada data.</th>
    </tr>
    <?php }$no=1; if(mysqli_num_rows($newMahasiswa)>0){while($row=mysqli_fetch_assoc($newMahasiswa)){?>
      <tr>
        <th scope="row"><?= $no;?></th>
        <td><?= $row['noreg']?></td>
        <td><?= $row['nama']?></td>
        <td><?= $row['prodi']?></td>
        <td><?= $row['jk']?></td>
        <td><?= $row['ttl']?></td>
        <td><?= $row['tgl_masuk']?></td>
        <td><?= $row['asal_sklh']?></td>
        <td><?= $row['nilai_tes']?></td>
    <?php $no++; }}?>
  </tbody>
</table>