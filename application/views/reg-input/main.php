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
								<form role="form" action="admin/input_data" method="post" enctype="multipart/form-data" id="input_form">
									<div class="box-body">
										<label>Tanggal</label>
						                <div class="input-group date">
							                <div class="input-group-addon">
							                  <i class="fa fa-calendar"></i>
							                </div>
						                  <input name="tanggal" type="text" class="form-control pull-right" id="alt-datepicker">
						                </div>
						                <hr>
						                <div class="row">
							            	<div class="col-xs-4 form-group">
							                	<label>Regional 1</label>
							                	<input name="reg1" type="number" step=".01" class="form-control" placeholder="Data Regional 1">
							                	<span class="help-block"><?php echo form_error("reg1")?></span>
							                </div>
							                <div class="col-xs-4 form-group">
							                	<label>Regional 2</label>
							                	<input name="reg2" type="number" step=".01" class="form-control" placeholder="Data Regional 2">
							                	<span class="help-block"><?php echo form_error("reg2")?></span>
							                </div>
							            </div>
							            <div class="row">
							            	<div class="col-xs-4 form-group">
							                	<label>Regional 3</label>
							                	<input name="reg3" type="number" step=".01" class="form-control" placeholder="Data Regional 3">
							                	<span class="help-block"><?php echo form_error("reg3")?></span>
							                </div>
							                <div class="col-xs-4 form-group">
							                	<label>Regional 4 (Automatic)</label>
							                	<input disabled name="reg4" type="number" step=".01" class="form-control" placeholder="Data Regional 4">
							                </div>
							            </div>
						                <div class="row">
							            	<div class="col-xs-4 form-group">
							                	<label>Regional 5</label>
							                	<input name="reg5" type="number" step=".01" class="form-control" placeholder="Data Regional 5">
							                	<span class="help-block"><?php echo form_error("reg5")?></span>
							                </div>
							                <div class="col-xs-4 form-group">
							                	<label>Regional 6</label>
							                	<input name="reg6" type="number" step=".01" class="form-control" placeholder="Data Regional 6">
							                	<span class="help-block"><?php echo form_error("reg6")?></span>
							                </div>
							            </div>
							            <div class="row">
							            	<div class="col-xs-4 form-group">
							                	<label>Regional 7</label>
							                	<input name="reg7" type="number" step=".01" class="form-control" placeholder="Data Regional 7">
							                	<span class="help-block"><?php echo form_error("reg7")?></span>
							                </div>
							            </div>
									</div>
									<div class="box-footer">
						            	<button type="submit" class="btn btn-success btn-block">Submit</button>
						            </div>
								</form>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	<?php $this->load->view('footer'); ?>
	</body>
</html>