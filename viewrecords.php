<?php
    include ("connections.php");

    echo "<table border='5' width '0%'>";
    echo "<tr>
            <td>Date Received</td>
            <td>DXC SSR No</td>
            <td>Usyd No</td>
            <td>SSR Owner</td>
            <td>SRE Name</td>
        </tr>";

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
    echo "</table>";
?>

<form method="GET" action="viewrecords.php">

    <input type="text" name="search" value="<?php echo $check; ?>" required><br>
    <input type="submit" value="search">
    
     
</form>
<form method="post" action="viewrecords.php">
<input type="submit" name="clear" value="Clear">
</form>