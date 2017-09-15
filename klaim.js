'use strict';

var klaimChart    = dc.rowChart("#klaim");
var topKlaim      = dc.rowChart("#topklaim");

var kuartalKlaimChart = dc.pieChart("#kuartalKlaim");
var rateKlaimChart = dc.pieChart("#rateKlaim");
var monthklaim = dc.lineChart("#monthlyklaim");

var links;
d3.json("http://localhost:8080/chart/klaim.php", function(error, json) {

  if(error) return console.warn(error);
  links = json;
  console.log(links);

  var numberFormat = d3.format('.2f');

  links.forEach(function(d) {
    d.TAHUN = +d.TAHUN;
    d.KUARTAL = +d.KUARTAL;
    d.klaim = +numberFormat(d.klaim);
    d.aktif = +numberFormat(d.aktif);
    d.nonaktif = +numberFormat(d.nonaktif);
    d.rate = + numberFormat(d.rate);
    d.BULAN = +d.BULAN;
    d.IDperusahaan = d.IDperusahaan.trim();
  });
  var ndx = crossfilter(links),
  all = ndx.groupAll(),
  yearDim = ndx.dimension(function(d) {return d.TAHUN;}),
  kuartalDim = ndx.dimension(function(d) {return d.KUARTAL;}),
  perusahaanDim = ndx.dimension(function(d) {return d.IDperusahaan;}),
  
  klaimDim = ndx.dimension(function(d) {return d.klaim;}),
  rateDim = ndx.dimension(function(d) {return d.rate;}),
  klaimPerTahun = yearDim.group().reduceSum(function(d) {return d.klaim;}),
  klaimPerKuartal = kuartalDim.group().reduceSum(function(d) {return d.klaim;}),
  klaimPerRate = rateDim.group().reduceSum(function(d) {return d.klaim;}),
  klaimPerusahaan = perusahaanDim.group().reduceSum(function(d) {return d.klaim;});


               // Dimension by month
               var moveMonths = ndx.dimension(function (d) {
                return d.BULAN;
              });
    // Group by total movement within month
    var monthlyMoveGroup = moveMonths.group().reduceSum(function (d) {
      return d.klaim;
    });
    // Group by total volume within move, and scale down result
    var volumeByMonthGroup = moveMonths.group().reduceSum(function (d) {
      return d.volume / 500000;
    });
    var indexAvgByMonthGroup = moveMonths.group().reduce(
      function (p, v) {
        ++p.days;
        p.total += (v.klaim);
        p.avg = Math.round(p.total / p.days);
        return p;
      },
      function (p, v) {
        --p.days;
        p.total -= (v.klaim);
        p.avg = p.days ? Math.round(p.total / p.days) : 0;
        return p;
      },
      function () {
        return {days: 0, total: 0, avg: 0};
      }
      );
    var top = 10;

      topKlaim
  .height(400)
  .width(640)
  .data(function (group) {return group.top(top);})
    .dimension(perusahaanDim)
    .group(klaimPerusahaan)
    .elasticX(true)
    .controlsUseVisibility(true);

    monthklaim
    .width(640)
    .height(400)
    .x(d3.scale.ordinal())
    .xUnits(dc.units.ordinal)
    .brushOn(false)
    .xAxisLabel('Klaim by Bulan')
    .yAxisLabel(' ')
    .mouseZoomable(true)
    .elasticX(true)
    .elasticY(true)
    .dimension(moveMonths)
    .group(monthlyMoveGroup);

    klaimChart
    .width(640)
    .height(400)
    .dimension(yearDim)
    .group(klaimPerTahun)
    .controlsUseVisibility(true)
    .elasticX(true);

    kuartalKlaimChart
    .width(180)
    .height(180)
    .radius(80)
    .innerRadius(30)
    .dimension(kuartalDim)
    .group(klaimPerKuartal);

    rateKlaimChart
    .width(180)
    .height(180)
    .radius(80)
    .innerRadius(30)
    .dimension(rateDim)
    .group(klaimPerRate);
    // .label(function(d){
    //   if (rateKlaimChart.hasFilter() && !rateKlaimChart.hasFilter(d.key)){
    //     return d.key + '(0%)';
    //   }
    //   var label = d.key;
    //   if(all.value()){
    //     label += '(' +Math.floor(d.value/all.value()*100) +'%)';
    //   }return label;
    // });


    dc.renderAll();
  });
