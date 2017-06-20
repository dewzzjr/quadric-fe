<div class="box box-solid box-danger">
  <div class="box-header">
    <h3 class="box-title">Fulfillment Experiences MTD 1-13 Juni 2017</h3>
  </div>
  <div class="box-body table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
          <th></th>
          <?php for ($i=0; $i < 8; $i++) { ?>
            <th class="text-center">REG<?php echo $i ?></th>
          <?php } ?>
          <th class="text-center">NAS</th>
        </tr>
        <tr>
          <td class="text-center"><b>PS < 3 HARI</b></td>
          <?php for ($i=0; $i < 8; $i++) { ?>
            <td class="text-center"><span class="badge bg-red">60,00%</span></td>
          <?php } ?>
          <td rowspan="2" class="text-center"><span class="badge bg-yellow">80,00%</span></td>
        </tr>
        <tr>
          <td class="text-center"><b>RANK</b></td>
          <?php for ($i=0; $i < 8; $i++) { ?>
            <td class="text-center"><?php echo $i ?></td>
          <?php } ?>
        </tr>
    </table>
    <!-- /.form group -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
