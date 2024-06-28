<?php


include_once("connection.php");
include_once('smtp/PHPMailerAutoload.php');
function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2; 
    $mail->Username = "p6644354@gmail.com";
    $mail->Password = "kbmn mkvh yjtx wfsn";
    $mail->SetFrom("email");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
    } else {

        echo "<script>alert('Email Send..');</script>";
    }
}
?>


<?php
    
    $id=$_GET['status'];
    $name=$_GET['name'];
    $email=$_GET['email'];
    $message = "<b>" . $name . ".</b> Your Email is " . $email . ".<br/> 
    Your Photographer Job has been Cancled For Alexander Photography.<br/>
    Now You can't Login to the website..<br/>
    - Thank you.<br/><br/>
    By Alexander Photography..!";

    $qry=mysqli_query($con,"update photographer set status=0 where id=$id");
    if($qry)
    {
        echo smtp_mailer($email, "You are cancle the Photographer's Job", $message);
        echo "<script>window.location.assign('photographer.php');</script>";
    }
    else
    {
        echo "<td><label class='badge badge-danger' style='cursor:pointer;'>Pending</label></td>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>