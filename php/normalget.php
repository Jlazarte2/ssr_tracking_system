<?php
include ("./connections.php");

$sys_id = $_POST['sys_id'];
$state = $_POST['state'];

    if($query = mysqli_query($connections, "UPDATE ssr_snow SET state = '$state'
            WHERE sys_id='$sys_id'")){
                echo "<script>
                alert('New Ticket has been created!');
                
                </script>"; 
            }


?>