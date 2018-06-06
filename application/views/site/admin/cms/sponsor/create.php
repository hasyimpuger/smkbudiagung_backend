<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Form Tambah Sponsor</h3>
    </div>
    <form class="" action="<?php echo base_url('administrator/cms/sponsor/store'); ?>" method="post" enctype="multipart/form-data">
      <div class="box-body">
        <div class="form-group">
          <label for="">Nama Sponsor</label>
          <input type="text" class="form-control" id="" placeholder="" name="sponsor_name">
          <p class="help-block"></p>
        </div>
        <div class="form-group">
          <label for="">Logo</label>
          <input type="file" class="form-control" id="" placeholder="" name="sponsor_logo">
          <p class="help-block"></p>
        </div>
      </div>
      <div class="box-footer">
        <a href="<?php echo base_url('administrator/cms/sponsor'); ?>" class="btn btn-default btn-flat">
          <i class="fa fa-times"></i> Batalkan
        </a>
        <button type="submit" name="submit" value="submit" class="btn btn-primary pull-right btn-flat">
          <i class="fa fa-save"></i> Simpan
        </button>
      </div>
    </form>
  </div>
</div>
