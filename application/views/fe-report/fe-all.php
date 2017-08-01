<?php $id = ($tipe == 'ytd' ? "yreg" : "reg"); ?>
<div class="box box-solid box-danger">
  <div class="box-header">
    <h3 class="box-title"><?php echo $title; ?><span class="full-date"></span></h3>
  </div>
  <div class="box-body table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
          <th>&nbsp</th>
          <?php for ($i=0; $i < 7; $i++) { ?>
            <th class="text-center">REG<?php echo $i+1 ?></th>
          <?php } ?>
          <th class="text-center">NAS</th>
        </tr>
        <tr>
          <th class="text-center">PS < 3 HARI</th>
          <?php for ($i=1; $i < 8; $i++) {
            if ($i == 4): ?>
            <td class="text-center" id="<?php echo $tipe; ?>-reg4"></td>
          <?php else: ?>
            <td class="text-center"><?php echo $reg[$id.$i]; ?></td>
          <?php endif;
          } ?>
          <td rowspan="2" class="text-center"><span class="badge bg-yellow">80,00%</span></td>
        </tr>
        <tr>
          <th class="text-center">RANK</th>
          <?php for ($i=0; $i < 7; $i++) { ?>
            <td class="text-center"><?php echo $i+1 ?></td>
          <?php } ?>
        </tr>
    </table>
    <!-- /.form group -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
