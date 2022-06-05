<?php require_once("controller/script.php");
  require_once("controller/redirect-unusers.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="Export Excel Mahasiswa Baru"; $_SESSION['page-to']="export-excel-baru.php"; $_SESSION['search']=2;
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=mahasiswa-baru.xls");
?>
<center>
  <h3>Data Mahasiswa Baru</h3>
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
        <td><?php $tgl_masuk=date_create($row['tgl_masuk']); $tgl_masuk=date_format($tgl_masuk, "d M Y"); echo $tgl_masuk;?></td>
        <td><?= $row['asal_sklh']?></td>
        <td><?= $row['nilai_tes']?></td>
    <?php $no++; }}?>
  </tbody>
</table>