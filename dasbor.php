<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Layouts &raquo; Hero-Thirds</title>
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />

  <!-- Demo Dependencies -->
  <script src="src/jquery.min.js" type="text/javascript"></script>
  <script src="src/bootstrap.min.js" type="text/javascript"></script>
  <link href="src/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/dc.css"/>
  <style>
    .number {
      background: orange;
      width: 200px;
      font-size: 50px;
      text-align: center;
      padding-top: 50px;
      padding-bottom: 80px;
      /*padding-right: 15px;
      padding-left: 15px;
*/      height: 40px;
      line-height: normal;
    }
    .center {
     display: block;
     margin: 0 auto;
     width: 100%;

   }

 </style>
 <script>
  Holder.add_theme("white", { background:"#fff", foreground:"#a7a7a7", size:10 });
</script>


<!-- Dashboard -->
<link rel="stylesheet" type="text/css" href="css/keen-dashboards.css" />
</head>
<body class="keen-dashboard" style="padding-top: 80px;">

  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand">Dashboard BPJS</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li><a href=" ">Premi</a></li>
          <li><a href=" ">Klaim</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">


       <div id="JKKnumber" class="number"></div>
     


       <div id="JKMnumber" class="number"></div>



       <div id="JHTnumber" class="number"></div>

       <div id="JPnumber" class="number"></div>

     </div>
     <br><br><br>


     <div class="row">

      <div class="col-sm-2">
        <div class="chart-wrapper">
          <div class="chart-title">
            Kuartal Klaim
          </div>
          <div class="chart-stage">
            <div class="center">
              <div id="kuartalKlaim">

                <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
                  <a href="javascript:kuartalAktifChart.filterAll();dc.redrawAll();">reset</a>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>


      <div class="col-sm-2">
        <div class="chart-wrapper">
          <div class="chart-title">
            Rate Klaim
          </div>
          <div class="chart-stage">
            <div class="center">
              <div id="rateKlaim">

                <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
                  <a href="javascript:rateKlaimChart.filterAll();dc.redrawAll();">reset</a>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="col-sm-2">
        <div class="chart-wrapper">
          <div class="chart-title">
            Kuartal Aktif
          </div>
          <div class="chart-stage">
            <div id="kuartalAktif">

              <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
                <a href="javascript:kuartalAktifChart.filterAll();dc.redrawAll();">reset</a>
              </div>

            </div>
          </div>

        </div>
      </div>
      <div class="dataAll">
       <span class="filter-count"></span> selected out of <span class="total-count"></span> records | <a
       href="javascript:dc.filterAll(); dc.renderAll();">Reset All</a>
     </div><br><br>
   </div>


   <div class="row">

    <div class="col-sm-6">
      <div class="chart-wrapper">
        <div class="chart-title">
          Top Company Klaim
        </div>
        <div class="chart-stage">
          <div id="topklaim">
            <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
              <a href="javascript:topKlaim.filterAll();dc.redrawAll();">reset</a>
            </div>
          </div>

        </div>

      </div>
    </div>



    <div class="col-sm-6">
      <div class="chart-wrapper">
        <div class="chart-title">
          Klaim
        </div>
        <div class="chart-stage">
          <div id="klaim">

            <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
              <a href="javascript:klaimChart.filterAll();dc.redrawAll();">reset</a>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="chart-wrapper">
        <div class="chart-title">
          Klaim by Bulan
        </div>
        <div class="chart-stage">
          <div id="monthlyklaim">

            <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
              <a href="javascript:monthklaim.filterAll();dc.redrawAll();">reset</a>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>

      </div>
    </div>

    <div class="col-sm-6">
      <div class="chart-wrapper">
        <div class="chart-title">
          Aktif
        </div>
        <div class="chart-stage">
          <div id="aktif">
            <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
              <a href="javascript:aktifChart.filterAll();dc.redrawAll();">reset</a>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6 col-md-4">
      <div class="chart-wrapper">
        <div class="chart-title">
          Cell Title
        </div>
        <div class="chart-stage">
          <img data-src="holder.js/100%x120/white">
        </div>
         <!--  <div class="chart-notes">
            Notes about this chart
          </div> -->
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="chart-wrapper">
          <div class="chart-title">
            Cell Title
          </div>
          <div class="chart-stage">
            <img data-src="holder.js/100%x120/white">
          </div>
          <!-- <div class="chart-notes">
            Notes about this chart
          </div> -->
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="chart-wrapper">
          <div class="chart-title">
            Cell Title
          </div>
          <div class="chart-stage">
            <img data-src="holder.js/100%x120/white">
          </div>
          <div class="chart-notes">
            Notes about this chart
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="chart-wrapper">
          <div class="chart-title">
            Cell Title
          </div>
          <div class="chart-stage">
            <img data-src="holder.js/100%x120/white">
          </div>
          <div class="chart-notes">
            Notes about this chart
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="chart-wrapper">
          <div class="chart-title">
            Cell Title
          </div>
          <div class="chart-stage">
            <img data-src="holder.js/100%x120/white">
          </div>
          <div class="chart-notes">
            Notes about this chart
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="chart-wrapper">
          <div class="chart-title">
            Cell Title
          </div>
          <div class="chart-stage">
            <img data-src="holder.js/100%x120/white">
          </div>
          <div class="chart-notes">
            Notes about this chart
          </div>
        </div>
      </div>
    </div>

  </div>

<!--   <div class="container-fluid">
    <p class="small text-muted">Built with &#9829; by <a href="https://keen.io">Keen IO</a></p>
  </div> -->

  <!-- Project Analytics -->
  <script type="text/javascript" src="js/keen-analytics.js"></script>
  <script type="text/javascript" src="js/d3.js"></script>
  <script type="text/javascript" src="js/crossfilter.js"></script>
  <script type="text/javascript" src="js/dc.js"></script>
  <script type="text/javascript" src="chart.js"></script>
  <script type="text/javascript" src="klaim.js"></script>

  <script type="text/javascript" src="factpremi.js"></script>
</body>
</html>
