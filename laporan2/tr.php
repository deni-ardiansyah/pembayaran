<?php
require_once "../_config/config.php";
require_once "../fungsi.php";
if (isset($_GET['nis']) && $_GET['nis'] != '') {
    $sqlSiswa = mysqli_query($con, "SELECT tb_siswa.*, tb_kelas.* FROM tb_siswa
		INNER JOIN tb_kelas ON tb_siswa.kelas_id=tb_kelas.kelas_id
	 	WHERE nis='$_GET[nis]'") or die(mysqli_error($con));
    $ds = mysqli_fetch_array($sqlSiswa);
    $nis = $ds['nis'];
?>
    <?php
    echo  "<a class='btn btn-info' title='Print' target='_blank' role='button' href='../laporan2/cetak_transaksi.php?nis=$nis'> <i style='color:#fff' class='glyphicon glyphicon-print'></i></a>"
    ?>
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

    <table class="table table-hover table-bordered">

        <tr>
            <td class="col-sm-2">NIS</td>
            <td class="col-sm-1">:</td>
            <td class="col-sm-6"><?php echo $ds['nis']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2">Nama Siswa</td>
            <td class="col-sm-1">:</td>
            <td class="col-sm-6"><?php echo $ds['nama_siswa']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2">Kelas</td>
            <td class="col-sm-1">:</td>
            <td class="col-sm-6"><?php echo $ds['nama_kelas']; ?></td>
        </tr>
    </table>


    <!-- /.row -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tagihan SPP Siswa</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table style="border:1px solid black;border-collapse: collapse;" border="1" class="table table-hover table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>No. Bayar</th>
                            <th>Tgl. Bayar</th>
                            <th>jumlah</th>
                            <th>Keterangan</th>

                        </tr>
                        <?php
                        $sql = mysqli_query($con, "SELECT * FROM tb_transaksi 
							INNER JOIN tb_siswa ON tb_siswa.nis=tb_transaksi.nis
							INNER JOIN tb_kelas ON tb_kelas.kelas_id=tb_siswa.kelas_id
							INNER JOIN tb_periode ON tb_periode.periode_id=tb_transaksi.periode_id  
							WHERE tb_siswa.nis='$nis' AND tb_transaksi.ket='' ORDER BY bulan ASC , tahun_ajaran ASC") or die(mysqli_error($con));
                        $no = 1;
                        while ($d = mysqli_fetch_array($sql)) {
                            echo "<tr>
                                        <td align='center'>$no</td>
                                        <td>$d[bulan] $d[tahun_ajaran]</td>
                                        <td align='center'>$d[no_bayar]</td>
                                        <td align='center'>$d[tgl_bayar]</td>
                                        <td>";
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
                            }
                            echo "</td>

		                            	<td align='center'>";
                            if ($d['ket'] == '') {
                                echo "<span class='badge bg-red'>Belum Lunas</span>";
                            } else {
                                echo " <span class='badge bg-green'> Lunas</span>";
                            }
                            echo "</td>
		
		                            	
		                    </tr>";
                            $no++;
                        }
                        ?>
                    </table>

                <?php
            }
                ?>