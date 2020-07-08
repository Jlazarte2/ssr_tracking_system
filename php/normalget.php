<?php
include ("./connections.php");

$sys_id = $_POST['sys_id'];
$state = $_POST['state'];

    $query = mysqli_query($connections, "SELECT * FROM ssr_snow WHERE sys_id='$sys_id';");
    $row = mysqli_fetch_assoc($query);
    $old_state = $row['state'];
    $dxcssr = $row['dxc_ssr'];
    $number = $row['number'];

    //email
    //$email = 'darce2@dxc.com';
    $email = 'jlazarte2@dxc.com';
    require 'PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tmann7080@gmail.com';
    $mail->Password = 'pusa@1234';
    $mail->SMTPSecure = 'tsl';
    $mail->Port = 587;
    $mail->From = 'SSR Triage Team';
    $mail->FromName = 'DXC';
    $mail->addAddress($email);
    $mail->isHTML(true);

    if ($state != $old_state){
        if($query = mysqli_query($connections, "UPDATE ssr_snow SET state = '$state'
                WHERE sys_id='$sys_id'")){

                    //Insert NEW UPDATE Email Script here
                    $m1 = "Hi, <br>";
                    $m2 = "<br>This is an email for UPDATE for <b>DXCSSR$dxcssr</b><. <br>"; //CHANGE SENTENCE
                    $m3 = "The change no. in SNOW " . $number . "is NOW in<b> " . $state . "</b>state FROM " . $old_state .  ".<br>";
                    $message = $m1.$m2.$m3;
                    $mail->Subject = $description;
                    $mail->Body = $message;

                    if(!$mail->send()){
                        echo 'Messaeg could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    }else{
                        echo 'Successful.';
                    }  
                }
    }
    else{
        //No new update
        
    }


?>