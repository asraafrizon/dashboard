var parseDate = d3.time.format("%Y-%m-%d").parse;

var json = [
{
  data: {
  amount: 450,
  total_amount: 97.331,
  unit_amount: 12.977,
  date: "2013-12-30"
  },
  company: {
  id: 4,
  name: "KLM"
  }
},
{
  data: {
  amount: 960,
  total_amount: 176.550,
  unit_amount: 22.069,
  date: "2014-01-06"
  },
  company: {
  id: 4,
  name: "KLM"
  }
},
  {
  data: {
  amount: 510,
  total_amount: 93.793,
  unit_amount: 11.034,
  date: "2014-01-15"
  },
  company: {
  id: 1,
  name: "NS"
  }
},
  {
  data: {
  amount: 960,
  total_amount: 207.640,
  unit_amount: 25.955,
  date: "2014-01-22"
  },
  company: {
  id: 1,
  name: "NS"
  }
},
  {
  data: {
  amount: 900,
  total_amount: 194.6626,
  unit_amount: 25.955,
  date: "2014-02-12"
  },
  company: {
  id: 1,
  name: "NS"
  }
}
];

var startDate = new Date(json[0].data.date);
var endDate = new Date(json[json.length-1].data.date);

json.forEach(function(d) {
  d.data.date = parseDate(d.data.date);
});

//  Set up dimensions and groups
var ndx = crossfilter(json),
  date = ndx.dimension(function(d) { return d.data.date; }),
  sumAmount = date.group().reduceSum(function(d) {return d.data.amount;}),
    sumAllAmount = date.groupAll().reduceSum(function(d) {return d.data.amount;}),

  companyDimension = ndx.dimension(function(d) {
    return d.company.name;
  }),
  companyDimensionGroup = companyDimension.group(function(d) {return d;})
  ;

// Charts
var numberDisplay = dc.numberDisplay('#number-chart');
numberDisplay.group(sumAllAmount)
  .formatNumber(d3.format(".g"))
  .valueAccessor( function(d) { return d; } );

var chart = dc.lineChart("#date-chart");
chart.dimension(date)
  .width(500)
  .group(sumAmount, 'Amount')
  .elasticY(true)
  .round(d3.time.day.round)
  .x(d3.time.scale()
    .domain([startDate, endDate])
  )
  .filter([startDate, endDate]);

var pieChart = dc.pieChart("#pie-chart");
pieChart.dimension(companyDimension)
  .group(companyDimensionGroup)
  .width(300)
  .height(300)
  .slicesCap(4)
  .innerRadius(30);

dc.renderAll();