<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('header', $title); ?>
</head>
<body class="skin-red sidebar-mini">
<div class="wrapper">
<?php
$this->load->view('main/header');
$this->load->view('main/sidebar');
?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Input Data Regional
		</h1>
		<ol class="breadcrumb">
	      <li><a href="admin"><i class="fa fa-dashboard"></i> Admin</a></li>
	      <li class="active">Input Data Regional</li>
	    </ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header">
						<h4>Masukkan Data Regional</h4>
					</div>
					<form role="form" action="admin/input" method="post" enctype="multipart/form-data" id="input_form">
						<div class="box-body">
							<label>Tanggal</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input name="tanggal" type="text" class="form-control pull-right" id="alt-datepicker">
              </div>
							<span class="help-block"><?php echo form_error("tanggal")?></span>
					    <table class="table ">
								<tr>
									<th class="text-center" colspan="7">
										MTD
									</th>
								</tr>
								<tr>
									<td>
										<div class="form-group <?php if(form_error("reg1")) { echo "has-error"; }?>" >
		                	<label class="control-label" for="reg1">Regional 1</label>
		                	<input name="reg1" id="reg1" type="number" step=".01" class="form-control" placeholder="REG1">
		                	<span class="help-block"><?php echo form_error("reg1")?></span>
		                </div>
									</td>
									<td>
		                <div class="form-group <?php if(form_error("reg2")) { echo "has-error"; }?>" >
		                	<label class="control-label" for="reg2">Regional 2</label>
		                	<input name="reg2" id="reg2" type="number" step=".01" class="form-control" placeholder="REG2">
		                	<span class="help-block"><?php echo form_error("reg2")?></span>
		                </div>
									</td>
									<td>
			            	<div class="form-group <?php if(form_error("reg3")) { echo "has-error"; }?>" >
		                	<label class="control-label" for="reg3">Regional 3</label>
		                	<input name="reg3" id="reg3" type="number" step=".01" class="form-control" placeholder="REG3">
		                	<span class="help-block"><?php echo form_error("reg3")?></span>
		                </div>
									</td>
									<td>
		                <div class="form-group <?php if(form_error("reg4")) { echo "has-error"; }?>" >
		                	<label class="control-label" for="reg4">Regional 4</label>
		                	<input disabled name="reg4" id="reg4" type="number" step=".01" class="form-control" placeholder="REG4">
											<span class="help-block">(Automatic)</span>
		                </div>
									</td>
									<td>
			            	<div class="form-group <?php if(form_error("reg5")) { echo "has-error"; }?>" >
		                	<label class="control-label" for="reg5">Regional 5</label>
		                	<input name="reg5" id="reg5" type="number" step=".01" class="form-control" placeholder="REG5">
		                	<span class="help-block"><?php echo form_error("reg5")?></span>
		                </div>
									</td>
									<td>
		                <div class="form-group <?php if(form_error("reg6")) { echo "has-error"; }?>" >
											<label class="control-label" for="reg6">Regional 6</label>
		                	<input name="reg6" id="reg6" type="number" step=".01" class="form-control" placeholder="REG6">
		                	<span class="help-block"><?php echo form_error("reg6")?></span>
		                </div>
									</td>
									<td>
			            	<div class="form-group <?php if(form_error("reg7")) { echo "has-error"; }?>" >
		                	<label class="control-label" for="reg7">Regional 7</label>
		                	<input name="reg7" id="reg7" type="number" step=".01" class="form-control" placeholder="REG7">
		                	<span class="help-block"><?php echo form_error("reg7")?></span>
		                </div>
									</td>
								</tr>
								<tr>
									<th class="text-center" colspan="7">
										YTD
									</th>
								</tr>
								<tr>
									<td>
										<div class="form-group <?php if(form_error("reg1")) { echo "has-error"; }?>" >
		                	<label class="control-label" for="reg1">Regional 1</label>
		                	<input name="reg1" id="reg1" type="number" step=".01" class="form-control" placeholder="REG1">
		                	<span class="help-block"><?php echo form_error("reg1")?></span>
		                </div>
									</td>
									<td>
		                <div class="form-group <?php if(form_error("reg2")) { echo "has-error"; }?>" >
		                	<label class="control-label" for="reg2">Regional 2</label>
		                	<input name="reg2" id="reg2" type="number" step=".01" class="form-control" placeholder="REG2">
		                	<span class="help-block"><?php echo form_error("reg2")?></span>
		                </div>
									</td>
									<td>
			            	<div class="form-group <?php if(form_error("reg3")) { echo "has-error"; }?>" >
		                	<label class="control-label" for="reg3">Regional 3</label>
		                	<input name="reg3" id="reg3" type="number" step=".01" class="form-control" placeholder="REG3">
		                	<span class="help-block"><?php echo form_error("reg3")?></span>
		                </div>
									</td>
									<td>
		                <div class="form-group <?php if(form_error("reg4")) { echo "has-error"; }?>" >
		                	<label class="control-label" for="reg4">Regional 4</label>
		                	<input disabled name="reg4" id="reg4" type="number" step=".01" class="form-control" placeholder="REG4">
											<span class="help-block">(Automatic)</span>
		                </div>
									</td>
									<td>
			            	<div class="form-group <?php if(form_error("reg5")) { echo "has-error"; }?>" >
		                	<label class="control-label" for="reg5">Regional 5</label>
		                	<input name="reg5" id="reg5" type="number" step=".01" class="form-control" placeholder="REG5">
		                	<span class="help-block"><?php echo form_error("reg5")?></span>
		                </div>
									</td>
									<td>
		                <div class="form-group <?php if(form_error("reg6")) { echo "has-error"; }?>" >
											<label class="control-label" for="reg6">Regional 6</label>
		                	<input name="reg6" id="reg6" type="number" step=".01" class="form-control" placeholder="REG6">
		                	<span class="help-block"><?php echo form_error("reg6")?></span>
		                </div>
									</td>
									<td>
			            	<div class="form-group <?php if(form_error("reg7")) { echo "has-error"; }?>" >
		                	<label class="control-label" for="reg7">Regional 7</label>
		                	<input name="reg7" id="reg7" type="number" step=".01" class="form-control" placeholder="REG7">
		                	<span class="help-block"><?php echo form_error("reg7")?></span>
		                </div>
									</td>
								</tr>
				    	</table>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
	            	<button type="submit" class="btn btn-success btn-block">Submit</button>
            </div>
					</form>
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>
