<div class="box box-danger">
  <div class="box-header">
    <!-- Upload data -->
    <div class="row">
      <form action="admin/upload_file" method="post" enctype="multipart/form-data" id="upload_form">
        <div class="col-sm-12">
          <div class="btn-group">
            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
              Upload
              <span class="fa fa-caret-down"></span>
            </button>
            <ul class="dropdown-menu">
              <li class="help-block">&nbsp&nbsp&nbsp&nbsp Select delimiter</li>
              <li class="divider"></li>
              <li><input name="submit" type="submit" value="comma" class="btn btn-block btn-success"/></li>
              <li><input name="submit" type="submit" value="tabs" class="btn btn-block btn-success"/></li>
            </ul>
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
  <div class="box-footer">
    <!-- Delete data -->
    <div class="row">
      <div class="col-sm-12">
        <button type="button" class="btn btn-default btn-block"
        data-toggle="modal"
        data-target="#delete"
        data-tanggal=""
        data-count="">
          <i class="fa fa-trash-o"></i> Delete All
        </button>
      </div>
    </div>
  </div>
</div>
<!-- /.box -->
