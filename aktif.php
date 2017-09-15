<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/dc.css"/>

<div class="row">
  <div class="col-md-8 col-sm-8 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Bar Graph</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div id="aktif" style="height:350px;">
          <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
            <a href="javascript:aktifChart.filterAll();dc.redrawAll();">reset</a>
          </div>
        </div>
        
      </div>
    </div>
  </div>

  <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Bar Graph</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div id="kuartalAktif" style="height:350px; width:500px;">
          <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
            <a href="javascript:kuartalAktifChart.filterAll();dc.redrawAll();">reset</a>
          </div>
        </div>
        
      </div>
    </div>
  </div>


    <!-- jQuery -->
    <script src="src/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="src/bootstrap.min.js"></script>
   
  <script type="text/javascript" src="js/d3.js"></script>
      <script type="text/javascript" src="js/crossfilter.js"></script>
      <script type="text/javascript" src="js/dc.js"></script>
      <script type="text/javascript" src="chart.js"></script>
       <script type="text/javascript" src="klaim.js"></script>

      <script type="text/javascript" src="factpremi.js"></script>