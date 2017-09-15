<?php 
header('Content-Type: application/json');
	include ("koneksi.php");

$query = "SELECT TAHUN,SUM(aktif) AS AKTIF FROM
	DimWaktu AS waktu,
	factKlaim AS klaim
where klaim.IDwaktu = waktu.IDwaktu
GROUP BY TAHUN ORDER BY TAHUN";

$result = sqlsrv_query($conn,$query);

$data = array();
while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){
$data[]=$row;
}


echo json_encode($data);
?>