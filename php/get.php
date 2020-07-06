<html>

<head>
    <script src="./normalpost.js"></script>
</head>



<?php
include ("./connections.php");


    
    
    $query = mysqli_query($connections, "SELECT * FROM ssr_snow;");
    //Select all request
    while($row = mysqli_fetch_assoc($query)){
        $sys_id = $row["sys_id"];
        //$dxcssr = "19";
        echo "<script>
                alert('$sys_id');
                </script>";
        ?>

<script>
var requestBody = "";

var client = new XMLHttpRequest();
client.open("get", "https://dev93193.service-now.com/api/sn_chg_rest/change/normal/" + <?php echo $sys_id ?>);

client.setRequestHeader('Accept', 'application/json');
client.setRequestHeader('Content-Type', 'application/json');

//Eg. UserName="admin", Password="admin" for this code sample.
client.setRequestHeader('Authorization', 'Basic ' + btoa('admin' + ':' + '!QAZxsw2#EDCvfr4'));

client.onreadystatechange = function() {
    if (this.readyState == this.DONE) {
        //document.getElementById("response").innerHTML = this.status + this.response;
        var res = this.response;
        parsedData = JSON.parse(res);



        var state = parsedData.result.state.display_value;

        //return parsedData.result.state.display_value;
        //window.location.href = "./normalget.php?sys_id=" + sys_id + "&state=" + parsedData.result.state.display_value;
        //return [dxcssr, parsedData.result.sys_id.value, parsedData.result.number.value, "draft"];
    }
};
client.send(requestBody);
</script>








<?php
                 
            }
            echo "<script>
                alert('New Ticket has been updated!');
                alert(state);
                window.location.href='../index.html';
                </script>";
                
?>


</html>