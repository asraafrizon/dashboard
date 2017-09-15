'use strict';
var JKKnumber         = dc.numberDisplay("#JKKnumber");
var JKMnumber         = dc.numberDisplay("#JKMnumber");
var JHTnumber         = dc.numberDisplay("#JHTnumber");
var JPnumber          = dc.numberDisplay("#JPnumber");
var perusahaanRate    = dc.barChart("#PERU");
var topCompanyChart   = dc.rowChart("#top");
var genderChart       = dc.pieChart("#gender");
var klaimYear         = dc.barChart("#klaimYear");
var moveChart         = dc.lineChart("#moveChart");

var links;
d3.json("http://localhost:8080/chart/premi.php", function(error, json) {

  if(error) return console.warn(error);
  links = json;
  console.log(links);

  var numberFormat = d3.format('.2f');

  links.forEach(function(d){
    d.THNPENSIUN = +numberFormat(d.THNPENSIUN);
    d.BLNPENSIUN = +numberFormat(d.BLNPENSIUN);
    d.KUARTALPENSIUN = +numberFormat(d.KUARTALPENSIUN);
    d.TAHUN = +numberFormat(d.TAHUN);
    d.BULAN = +numberFormat(d.BULAN);
    d.KUARTAL = +numberFormat(d.KUARTAL);
    d.THNKLAIM = +numberFormat(d.THNKLAIM);
    d.BLNKLAIM = +numberFormat(d.BLNKLAIM);
    d.KUARTALKLAIM = +numberFormat(d.KUARTALKLAIM);
    d.IDpembina = d.IDpembina.trim();
    d.IDperusahaan = d.IDperusahaan.trim();
    d.IDpeserta = d.IDpeserta.trim();
    d.gaji = +numberFormat(d.gaji);
    d.rate = +numberFormat(d.rate);
    d.jenis_kelamin = d.jenis_kelamin.replace("PEREMPUAN","PR");
    d.jenis_kelamin = d.jenis_kelamin.replace("LAKI-LAKI","LK");
    d.jenis_kelamin = d.jenis_kelamin.replace("Laki-Laki","LK");
  });

  var ndx = crossfilter(links),
  all = ndx.groupAll(),

  yearDim = ndx.dimension(function(d) {return d.TAHUN;}),
  monthDim = ndx.dimension(function(d) {return d.BULAN;}),
  quartalDim = ndx.dimension(function(d) {return d.KUARTAL;}),

  yearPensiunDim = ndx.dimension(function(d) {return d.THNPENSIUN;}),
  monthPensiunDim = ndx.dimension(function(d) {return d.BLNPENSIUN;}),
  quartalPensiunDim = ndx.dimension(function(d) {return d.KUARTALPENSIUN;}),

  pesertaDim = ndx.dimension(function(d) {return d.IDpeserta;}),
  pembinaDim = ndx.dimension(function(d) {return d.IDpembina;}),
  perusahaanDim = ndx.dimension(function(d) {return d.IDperusahaan;}),
  gajiDim = ndx.dimension(function(d) {return d.gaji;}),
  rateDim = ndx.dimension(function(d) {return d.rate;}),

  jkkGroup = pesertaDim.group().reduceSum(function(d) {return d.gaji * d.rate / 100;}),
  jkmGroup = pesertaDim.group().reduceSum(function(d) {return d.gaji * 0.3 / 100}),

  premiPeru = perusahaanDim.group().reduceSum(function(d) {return d.gaji * d.rate / 100;}),

  yearKlaimDim = ndx.dimension(function(d) {return d.THNKLAIM}),
  yearKlaimGroup = yearKlaimDim.group().reduceCount(function(d){return d.IDpeserta;}),
  monthKlaimDim = ndx.dimension(function(d) {return d.BLNKLAIM}),
  monthKlaimGroup = monthKlaimDim.group(),
  kuartalKlaimDim = ndx.dimension(function(d) {return d.KUARTALKLAIM}),
  kuartalKlaimGroup = kuartalKlaimDim.group(),

  // mengkategorikan
  gender = ndx.dimension(function (d) {
    return d.jenis_kelamin;
  }),
    // Produce counts records in the dimension
    genderGroup = gender.group(),



    perusahaanGroup = perusahaanDim.group(),
    peruGroup = rateDim.group().reduceCount(perusahaanDim),

    perusahaanBypembina = pembinaDim.group().reduceCount(function(d) {return d.IDperusahaan;}),

  //filter JKK
  JKKGroup = ndx.groupAll().reduce(
    function (p, v) {
      ++p.n;
      p.totaljkk += (v.gaji * v.rate)/100 ;
      return p;
    },
    function (p, v) {
      --p.n;
      p.totaljkk -= (v.gaji * v.rate)/100;
      return p;
    },
    function () { return {n:0,totaljkk:0}; }
    ),

 // filter JKM
 JKMGroup = ndx.groupAll().reduce(
  function (p, v) {
    ++p.n;
    p.totaljkm += (v.gaji * 0.3)/100 ;
    return p;
  },
  function (p, v) {
    --p.n;
    p.totaljkm -= (v.gaji * 0.3)/100;
    return p;
  },
  function () { return {n:0,totaljkm:0}; }
  ),

 // filter JHT
 JHTGroup = ndx.groupAll().reduce(
  function (p, v) {
    ++p.n;
    p.totaljht += (v.gaji * 3)/100 ;
    return p;
  },
  function (p, v) {
    --p.n;
    p.totaljht -= (v.gaji * 3)/100;
    return p;
  },
  function () { return {n:0,totaljht:0}; }
  ),
 // filter JP
 JPGroup = ndx.groupAll().reduce(
  function (p, v) {
    ++p.n;
    p.totaljp += (v.gaji * 5.7)/100 ;
    return p;
  },
  function (p, v) {
    --p.n;
    p.totaljp -= (v.gaji * 5.7)/100;
    return p;
  },
  function () { return {n:0,totaljp:0}; }
  );

 
 var totalJKK = function(d) {
  return d.totaljkk;
};
var totalJKM = function(d) {
  return d.totaljkm;
};
var totalJHT = function(d) {
  return d.totaljht;
};
var totalJP = function(d) {
  return d.totaljp;
};

var moveMonths = ndx.dimension(function (d) {return d.BLNKLAIM;});

var monthlyMoveGroup = moveMonths.group().reduceSum(function (d) {return d.IDpeserta;});

var indexAvgByMonthGroup = moveMonths.group().reduceCount(
        function (p, v) {
            ++p.n;
            p.total += v.IDpeserta;
            p.avg = Math.round(p.total / p.n);
            return p;
        },
        function (p, v) {
            --p.n;
            p.total -= v.IDpeserta;
            p.avg = p.n ? Math.round(p.total / p.n) : 0;
            return p;
        },
        function () {
            return {n: 0, total: 0, avg: 0};
        }
    );



var top = 10;

topCompanyChart
.height(500)
.width(800)
.data(function (group) {return group.top(top);})
.dimension(perusahaanDim)
.group(premiPeru)
.elasticX(true)
.controlsUseVisibility(true);

klaimYear
.width(620)
.height(400)
.dimension(yearKlaimDim)
.group(yearKlaimGroup)
.x(d3.scale.ordinal())
.xUnits(dc.units.ordinal)
.elasticY(true)
.ordinalColors(['#3182bd', '#6baed6', '#9ecae1', '#c6dbef', '#dadaeb'])
.controlsUseVisibility(true);

moveChart 
.renderArea(true)
.width(990)
.height(200)
.transitionDuration(1000)
.margins({top: 30, right: 50, bottom: 25, left: 40})
.dimension(moveMonths)
.mouseZoomable(true)
.x(d3.time.scale().domain([new Date(2000, 1, 1), new Date(2017, 12, 31)]))
.round(d3.time.month.round)
.xUnits(d3.time.months)
.elasticY(true)
.renderHorizontalGridLines(true)

//         // Position the legend relative to the chart origin and specify items' height and separation.
         .legend(dc.legend().x(800).y(10).itemHeight(13).gap(5))
         .brushOn(false)
         // Add the base layer of the stack with group. The second parameter specifies a series name for use in the
         // legend.
         // The `.valueAccessor` will be used for the base layer
         .group(indexAvgByMonthGroup, 'Monthly Index Average')
         .valueAccessor(function (d) {
             return d.value.avg;
         })
//         // Stack additional layers with `.stack`. The first paramenter is a new group.
//         // The second parameter is the series name. The third is a value accessor.
         .stack(monthlyMoveGroup, 'Monthly Index Move', function (d) {
             return d.value;
         });
        // Title can be called by any stack layer.
        // .title(function (d) {
        //     var value = d.value.avg ? d.value.avg : d.value;
        //     if (isNaN(value)) {
        //         value = 0;
        //     }
        //     return dateFormat(d.key) + '\n' + numberFormat(value);
        // });


 klaimYear.xAxis().tickFormat(function(d) {return d;}); // convert back to base unit
 klaimYear.yAxis().ticks(d3.scale.ordinal());

perusahaanRate
 .width(620)
.height(400)
 .dimension(yearKlaimDim)
 .group(yearKlaimGroup)
 .controlsUseVisibility(true)
 .x(d3.scale.ordinal())
 .xUnits(dc.units.ordinal)
 .elasticX(true)
 .brushOn (false)
 .yAxisLabel(" ");


 // perusahaanRate
 // .dimension(rateDim)
 // .group(peruGroup)
 // .width(620)
 // .height(400)
 // .controlsUseVisibility(true)
 // .x(d3.scale.ordinal())
 // .xUnits(dc.units.ordinal)
 // .elasticX(true)
 // .brushOn (false)
 // .yAxisLabel(" ");


JKKnumber
  // .formatNumber(d3.format(".g"))
  .valueAccessor(totalJKK)
  .group(JKKGroup);

//JKM
JKMnumber
.valueAccessor(totalJKM)
.group(JKMGroup);

//JHT
JHTnumber
.valueAccessor(totalJHT)
.group(JHTGroup);

//JP
JPnumber
.valueAccessor(totalJP)
.group(JPGroup);

 genderChart
 .width(180)
 .height(180)
 .radius(180)
 .innerRadius(40)
 .dimension(gender)
 .group(genderGroup)
 .label(function (d) {
   if (genderChart.hasFilter() && !genderChart.hasFilter(d.key)) {
     return d.key + '(0%)';
   }
   var label = d.key;
   if (all.value()) {
     label += '(' + Math.round(d.value / all.value() * 100) + '%)';
   }
   return label;
 });

dc.renderAll();


});
