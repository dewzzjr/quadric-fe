<?php $id = ($tipe == 'ytd' ? "y" : ""); ?>
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
          <?php for ($i=1; $i < 8; $i++) : ?>
            <td class="text-center" id="<?php echo $tipe; ?>-reg<?php echo $i; ?>">
          <?php if ($i != 4): ?>
            <span class="fe label label-<?php echo ($reg[$id.'reg'.$i] >= 90 ? 'success' : 'warning'); ?>">
              <?php echo $reg[$id.'reg'.$i]; ?>%
            </span>
          <?php endif; ?>
            </td>
          <?php endfor; ?>
          <td rowspan="2" class="text-center">
            <span class="label label-warning">
              <?php echo $reg[$id.'total']; ?>%
            </span>
          </td>
        </tr>
        <tr>
          <th class="text-center">RANK</th>
          <?php for ($i=1; $i < 8; $i++) { ?>
            <td class="text-center" id="rank-<?php echo $tipe; ?>-reg<?php echo $i; ?>"></td>
          <?php } ?>
        </tr>
    </table>
    <!-- /.form group -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
