var connection = new ActiveXObject("ADODB.Connection");

var strConn = "driver={sql server};server=DESKTOP-59N3N1A\SQL2016;database=BPJS_DW;uid=asra;password=asra123";

connection.open(strConn);
var rs = new ActiveXObject("ADODB.Recordset");
var strQuery = "SELECT * FROM factKlaim";
rs.open(strQuery, connection);
rs.Movefirst();
while(!rs.EOF){
	document.write(rs.fields(0));
	rs.movenext;
}
consol.log(strQuery);
rs.close;
connection.close;