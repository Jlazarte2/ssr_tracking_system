<?php

    $usyd_no = $_REQUEST["usyd_no"];

    include ("./php/connections.php");

    $get_record = mysqli_query($connections, "SELECT * FROM ssr_tracker WHERE usyd_no='$usyd_no'");

    while($row_edit = mysqli_fetch_assoc($get_record)){
        //$db_subject = $row_edit["subject"];
        $db_usyd_no = $row_edit["usyd_no"];
        $db_priority = $row_edit["priority"];
        $db_applicable = $row_edit["applicable"];
        $db_sre_name = $row_edit["sre_name"];
        $db_prior = $row_edit["prior"];
        $db_ssr_owner = $row_edit["ssr_owner"];
        $db_exec_date = $row_edit["exec_date"];
        $db_start_time = $row_edit["start_time"];
        $db_end_time = $row_edit["end_time"];
        $db_usyd_cat = $row_edit["usyd_cat"];
        $db_description = $row_edit["description"];
    }
?>

<form method="POST" action="./php/updaterecord.php" enctype="multipart/form-data">
    <h1>SSR Request Details</h1><br>
    <label for="subject">Import a file:</label>
    <input type="file" name="myfile"><br>

    <label for="subject">Subject:</label>
    <input type="text" id="subject" name="subject"><br>

    <label for="usyd_no">Usyd Service request reference:</label>
    <input type="text" id="usyd_no" name="usyd_no" value="<?php echo $db_usyd_no; ?>" required><br>

    <label for="priority">Usyd Priority:</label>
    <select id="priority" name="priority" value="<?php echo $db_priority; ?>">
        <option value="p1">P1 - Critical</option>
        <option value="p2">P2 - High</option>
        <option value="p3">P3 - Moderate</option>
        <option selected="p4" value="p4">P4 - Low</option>
    </select><br><br>

    <b><label for="sequencing">Usyd Sequencing:</label></b><br>
    <label for="applicable">Applicable (yes/no):</label>
    <select id="applicable" name="applicable" value="<?php echo $db_applicable; ?>">
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select><br>

    <label for="sre_name">Usyd Person responsible to coordinate:</label>
    <input type="text" id="sre_name" name="sre_name" value="<?php echo $db_sre_name; ?>" required><br>

    <label for="prior">Actions to be done prior to this SSR:</label>
    <input type="text" id="prior" name="prior" value="<?php echo $db_prior; ?>" ><br>

    <label for="action">Actions to be done after this SSR:</label>
    <input type="text" id="action" name="action"><br><br>

    <label for="ssr_owner">Service Request Owner:</label>
    <input type="text" id="ssr_owner" name="ssr_owner" value="<?php echo $db_ssr_owner; ?>" required><br><br>

    <b><label for="exe">Execution Window:</label></b><br>
    <label for="exec_date">Date:</label>
    <input type="date" id="exec_date" name="exec_date" value="<?php echo $db_exec_date; ?>" required><br>

    <label for="start_time">Start time (24hr Time):</label>
    <input type="time" id="start_time" name="start_time" value="<?php echo $db_start_time; ?>" required><br>

    <label for="end_time">End time (24hr Time):</label>
    <input type="time" id="end_time" name="end_time" value="<?php echo $db_end_time; ?>" required><br>

    <label for="usyd_cat">Service Request Category: (Select the applicable category)</label>
    <select id="usyd_cat" name="usyd_cat" value="<?php echo $db_usyd_cat; ?>" >
        <option value="asa">ASA Firewall</option>
        <option value="backup">Backup</option>
        <option value="oracle">Database Oracle</option>
        <option value="sql">Database SQL</option>
        <option value="f5">F5</option>
        <option value="msv">MSV CloudOps</option>
        <option value="nsx">NSX Firewall</option>
        <option value="aws">Public Aws CloudOps</option>
        <option value="azure">Public Azure CloudOps</option>
        <option value="storage">Storage Team</option>
        <option value="unix">Unix/Linux</option>
        <option value="vmware">VMWare</option>
        <option value="wintel">Wintel</option>
    </select><br><br>

    <b><label for="perform">Please perform the following steps on</label></b><br>

    <b><label for="description">Description:</label></b><br>
    <textarea id="description" name="description" value="<?php echo $db_description; ?>" rows="30" cols="100"></textarea required><br><br>
    
    <button type="submit" id="update_request">Update Request</button><br>
</form>