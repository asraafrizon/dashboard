<?php    
$serverName = "DESKTOP-59N3N1A\SQL2016";   
$uid = "asra";     
$pwd = "asra123";    
$databaseName = "BPJS_DW";   
   
$connectionInfo = array( "UID"=>$uid,                              
                         "PWD"=>$pwd,                              
                         "Database"=>$databaseName);   
    
/* Connect using SQL Server Authentication. */    
$conn = sqlsrv_connect( $serverName, $connectionInfo);    
?>