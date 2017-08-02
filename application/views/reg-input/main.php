<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('header', $title);
	if ($this->uri->segment(3) !== NULL) {
		echo '<script> const tgl = "'.$this->uri->segment(3).'"</script>';
	}
	?>
<style>
.table > tr > td {
     vertical-align: middle !important;
}
</style>
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
				<form role="form" action="admin/input" method="post" enctype="multipart/form-data" id="input_form">
					<div class="box-header ">
						<label>Tanggal</label>
            <div class="input-group date <?php if(form_error("tanggal")) { echo "has-error"; }?>">
              <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
              <input name="tanggal" value="<?php echo set_value('tanggal'); ?>" type="text" class="form-control pull-right" id="alt-datepicker">
				      <span class="input-group-btn">
				        <button id="checkDate" class="btn btn-info btn-flat btn-success"><b>Check Date!</b></button>
				      </span>
            </div>
					</div>
					<div class="box-body table-responsive">
				    <table class="table">
							<tr>
								<td class="text-center" colspan="8">
									<h4>MTD</h4>
								</td>
							</tr>
							<tr>
								<td>
									<label>Regional 1</label>
									<div class="input-group <?php if(form_error("reg1")) { echo "has-error"; }?>" >
	                	<input name="reg1" value="<?php echo set_value('reg1'); ?>" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="REG1">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
								<td>
									<label>Regional 2</label>
	                <div class="input-group <?php if(form_error("reg2")) { echo "has-error"; }?>" >
	                	<input name="reg2" value="<?php echo set_value('reg2'); ?>" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="REG2">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
								<td>
									<label>Regional 3</label>
		            	<div class="input-group <?php if(form_error("reg3")) { echo "has-error"; }?>" >
	                	<input name="reg3" value="<?php echo set_value('reg3'); ?>" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="REG3">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
								<td>
									<label>Regional 4</label>
	                <div class="input-group <?php if(form_error("Automatic")) { echo "has-error"; }?>" >
	                	<input disabled name="Automatic" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="Automatic">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
							</tr>
							<tr>
								<td>
									<label>Regional 5</label>
		            	<div class="input-group <?php if(form_error("reg5")) { echo "has-error"; }?>" >
	                	<input name="reg5" value="<?php echo set_value('reg5'); ?>" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="REG5">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
								<td>
									<label>Regional 6</label>
	                <div class="input-group <?php if(form_error("reg6")) { echo "has-error"; }?>" >
	                	<input name="reg6" value="<?php echo set_value('reg6'); ?>" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="REG6">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
								<td>
									<label>Regional 7</label>
		            	<div class="input-group <?php if(form_error("reg7")) { echo "has-error"; }?>" >
	                	<input name="reg7" value="<?php echo set_value('reg7'); ?>" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="REG7">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
								<td>
									<label>Total</label>
		            	<div class="input-group <?php if(form_error("total")) { echo "has-error"; }?>" >
	                	<input name="total" value="<?php echo set_value('total'); ?>" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="TOTAL">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
							</tr>
							<tr>
								<td class="text-center" colspan="8">
									<h4>YTD</h4>
								</td>
							</tr>
							<tr>
								<td>
									<label>Regional 1</label>
									<div class="input-group <?php if(form_error("yreg1")) { echo "has-error"; }?>" >
	                	<input name="yreg1" value="<?php echo set_value('yreg1'); ?>" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="REG1">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
								<td>
									<label>Regional 2</label>
	                <div class="input-group <?php if(form_error("yreg2")) { echo "has-error"; }?>" >
	                	<input name="yreg2" value="<?php echo set_value('yreg2'); ?>" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="REG2">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
								<td>
									<label>Regional 3</label>
		            	<div class="input-group <?php if(form_error("yreg3")) { echo "has-error"; }?>" >
	                	<input name="yreg3" value="<?php echo set_value('yreg3'); ?>" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="REG3">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
								<td>
									<label>Regional 4</label>
	                <div class="input-group <?php if(form_error("yAutomatic")) { echo "has-error"; }?>" >
	                	<input disabled name="yAutomatic" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="Automatic">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
							</tr>
							<tr>
								<td>
									<label>Regional 5</label>
		            	<div class="input-group <?php if(form_error("yreg5")) { echo "has-error"; }?>" >
	                	<input name="yreg5" value="<?php echo set_value('yreg5'); ?>" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="REG5">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
								<td>
									<label>Regional 6</label>
	                <div class="input-group <?php if(form_error("yreg6")) { echo "has-error"; }?>" >
	                	<input name="yreg6" value="<?php echo set_value('yreg6'); ?>" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="REG6">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
								<td>
									<label>Regional 7</label>
		            	<div class="input-group <?php if(form_error("yreg7")) { echo "has-error"; }?>" >
	                	<input name="yreg7" value="<?php echo set_value('yreg7'); ?>" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="REG7">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
								<td>
									<label>Total</label>
		            	<div class="input-group <?php if(form_error("ytotal")) { echo "has-error"; }?>" >
	                	<input name="ytotal" value="<?php echo set_value('ytotal'); ?>" type="number" size="20" step=".01" min="0" max="100" class="form-control" placeholder="TOTAL">
										<span class="input-group-addon">%</span>
	                </div>
								</td>
							</tr>
			    	</table>
					</div>
					<!-- /.box-body -->
					<div class="overlay" id="load-date">
						<i class="fa fa-refresh fa-spin"></i>
					</div>
					<div class="box-footer">
            	<button type="submit" class="btn btn-success btn-block">Submit</button>
				      <?php if (validation_errors()) : ?>
			        <div class="alert alert-danger alert-dismissible">
			          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			          <h4><i class="icon fa fa-ban"></i> Error!</h4>
			          <?php echo validation_errors(); ?>
			        </div>
				      <?php endif; ?>
							<div class="alert alert-warning alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<i class="icon fa fa-warning"></i> No Data Found!
							</div>
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
<script>

function show() {
	$("#checkDate").prop('disabled', true);
	$('#load-date').show();
}

function hide() {
	$('#load-date').hide();
	$("#checkDate").prop('disabled', false);
}

function init() {
	$('#load-date').hide();
	$('.alert-warning').hide();

	if((typeof tgl) !== 'undefined') {
		$('[name="tanggal"]').val(tgl);
		getData($('[name=tanggal]').val());
	}
}
function getData( input = "" ){
	show();
  $.ajax({
    url: "json/reg/"+ input,
    dataType: 'json',
    tryCount : 0,
    retryLimit : 3,
    success: function( data ) {
      var item = data;
			console.log(typeof item);
			if (item == null || item == '') {
				$('[type="number"]').val('');
				$('.alert-warning').show();
			} else {
				for (var key in item) {
					if (!(key == "tanggal")) {
						var value = item[key];
		        $('[name="' + key + '"]').val(value);
					}
	      }
			}
			hide();
    },
    error : function(xhr, textStatus, errorThrown ) {
			$('[type="number"]').val('');
			$('#load-date').hide();
			$("#checkDate").prop('disabled', false);
      console.log("Error: reg/" + input);
        if (textStatus == 'timeout') {
            this.tryCount++;
            if (this.tryCount <= this.retryLimit) {
                //try again
                $.ajax(this);
                return;
            }
            return;
        }
        if (xhr.status == 500) {
            alert("Script exhausted");
            location.reload();
        } else {
            //handle error
        }
    }
  });
}

$('#checkDate').click(function(e){
	e.preventDefault();
	getData($('[name=tanggal]').val());
});
init();
</script>
</body>
</html>
