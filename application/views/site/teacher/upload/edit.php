<div class="col-md-12">
  <form class="" action="<?php echo base_url('guru/upload/'.$category.'/update' . '/' . $teacher_file->teacher_file_id); ?>" method="post" enctype="multipart/form-data">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title text-capitalize">Edit <?php echo $category; ?></h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="">Judul <span class="text-capitalize"><?php echo $category; ?></span></label>
          <input type="text" class="form-control" id="" placeholder="" name="teacher_file_title" value="<?php echo $teacher_file->teacher_file_title; ?>" autofocus="">
          <p class="help-block"></p>
          <label for="">Ubah File <span class="text-capitalize"><?php echo $category; ?></span></label>
          <input type="file" class="form-control" id="" placeholder="" name="teacher_file_name">
          <p class="help-block"></p>
        </div>
      </div>
      <div class="box-footer">
        <div class="pull-right">
          <button type="submit" name="submit" value="silent" class="btn btn-primary btn-flat">
            <i class="fa fa-save"></i> Update
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
