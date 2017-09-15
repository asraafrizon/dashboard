<?php 
header('Content-Type: application/json');
	include ("koneksi.php");

$query = "SELECT TOP 1000
WP.TAHUN AS THNPENSIUN,
WP.BULAN AS BLNPENSIUN,
WP.KUARTAL AS KUARTALPENSIUN,
dimwaktu.TAHUN,
dimWaktu.BULAN,
dimwaktu.KUARTAL,
WK.TAHUN AS THNKLAIM,
WK.BULAN AS BLNKLAIM,
WK.KUARTAL AS KUARTALKLAIM,
IDpeserta,
IDcabang,
IDpembina,
IDperusahaan,
jenis_kelamin,
DR.rate,
gaji
FROM
factPremi, DimWaktuPensiun AS WP, DimWaktu AS dimwaktu, DimPeserta, DimCabang, DimPembina, DimRate AS DR, DimPerusahaan, DimWaktuKlaim AS WK
WHERE
factPremi.PesertaKey = DimPeserta.PesertaKey AND
factPremi.IDwaktu = dimwaktu.IDwaktu AND
factPremi.perusahaanKey = DimPerusahaan.perusahaanKey AND
factPremi.cabangKey = DimCabang.cabangKey AND
factPremi.pembinaKey = DimPembina.pembinaKey AND
factPremi.rateKey = DR.rateKey AND
factPremi.WaktuPensiun = WP.WaktuPensiun AND
factPremi.WaktuKlaim = WK.WaktuKlaim
GROUP BY
WP.TAHUN,
WP.BULAN,
WP.KUARTAL,
dimwaktu.TAHUN,
DimWaktu.BULAN,
dimwaktu.KUARTAL,
WK.TAHUN,
WK.BULAN,
WK.KUARTAL,
IDpeserta,
IDcabang,
IDpembina,
IDperusahaan,
jenis_kelamin,
DR.rate,
gaji";

$result = sqlsrv_query($conn,$query);

$data = array();
while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){
$data[]=$row;
}


echo json_encode($data);
?>