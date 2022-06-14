<?php
require_once("controller/script.php");
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<img src="assets/img/cop.png">');
$mpdf->WriteHTML('<h2 style="text-align: center;">Data Mahasiswa Baru</h2>');
$mpdf->WriteHTML('<table class="table table-striped" style="text-align: center;">
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
<tbody id="search-page">
');
if (mysqli_num_rows($newMahasiswa) == 0) {
  $mpdf->WriteHTML('<tr>
<th colspan="11">Belum ada data.</th>
</tr>
');
}
$no = 1;
if (mysqli_num_rows($newMahasiswa) > 0) {
  while ($row = mysqli_fetch_assoc($newMahasiswa)) {
    $tgl_masuk = date_create($row["tgl_masuk"]);
    $tgl_masuk = date_format($tgl_masuk, "d M Y");
    $mpdf->WriteHTML('
<tr>
  <th scope="row">' . $no . '</th>
  <td>' . $row["noreg"] . '</td>
  <td>' . $row["nama"] . '</td>
  <td>' . $row["prodi"] . '</td>
  <td>' . $row["jk"] . '</td>
  <td>' . $row["ttl"] . '</td>
  <td>' . $tgl_masuk . '</td>
  <td>' . $row["asal_sklh"] . '</td>
  <td>' . $row["nilai_tes"] . '</td>
</tr>');
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
<img src="assets/img/signature.png">');
$mpdf->Output();
