<?php
include ("./connections.php");



$dxcssr = $_GET['dxcssr'];
$sys_id = $_GET['sys_id'];
$number = $_GET['number'];
$state = $_GET['state'];

if($query = mysqli_query($connections, "INSERT INTO ssr_snow(dxc_ssr, sys_id, number, state) 
            VALUES ('$dxcssr','$sys_id','$number','$state')")){
                echo "<script>
                alert('New Request has been made. $number has been created!');
                window.location.href='../admin.html';
                </script>"; 
            }

?>