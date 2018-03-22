<?php
// $sqlSelect = "SELECT `PaymentMethodId`, `PaymentMethodName`, `PaymentMethodDetails` FROM PaymentMethod";
// $list_PaymentMethod= mysql_query($sqlSelect);

?>
<h3 class="w3_inner_tittle two text-center">Thống kê</h3>
<a class="btn btn-primary" href="?page=more_statistic">Xem thêm <i class="fa fa-plus"></i></a>
</br>
</br>
<center>
	<div class="statistic">
		<div id="chart_div"></div>
		<div style="width: 1000px; height: 360px">
				<div id="piechart" style="width: 499px; height: 350px; float: left"></div>
				<div id="piechart2" style="width: 499px; height: 350px; float: left"></div>
		</div>
	</div>
</center>
<!-- Nhúng thư viện Google Chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Biểu đồ cột và tròn -->
<script type="text/javascript">
// Biểu đồ cột
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMultSeries);

function drawMultSeries() {
      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Time of Day');
      data.addColumn('number', 'Motivation Level');
      data.addColumn('number', 'Energy Level');

      data.addRows([
        [{v: [8, 0, 0], f: '8 am'}, 1, .25],
        [{v: [9, 0, 0], f: '9 am'}, 2, .5],
        [{v: [10, 0, 0], f:'10 am'}, 3, 1],
        [{v: [11, 0, 0], f: '11 am'}, 4, 2.25],
        [{v: [12, 0, 0], f: '12 pm'}, 5, 2.25],
        [{v: [13, 0, 0], f: '1 pm'}, 6, 3],
        [{v: [14, 0, 0], f: '2 pm'}, 7, 4],
        [{v: [15, 0, 0], f: '3 pm'}, 8, 5.25],
        [{v: [16, 0, 0], f: '4 pm'}, 9, 7.5],
        [{v: [17, 0, 0], f: '5 pm'}, 10, 10],
      ]);

      var options = {
        title: 'Motivation and Energy Level Throughout the Day',
        hAxis: {
          title: 'Time of Day',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Rating (scale of 1-10)'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }

// Biểu đồ tròn
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

	var data = google.visualization.arrayToDataTable([
		['Task', 'Hours per Day'],
		['Work',     11],
		['Eat',      2],
		['Commute',  2],
		['Watch TV', 2],
		['Sleep',    7]
	]);

	var options = {
		title: 'My Daily Activities'
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart'));
	var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));

	chart.draw(data, options);
	chart2.draw(data, options);
}
</script>
