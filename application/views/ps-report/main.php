<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('header', $title); ?>
<script>
const fullDate = '<?php echo $tanggal->format('Y-m-d');?>';
const date = '<?php echo $tanggal->format('d');?>';
const month = '<?php echo $tanggal->format('m');?>';
const year = '<?php echo $tanggal->format('Y');?>';
</script>
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
      REPORT QUADRIC's FULFILLMENT EXPERIENCES
      <small class="full-date"></small>
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
        <?php
        $fe['now'] = $tanggal->format('d/m/Y');
        date_sub($tanggal, date_interval_create_from_date_string("1 day"));
        $fe['before'] = $tanggal->format('d/m/Y');
        $fe['witel'] = array();
        array_push($fe['witel'], array('nama' => 'KUDUS'));
        array_push($fe['witel'], array('nama' => 'MAGELANG'));
        array_push($fe['witel'], array('nama' => 'PEKALONGAN'));
        array_push($fe['witel'], array('nama' => 'PURWOKERTO'));
        array_push($fe['witel'], array('nama' => 'SEMARANG'));
        array_push($fe['witel'], array('nama' => 'SOLO'));
        array_push($fe['witel'], array('nama' => 'YOGYAKARTA'));

        $date['action'] = 'ps';
        echo $this->parser->parse('main/date', $date, true); ?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <!-- harian -->
      <div class="col-md-6">
        <!-- FE HARIAN < 3-->
        <?php
        $fe['title'] = '%PS < 3 hari Tgl <span class="full-date"></span>';
        $fe['short'] = '%PS < 3 hari';
        $fe['prop'] = 'psd3';
        echo $this->parser->parse('ps-report/template', $fe, true); ?>
      </div>
      <!-- /.col (left) -->
      <div class="col-md-6">
        <!-- MTD < 3-->
        <?php
        $fe['title'] = '%PS < 3 Hari MTD 1-<span class="full-date"></span>';
        $fe['short'] = '%PS < 3 hari';
        $fe['prop'] = 'psm3';
        echo $this->parser->parse('ps-report/template', $fe, true); ?>
      </div>
      <!-- /.col (right) -->
    </div>
    <!-- /.row -->
    <div class="row">
      <!-- harian -->
      <div class="col-md-6">
        <!-- FE HARIAN < 2-->
        <?php
        $fe['title'] = '%PS < 2 hari Tgl <span class="full-date"></span>';
        $fe['short'] = '%PS < 2 hari';
        $fe['prop'] = 'psd2';
        echo $this->parser->parse('ps-report/template', $fe, true); ?>
      </div>
      <!-- /.col (left) -->
      <div class="col-md-6">
        <!-- MTD < 2-->
        <?php
        $fe['title'] = '%PS < 2 Hari MTD 1-<span class="full-date"></span>';
        $fe['short'] = '%PS < 2 hari';
        $fe['prop'] = 'psm2';
        echo $this->parser->parse('ps-report/template', $fe, true); ?>
      </div>
      <!-- /.col (right) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
</div>
<?php $this->load->view('footer'); ?>
<script>
var monthNames = [
  "Januari", "Februari", "Maret",
  "April", "Mei", "Juni", "Juli",
  "Agustus", "September", "Oktober",
  "November", "Desember"
];

function formatDate(dates) {
  var day = dates.getDate();
  var monthIndex = dates.getMonth();
  var year = dates.getFullYear();
  return day + ' ' + monthNames[monthIndex] + ' ' + year;
}

function getMonth(index) {
  return monthNames[index]
}

function getMin(arr, prop) {
  if (prop == 'TOTAL') {
    console.log(arr);
  }
  var min = 999;
  var index = 0
  for (var i = 0 ; i < arr.length ; i++) {
    var item = arr[i][prop];
    if (parseFloat(item) < min) {
      if (prop == 'TOTAL') {
        console.log(min + " > " + item);
      }
      index = i;
      min = parseFloat(item);
    }
  }
  return index;
}

function getMinKey(o, prop){
  delete o[prop];
    var vals = [];
    for(var i in o){
       vals.push(o[i]);
    }

    var max = Math.min.apply(null, vals);
     for(var i in o){
        if(o[i] == max){
            return i;
        }
    }
}

function selectColor(value, minIndex, index) {
  var color;
  if ( value > 0.9) {
    var color = 'green';
  } else {
    var color = 'yellow';
  }
  if( minIndex == index ) {
    var color = 'red';
  }
  return color;
}

function getData(prop, input = ""){
  $.getJSON( "json/"+ prop +"/"+ input, function( data ) {

      for (var i = 0; i < data.data.length; i++) {
        var item = data.data[i];
        for (var key in item) {
          if (key == "NOW" || key == "BEFORE") {
            var value = (parseFloat(item[key])*100).toFixed(2);
            if (key == "NOW") {
              var now = value;
            } else {
              var bef = value;
            }
            value = value + '%'
          } else {
            var value = item[key];
          }

          $('#' + prop + ' .' + key + '-' + item["WITEL"]).append(value);
        }

        var value = (bef - now).toFixed(2);
        if (value > 0) {
          color = "green"
        } else {
          color = "red"
        }
        $('#' + prop + ' .DEVIASI-' + item["WITEL"]).append('<span class="badge bg-' + color + '">' + value + '%</span>')

      }

      // TOTAL
      var item = data.total;
      for (var key in item) {
        if (key == "NOW" || key == "BEFORE") {
          var value = (parseFloat(item[key])*100).toFixed(2);
          if (key == "NOW") {
            var now = value;
          } else {
            var bef = value;
          }
          value = value + '%'
        } else {
          var value = item[key];
        }

        $('#' + prop + ' .' + key + '-TOTAL').append(value);
      }

      var value = (bef - now).toFixed(2);
      if (value > 0) {
        color = "green"
      } else {
        color = "red"
      }
      $('#' + prop + ' .DEVIASI-TOTAL').append('<span class="badge bg-' + color + '">' + value + '%</span>')

      $('#load-'+ prop).hide();
  });
}

$(".full-date").text(formatDate(new Date(fullDate)));

getData('psd3', date + "/" + month + "/" + year);
getData('psd2', date + "/" + month + "/" + year);
</script>
</body>
</html>
