<?php include_once('../_header.php'); ?>

 <!-- Main content -->
<section class="content">

      <div class="row">
        <!-- left column -->
         <div class="col-lg-12 col-xs-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Import Data Siswa</h3>
            </div>
            <div class="col-lg-12">
           <a class="btn btn-primary btn-social pull-center" href="../_file/semple/siswaContoh.xlsx" title="Download" data-toggle="tooltip">
          <i class="fa fa-download"></i> Download Format Excel
          </a>
          </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"  method="post" action="proses_import.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="file">File Excel</label>
                  <input type="file" class="form-control" id="file" name="file" placeholder="">
                </div>
                <div class="form-group pull-right">
                  <input type="submit" name="import" value="import" class="btn btn-success ">
                </div>
            </form>
            </div>
          </div>
        </div> 
      </div>
</section>
<?php include_once('../_footer.php'); ?>