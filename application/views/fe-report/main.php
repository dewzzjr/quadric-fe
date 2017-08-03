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
      <div class="col-md-8">
        <!-- FE HARIAN -->
        <?php $this->load->view('fe-report/dtd'); ?>
      </div>
      <!-- /.col (left) -->
      <div class="col-md-2 col-xs-6">
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
      <div class="col-md-2 col-xs-6">
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
    <?php if($reg !== NULL):?>
    <div class="row">
      <div class="col-md-6">
        <!-- FE MTD -->
        <?php
        $data['reg'] = $reg;
        $data['title'] = 'Fulfillment Experiences MTD 1-';
        $data['tipe'] = 'mtd';
        $this->load->view('fe-report/reg', $data); ?>
      </div>
      <div class="col-md-6">
        <!-- FE YTD -->
        <?php
        $data['title'] = 'Fulfillment Experiences YTD s.d ';
        $data['tipe'] = 'ytd';
        $this->load->view('fe-report/reg', $data); ?>
      </div>
    </div>
    <?php endif; ?>
    <div class="row">
      <div class="col-md-12">
        <?php
        $data['title'] = 'Fulfillment Experiences TREG 4
        <span class="help-block">MTD <span class="bulan"></span> <span class="tahun"></span>';
        $data['tipe'] = 'rmtd';
        $data['size'] = '150';
        echo $this->parser->parse('fe-report/chart', $data, true); ?>
        <?php
        $data['title'] = 'Fulfillment Experiences R4
        <span class="help-block">YTD <span class="tahun"></span>';
        $data['tipe'] = 'rytd';
        $data['size'] = '150';
        echo $this->parser->parse('fe-report/chart', $data, true); ?>
      </div>
      <div class="col-md-6">
        <?php
        $data['title'] = 'Fulfillment Experiences WITEL
        <span class="help-block">MTD <span class="bulan"></span> <span class="tahun"></span>';
        $data['tipe'] = 'mtd';
        $data['size'] = '200';
        echo $this->parser->parse('fe-report/chart', $data, true); ?>
      </div>
      <div class="col-md-6">
        <?php
        $data['title'] = 'Fulfillment Experiences WITEL
        <span class="help-block">YTD <span class="tahun"></span>';
        $data['tipe'] = 'ytd';
        $data['size'] = '200';
        echo $this->parser->parse('fe-report/chart', $data, true); ?>
      </div>
      <div class="col-md-12">
        <?php
        $data['title'] = 'Daily Fulfillment Experiences WITEL
        <span class="help-block"><span class="bulan"></span> <span class="tahun"></span>';
        $data['tipe'] = 'dtd';
        $data['size'] = '250';
        echo $this->parser->parse('fe-report/chart', $data, true); ?>
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
</div>
<?php $this->load->view('footer'); ?>
<script>
var mtdReg4;
var ytdReg4;
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
  return monthNames[index-1];
}

