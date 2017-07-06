<div class="box box-solid box-danger">
  <div class="box-header">
    <h3 class="box-title">Harian Bulan <span class="bulan"></span> <span class="tahun"></span></h3>
  </div>
  <div class="box-body table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
          <th style="width: 50px">TGL</th>
          <th class="text-center">KDS</th>
          <th class="text-center">MGL</th>
          <th class="text-center">PKL</th>
          <th class="text-center">PWT</th>
          <th class="text-center">SMG</th>
          <th class="text-center">SLO</th>
          <th class="text-center">YKT</th>
          <th class="text-center">TOTAL</th>
        </tr>
        <?php for ($i=1; $i <= $tanggal->format('d'); $i++) { ?>
          <tr>
            <th class="text-center">#<?php echo $i; ?></th>
            <td id="dtd-kds-<?php echo $i; ?>"></td>
            <td id="dtd-mgl-<?php echo $i; ?>"></td>
            <td id="dtd-pkl-<?php echo $i; ?>"></td>
            <td id="dtd-pwt-<?php echo $i; ?>"></td>
            <td id="dtd-smg-<?php echo $i; ?>"></td>
            <td id="dtd-slo-<?php echo $i; ?>"></td>
            <td id="dtd-ykt-<?php echo $i; ?>"></td>
            <th id="dtd-total-<?php echo $i; ?>"></th>
          </tr>
        <?php } ?>
        <tr>
          <th class="text-center">total</th>
          <th id="dtd-kds"></th>
          <th id="dtd-mgl"></th>
          <th id="dtd-pkl"></th>
          <th id="dtd-pwt"></th>
          <th id="dtd-smg"></th>
          <th id="dtd-slo"></th>
          <th id="dtd-ykt"></th>
          <th id="dtd-total"></th>
        </tr>
    </table>
    <!-- /.form group -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">
      <div class="pull-right">
        <b>keterangan:</b>
        <span class="badge bg-green">hijau</span> mencapai target 90%;
        <span class="badge bg-yellow">kuning</span> tidak mencapai target 90%;
        <span class="badge bg-red">merah</span> % terendah
      </div>
  </div>
  <div class="overlay" id="load-dtd">
    <i class="fa fa-refresh fa-spin"></i>
  </div>
</div>
<!-- /.box -->
