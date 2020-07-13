<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body>
    <table width="100%">
        <tr>
            <td width="25" align="justify">
                <h3 align="justify" width="50" height="70" style="float:left;"> <img src="../_assets/_img/muhammadiyah_logo.png" width="70" height="67" style="float:left; margin:0 8px 2px 0;">
                </h3>
                <hr />
            </td>
            <td width="100%" align="center">

                <h5 style="float:center; margin:0 8px 2px 0;">PIMPINAN CABANG MUHAMMADIYAH KECAMATAN JUMAPOLO</h5>
                <h5 style="float:center; margin:0 8px 2px 0;">Majelis Pendidikan Dasar dan Menengah</h5>
                <h4 style="float:center; margin:0 8px 2px 0;">SDIT JUMAPOLO</h4>
                <h5 style="float:center; margin:0 8px 2px 0;">Integrated Islamic Elementary School</h5>
                <h6 style="float:center; margin:0 8px 2px 0;">Alamat: Jl.Raya Jumapolo - Karanganyar Km. 01, Kode Pos 57783
                    <br>Telp. 20714990221, email: sdit75polo@gmail.com </h6>
                <hr />
            </td>
            <td width="25" align="justify">
                <h3 align="justify" width="50" height="70" style="float:right;"><img src="../_assets/_img/sdit_logo.png" width="70" height="67" style="float:right; margin:0 8px 2px 0;"></h3>
                <hr />
            </td>
        </tr>
    </table>

    <table border="1" style="width:100%; border-collapse: collapse;">

        <tr class="info">
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Bulan</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
        </tr>
        <?php
        require_once "../_config/config.php";
        require_once "../fungsi.php";
        $sql = mysqli_query($con, "SELECT * FROM tb_transaksi
        INNER JOIN tb_siswa ON tb_siswa.nis=tb_transaksi.nis
        INNER JOIN tb_kelas ON tb_kelas.kelas_id=tb_siswa.kelas_id
        INNER JOIN tb_periode ON tb_periode.periode_id=tb_transaksi.periode_id
        WHERE ket='' ORDER BY tb_siswa.nis ASC , bulan ASC , tahun_ajaran ASC") or die(mysqli_error($con));
        $no = 1;
        while ($d = mysqli_fetch_array($sql)) {
        ?>

            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td align="center"><?php echo $d['nis']; ?></td>
                <td><?php echo $d['nama_siswa']; ?></td>
                <td align="center"><?php echo $d['nama_kelas']; ?></td>
                <td><?php echo $d['bulan']; ?> <?php echo $d['tahun_ajaran']; ?></td>
                <td align="left"><?php if ($d['tingkat'] == 1) {
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
                <td>
                    <?php if ($d['ket'] == '') {
                        echo "Belum Lunas";
                    } else {
                        echo 'Lunas';
                    } ?>
                </td>

            </tr>
        <?php  }
        ?>
    </table>

</body>

</html>