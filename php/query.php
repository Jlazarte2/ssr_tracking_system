<?php

include ("./connections.php");

    //Create SNOW Change Request
    $query = mysqli_query($connections, "SELECT * FROM ssr_tracker ORDER BY dxc_ssr DESC;");
    $row = mysqli_fetch_assoc($query);
    while($row = mysqli_fetch_assoc($query)){
        $dxc_ssr = $row["dxc_ssr"];
    break;
    }
?>