<html>

<head>
  <title>cetak kwitansi</title>

<body>
  <?php
  require_once "../_config/config.php";
  require_once "../fungsi.php";
  $kode   = $_GET['id'];

  $sql = mysqli_query($con, "SELECT * FROM tb_transaksi 
              INNER JOIN tb_siswa ON tb_siswa.nis=tb_transaksi.nis
              INNER JOIN tb_periode ON tb_periode.periode_id=tb_transaksi.periode_id
              INNER JOIN tb_kelas ON tb_kelas.kelas_id=tb_siswa.kelas_id
            
              WHERE tb_transaksi.transaksi_id='$kode'") or die(mysqli_error($con));
  while ($d = mysqli_fetch_array($sql)) {
  ?>
    <table width="100%">
      <tr>
        <td width="330" align="justify">
          <h4> <img src="../_assets/_img/sdit_logo.png" width="60" height="60" style="float:left; margin:0 8px 4px 0;"> Integrated Iskamic Elementary School <br>
            SDIT JUMAPOLO <br>
            Alamat:Jl.Raya Jumapolo-Karanganyar Km.01
          </h4>
        </td>
        <td width="10" align="justify">
          <h5 align="justify" width="70" height="70" style="float:left; margin:0 8px 4px 80;">No.<?php echo $d['no_bayar'] ?><br>Kwitansi Pembayaran<br>Tanggal.<?php echo tgl_indo($d['tgl_bayar']) ?></h5>
        </td>
      </tr>
    </table>
    <table width="100%" style="border:1px solid black;border-collapse: collapse;" border="1">
      <tr>
        <td border="1" style="border:1px solid black;" width=" 100px" colspan="2" rowspan="3">
          <p><strong>
              Telah terima dari &emsp; <br> Nama &emsp; &emsp; &emsp; &emsp; :
            </strong><?php echo $d['nama_siswa'] ?> <br>
          
          <strong>Kelas&emsp;&emsp;&emsp;&emsp; &emsp; :</strong> <?php echo $d['nama_kelas'] ?></<strong>
          </p>

        </td>

        <td border="1" tyle="border:1px solid black;" width="100px"><strong>Jenis Pembayaran</strong></td>
        <td width="100px"><strong>Jumlah</strong></td>


      <tr>
        <!--dihilangkan karena sudah digabung dengan baris atas-->

        <td width="100px">a.SPP <?= $d['bulan'] ?> <?= $d['tahun_ajaran'] ?> </td>
        <td width="100px"> <?php
                            if ($d['tingkat'] == 1) {
                              echo rupiah($d['nom_tingkat1']);
                            } elseif ($d['tingkat'] == 2) {
                              echo rupiah($d['nom_tingkat2']);
                            } elseif ($d['tingkat'] == 3) {
                              echo rupiah($d['nom_tingkat3']);
                            } elseif ($d['tingkat'] == 4) {
                              echo rupiah($d['nom_tingkat4']);
                            } elseif ($d['tingkat'] == 5) {
                              echo rupiah($d['nom_tingkat5']);
                            } else {
                              echo rupiah($d['nom_tingkat6']);
                            } ?>
        </td>
      </tr>

      <tr>
        <!--dihilangkan karena sudah digabung dengan baris atas-->
        <td width="100px">b.</td>
        <td width="100px"></td>
      </tr>
      <tr>
        <!--dihilangkan karena sudah digabung dengan baris atas-->

        <td width="50%" colspan="2" rowspan="1">
          <strong>Terbilang :</strong> <?php
                                        if ($d['tingkat'] == 1) {
                                          echo penyebut($d['nom_tingkat1']);
                                        } elseif ($d['tingkat'] == 2) {
                                          echo penyebut($d['nom_tingkat2']);
                                        } elseif ($d['tingkat'] == 3) {
                                          echo penyebut($d['nom_tingkat3']);
                                        } elseif ($d['tingkat'] == 4) {
                                          echo penyebut($d['nom_tingkat4']);
                                        } elseif ($d['tingkat'] == 5) {
                                          echo penyebut($d['nom_tingkat5']);
                                        } else {
                                          echo penyebut($d['nom_tingkat6']);
                                        } ?> Rupiah
        </td>
        <td width="100px">c.</td>
        <td width="100px"></td>
      </tr>
      <tr>
        <!--dihilangkan karena sudah digabung dengan baris atas-->
        <td width="50%" colspan="2" rowspan="3">
          <p width="70" align="center" style="float:left;margin:0 8px 2px 0;"> Penyertor <br><br>(<?= $d['nama_siswa'] ?>)</p>
          <p width="25" align="center" style="float:right;margin:0 8px 2px 0;">Penerima<br><br>(<?php echo $_SESSION['nama']; ?>) </p>
        </td>
        <td width="100px">d.</td>
        <td width="100px"></td>
      </tr>
      <tr>
        <!--dihilangkan karena sudah digabung dengan baris atas-->
        <td width="100px">e.</td>
        <td width="100px"></td>
      </tr>
      <tr>
        <!--dihilangkan karena sudah digabung dengan baris atas-->
        <td width="100px"><strong>Total</strong></td>
        <td width="100px"> <?php
                            if ($d['tingkat'] == 1) {
                              echo rupiah($d['nom_tingkat1']);
                            } elseif ($d['tingkat'] == 2) {
                              echo rupiah($d['nom_tingkat2']);
                            } elseif ($d['tingkat'] == 3) {
                              echo rupiah($d['nom_tingkat3']);
                            } elseif ($d['tingkat'] == 4) {
                              echo rupiah($d['nom_tingkat4']);
                            } elseif ($d['tingkat'] == 5) {
                              echo rupiah($d['nom_tingkat5']);
                            } else {
                              echo rupiah($d['nom_tingkat6']);
                            } ?></td>
      </tr>
    <?php
  }
    ?>
    </table>
</body>
</head>

</html>