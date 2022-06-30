<?php
require_once("controller/script.php");
require_once __DIR__ . '/vendor/autoload.php';

$prodi="";
if(isset($_GET['prodi'])){
  $prodi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['prodi']))));
  $prodi=str_replace("-", " ", $prodi);
  $wisudaMahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda JOIN prodi ON mahasiswa_wisuda.id_prodi=prodi.id_prodi WHERE prodi.prodi='$prodi' ORDER BY mahasiswa_wisuda.id_mhs DESC");
}

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<img src="assets/img/cop.png">');
$mpdf->WriteHTML('<h2 style="text-align: center;">Data Mahasiswa Wisuda <br>Program Studi '.$prodi.'</h2>');
$mpdf->WriteHTML('<table class="table table-striped" style="text-align: center;margin: auto;">
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
<tbody id="search-page">
');
if (mysqli_num_rows($wisudaMahasiswa) == 0) {
  $mpdf->WriteHTML('<tr>
<th colspan="15">Belum ada data.</th>
</tr>
');
}
$no = 1;
if (mysqli_num_rows($wisudaMahasiswa) > 0) {
  while ($row = mysqli_fetch_assoc($wisudaMahasiswa)) {
    $mpdf->WriteHTML('<tr>
<th scope="row">' . $no . '</th>
<td>' . $row['prodi'] . '</td> 
<td>' . $row['noreg'] . '</td>
<td>' . $row['nama'] . '</td>
<td>' . $row['jk'] . '</td>
<td>' . $row['ttl'] . '</td>
<td>' . $row['tgl_masuk'] . '</td>
<td>' . $row['tgl_lulus'] . '</td>
<td>' . $row['ipk'] . '</td>
<td>' . $row['predikat_lulus'] . '</td>
<td>' . $row['tahun_wisuda'] . '</td>
<td>' . $row['wisuda_ke'] . '</td>
<td>' . $row['lama_studi'] . '</td>
</tr>
');
    $no++;
  }
}
$mpdf->WriteHTML('
<tr><td colspan="9"></td></tr>
<tr><td colspan="9"></td></tr>
<tr><td colspan="9"></td></tr>
<tr><td colspan="9"></td></tr>
<tr><td colspan="9"></td></tr>
<tr><td colspan="9"></td></tr>
<tr><td colspan="9"></td></tr>
<tr><td colspan="9"></td></tr>
</tbody>
</table>
<img src="assets/img/signature.png">
');
$mpdf->Output();
