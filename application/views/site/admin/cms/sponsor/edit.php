<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Form Edit Sponsor</h3>
    </div>
    <form class="" action="<?php echo base_url('administrator/cms/sponsor/update/' . $data['sponsor']->sponsor_id ); ?>" method="post" enctype="multipart/form-data">
      <div class="box-body">
        <div class="form-group">
          <label for="">Nama Sponsor</label>
          <input type="text" class="form-control" id="" placeholder="" name="sponsor_name" value="<?php echo $data['sponsor']->sponsor_name; ?>">
          <p class="help-block"></p>
        </div>
        <img src="<?php echo base_url('upload/img/sponsor/' . $data['sponsor']->sponsor_logo); ?>" alt="" style="width: 150px;">
        <div class="form-group">
          <label for="">Change Logo</label>
          <input type="file" class="form-control" id="" placeholder="" name="sponsor_logo">
          <p class="help-block"></p>
        </div>
      </div>
      <div class="box-footer">
        <a href="<?php echo base_url('administrator/cms/sponsor'); ?>" class="btn btn-default btn-flat">
          <i class="fa fa-times"></i> Batalkan
        </a>
        <button type="submit" name="submit" value="submit" class="btn btn-primary pull-right btn-flat">
          <i class="fa fa-save"></i> Update
        </button>
      </div>
    </form>
  </div>
</div>
