<?php
// untuk koneksi
include_once '../../../config/koneksi.php';

$aksi="halaman/hal_hubungi/aksi_hubungi.php";
switch($_GET[act]){
  // Tampil Hubungi Kami
  default:
    echo "<h2>Hubungi Kami</h2>
          <table>
          <tr><th>no</th><th>nama</th><th>email</th><th>subjek</th><th>tanggal</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysqli_query($koneksi, "SELECT * FROM hubungi ORDER BY id_hubungi DESC LIMIT $posisi, $batas");

    $no = $posisi+1;
    while ($r=mysqli_fetch_array($tampil)){
      $tgl=tgl_indo($r[tanggal]);
      echo "<trclass='odd gradeX'><td>$no</td>
                <td>$r[nama]</td>
                <td><a href=?halamane=hubungi&act=balasemail&id=$r[id_hubungi]>$r[email]</a></td>
                <td>$r[subjek]</td>
                <td>$tgl</a></td>
                <td><a href=$aksi?halamane=hubungi&act=hapus&id=$r[id_hubungi]>Hapus</a>
                </td></tr>";
    $no++;
    }
    echo "</table>";
    $jmldata=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM hubungi"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>Hal: $linkHalaman</div><br>";
    break;

  case "balasemail":
    $tampil = mysqli_query($koneksi, "SELECT * FROM hubungi WHERE id_hubungi='$_GET[id]'");
    $r      = mysqli_fetch_array($tampil);

    echo "<h2>Reply Email</h2>
          <form method=POST action='?halamane=hubungi&act=kirimemail'>
          <table>
          <tr><td>Kepada</td><td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
          <tr><td>Subjek</td><td> : <input type=text name='subjek' size=50 value='Re: $r[subjek]'></td></tr>
          <tr><td>Pesan</td><td> <textarea name='pesan' style='width: 600px; height: 350px;'><br><br><br><br>
  ----------------------------------------------------------------------------------------------------------------------
  $r[pesan]</textarea></td></tr>
          <tr><td colspan=2><input type=submit value=Kirim>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;

  case "kirimemail":
    mail($_POST[email],$_POST[subjek],$_POST[pesan],"From: redaksi@bukulokomedia.com");
    echo "<h2>Status Email</h2>
          <p>Email telah sukses terkirim ke tujuan</p>
          <p>[ <a href=javascript:history.go(-2)>Kembali</a> ]</p>";
    break;
}
?>
