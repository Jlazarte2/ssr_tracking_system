<?php
    if(isset($_GET['dxcssr'])){
        include ("./php/connections.php");
        $query = mysqli_query($connections, "SELECT * FROM ssr_tracker WHERE usyd_no='" . $_GET['dxcssr'] . "';");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Request</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/newrequest.css">
</head>

<body>
    <div id="colorstrip"></div>
    <div id="navigation">
        <div><img class="logo1" src="images/logo1.png" alt="Usyd logo"></div>
        <div class="titlediv">
            <h1 class="title">NEW REQUEST</h1>
        </div>
    </div>
    <div class="form">
        <form>
            <?php
                $row = mysqli_fetch_assoc($query);
                $db_dxc_ssr = $row["dxc_ssr"];
                $db_date = $row["date"];
                $db_usyd_no = $row["usyd_no"];
                $db_ssr_owner = $row["ssr_owner"];
                $db_sre_name = $row["sre_name"];
                
                
            echo "<h1>SSR Request Details</h1><br>

            <label>Subject: " . $row["description"] ."</label><br>
            <label>Usyd Service request reference: " . $row["usyd_no"] ."</label><br>
            <label>Usyd Priority: " . $row["priority"] ."</label><br><br>
            <b><label>Usyd Sequencing: " . $row["applicable"] ."</label></b><br><br>
            <label>Usyd Person responsible to coordinate: " . $row["sre_name"] ."</label><br>
            <label>Actions to be done prior to this SSR: " . $row["prior"] ."</label><br>
            <label>Actions to be done after this SSR: " . $row["action_after"] ."</label><br><br>
            <label>Service Request Owner: " . $row["ssr_owner"] ."</label><br><br>
            <b><label>Execution Window:</label></b><br>
            <label>Date: " . $row["exec_date"] ."</label><br>
            <label>Start time (24hr Time): " . $row["start_time"] ."</label><br>
            <label>End time (24hr Time): " . $row["end_time"] ."</label><br>
            <label>Service Request Category: " . $row["ssr_owner"] ."</label><br><br>
            <b><label>Please perform the following steps on</label></b><br>
            <b><label>Description: " . $row["perform"] ."</label></b><br><br><br>";

            $i = 1;

            $sql = "SELECT * FROM ssr_files WHERE dxc_ssr='$db_usyd_no'";
                $result = mysqli_query($connections, $sql);
                $files = mysqli_fetch_all($result, MYSQLI_ASSOC);
                echo"<label>Files:</label><br>";
                foreach ($files as $file):
                echo "<a href= ./php/downloads.php?file_id=" .$file['dxc_ssr'] . "&i=$i>" . $file['name']  ."</a><br>";
                $i = $i + 1;
                endforeach;
            ?>
        </form>
        <button type="button" id="back" onclick="goBack()">Back</button>
    </div>
</body>
<script>
    function goBack() {
        history.back();
    }
</script>

</html>