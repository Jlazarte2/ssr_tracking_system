<?php
session_start();

$category = $_SESSION['category'];
$priority = $_SESSION['priority'];
$risk = $_SESSION['risk'];
$sdescription = $_SESSION['sdescription'];
$time = $_SESSION['time'];
$dxc_ssr = $_SESSION['dxcssr'];

echo "<script src='./normalpost.js'></script>
        <html>
        <body onload='normalpost($category,
        $priority, $risk, $sdescription,
        $time, $time, $dxc_ssr'>


        <input type='button' value='Submit' onclick='normalpost($category,
        $priority, $risk, $sdescription,
        $time, $time, $dxc_ssr'>
        

        </body>
        </html>



";
?>
