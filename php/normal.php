<?php
session_start();

$category = $_SESSION['category'];
$priority = $_SESSION['priority'];
$risk = $_SESSION['risk'];
$sdescription = $_SESSION['sdescription'];
$time = $_SESSION['time'];
$dxc_ssr = $_SESSION['dxcssr'];
?>
<script src='./normalpost.js'></script>
<html>

<head>
    <script src="./normalpost.js"></script>
</head>

<body>
    <input type="text" id="scategory" value=<?php echo $category ?> />Category<br>
    <input type="text" id="spriority" value=<?php echo $priority ?> />Priority<br>
    <input type="text" id="srisk" value=<?php echo $risk ?> />Risk<br>
    <input type="text" id="sshort_description" value=<?php echo $sdescription ?> />Short Description<br>
    <input type="text" id="sstart_date" value=<?php echo $time ?> />Start date<br>
    <input type="text" id="send_date" value=<?php echo $time ?> />End date<br>
    <input type="text" id="dxcssr" value=<?php echo $dxc_ssr ?> />DXCSSR<br>

    <input type="button" value="Submit" onclick="normalpost(document.getElementById('scategory').value,
    document.getElementById('spriority').value, document.getElementById('srisk').value, document.getElementById('sshort_description').value,
    document.getElementById('sstart_date').value, document.getElementById('send_date').value, document.getElementById('dxcssr').value)">

</body>

</html>
