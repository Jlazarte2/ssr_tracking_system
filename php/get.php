<html>

<head>
    <script src="./normalget.js"></script>
</head>



<?php
include ("./connections.php");


    
    
    $query = mysqli_query($connections, "SELECT * FROM ssr_snow;");
    //Select all request
    echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>";
    while($row = mysqli_fetch_assoc($query)){
        $sys_id = $row["sys_id"];
        echo "<script type='text/javascript'normalget($sys_id)</script>";

                 
            }
            echo "<script>
                alert('New Ticket has been updated!');
                window.location.href='../index.html';
                </script>";
                
?>


<body onload="normalpost('<?php echo $category ?>',
    '<?php echo $priority ?>', '<?php echo $category ?>', '<?php echo $sdescription ?>',
    '<?php echo $time ?>', '<?php echo $time ?>', '<?php echo $dxc_ssr ?>')">

</body>


</html>