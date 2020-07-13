<?php include_once('../_header.php'); ?>

<section class="content-header">
 
  <h1>
    <i class="fa fa-user icon-title"></i> Periode

    <a class="btn btn-primary btn-social pull-right" href="tambah.php" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
    <a role="button" class="open-modal" id="open-modal" title="Tambah Data" data-toggle="modal">
      <i class="fa fa-plus"></i> Tambah Modal
    </a>
    <a href="#modal-dialog" id="open-modal" class="open-modal" data-toggle="modal">Add</a>
  </h1>
</section>

<section class="content">
 <div class="box">
      <div class="box-header">


             <div class="modal fade" id="modal-dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Default Modal</h4>
                  </div>
                  <div class="modal-body">
               <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputNIS">Tahun Ajaran</label>
                        <input type="text" autofocus="" class="form-control" id="idTahunAjaran" placeholder="Tahun Ajaran" name="tahun_ajaran">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputNIS">SPP Kelas 1</label>
                        <input type="text" class="form-control" id="idKelas1" placeholder="SPP Kelas 1" name="tingkat1">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputNIS">SPP Kelas 2</label>
                        <input type="text" class="form-control" id="idKelas2" placeholder="SPP Kelas 2" name="tingkat2">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputNIS">SPP Kelas 3</label>
                        <input type="text" class="form-control" id="idKelas3" placeholder="SPP Kelas 3" name="tingkat3">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputNIS">SPP Kelas 4</label>
                        <input type="text" class="form-control" id="idKelas4" placeholder="SPP Kelas 4" name="tingkat4">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputNIS">SPP Kelas 5</label>
                        <input type="text" class="form-control" id="idKelas5" placeholder="SPP Kelas 5" name="tingkat5">
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputNIS">SPP Kelas 6</label>
                      <input type="text" class="form-control" id="idKelas6" placeholder="SPP Kelas 6" name="tingkat6">
                    </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" name="confirm" type="submit">
                      Confirm
                  </button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table border="1" id="example1" class="table table-bordered table-striped">
            <thead>
            <tr class="info">
              <th>No</th>
              <th>Tahun Ajaran</th>
              <th>Tingkat 1</th>
              <th>Tingkat 2</th>
              <th>Tingkat 3</th>
              <th>Tingkat 4</th>
              <th>Tingkat 5</th>
              <th>Tingkat 6</th>
              <th>Aksi</th>
              
            </tr>
            </thead>
            <tbody>
            <?php 
            $sql = mysqli_query($con,"SELECT * FROM tb_periode ");
            $no=1;
            while($data=mysqli_fetch_array($sql)){
          ?>
          <tr >
            <td> <?php echo $no++; ?></td>
            <td> <?php echo $data['tahun_ajaran']; ?></td>
            <td> <?php echo $data['nom_tingkat1']; ?></td>
            <td> <?php echo $data['nom_tingkat2']; ?></td>
            <td> <?php echo $data['nom_tingkat3']; ?></td>
            <td> <?php echo $data['nom_tingkat4']; ?></td>
            <td> <?php echo $data['nom_tingkat5']; ?></td>
            <td> <?php echo $data['nom_tingkat6']; ?></td>
            <td>


              <a class="btn btn-warning" title="Edit" role="button"href="edit.php?periode_id=<?php echo $data['periode_id'];?>"> <i style='color:#fff' class='glyphicon glyphicon-edit'></i></a> 

              <a class="btn btn-danger" title="Hapus" role="button"href="hapus.php?periode_id=<?php echo $data['periode_id'];?>" onclick="return confirm ('yakin untuk dihapus?')"> <i style="color:#fff" class="glyphicon glyphicon-trash"></i></a>


                <!-- <button type="button"  class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
                      Launch Warning Modal
                    </button> -->

               <!-- a  role="button" href="#" class='open_modal' id='<?php echo  $data['user_id']; ?>'>Edit</a>| --> 
            </td>

          <?php 
          } 
          ?>
          </tr>



          </tbody>
          </table>
        </div>
      </div>d
</section>

  <!-- Javascript untuk popup modal Edit-->
    <script type="text/javascript">
    $(document).ready(function() {
        $(".open-modal").click(function(e) {
            var idTahunAjaran = $(this).attr("id");
            var idKelas1 = $(this).attr("id");
            var idKelas2 = $(this).attr("id");
            var idKelas3 = $(this).attr("id");
            var idKelas4 = $(this).attr("id");
            var idKelas5 = $(this).attr("id");
            var idKelas6 = $(this).attr("id");
            $.ajax({
                url: "aksi_tambah.php",
                type: "POST",
                data: {
                    tahun_ajaran: idTahunAjaran,
                    nom_tingkat1: idKelas1,
                    nom_tingkat2: idKelas2,
                    nom_tingkat3: idKelas3,
                    nom_tingkat4: idKelas4,
                    nom_tingkat5: idKelas5,
                    nom_tingkat6: idKelas6,

                },
                success: function(ajaxData) {
                    $("#modal-dialog").html(ajaxData);
                    $("#modal-dialog").modal('show', {
                        backdrop: 'true'
                    });
                }
            });
        });
    });
</script>    
<?php include_once('../_footer.php'); ?>
