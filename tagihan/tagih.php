<?php include_once('../_header.php');
   
 ?>

<section class="content-header">
  <h1>
   <i class="fa fa-folder-o"></i>Tagihan
  </h1>
 </section>

<section class="content">
 <div class="box">
            <div class="box-header">
            
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
              <table border="1" id="example1" class="table table-bordered" style="width: 100%">
                <thead>
                <form role="form"  method="post" action="aksi_tambah.php">
                 
                <tr class="info">
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Alamat</th>
                  <th>Kelas</th>
                  <th>tagihan</th>
                  
                </tr>
                </thead>
                <tbody>
                    <?php 
                  $sql =mysqli_query($con, "SELECT tb_siswa.*, tb_kelas.* FROM tb_siswa
                                      INNER JOIN tb_kelas ON tb_siswa.kelas_id=tb_kelas.kelas_id")
                                      or die (mysqli_error($con));
                  if (mysqli_num_rows($sql)>0) { 
                    while($data=mysqli_fetch_array($sql)) { ?>

                  <td> <?php echo $data['nis']; ?></td>
                  <td> <?php echo $data['nama_siswa']; ?></td>
                  <td> <?php echo $data['alamat']; ?></td>
                  <td> <?php echo $data['nama_kelas']; ?></td>
                  <td> 
                   <a class="btn btn-warning" title="Tagih" role="button" href="tambah.php?nis=<?php echo $data['nis'];?>"> Tagih <i style='color:#fff' ></i></a> </td>
                  </tr>
                <?php  
                    }
                  }else{
                    echo "<tr><td colspan=\"4\"align=\"center\">Data Tidak Ditemukan</td></tr>";
                  }              
                ?>
    				</div>
					</td>
              </tbody>

              </table>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    
<?php include_once('../_footer.php'); ?>
