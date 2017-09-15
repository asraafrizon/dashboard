      'use strict';
      var chart   = dc.barChart("#test");

      
      var links;
      d3.json("http://localhost:8080/chart/draft.php", function(error, json) {

        if(error) return console.warn(error);
        links = json;
        console.log(links);

        links.forEach(function(x) {
          x.AKTIF = +x.AKTIF;
        });

        var ndx           = crossfilter(links),
        tahunDim      = ndx.dimension(function(d) {return +d.TAHUN}),
        aktifDim      = tahunDim.group().reduceSum(function(d) {return d.AKTIF;});
        chart
        .width(768)
        .height(480)
        .x(d3.scale.ordinal())
        .xUnits(dc.units.ordinal)
        .brushOn (false)
        .yAxisLabel("Aktif per tahun")
        .dimension(tahunDim)
        .barPadding(0.1)
        .outerPadding(0.05)
        .group(aktifDim)
        .on('renderlet', function(chart) {
          chart.selectAll('rect').on("click", function(d) {
            console.log("click!", d);
          });
        });
        chart.render();
      });
