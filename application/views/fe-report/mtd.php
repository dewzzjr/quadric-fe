<div class="box box-solid box-danger">
  <div class="box-header">
    <h3 class="box-title">MTD Juni</h3>
  </div>
  <div class="box-body table-responsive no-padding">
    <table class="table table-condensed table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 70px">Witel</th>
            <th class="text-center">%</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center">KDS</td>
            <td class="text-center"><span class="badge bg-red">60,00%</span></td>
          </tr>
          <tr>
            <td class="text-center">MGL</td>
            <td class="text-center"><span class="badge bg-green">90,00%</span></td>
          </tr>
          <tr>
            <td class="text-center">PKL</td>
            <td class="text-center"><span class="badge bg-yellow">80,00%</span></td>
          </tr>
          <tr>
            <td class="text-center">SLO</td>
            <td class="text-center"><span class="badge bg-green">90,00%</span></td>
          </tr>
          <tr>
            <td class="text-center">YKT</td>
            <td class="text-center"><span class="badge bg-yellow">80,00%</span></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th class="text-center">13 Juni</th>
            <th class="text-center"><span class="badge bg-yellow">80,00%</span></th>
          </tr>
        </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
<div class="box box-solid box-danger">
  <div class="box-header"></div>
  <div class="box-body table-responsive no-padding">
    <table class="table table-condensed table-striped">
        <tr>
          <th class="text-center" style="width: 70px">TGL</th>
          <th class="text-center">%</th>
        </tr>
        <?php for ($i=1; $i < 13; $i++) { ?>
          <tr>
            <td class="text-center">#<?php echo $i; ?></td>
            <td class="text-center"><span class="badge bg-yellow">80,00%</span></td>
          </tr>
        <?php } ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