function getMin(arr, prop) {
  var min = 999;
  var index = 0
  for (var i = 0 ; i < arr.length ; i++) {
    var item = arr[i][prop];
    if (parseFloat(item) < min) {
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
    var color = 'success';
  } else {
    var color = 'warning';
  }
  if( minIndex == index ) {
    var color = 'danger';
  }
  return color;
}

function setTable( prop, data ) {
  var chartData = [];
  var chartLabels = [];
  if (prop == 'rytd') {
    var name = 'TOTAL';
  } else {
    var name = "AVG";
  }

  var minIndex = getMin(data.data, name);

  for (var i = 0; i < data.data.length; i++) {
    var item = data.data[i];
    var value = (parseFloat(item[name])*100).toFixed(2);
    var color = selectColor( parseFloat(item[name]), minIndex, i );
    chartData.push(value);
    var label;
    if (prop == 'rytd') {
      label = monthNames[parseInt(item['BLN'])-1];
      var bulan = label.substr(0,3).toLowerCase();
      $('#rincian-bln-' + bulan).append('<span class="label label-' + color + '">' + value + '%</span>');
    } else {
      label = item["WITEL"];
      $('#' + prop + '-' + label.toLowerCase()).append('<span class="label label-' + color + '">' + value + '%</span>')
    }
    chartLabels.push(label);
  }

  if (prop == 'rytd') {
    $('#load-BLN').hide();
  } else {
    var value =  (parseFloat(data.total)*100).toFixed(2);
    $('#' + prop + '-total').append('<span class="label label-' + color + '">' + value + '%</span>');
    if ( prop == 'mtd' ) {
      mtdReg4 = value;
      var reg = getReg();
      reg = assignRank(reg.mtd);
      setRank(reg);
    }
    if ( prop == 'ytd' ) {
      ytdReg4 = value;
      var reg = getReg();
      reg = assignRank(reg.ytd);
      setRank(reg);
    }
    $('#' + prop + '-reg4').append('<span class="label label-' + color + '">' + value + '%</span>')
    $('#load-'+ prop).hide();
    $('#load-'+ prop +'-reg').hide();
  }
  setChart(prop, chartLabels, chartData);
}

function setTableDay( data ) {
  var chartData = [];
  var chartLabels = [];
  var chartDataDay = [];
  var minTotal = getMin(data.data, 'TOTAL');
  for (var i = 0; i < data.data.length; i++) {
    var minIndex = getMinKey(data.data[i], 'TGL');
    var item = data.data[i];
    for (var key in item) {
      if (i == 0 && key != 'TOTAL') {
        chartDataDay[key] = [];
        chartDataDay[key]['data'] = [];
      }
      if (key === 'length' || !item.hasOwnProperty(key)) continue;
      var value = (parseFloat(item[key])*100).toFixed(2);
      var color = selectColor( parseFloat(item[key]), minIndex, key );

      $('#dtd-' + key.toLowerCase() + '-' + (i+1)).append('<span class="label label-' + color + '">' + value + '%</span>');
      if (key == 'TOTAL') {
        var color = selectColor( parseFloat(item[key]), minTotal, i );
        $('#rincian-tgl-' + (i+1)).append('<span class="label label-' + color + '">' + value + '%</span>');
        chartData.push(value);
        chartLabels.push(i+1);
      } else {
        chartDataDay[key]['data'].push(value);
      }
    }
  }
  setChart('rmtd', chartLabels, chartData);
  setChartDay(chartLabels, chartDataDay);

  var minIndex = getMinKey(data.total, 'TGL');
  for (var key in data.total) {
    if (key === 'length' || !data.total.hasOwnProperty(key)) continue;
    var value = (parseFloat(data.total[key])*100).toFixed(2);
    var color = selectColor( parseFloat(data.total[key]), minIndex, key );
    $('#dtd-' + key.toLowerCase()).append('<span class="label label-' + color + '">' + value + '%</span>');
  }
  $('#load-TGL').hide();
  $('#load-dtd').hide();
}

function setChartDay(labels, data) {
  var datasets = []
  var color = [
              'rgba(255, 99, 132, 0.8)',
              'rgba(54, 162, 235, 0.8)',
              'rgba(255, 206, 86, 0.8)',
              'rgba(75, 192, 192, 0.8)',
              'rgba(153, 102, 255, 0.8)',
              'rgba(255, 159, 64, 0.8)',
              'rgba(0, 0, 0, 0.8)'
              ]
  for (var key in data) {
    var index = Object.keys(data).indexOf(key);
    datasets.push({
      label: key,
      data: data[key].data,
      borderColor: color[index],
      backgroundColor: 'rgba(0, 0, 0, 0)',
    })
  }
  var chartData = {
    labels  : labels,
    datasets: datasets
  }
  var chartCanvas          = $('#dtd-chart').get(0).getContext('2d')
  var chartOptions = {
    //Boolean - If we should show the scale at all
    showScale               : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : false,
    //String - Colour of the grid lines
    scaleGridcolor          : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - Whether the line is curved between points
    bezierCurve             : false,
    //Number - Tension of the bezier curve between points
    bezierCurveTension      : 0.3,
    //Boolean - Whether to show a dot for each point
    pointDot                : true,
    //Number - Radius of each point dot in pixels
    pointDotRadius          : 4,
    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth     : 1,
    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,
    //Boolean - Whether to show a stroke for datasets
    datasetStroke           : true,
    //Number - Pixel width of dataset stroke
    datasetStrokeWidth      : 2,
    //Boolean - Whether to fill the dataset with a color
    fill                    : false,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].color%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio     : true,
    //Boolean - whether to make the chart responsive to window resizing
    responsive              : true
  }
  var chart = new Chart(chartCanvas, {
      type: 'line',
      data: chartData,
      options: chartOptions
  })
}
function setChart(prop, labels, data) {
  var chartData = {
    labels  : labels,
    datasets: [
      {
        label               : '%',
        data                : data
      }
    ]
  }
  var chartCanvas          = $('#'+ prop +'-chart').get(0).getContext('2d')
  if (prop == 'mtd' || prop == 'ytd') {
    chartData.datasets[0].backgroundColor = [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)'
            ]

    var chartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }
    var chart = new Chart(chartCanvas, {
        type: 'horizontalBar',
        data: chartData,
        options: chartOptions
    })
  } else {
    chartData.datasets[0].borderColor = 'rgba(54, 162, 235, 0.8)'
    chartData.datasets[0].backgroundColor = 'rgba(54, 162, 235, 0.1)'
    var chartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridcolor          : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : false,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //String - Line color in rgba
      borderColor             : 'rgba(54, 162, 235, 0.8)',
      //Boolean - Whether to show a dot for each point
      pointDot                : true,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : false,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].color%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }
    var chart = new Chart(chartCanvas, {
        type: 'line',
        data: chartData,
        options: chartOptions
    })
  }
}

