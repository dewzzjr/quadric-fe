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

function getData(prop, input = ""){
  $.ajax({
    url: "json/"+ prop +"/"+ input,
    dataType: 'json',
    tryCount : 0,
    retryLimit : 3,
    success: function( data ) {
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

        if (prop == 'rytd') {
          var bulan = monthNames[parseInt(item['BLN'])-1].substr(0,3).toLowerCase();
          $('#rincian-bln-' + bulan).append('<span class="label label-' + color + '">' + value + '%</span>')
        }else {
          $('#' + prop + '-' + item["WITEL"].toLowerCase()).append('<span class="label label-' + color + '">' + value + '%</span>')
        }
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

function getDataDTD(date, month, year){
  $.ajax({
    url: "json/dtd/"+ date +"/"+ month +"/"+ year,
    dataType: 'json',
    tryCount : 0,
    retryLimit : 3,
    success: function( data ) {
      var minTotal = getMin(data.data, 'TOTAL');
      for (var i = 0; i < data.data.length; i++) {
        var minIndex = getMinKey(data.data[i], 'TGL');
        var item = data.data[i];
        for (var key in item) {
          if (key === 'length' || !item.hasOwnProperty(key)) continue;
          var value = (parseFloat(item[key])*100).toFixed(2);
          var color = selectColor( parseFloat(item[key]), minIndex, key );
          $('#dtd-' + key.toLowerCase() + '-' + (i+1)).append('<span class="label label-' + color + '">' + value + '%</span>');
          if (key == 'TOTAL') {
            var color = selectColor( parseFloat(item[key]), minTotal, i );
            $('#rincian-tgl-' + (i+1)).append('<span class="label label-' + color + '">' + value + '%</span>');
          }
        }
      }

      var minIndex = getMinKey(data.total, 'TGL');
      for (var key in data.total) {
        if (key === 'length' || !data.total.hasOwnProperty(key)) continue;
        var value = (parseFloat(data.total[key])*100).toFixed(2);
        var color = selectColor( parseFloat(data.total[key]), minIndex, key );
        $('#dtd-' + key.toLowerCase()).append('<span class="label label-' + color + '">' + value + '%</span>');
      }
      $('#load-TGL').hide();
      $('#load-dtd').hide();
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

getDataDTD(date, month, year)
getData('mtd', month + "/" + year)
getData('ytd', year)
getData('rytd', month + "/" + year)



</script>
</body>
</html>
