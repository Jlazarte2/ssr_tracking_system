<?php
include ("./connections.php");


    $dxcssr = "19";
    
    if($query = mysqli_query($connections, "SELECT * FROM ssr_snow
            WHERE dxc_ssr='$dxcssr'")){
                echo "<script>
                alert('New Ticket has been created!');
                window.location.href='./normalget.html';
                </script>"; 
            }


?>