<div class="box box-solid box-danger">
  <div class="box-header">
    <h3 class="box-title">Harian Bulan Juni 2017</h3>
  </div>
  <div class="box-body table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
          <th style="width: 50px">TGL</th>
          <th class="text-center">KDS</th>
          <th class="text-center">MGL</th>
          <th class="text-center">PKL</th>
          <th class="text-center">SLO</th>
          <th class="text-center">YKT</th>
          <th class="text-center">TOTAL</th>
        </tr>
        <?php for ($i=1; $i < 13; $i++) { ?>
          <tr>
            <td class="text-center">#<?php echo $i; ?></td>
            <td><span class="badge bg-red">60,00%</span></td>
            <td><span class="badge bg-green">90,00%</span></td>
            <td><span class="badge bg-yellow">80,00%</span></td>
            <td><span class="badge bg-yellow">80,00%</span></td>
            <td><span class="badge bg-green">90,00%</span></td>
            <td><span class="badge bg-yellow">80,00%</span></td>
          </tr>
        <?php } ?>
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
</div>
<!-- /.box -->
