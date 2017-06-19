
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Report Fulfillment Experiences R4 Data PS
      <small>sampai dengan <b>13 Juni 2017</b></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> View Report</a></li>
      <li class="active">Fulfillment Experiencesx</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Date:</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="datepicker">
            <span class="input-group-btn">
              <button type="button" class="btn btn-info btn-flat btn-danger"><b>Go!</b></button>
            </span>
          </div>
          <!-- /.input group -->
        </div>
        <!-- /.form group -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">

      <!-- harian -->
      <div class="col-md-6">
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

        <!-- FE MTD -->
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

        <!-- FE YTD -->
        <div class="box box-solid box-danger">
          <div class="box-header">
            <h3 class="box-title">Fulfillment Experiences YTD s.d 13 Juni 2017</h3>
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
      </div>
      <!-- /.col (left) -->
      <div class="col-md-3">
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
      </div>
      <!-- /.col (right-mtd) -->

      <div class="col-md-3">
        <div class="box box-solid box-danger">
          <div class="box-header">
            <h3 class="box-title">YTD 2017</h3>
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
                    <th class="text-center">TR4</th>
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
                  <th class="text-center" style="width: 70px">BLN</th>
                  <th class="text-center">%</th>
                </tr>
                <?php for ($i=1; $i < 7; $i++) { ?>
                  <tr>
                    <td class="text-center">JAN</td>
                    <td class="text-center"><span class="badge bg-yellow">80,00%</span></td>
                  </tr>
                <?php } ?>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col (right-ytd) -->
      </div>
  </section>
  <!-- /.content -->
</div>
