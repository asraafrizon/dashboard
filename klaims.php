<script src="src/jquery.min.js" type="text/javascript"></script>
  <script src="src/bootstrap.min.js" type="text/javascript"></script>
  <link href="src/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/dc.css"/>
<div class="row">

      <div class="col-sm-2">
        <div class="chart-wrapper">
          <div class="chart-title" style="text-align: center;">
            <strong>Kuartal Klaim</strong>
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
          <div class="chart-title" style="text-align: center;">
          <strong>  Rate Klaim </strong>
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
          <div class="chart-title" style="text-align: center; ">
            <strong>Kuartal Aktif</strong>
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


    <script type="text/javascript" src="js/d3.js"></script>
  <script type="text/javascript" src="js/crossfilter.js"></script>
  <script type="text/javascript" src="js/dc.js"></script>
  <script type="text/javascript" src="chart.js"></script>
  <script type="text/javascript" src="klaim.js"></script>

  <script type="text/javascript" src="factpremi.js"></script>