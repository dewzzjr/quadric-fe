<div class="box box-danger">
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <div class="table-responsive">
      <br>
      <div class="col-sm-12">
      <table class="table table-bordered table-hover dataTable" role="grid" id="dataTables">
        <thead>
          <tr>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Option</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $this->load->model('Model_FE');
          $data['listTanggal'] = $this->Model_FE->listTanggal();

          foreach ($listTanggal as $row) { ?>
          <tr>
            <td><?php echo $row->TGL_PS; ?></td>
            <td class="text-right"><?php echo $row->CNT_PS; ?></td>
            <td class="text-center"><button type="button" class="btn btn-default btn-danger btn-sm" id="btn-delete" value="<?php $row->TGL_PS; ?>"><i class="fa fa-trash-o"></i> Delete</button></td>
          </tr>
          <?php }
          ?>
        </tbody>
      </table>
      </div>
    </div>
    <!-- /.table -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
<script >
  $('.btn').click(function() {
    var TGL_PS = document.getElementById("btn-delete").value;

    $.ajax({
      type: "POST",
      url: "some.php",
      data: "tanggal=" + TGL_PS
    }).done(function( msg ) {
      alert( "Data Saved: " + msg );
    });
  });
</script>