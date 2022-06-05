<?php require_once('controller/script.php');
if($_SESSION['page-to']=="mahasiswa-baru.php"){
  if(isset($_GET['key'])&&$_GET['key']!=""){
    $key=addslashes(trim($_GET['key']));
    $query="SELECT * FROM mahasiswa_baru JOIN prodi ON mahasiswa_baru.id_prodi=prodi.id_prodi WHERE mahasiswa_baru.noreg LIKE '%$key%' ORDER BY mahasiswa_baru.id_mhs DESC";
    $newMahasiswa=mysqli_query($conn, $query);
  }if(mysqli_num_rows($newMahasiswa)==0){?>
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
      <td>
        <a href="edit-mahasiswa-baru.php?id-mhs-baru=<?= $row['id_mhs']?>" class="btn btn-warning btn-sm">Ubah</a>
      </td>
      <td>
        <form action="" method="POST">
          <input type="hidden" name="id-mhs" value="<?= $row['id_mhs']?>">
          <button type="submit" name="hapus-mhsBaru" class="btn btn-danger btn-sm">Hapus</button>
        </form>
      </td>
    </tr>
<?php $no++; }}}if($_SESSION['page-to']=="mahasiswa-wisuda.php"){
  if(isset($_GET['key'])&&$_GET['key']!=""){
    $key=addslashes(trim($_GET['key']));
    $query="SELECT * FROM mahasiswa_wisuda JOIN prodi ON mahasiswa_wisuda.id_prodi=prodi.id_prodi WHERE mahasiswa_wisuda.noreg LIKE '%$key%' ORDER BY mahasiswa_wisuda.id_mhs DESC";
    $wisudaMahasiswa=mysqli_query($conn, $query);
  }if(mysqli_num_rows($wisudaMahasiswa)==0){?>
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
        <td>
          <a href="edit-mahasiswa-wisuda.php?id-mhs-wisuda=<?= $row['id_mhs']?>" class="btn btn-warning btn-sm">Ubah</a>
        </td>
        <td>
          <form action="" method="POST">
            <input type="hidden" name="id-mhs" value="<?= $row['id_mhs']?>">
            <button type="submit" name="hapus-mhsWisuda" class="btn btn-danger btn-sm" data-toggle="modal">Hapus</button>
          </form>
        </td>
      </tr>
<?php $no++; }}}if($_SESSION['page-to']=="pegawai.php"){
  if(isset($_GET['key'])&&$_GET['key']!=""){
    $key=addslashes(trim($_GET['key']));
    $query="SELECT * FROM pegawai WHERE nip LIKE '%$key%' ORDER BY id_pegawai DESC";
    $pegawai=mysqli_query($conn, $query);
  }if(mysqli_num_rows($pegawai)==0){?>
    <tr>
        <th colspan="10">Belum ada data.</th>
    </tr>
    <?php }$no=1; if(mysqli_num_rows($pegawai)>0){while($row=mysqli_fetch_assoc($pegawai)){?>
      <tr>
        <th scope="row"><?= $no;?></th>
        <td><?= $row['nama']?></td>
        <td><?= $row['nip']?></td>
        <td><?= $row['alamat']?></td>
        <td><?= $row['jk']?></td>
        <td><?= $row['jabatan']?></td>
        <td><?= $row['no_hp']?></td>
        <td><?= $row['ttl']?></td>
        <td>
          <a href="edit-pegawai.php?id-pegawai=<?= $row['id_pegawai']?>" class="btn btn-warning btn-sm">Ubah</a>
        </td>
        <td>
          <form action="" method="POST">
            <input type="hidden" name="id-pegawai" value="<?= $row['id_pegawai']?>">
            <button type="submit" name="hapus-pegawai" class="btn btn-danger btn-sm">Hapus</button>
          </form>
        </td>
        </td>
      </tr>
<?php $no++; }}}if($_SESSION['page-to']=="users.php"){
  if(isset($_GET['key'])&&$_GET['key']!=""){
    $key=addslashes(trim($_GET['key']));
    $query="SELECT * FROM users JOIN users_active ON users.id_active=users_active.id_active JOIN users_role ON users.id_role=users_role.id_role WHERE users.id_user!='$id_user' AND users.nama LIKE '%$key%' ORDER BY users.id_user DESC";
    $viewUsers=mysqli_query($conn, $query);
  }if(mysqli_num_rows($viewUsers)==0){?>
    <tr>
      <th colspan="8">Belum ada pengguna yang terdaftar.</th>
    </tr>
  <?php }$no=1;if(mysqli_num_rows($viewUsers)>0){while($row=mysqli_fetch_assoc($viewUsers)){?>
    <tr>
      <th scope="row"><?= $no;?></th>
      <td><?= $row['nama']?></td>
      <td><?= $row['email']?></td>
      <td><?= $row['status']?></td>
      <td><?= $row['role']?></td>
      <td>
        <a href="edit-user.php?id-user=<?= $row['id_user']?>" class="btn btn-warning btn-sm">Ubah</a>
      </td>
      <td>
        <form action="" method="POST">
          <input type="hidden" name="id-user" value="<?= $row['id_user']?>">
          <button type="submit" name="hapus-user" class="btn btn-danger btn-sm">Hapus</button>
        </form>
      </td>
    </tr>
<?php $no++;}}}?>