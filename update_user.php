<?php
include ("connections.php");

$sql = "UPDATE ssr_accounts SET password='" . $_POST["password"] . "' AND type='" . $_POST["type"] . "'  WHERE employee_id='" . $_POST["user_id"] . "'";
if ($connections->query($sql) === TRUE) {
    echo "User has been updated!";
}
else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
?> 