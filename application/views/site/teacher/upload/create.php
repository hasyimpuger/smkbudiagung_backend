<div class="col-md-12">
  <form class="" action="<?php echo base_url('guru/upload/'.$category.'/store'); ?>" method="post" enctype="multipart/form-data">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title text-capitalize">Tambah <?php echo $category; ?></h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="">Judul <span class="text-capitalize"><?php echo $category; ?></span></label>
          <input type="text" class="form-control" id="" placeholder="" name="teacher_file_title">
          <p class="help-block"></p>
          <label for="">File <span class="text-capitalize"><?php echo $category; ?></span></label>
          <input type="file" class="form-control" id="" placeholder="" name="teacher_file_name">
          <p class="help-block"></p>
        </div>
      </div>
      <div class="box-footer">
        <a href="<?php echo base_url('guru/upload/' . $category); ?>" class="btn btn-default btn-flat">
          <i class="fa fa-times"></i> Kembali
        </a>
        <div class="pull-right">
          <button type="submit" name="submit" value="back" class="btn btn-warning btn-flat">
            <i class="fa fa-save"></i> Upload dan Kembali
          </button>
          <button type="submit" name="submit" value="silent" class="btn btn-primary btn-flat">
            <i class="fa fa-save"></i> Upload
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
