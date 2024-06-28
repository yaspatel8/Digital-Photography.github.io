<?php
// session_start();
// $id = $_SESSION['id'];
// if (!isset($id))
//     echo "<script>window.location.assign('login.php');</script>";

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

        echo "<script>alert('Accept Order..');</script>";
    }
}
?>
<?php
// $id = $_SESSION['id'];
$id1 = $_GET['bid'];
$qry1 = mysqli_query($con, "select b.*,p.*,ps.*,pg.* from booking_master b,packagecategory_master p,packagesub_category ps,photographer pg where p.cid=ps.cid and b.sid=ps.sid and b.pid=pg.id and b.bid=$id1");
while ($row1 = mysqli_fetch_array($qry1)) {
    $fname = $row1['fname'];
    $cname = $row1['cname'];
    $lname = $row1['lname'];
    $email = $row1[6];
    $sname = $row1['sname'];
    $amount = $row1['amt'];
    $order_id = $row1['order_id'];
    $name = $row1['name'];
}
// $subcategories = mysqli_query($con, "select * from packagecategory_master where cid=$cid");
// ($row2 = mysqli_fetch_array($subcategories));
// $cname = $row2['cname'];

// $categories = mysqli_query($con, "select * from packagesub_category where sid=$sid");
// while ($row3 = mysqli_fetch_array($categories)) {
//     $sname = $row3['sname'];
//     // $price=$row2['price'];
// }

// $qry4 = mysqli_query($con, "select * from photographer where status=1");
// while ($row4 = mysqli_fetch_array($qry4)) {
//     $name = $row4['name'];
// }

$message = "Congratulations! <b>" . $fname . " " . $lname . ".</b> Your Email is " . $email . ".<br/> 
Your Package Accepted For Alexander Photography.<br/>

Package Details - <br/>
Package Name : " . $cname . "<br/>
Sub Package Name : " . $sname . "<br/>
Price : " . $amount . "<br/>
Photographer Name : " . $name . "<br/> 
Order Id : " . $order_id . "<br/>

- Thank you.<br/><br/>
By Alexander Photography..!";
// $id = $_SESSION['id'];
$qry = mysqli_query($con, "update booking_master set status=1 where bid=$id1");
if ($qry) {
    echo smtp_mailer($email, "Package Accepted", $message);
    echo "<script>window.location.assign('order.php');</script>";
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