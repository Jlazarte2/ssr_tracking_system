<?php

    $employee_id = $_REQUEST["employee_id"];

    include ("./php/connections.php");

    $query_delete = mysqli_query($connections, "SELECT * FROM ssr_accounts WHERE employee_id='$employee_id' ");

        while($row_delete = mysqli_fetch_assoc($query_delete)){
            $db_employee_id = $row_delete["employee_id"];
            $db_password = $row_delete["password"];
            $db_type = $row_delete["type"];
        }

        echo "<h3>Are you sure you want to delete $db_employee_id ? </h3>";

?>

<form method="POST" action="confirmdelete.php">

    <input type="hidden" name="employee_id" value="<?php echo $db_employee_id; ?>" ><br><br>

    <input type="submit" value="Yes"> &nbsp; <a href='modifyuser.php'>No</a>

</form>