<?php
include ("./connections.php");

$dxcssr = $_GET['dxcssr'];
$state = $_GET['state'];

if($query = mysqli_query($connections, "SELECT * FROM ssr_snow WHERE dxc_ssr = '$dxcssr'")){
    $row = mysqli_fetch_assoc($query);
    $sys_id = $row["sys_id"]; 

    if($query = mysqli_query($connections, "UPDATE ssr_snow SET state = '$state'
            WHERE dxc_ssr='$dxcssr'")){
                echo "<script>
                alert('New Ticket has been created!');
                window.location.href='./normalget.html';
                </script>"; 
            }
            }


?>