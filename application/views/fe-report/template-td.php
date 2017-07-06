<div class="box box-solid box-danger">
  <div class="box-header">
    <h3 class="box-title" style="text-transform: uppercase">{tipe} {bulan} <span class="tahun"></span></h3>
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
            <td class="text-center" id="{tipe}-kudus"></td>
          </tr>
          <tr>
            <td class="text-center">MGL</td>
            <td class="text-center" id="{tipe}-magelang"></td>
          </tr>
          <tr>
            <td class="text-center">PKL</td>
            <td class="text-center" id="{tipe}-pekalongan"></td>
          </tr>
          <tr>
            <td class="text-center">PWT</td>
            <td class="text-center" id="{tipe}-purwokerto"></td>
          </tr>
          <tr>
            <td class="text-center">SMG</td>
            <td class="text-center" id="{tipe}-semarang"></td>
          </tr>
          <tr>
            <td class="text-center">SLO</td>
            <td class="text-center" id="{tipe}-solo"></td>
          </tr>
          <tr>
            <td class="text-center">YKT</td>
            <td class="text-center" id="{tipe}-yogyakarta"></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th class="text-center">{total}</th>
            <th class="text-center" id="{tipe}-total"></th>
          </tr>
        </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
  <div class="overlay" id="load-{tipe}">
    <i class="fa fa-refresh fa-spin"></i>
  </div>
</div>
<!-- /.box -->
<div class="box box-solid box-danger">
  <div class="box-header"></div>
  <div class="box-body table-responsive no-padding">
    <table class="table table-condensed table-striped">
        <tr>
          <th class="text-center" style="width: 70px">{rincian}</th>
          <th class="text-center">%</th>
        </tr>
        {identifiers}
          <tr>
            <td class="text-center" style="text-transform: uppercase">{tag}{identifier}</td>
            <td class="text-center" id="{data}{identifier}"></td>
          </tr>
        {/identifiers}
    </table>
  </div>
  <!-- /.box-body -->
  <div class="overlay" id="load-{rincian}">
    <i class="fa fa-refresh fa-spin"></i>
  </div>
</div>
<!-- /.box -->
