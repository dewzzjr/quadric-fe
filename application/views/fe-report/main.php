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
      REPORT FULFILLMENT EXPERIENCES
      <br />R4 Data PS
      <small class="full-date" ></small>
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
        $date['action'] = 'fe';
        echo $this->parser->parse('main/date', $date, true); ?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <!-- harian -->
      <div class="col-md-6">
        <!-- FE HARIAN -->
        <?php $this->load->view('fe-report/dtd'); ?>
      </div>
      <!-- /.col (left) -->
      <div class="col-md-3 col-xs-6">
        <!-- MTD-->
        <?php
        $data['tipe'] = 'mtd';
        $data['bulan'] =  '<span class="bulan"></span>';
        $data['total'] = '<span class="tanggal"></span> <span class="bulan"></span>';
        $data['rincian'] = 'TGL';
        $data['tag'] = '#';
        $data['identifiers'] = [];
        for ($i=0; $i < $tanggal->format('d'); $i++) {
          $index = $i+1;
          array_push($data['identifiers'],
          [
            'identifier' => $index,
            'tag' => '#',
            'data' => 'rincian-tgl-'
          ]);
        }
        echo $this->parser->parse('fe-report/template-td', $data, true); ?>
      </div>
      <!-- /.col (right-mtd) -->
      <div class="col-md-3 col-xs-6">
        <!-- YTD-->
        <?php
        $data['tipe'] = 'ytd';
        $data['bulan'] =  '';
        $data['total'] = 'TR4';
        $data['rincian'] = 'BLN';
        $data['identifiers'] = [];
        $listTanggal = ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];
        for ($i=0; $i < $tanggal->format('m'); $i++) {
          $index = $i;
          array_push($data['identifiers'],
          [
            'identifier' => substr($listTanggal[$index],0,3),
            'tag' => '',
            'data' => 'rincian-bln-'
          ]);
        }
        echo $this->parser->parse('fe-report/template-td', $data, true); ?>
      </div>
      <!-- /.col (right-ytd) -->
    </div>
    <!-- /.row -->
    <div class="row">

      <div class="col-md-6">
        <!-- FE MTD -->
        <?php
        $data['title'] = 'Fulfillment Experiences MTD 1-';
        $this->load->view('fe-report/fe-all', $data); ?>
      </div>
      <div class="col-md-6">
        <!-- FE YTD -->
        <?php
        $data['title'] = 'Fulfillment Experiences YTD s.d ';
        $this->load->view('fe-report/fe-all', $data); ?>
      </div>
    </div>
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

      if (prop == 'rytd') {
        console.log(data);
        var name = 'TOTAL';
      } else {
        var name = "AVG";
      }

      var minIndex = getMin(data.data, name);

      for (var i = 0; i < data.data.length; i++) {
        var item = data.data[i];
        var value = (parseFloat(item[name])*100).toFixed(2);//Math.floor( parseFloat(item[name]) * 10000) / 100 ;
        var color = selectColor( parseFloat(item[name]), minIndex, i );

        if (prop == 'rytd') {
          var bulan = monthNames[parseInt(item['BLN'])-1].substr(0,3).toLowerCase();
          $('#rincian-bln-' + bulan).append('<span class="badge bg-' + color + '">' + value + '%</span>')
        }else {
          $('#' + prop + '-' + item["WITEL"].toLowerCase()).append('<span class="badge bg-' + color + '">' + value + '%</span>')
        }
      }

      if (prop == 'rytd') {
        $('#load-BLN').hide();
      } else {
        var value =  (parseFloat(data.total)*100).toFixed(2);//Math.floor( parseFloat() * 10000) / 100 ;
        $('#' + prop + '-total').append('<span class="badge bg-' + color + '">' + value + '%</span>')
        $('#load-'+ prop).hide();
      }
  });
}

function getDataDTD(date, month, year){
    $.getJSON( "json/dtd/"+ date +"/"+ month +"/"+ year, function( data ) {
      var minTotal = getMin(data.data, 'TOTAL');
      console.log(minTotal);
      for (var i = 0; i < data.data.length; i++) {
        var minIndex = getMinKey(data.data[i], 'TGL');
        var item = data.data[i];
        for (var key in item) {
          if (key === 'length' || !item.hasOwnProperty(key)) continue;
          var value = (parseFloat(item[key])*100).toFixed(2);//Math.floor( parseFloat(item[key]) * 10000) / 100 ;
          var color = selectColor( parseFloat(item[key]), minIndex, key );
          $('#dtd-' + key.toLowerCase() + '-' + (i+1)).append('<span class="badge bg-' + color + '">' + value + '%</span>');
          if (key == 'TOTAL') {
            var color = selectColor( parseFloat(item[key]), minTotal, i );
            $('#rincian-tgl-' + (i+1)).append('<span class="badge bg-' + color + '">' + value + '%</span>');
          }
          //console.log('#dtd-' + key.toLowerCase() + '-' + (i+1));
        }
      }

      var minIndex = getMinKey(data.total, 'TGL');
      for (var key in data.total) {
        if (key === 'length' || !data.total.hasOwnProperty(key)) continue;
        var value = (parseFloat(data.total[key])*100).toFixed(2);//Math.floor( parseFloat(data.total[key]) * 10000) / 100 ;
        var color = selectColor( parseFloat(data.total[key]), minIndex, key );
        $('#dtd-' + key.toLowerCase()).append('<span class="badge bg-' + color + '">' + value + '%</span>');
      }
      $('#load-TGL').hide();
      $('#load-dtd').hide();
    });
}

$(".full-date").text(formatDate(new Date(fullDate)));
$(".bulan").text(getMonth(month));
$(".tahun").text(year);
$(".tanggal").text(date);

getDataDTD(date, month, year);
getData('mtd', month + "/" + year);
getData('ytd', year);
getData('rytd', month + "/" + year);
</script>
</body>
</html>
