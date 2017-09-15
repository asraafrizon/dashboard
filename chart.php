      <!DOCTYPE html>
      <html lang="en">
      <head>
        <title>dc.js - Filtering Example</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/dc.css"/>
        <style>
          .number {
            background: orange;
            width: 200px;
            font-size: 50px;
            text-align: center;
            padding-top: 63px;
            padding-bottom: 63px;
            padding-right: 15px;
            padding-left: 15px;
            height: 40px;
            line-height: normal;
          }

        </style>
      </head>
      <body>

        <div class="container">


         <div id="row">
           <div id="JKKnumber" class="number"></div>

           <div id="JKMnumber" class="number"></div>

           <div id="JHTnumber" class="number"></div>

           <div id="JPnumber" class="number"></div>
           <div class="clearfix"></div>
         </div> <div class="dataAll">
         <span class="filter-count"></span> selected out of <span class="total-count"></span> records | <a
         href="javascript:dc.filterAll(); dc.renderAll();">Reset All</a>
       </div><br><br>


       <div class="row">
        <div id="kuartalAktif">
          <strong>Kuartal by Aktif</strong>
          <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
            <a href="javascript:kuartalAktifChart.filterAll();dc.redrawAll();">reset</a>
          </div>
          <div class="clearfix"></div>
        </div>

        <div id="kuartalKlaim">
          <strong>Kuartal by Klaim</strong>
          <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
            <a href="javascript:KuartalKlaimChart.filterAll();dc.redrawAll();">reset</a>
          </div>
          <div class="clearfix"></div>
        </div>

        <div id="rateKlaim">
          <strong>Rate by Klaim</strong>
          <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
            <a href="javascript:KuartalKlaimChart.filterAll();dc.redrawAll();">reset</a>
          </div>
          <div class="clearfix"></div>
        </div>

        <div id="gender">
        <strong>Gender</strong>
          <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
            <a href="javascript:genderChart.filterAll();dc.redrawAll();">reset</a>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="row">
        <div id="top">
          <strong>Top Company</strong>
          <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
            <a href="javascript:topCompanyChart.filterAll();dc.redrawAll();">reset</a>
          </div>
          <div class="clearfix"></div>
        </div><br><br><br><br>

        <div id="PERU">
          <strong>Perusahaan by rate</strong>
          <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
            <a href="javascript:perusahaanRate.filterAll();dc.redrawAll();">reset</a>
          </div>
          <div class="clearfix"></div>
        </div><br>

                 <div id="moveChart">
          <strong>Klaim by line</strong>
          <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
            <a href="javascript:moveChart.filterAll();dc.redrawAll();">reset</a>
          </div>
          <div class="clearfix"></div>
        </div><br>

        <div id="klaimYear">
          <strong>Klaim menurut tahun</strong>
          <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
            <a href="javascript:klaimYear.filterAll();dc.redrawAll();">reset</a>
          </div>
          <div class="clearfix"></div>
        </div><br>

        <div id="aktif">
          <strong>Aktif by Tahun</strong>
          <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
            <a href="javascript:aktifChart.filterAll();dc.redrawAll();">reset</a>
          </div>
          <div class="clearfix"></div>
        </div>

        <div id="klaim">
          <strong>Klaim by Tahun</strong>
          <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
            <a href="javascript:klaimChart.filterAll();dc.redrawAll();">reset</a>
          </div>
          <div class="clearfix"></div>
        </div>

        <div id="topklaim">
          <strong>Top company klaim</strong>
          <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
            <a href="javascript:topKlaim.filterAll();dc.redrawAll();">reset</a>
          </div>
          <div class="clearfix"></div>
        </div>

        <div id="monthlyklaim">
          <strong>Klaim by bulan</strong>
          <div class="reset" style="visibility: hidden;">selected: <span class="filter"></span>
            <a href="javascript:monthklaim.filterAll();dc.redrawAll();">reset</a>
          </div>
          <div class="clearfix"></div>
        </div>


      </div>




      <script type="text/javascript" src="js/d3.js"></script>
      <script type="text/javascript" src="js/crossfilter.js"></script>
      <script type="text/javascript" src="js/dc.js"></script>
      <script type="text/javascript" src="chart.js"></script>
      <script type="text/javascript" src="klaim.js"></script>

      <script type="text/javascript" src="factpremi.js"></script>

    </div>
  </body>
  </html>