<div class="box box-solid box-danger">
  <div class="box-header">
    <h3 class="box-title">{title}</h3>
  </div>
  <div class="box-body table-responsive no-padding">
    <table class="table table-condensed table-striped" id="{prop}">
        <thead>
          <tr>
            <th class="text-center" rowspan="2">Witel</th>
            <th class="text-center" rowspan="2" style="width: 100px">COMPLY</th>
            <th class="text-center" rowspan="2" style="width: 100px">NOT COMPLY</th>
            <th class="text-center" rowspan="2" style="width: 100px">Grand Total</th>
            <th class="text-center" colspan="3">{short}</th>
          </tr>
          <tr>
            <th class="text-center">{now}</th>
            <th class="text-center">{before}</th>
            <th class="text-center">Deviasi</th>
          </tr>
        </thead>
        <tbody>
          {witel}
          <tr>
            <td class="text-center">{nama}</td>
            <td class="text-right COMPLY-{nama}"></td>
            <td class="text-right NOTCOMPLY-{nama}"></td>
            <td class="text-right TOTAL-{nama}"></td>
            <td class="text-right NOW-{nama}"></td>
            <td class="text-right BEFORE-{nama}"></td>
            <td class="text-right DEVIASI-{nama}"></td>
          </tr>
          {/witel}
        </tbody>
        <tfoot>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-right COMPLY-TOTAL"></td>
            <td class="text-right NOTCOMPLY-TOTAL"></td>
            <td class="text-right TOTAL-TOTAL"></td>
            <td class="text-right NOW-TOTAL"></td>
            <td class="text-right BEFORE-TOTAL"></td>
            <td class="text-right DEVIASI-TOTAL"></td>
          </tr>
        </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
  <div class="overlay" id="load-{prop}">
    <i class="fa fa-refresh fa-spin"></i>
  </div>
</div>
<!-- /.box -->
