<?php
    include ("connections.php");
    $usyd_no = $ssr_owner = $sre_name = $exec_date = $prior = $priority = $usyd_cat = $description = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["usyd_no"]){
            $usyd_no = $_POST["usyd_no"];
        }

        if($_POST["ssr_owner"]){
            $ssr_owner = $_POST["ssr_owner"];
        }

        if($_POST["sre_name"]){
            $sre_name = $_POST["sre_name"];
        }

        if($_POST["exec_date"]){
            $exec_date = $_POST["exec_date"];
        }

        if($_POST["priority"]){
            $priority = $_POST["priority"];
        }

        if($_POST["usyd_cat"]){
            $usyd_cat = $_POST["usyd_cat"];
        }

        if($_POST["description"]){
            $description = $_POST["description"];
        }


        if($usyd_no && $ssr_owner && $sre_name && $exec_date && $priority && $usyd_cat && $description){
            $query = mysqli_query($connections, "INSERT INTO ssr_tracker(usyd_no, ssr_owner, sre_name, exec_date, priority, usyd_cat, description) 
            VALUES ('$usyd_no','$ssr_owner','$sre_name','$exec_date','$priority','$usyd_cat','$description')");
            echo "<script>
            alert('New Request has been created!');
            window.location.href='./new_request.html';
            </script>"; 
        }

        
    }
?>