function getData(prop, input = ""){
  $.ajax({
    url: "json/"+ prop +"/"+ input,
    dataType: 'json',
    tryCount : 0,
    retryLimit : 3,
    success: function( data ) {
      setTable(prop, data);
    },
    error : function(xhr, textStatus, errorThrown ) {
      console.log("Error:" + prop + "/" + input);
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

function getDataDay(date, month, year){
  $.ajax({
    url: "json/dtd/"+ date +"/"+ month +"/"+ year,
    dataType: 'json',
    tryCount : 0,
    retryLimit : 3,
    success: function( data ) {
      setTableDay( data );
    },
    error : function(xhr, textStatus, errorThrown ) {
      console.log("Error:" + prop + "/" + input);
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

function assignRank(array) {
  array.sort(function(a, b){
      return b.value - a.value;
  });

  var rank = 1;
  for (var i = 0; i < array.length; i++) {
    // increase rank only if current score less than previous
    if (i > 0 && array[i].value < array[i - 1].value) {
      rank++;
    }
      array[i].rank = rank;
  }
  return array;
}

function setRank(data) {
  for (var i = 0; i < data.length; i++) {
    var item = data[i];
    if (i == 0) {
      var color = 'green';
    } else if (i == data.length-1) {
      var color = 'red';
    } else {
      var color = 'yellow';
    }
    $('#rank-' + item.id).append('<span class="badge bg-' + color + '">' + item.rank + '</span>');

  }
}

function getReg() {
  var mtd = "";
  var ytd = "";
  $('.fe').each(function(i, obj) {
    var id = $(this).parent().attr('id');
    var value = parseFloat($(this).html());

    if(id.match(/mtd-reg./)) {
      mtd += "{"
      mtd += '\"id\" : \"' + id + "\",";
      mtd += '\"value\" :' + value;
      mtd += "},";
    } else {
      ytd += "{"
      ytd += '\"id\" : \"' + id + "\",";
      ytd += '\"value\" :' + value;
      ytd += "},";
    }

    // console.log($(this).parent().attr('id'));
    // console.log(parseFloat($(this).text()));
  });

  mtd += "{\"id\" : \"mtd-reg4\", \"value\" : " + mtdReg4 + "}"; //mtd.replace(/,\s*$/, "");
  ytd += "{\"id\" : \"ytd-reg4\", \"value\" : " + ytdReg4 + "}";
  var json = "{\"mtd\":[" + mtd + "],\"ytd\":[" + ytd + "]}";
  json = eval("(" + json + ")");
  return json;
}

$(".full-date").text(formatDate(new Date(fullDate)));
$(".bulan").text(getMonth(month));
$(".tahun").text(year);
$(".tanggal").text(date);

getDataDay(date, month, year)
getData('mtd', month + "/" + year)
getData('ytd', year)
getData('rytd', month + "/" + year)

</script>
</body>
</html>
