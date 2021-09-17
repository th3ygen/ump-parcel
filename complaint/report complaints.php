<!-- 
    author: NURAIN FITRI BINTI MADZLAN CD19045
    MODULE 5
 -->
 <html>
  <head>
   <div class="cover user text-center" style="height:120px;">
      <br>
      <h2>Reported Complaints</h2>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Complaint', 'Numbers'],
          ['Damaged Parcel',     11],
          ['Lost Parcel',      2],
          ['Others',  7],
        ]);

        var options = {
          title: 'Percentage of parcel complaints',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
  </body>
</html>