<html>

<head>
    <script src="./normalpost.js"></script>
</head>



<?php
include ("./connections.php");


    
    
    $query = mysqli_query($connections, "SELECT * FROM ssr_snow;");
    //Select all request
    while($row = mysqli_fetch_assoc($query)){
        $sys_id = $row["sys_id"];
        //$dxcssr = "19";
        echo "<script>
                alert('$sys_id');
                </script>";
        echo "<script type='application/javascript'normalget($sys_id)</script>";

                 
            }
            echo "<script>
                alert('New Ticket has been updated!');
                window.location.href='../index.html';
                </script>";
                
?>


</html>