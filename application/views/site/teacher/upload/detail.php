
<div class="col-md-12">
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Data <span class="text-capitalize"><?php echo $category; ?></span> </h3>
    </div>
    <div class="box-body">
      <table class="table table-striped">
        <tr>
          <th>Judul :</th>
        </tr>
        <tr>
          <td><?php echo $teacher_file->teacher_file_title; ?></td>
        </tr>
        <tr>
          <th>Format :</th>
        </tr>
        <tr>
          <td><?php echo strtoupper(substr($teacher_file->teacher_file_ext, 1, strlen($teacher_file->teacher_file_title))); ?></td>
        </tr>
        <tr>
          <th>Ukuran :</th>
        </tr>
        <tr>
          <td>
          <?php
            echo substr($teacher_file->teacher_file_size / 1000, 0,3) . " MB";
          ?>
          </td>
        </tr>
        <tr>
          <th>File :</th>
        </tr>
        <tr>
          <td>
            <a href="#" class="btn btn-success btn-flat"><i class="fa fa-download"></i> Download</a>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
