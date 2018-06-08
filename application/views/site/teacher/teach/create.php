<div class="col-md-12">
  <form class="" action="<?php echo base_url('guru/mengajar/store'); ?>" method="post" enctype="multipart/form-data">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title text-capitalize">Tambah</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="">Kelas</label>
          <select class="form-control" name="teach_class_id">
            <?php foreach ($classes->result() as $class): ?>
              <option value="<?php echo $class->class_id; ?>">
                <?php echo $class->class_name; ?>
              </option>
            <?php endforeach; ?>
          </select>
          <p class="help-block"></p>
          <label for="">Mata Pelajaran</label>
          <select class="form-control" name="teach_study_id">
            <?php foreach ($studies->result() as $study): ?>
              <option value="<?php echo $study->study_id; ?>">
                <?php echo $study->study_name; ?>
              </option>
            <?php endforeach; ?>
          </select>
          <p class="help-block"></p>
        </div>
      </div>
      <div class="box-footer">
        <a href="<?php echo base_url('guru/mengajar'); ?>" class="btn btn-default btn-flat">
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
