<?php 
header('Content-Type: application/json');
	include ("koneksi.php");

$query = "SELECT
TAHUN,
BULAN,
KUARTAL,
IDperusahaan,
rate,
aktif,
nonaktif,
klaim

from
factKlaim, DimWaktu, DimRate, DimPerusahaan
where
factKlaim.IDwaktu = DimWaktu.IDwaktu AND
factKlaim.rateKey = DimRate.rateKey AND
factKlaim.perusahaanKey = DimPerusahaan.perusahaanKey";

$result = sqlsrv_query($conn,$query);

$data = array();
while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){
$data[]=$row;
}


echo json_encode($data);
?>