<?php /*Template Name: Stats*/?>
<?php get_template_part('templates/parts/global/head');?>
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/kelly.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<body>
  <div class="wrapper ">
    <?php get_sidebar();?>
    <div class="main-panel">
      <?php get_template_part('templates/parts/global/navbar');?>

        <div class="content">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-chart">
                  <div class="card-header">
                    <h5 class="card-title">Leads by Source</h5>
                  </div>
                  <div class="card-body">
                    <?php
                    $sources_chart_data = getDataForChart('traked_source');
                    $js_chart_data      = prepareDataForChart($sources_chart_data);
                    ?>
                    <!-- Chart code -->
                    <script>
                    am4core.ready(function() {

                    // Themes begin
                    am4core.useTheme(am4themes_kelly);
                    am4core.useTheme(am4themes_animated);
                    // Themes end

                    // Create chart instance
                    var chart = am4core.create("source-chart", am4charts.PieChart);

                    // Add data
                    chart.data = [<?php echo $js_chart_data; ?>];

                    // Set inner radius
                    chart.innerRadius = am4core.percent(50);

                    // Add and configure Series
                    var pieSeries = chart.series.push(new am4charts.PieSeries());
                    pieSeries.dataFields.value = "value";
                    pieSeries.dataFields.category = "category";
                    pieSeries.slices.template.stroke = am4core.color("#fff");
                    pieSeries.slices.template.strokeWidth = 2;
                    pieSeries.slices.template.strokeOpacity = 1;

                    // This creates initial animation
                    pieSeries.hiddenState.properties.opacity = 1;
                    pieSeries.hiddenState.properties.endAngle = -90;
                    pieSeries.hiddenState.properties.startAngle = -90;

                    // Add a legend
                    chart.legend = new am4charts.Legend();

                    }); // end am4core.ready()
                    </script>

                    <!-- HTML -->
                    <div id="source-chart" class="chart-wrapper"></div>
                    <div class="hide-chart"></div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card card-chart">
                  <div class="card-header">
                    <h5 class="card-title">Leads by Keyword</h5>
                  </div>
                  <div class="card-body">
                    <?php
                    $keyword_chart_data    = getDataForChart('keyword');
                    $keyword_js_chart_data = prepareDataForChart($keyword_chart_data);
                    ?>
                    <!-- Chart code -->
                    <script>
                    am4core.ready(function() {

                    // Themes begin
                    am4core.useTheme(am4themes_kelly);
                    am4core.useTheme(am4themes_animated);
                    // Themes end

                    // Create chart instance
                    var chart = am4core.create("keyword-chart", am4charts.PieChart);

                    // Add data
                    chart.data = [<?php echo $keyword_js_chart_data; ?>];

                    // Set inner radius
                    // chart.innerRadius = am4core.percent(50);

                    // Add and configure Series
                    var pieSeries = chart.series.push(new am4charts.PieSeries());
                    pieSeries.dataFields.value = "value";
                    pieSeries.dataFields.category = "category";
                    pieSeries.slices.template.stroke = am4core.color("#fff");
                    pieSeries.slices.template.strokeWidth = 2;
                    pieSeries.slices.template.strokeOpacity = 1;

                    // This creates initial animation
                    pieSeries.hiddenState.properties.opacity = 1;
                    pieSeries.hiddenState.properties.endAngle = -90;
                    pieSeries.hiddenState.properties.startAngle = -90;

                    // Add a legend
                    chart.legend = new am4charts.Legend();

                    }); // end am4core.ready()
                    </script>

                    <!-- HTML -->
                    <div id="keyword-chart" class="chart-wrapper"></div>
                    <div class="hide-chart"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="card card-chart">
                  <div class="card-header">
                    <h5 class="card-title">Leads by Campaign</h5>
                  </div>
                  <div class="card-body">
                    <?php
                    $campaign_chart_data    = getDataForChart('campaign');
                    $campaign_js_chart_data = prepareDataForChart($campaign_chart_data);
                    ?>
                    <!-- Chart code -->
                    <script>
                    am4core.ready(function() {

                    // Themes begin
                    am4core.useTheme(am4themes_kelly);
                    am4core.useTheme(am4themes_animated);
                    // Themes end

                    // Create chart instance
                    var chart = am4core.create("campaign-chart", am4charts.PieChart);

                    // Add data
                    chart.data = [<?php echo $campaign_js_chart_data; ?>];

                    // Add and configure Series
                    var pieSeries = chart.series.push(new am4charts.PieSeries());
                    pieSeries.dataFields.value = "value";
                    pieSeries.dataFields.category = "category";
                    pieSeries.slices.template.stroke = am4core.color("#fff");
                    pieSeries.slices.template.strokeWidth = 2;
                    pieSeries.slices.template.strokeOpacity = 1;

                    // This creates initial animation
                    pieSeries.hiddenState.properties.opacity = 1;
                    pieSeries.hiddenState.properties.endAngle = -90;
                    pieSeries.hiddenState.properties.startAngle = -90;

                    // Add a legend
                    chart.legend = new am4charts.Legend();

                    }); // end am4core.ready()
                    </script>

                    <!-- HTML -->
                    <div id="campaign-chart" class="chart-wrapper"></div>
                    <div class="hide-chart"></div>
                  </div>
                </div>
              </div>
            </div>
      </div>
<?php get_footer();?>