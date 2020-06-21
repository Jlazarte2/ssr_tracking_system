<?php
include ("connections.php");

  $sql = "INSERT INTO ssr_accounts
  VALUES ('" . $_POST["user_id"] . "', '" . $_POST["password"] . "', '" . $_POST["type"] . "');";
  if ($connections->query($sql) === TRUE) {
      echo "New user created successfully!";
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?> 