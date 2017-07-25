<div class="box box-danger">
  <div class="box-header">
    <!-- Upload data -->
    <div class="row">
      <form action="admin/upload_file" method="post" enctype="multipart/form-data" id="upload_form">
        <div class="col-sm-12">
          <div class="btn-group">
            
            <input name="submit" type="submit" value="Upload" class="btn btn-success"/>
            <input id="fileupload" name="data" type="file" class="filestyle"/>
          </div>
          <!-- /.btn-group -->
        </div>
        <!-- /.col -->
      </form>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table id="dataTables" class="table table-bordered table-hover" >
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Option</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Option</th>
          </tr>
        </tfoot>
        <tbody>
          {tanggal}
          <tr>
            <td>{TGL_PS}</td>
            <td class="text-right">{CNT_PS}</td>
            <td class="text-center">
              <button type="button" class="btn btn-default btn-danger btn-sm"
              data-toggle="modal"
              data-target="#delete"
              data-tanggal="{TGL_PS}"
              data-count="{CNT_PS}">
                <i class="fa fa-trash-o"></i> Delete
              </button>
            </td>
          </tr>
          {/tanggal}
        </tbody>
      </table>
    </div>
    <!-- /.table -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
