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
        echo "<script>window.location.assign('view_product.php')</script>";
        
    }
}
?>
<?php

$oid=$_GET['oid'];
$name=$_GET['name'];
$email=$_GET['email'];
$total=$_GET['total'];
$message = "Congratulations! <b>" . $name . ".</b> Your Email is " . $email . ".<br/> 
Your Product Order is Confirm.<br/>
Your Product is dispatch.<br/>
Your Product Subtotal Is - &#8377;" . $total ."<br/>

- Thank you.<br/><br/>
By Alexander Photography..!";
echo smtp_mailer($email, "Order Confirm And Dispatch", $message);
mysqli_query($con,"update order_master set status=1 where oid=$oid");
$q=mysqli_query($con,"select o.*,p.*,a.* from order_master o,product_master p, addtocart a where o.uid=a.uid and p.pid=a.pid and oid=$oid");
while($row=mysqli_fetch_array($q))
{
$cartqty=$row['cartqty'];
$pqty=$row['qty'];
$pid=$row['pid'];
$aid=$row['aid'];


if($pqty>=$cartqty)
{
$diff=$pqty-$cartqty;
$q1=mysqli_query($con,"update product_master set qty=$diff where pid=$pid");
if($q1)
    mysqli_query($con,"delete from addtocart where aid=$aid");
    // echo smtp_mailer($email, "Order Confirm And Dispatch", $message);
    
}

}
?>