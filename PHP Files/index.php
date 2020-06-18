<?php
  include ("connections.php");
  $employee_id = $password = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST[employee_id])){
      
    }else{
      $employee_id = $_POST["employee_id"];
    }

    if(empty($_POST[password])){

    }else{
      $password = $_POST["password"];
    }
  }


  if($employee_id && $password){
    include("connections.php");

    $check_mail = mysqli_query($connections, "SELECT * FROM ssr_accounts WHERE employee_id='$employee_id'");
    $check_mail_row = mysqli_num_rows($check_mail);

    if($check_mail_row > 0) {
      while($row = mysqli_fetch_assoc($check_mail)){
        $db_password = $row["password"];

        if($password == $db_password){

          echo "Welcome admin.";
        } else{
          echo "Wrong passwprd."
        }
      }
    }
    else{
      echo "Not registered.";
    }
  }

?>

<hr>

<html>
  <head>
      Login
  </head>

  <form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
      <label for="username">Username:</label><br>
      <input type="text" name="employee_id" value="<?php echo $employee_id; ?>" required><br>
     
      <label for="password">Password:</label><br>
      <input type="password" name="password" value="<?php echo $password; ?>" require><br>

      <button type="submit" value="Login">
  </form>

</html>