<?php require_once("controller/script.php");
  require_once("controller/redirect-unusers.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="Export Excel Mahasiswa Wisuda"; $_SESSION['page-to']="export-excel-wisuda.php"; $_SESSION['search']=2;
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=mahasiswa-wisuda.xls");
?>
<center>
  <h3>Data Mahasiswa Wisuda</h3>
</center>
<table border="1">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Program Studi</th>
      <th scope="col">NIM</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">TTL</th>
      <th scope="col">Tgl Masuk</th>
      <th scope="col">Tgl Lulus</th>
      <th scope="col">IPK</th>
      <th scope="col">Predikat</th>
      <th scope="col">Tahun Wisuda</th>
      <th scope="col">Wisuda Ke</th>                        
      <th scope="col">Lama Studi</th>
    </tr>
  </thead>
  <tbody>
    <?php if(mysqli_num_rows($wisudaMahasiswa)==0){?>
    <tr>
      <th colspan="15">Belum ada data.</th>
    </tr>
    <?php }$no=1; if(mysqli_num_rows($wisudaMahasiswa)>0){while($row=mysqli_fetch_assoc($wisudaMahasiswa)){?>
      <tr>
        <th scope="row"><?= $no;?></th>
        <td><?= $row['prodi']?></td> 
        <td><?= $row['noreg']?></td>
        <td><?= $row['nama']?></td>
        <td><?= $row['jk']?></td>
        <td><?= $row['ttl']?></td>
        <td><?php $tgl_masuk=date_create($row['tgl_masuk']); $tgl_masuk=date_format($tgl_masuk, "d M Y"); echo $tgl_masuk;?></td>
        <td><?php $tgl_lulus=date_create($row['tgl_lulus']); $tgl_lulus=date_format($tgl_lulus, "d M Y"); echo $tgl_lulus;?></td>
        <td><?= $row['ipk']?></td>
        <td><?= $row['predikat_lulus']?></td>
        <td><?php $tahun_wisuda=date_create($row['tahun_wisuda']); $tahun_wisuda=date_format($tahun_wisuda, "Y"); echo $tahun_wisuda;?></td>
        <td><?= $row['wisuda_ke']?></td>
        <td><?= $row['lama_studi']?></td>
      </tr>
    <?php $no++; }}?>
  </tbody>
</table>