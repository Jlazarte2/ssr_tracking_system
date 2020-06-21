<?php
include ("connections.php");

  $sql = "INSERT INTO ssr_accounts
  VALUES ('" . $_POST["user_id"] . "', '" . $_POST["password"] . "', '" . $_POST["type"] . "');";
  if ($connections->query($sql) === TRUE) {
      echo "<script>
    alert('New user created successfully!');
    window.location.href='./modify_user.php';
    </script>";
  } 
  else {
      echo "<script>
    alert('Error creating user');
    window.location.href='./modify_user.php';
    </script>";
    #echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
?> 