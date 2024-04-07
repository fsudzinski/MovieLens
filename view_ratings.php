<?php
require_once 'functions.php';
[$r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10] = get_ratings_by_movieId($_GET["id"]);
$avg = round(get_average_rating_by_movieId($_GET["id"]), 2);
?>

<html>

<head>
  <!--Load the AJAX API-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', { 'packages': ['corechart'] });

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

      // Create the data table.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Rating');
      data.addColumn('number', 'Count');
      data.addRows([
        ['0.5', <?php echo $r1; ?>],
        ['1.0', <?php echo $r2; ?>],
        ['1.5', <?php echo $r3; ?>],
        ['2.0', <?php echo $r4; ?>],
        ['2.5', <?php echo $r5; ?>],
        ['3.0', <?php echo $r6; ?>],
        ['3.5', <?php echo $r7; ?>],
        ['4.0', <?php echo $r8; ?>],
        ['4.5', <?php echo $r9; ?>],
        ['5.0', <?php echo $r10; ?>]
      ]);

      // Set chart options
      var options = {
        'title': 'Average: <?php echo $avg ?>',
        'width': 1000,
        'height': 600,
        'legend': 'none'
      };

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_plot'));
      chart.draw(data, options);
    }
  </script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
  <div id="chart_plot" style="width: 1000px; margin: 0 auto;"></div>
  <div class="container">
    <div class="row justify-content-center align-items-center g-2">
      <?php fill_movie_ratings($_GET["id"]) ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

</body>

</html>