<html>

<head>
    <script src="./normalpost.js"></script>
</head>



<?php
include ("./connections.php");


    
    
    $query = mysqli_query($connections, "SELECT * FROM ssr_tracker WHERE status = 'For change creation';");
    while($row = mysqli_fetch_assoc($query)){
        $dxcssr = $row["dxc_ssr"];
        $query2 = mysqli_query($connections, "SELECT * FROM ssr_snow WHERE dxc_ssr LIKE '%$dxcssr%' LIMIT 1;");
                $row2 = mysqli_fetch_assoc($query);
                $sys_id = $row2["sys_id"];
                echo '<script type="text/javascript">',
                'normalpost($sys_id);',
                '</script>';

                $query = mysqli_query($connections, "UPDATE ssr_snow SET state = '$state'
                WHERE sys_id='$sys_id'");
                 
            }
            echo "<script>
                alert('New Ticket has been updated!');
                window.location.href='../index.html';
                </script>";
                
?>


</html>