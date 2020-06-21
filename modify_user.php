<?php
    include ("connections.php");

    $view_query = mysqli_query($connections, "SELECT * FROM ssr_accounts");

    
    echo "</table>";
?>

<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/modifyuser.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
    
    th,
    td {
        padding: 10px;
    }
</style>


<div id="colorstrip"></div>
<div class="form">
    <form>
        <h1>Add/Change Users</h1><br>
        <label for="Suser_id">Search User ID:</label>
        <input type="text" id="Suser_id" name="Suser_id">
        <button type="button" id="search">Search</button>
    
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>User_Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($view_query)){
                            $employee_id = $row["employee_id"];
                            $password = $row["password"];
                            $type = $row["type"];
                    
                            echo "<tr>
                                    <td>$employee_id</td>
                                    <td>$password</td>
                                    <td>$type</td>
                                </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div><br>
    </form>
    <form method="post">
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id">
        <label for="password">Password:</label>
        <input type="text" id="password" name="password">
        <label for="type">Type:</label>
        <input type="text" id="type" name="type"><br>
        <button type="submit" id="create_user" id="create_user" formaction="create_user.php">Create User</button>
        <button type="submit" id="update" id="update" formaction="update_user.php">Update</button><br>
    </form>
    <button type="button" id="back" onclick="goBack()">back</button>
</div>

<script>
    function goBack() {
        history.back();
    }
</script>

</html>
