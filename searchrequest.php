<?php
    include ("./php/connections.php");
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
<link rel="stylesheet" href="css/contentwithtable.css">
</head>

<body>

    <div class="full-height">
        <div class="p1-colorstrip">
        </div>
        <div class="p2">
            <div class="logodiv">
                <img class="logo1" src="images/logo1.png" alt="Usyd logo">
            </div>
            <div class="titlediv">
                <h1 class="title">SEARCH REQUEST</h1>
            </div>
        </div>
        <div class="p3-content">
            <div class="form">
                <form>
                    <form method="GET" action="searchrequest.php">
                        <label for="Sdxcssr_no">Search RITM No.</label>
                        <input type="text" id="Sdxcssr_no" name="search" value="<?php echo $check; ?>" required>
                        <input type="submit" value="search">
                        <button type="button" id="back" onclick="goBack()">Back</button>
                        <input type="submit" name="clear" value="Clear">
                    </form>
                    <form method="post" action="searchrequest.php">
                       
                    </form>
                    <div class="container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Open Request</th>
                                    <th>Date Received</th>
                                    <th>DXC SSR No</th>
                                    <th>Usyd No</th>
                                    <th>SSR Owner</th>
                                    <th>SRE Name</th>
                                    <th>Status</th>
                                    <th>Change Number</th>
                                    <th>Change Created</th>
                                    <th>Prior to this SSR</th>
                                    <th>Usyd Category</th>
                                    <th>DXC Category</th>
                                    <th>DXC SSR Contact</th>
                                    <th>Priority</th>
                                    <th>DXC Date of Execution</th>
                                    <th>DXC Date of Completion</th>
                                    <th>Age</th>
                                    <th>Remarks</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
        
                            <?php
                            while($row = mysqli_fetch_assoc($query)){
                                $db_date = $row["date"];
                                $db_dxc_ssr = $row["dxc_ssr"];
                                $db_usyd_no = $row["usyd_no"];
                                $db_ssr_owner = $row["ssr_owner"];
                                $db_sre_name = $row["sre_name"];
                                $db_status = $row["status"];
                                $db_change_no = $row["change_no"];
                                $db_change_created = $row["change_created"];
                                $db_prior = $row["prior"];
                                $db_usyd_cat = $row["usyd_cat"];
                                $db_dxc_cat = $row["dxc_cat"];
                                $db_dxc_contact = $row["dxc_contact"];
                                $db_priority = $row["priority"];
                                $db_dateof_exec = $row["dateof_exec"];
                                $db_dateof_completion = $row["dateof_completion"];
                                $db_age = $row["age"];
                                $db_remarks = $row["remarks"];
                                $db_description = $row["description"];
                                    echo "<tr>
                                        <td><a href='openrequest.php?dxcssr=$db_dxc_ssr'>Open</a> &nbsp <a href='updaterequest.php?dxcssr=$db_dxc_ssr'>Update</td>
                                        <td>$db_date</td>
                                        <td> DXCSSR$db_dxc_ssr</td>
                                        <td>$db_usyd_no</td>
                                        <td>$db_ssr_owner</td>
                                        <td>$db_sre_name</td>
                                        <td>$db_status</td>
                                        <td>$db_change_no</td>
                                        <td>$db_change_created</td>
                                        <td>$db_prior</td>
                                        <td>$db_usyd_cat</td>
                                        <td>$db_dxc_cat</td>
                                        <td>$db_dxc_contact</td>
                                        <td>$db_priority</td>
                                        <td>$db_dateof_exec</td>
                                        <td>$db_dateof_completion</td>
                                        <td>$db_age</td>
                                        <td>$db_remarks</td>
                                        <td>$db_description</td>
                                        </tr>";
                                }
                            ?>
                            
                            </tbody>
                        </table>
                    </div><br>
                </form>
            </div>
        </div>
    </div>

</body>

<script>
    function goBack() {
        history.back();
    }
</script>

</html>