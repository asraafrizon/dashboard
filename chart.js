'use strict';
            var aktifChart    = dc.barChart("#aktif");
           
            var kuartalAktifChart = dc.pieChart("#kuartalAktif");
          
            var dataAll = dc.dataCount('.dataAll');
            

            var links;
            d3.json("http://localhost:8080/chart/klaim.php", function(error, json) {

              if(error) return console.warn(error);
              links = json;
              console.log(links);

              var numberFormat = d3.format('.2f');

              links.forEach(function(d) {
                d.IDperusahaan = d.IDperusahaan.trim();
                d.TAHUN = +d.TAHUN;
                d.BULAN = +d.BULAN;
                d.KUARTAL = +d.KUARTAL;
                d.klaim = +numberFormat(d.klaim);
                d.aktif = +numberFormat(d.aktif);
                d.nonaktif = +numberFormat(d.nonaktif);
                d.rate = +numberFormat(d.rate);
                
              });
              var ndx = crossfilter(links),
              all = ndx.groupAll(),
              yearDim = ndx.dimension(function(d) {return d.TAHUN;}),
              kuartalDim = ndx.dimension(function(d) {return d.KUARTAL;}),
              aktifDim = ndx.dimension(function(d) {return d.aktif;}),
              nonaktifDim = ndx.dimension(function(d) {return d.nonaktif;}),
             
              aktifPerTahun = yearDim.group().reduceSum(function(d) {return d.aktif;}),
             
              aktifPerKuartal = kuartalDim.group().reduceSum(function(d) {return d.aktif;}),
              

              nonaktifPerTahun = yearDim.group().reduceSum(function(d) {return d.nonaktif;});

              
              aktifChart
              .width(640)
              .height(400)
              .dimension(yearDim)
              .group(aktifPerTahun)
              .controlsUseVisibility(true)
              .x(d3.scale.ordinal())
              .xUnits(dc.units.ordinal)
              .elasticX(true)
              .brushOn (false)
              .yAxisLabel(" ");

             
              kuartalAktifChart
              .width(180)
              .height(180)
              .radius(80)
              .innerRadius(40)
              .dimension(kuartalDim)
              .group(aktifPerKuartal);

                            
              dataAll /* dc.dataCount('.dc-data-count', 'chartGroup'); */
              .dimension(ndx)
              .group(all)
        // (_optional_) `.html` sets different html when some records or all records are selected.
        // `.html` replaces everything in the anchor with the html given using the following function.
        // `%filter-count` and `%total-count` are replaced with the values obtained.
        .html({
          some: '<strong>%filter-count</strong> selected out of <strong>%total-count</strong> records' +
          ' | <a href=\'javascript:dc.filterAll(); dc.renderAll();\'>Reset All</a>',
          all: 'All records selected. Please click on the graph to apply filters.'
        });


        dc.renderAll();
      });
