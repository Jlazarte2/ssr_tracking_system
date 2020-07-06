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

<body onload="normalpost('<?php echo $category ?>',
    '<?php echo $priority ?>', '<?php echo $category ?>', '<?php echo $sdescription ?>',
    '<?php echo $time ?>', '<?php echo $time ?>', '<?php echo $dxc_ssr ?>')">

</body>

</html>
