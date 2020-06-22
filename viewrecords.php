<?php
    include ("connections.php");
    if (isset($_GET["search"])){
            $check = $_GET["search"];

            $terms = explode(" ", $check);
            $q = "SELECT * FROM ssr_tracker WHERE ";
            $i = 0;

        foreach($terms as $each){
                $i++;
                if($i==1){
                    $q .= "usyd_no LIKE '%$each%' ";
                }
                else{
                    $q .= "OR usyd_no LIKE '%$each%' ";
                }
            }

            $query = mysqli_query($connections, $q);
        }
        else{
            $check = "";
            $query = mysqli_query($connections, "SELECT * FROM ssr_tracker");
        }

        
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Search Request</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/searchrequest.css">
</head>

<body>
    <div id="colorstrip"></div>
    <div id="navigation"> 
        <div><img class="logo1" src="images/logo1.png" alt="Usyd logo"></div>
        <div class="titlediv">
            <h1 class="title">SEARCH REQUEST</h1>
        </div>
    </div>
    <div class="form">
        <form>
            <form method="GET" action="viewrecords.php">
                <label for="Sdxcssr_no">Search RITM No.</label>
                <input type="text" id="Sdxcssr_no" name="search" value="<?php echo $check; ?>" required>
                <input type="submit" value="search">
            </form>
            <form method="post" action="viewrecords.php">
                <input type="submit" name="clear" value="Clear">
            </form>
            <button type="button" id="back" onclick="goBack()">back</button><br><br>
            <div class="container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Date Received</th>
                            <th>DXC SSR No</th>
                            <th>Usyd No</th>
                            <th>SSR Owner</th>
                            <th>SRE Name</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    while($row = mysqli_fetch_assoc($query)){
                        $db_dxc_ssr = $row["dxc_ssr"];
                        $db_date = $row["date"];
                        $db_usyd_no = $row["usyd_no"];
                        $db_ssr_owner = $row["ssr_owner"];
                        $db_sre_name = $row["sre_name"];

                            echo "<tr>
                                <td>$db_date</td>
                                <td>$db_dxc_ssr</td>
                                <td>$db_usyd_no</td>
                                <td>$db_ssr_owner</td>
                                <td>$db_sre_name</td>
                                </tr>";
                        }
                    ?>
                    
                    </tbody>
                </table>
            </div><br>
        </form>
    </div>
</body>
<script>
    function goBack() {
        history.back();
    }
</script>
</html>