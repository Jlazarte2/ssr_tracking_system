<?php
    include ("./connections.php");


//Update State-Update
if(isset($_POST)){
    if(isset($_POST['number'])){
    $number = $_POST['number'];
    $query3 = mysqli_query($connections, "UPDATE ssr_snow SET state = '$state'
WHERE sys_id='$sys_id'");

}}
echo "<script>
                alert('BOOM');
                </script>";
?>