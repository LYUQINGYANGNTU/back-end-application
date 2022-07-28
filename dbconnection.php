<?php
    $serverName = "visiondatabaseserver.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "visiondatabase", // update me
        "Uid" => "visiondatabase", // update me
        "PWD" => "QWE666qwe!" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $tsql= "SELECT TOP (1000) [IncidentType]
    ,[Date]
    ,[Time]
    ,[Evidence]
    ,[Location]
FROM [dbo].[VisionTable]";
    $getResults= sqlsrv_query($conn, $tsql);
    echo ("Reading data from table" . PHP_EOL);
    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['IncidentType'] . " " . $row['Date']. " " . $row['Time']. " " . $row['Evidence']. " " . $row['Location']. PHP_EOL);
    }
    sqlsrv_free_stmt($getResults);
?>