'use strict';
var PREMIJKK    = dc.numberDisplay("#PREMIJKK");
var PREMIJKM    = dc.numberDisplay("#PREMIJKM");
var PREMIJHT    = dc.numberDisplay("#PREMIJHT");
var PREMIJP    = dc.numberDisplay("#PREMIJP");
var TOTAL    = dc.numberDisplay("#TOTAL");


var links;
d3.json("http://localhost:8080/chart/premi.php", function(error, json) {

  if(error) return console.warn(error);
  links = json;
  console.log(links);

  var numberFormat = d3.format('.2f');

  links.forEach(function(d) {

    d.PREMIJKK = +numberFormat(d.PREMIJKK);
    d.PREMIJKM = +numberFormat(d.PREMIJKM);
    d.PREMIJHT = +numberFormat(d.PREMIJHT);
    d.PREMIJP = +numberFormat(d.PREMIJP);
    d.TOTAL = +numberFormat(d.TOTAL);

  });
  var ndx = crossfilter(links),
  all = ndx.groupAll();

  PREMIJKK
  .valueAccessor(function(d) {return d.PREMIJKK;});

  PREMIJKM
 
  .valueAccessor(function(d) {return d.PREMIJKM;});

  PREMIJHT
  .valueAccessor(function(d) {return d.PREMIJHT;});

  PREMIJP
 
  .valueAccessor(function(d) {return d.PREMIJP;});   

  TOTAL
  .valueAccessor(function(d) {return d.TOTAL;}); 

  dc.renderAll();
});
