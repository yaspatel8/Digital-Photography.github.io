<?php

include_once("../../user/smtp/PHPMailerAutoload.php");
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

        echo "<script>alert('Your Order Booked Check Your Email..');</script>";
        echo "<script>window.location.assign('../../Product/index.php');</script>";
    }
}
?>
<?php
session_start();

$uid = $_SESSION['uid'];

if (!isset($uid))
    echo "<script>window.location.assign('login.php');</script>";
include_once("../connection.php");


$qry = mysqli_query($con, "select * from order_master where uid=$uid");
($row = mysqli_fetch_array($qry)); {
    $name = $row['name'];
    $email = $row['email'];
    $odate = $row['odate'];
    $total = $row['total'];
}
$taotalcount=0;
$qry1 = mysqli_query($con, "select a.*,p.* from product_master p,addtocart a where a.pid=p.pid and a.uid=$uid");

$detail = [];
while (($row1 = mysqli_fetch_array($qry1))) {
    $detail[] =
        [
            'pname' => $row1['pname'], 'cartqty' => $row1['cartqty'], 'price' => $row1['price']
        ];
        $taotalcount += $row1['price']*$row1['cartqty'];

    // $detail=[$pname=$row1['pname'],$qty=$row1['cartqty'],$price=$row1['price']];
    // echo "Product Name - " . $pname ."<br/>" ;
    // echo "Qty - " . $qty ."<br/>" ;
    // echo "Price - " . $price ."<br/>" ;
}



// $pname = $row1['pname'];
// echo "$pname";
// $cart = $row1['cartqty'];

// $price = $row1['price'];



if (isset($_POST["btnsub"])) {
    //     $qry1 = mysqli_query($con, "select a.*,p.* from product_master p,addtocart a where a.pid=p.pid and a.uid=$uid");
    // while (($row1 = mysqli_fetch_array($qry1))) {
    //     $detail = ["<br><br>Product Name - ", $pname = $row1['pname'], "<br>Qty - ", $qty = $row1['cartqty'], "<br>Price - ", $price = $row1['price']];

    // for ($i = 0; $i <= 5; $i++) {

    // echo "Product Name - " . $pname ."<br/>" ;
    // echo "Qty - " . $qty ."<br/>" ;
    // echo "Price - " . $price ."<br/>" ;


    $message =

        // $detail=[$pname=$row1['pname'],$qty=$row1['cartqty'],$price=$row1['price']];
        "Hello! <b>" . $name . ".</b> Your Email is " . $email . ".<br/> 
Your Product Order is Booked.<br/>
Your Product Details:<br/> ";


    foreach ($detail as $product) {

        $message .= "Product Name : " . $product['pname'] . "<br/> Quantity : " . $product['cartqty'] . "<br/> Price : &#8377;" . $product['price'] . "<br/><br/>";
    }

    $message .= "Your Total Is - &#8377;" . $taotalcount . "<br/>
Please allow 2-3 days for order to be Confirm.<br/>
- Thank you For Booking.<br/><br/>
By Alexander Photography..!";



    //         $message = "Hello! <b>" . $name . ".</b> Your Email is " . $email . ".<br/> 
    // Your Product Order is Booked.<br/>
    // Your Product Details.<br/> 
    // Product Name - " . $pname . "<br/> 
    // Qty - " . $qty ."<br/> 
    // Price - " . $price ."<br/> 

    // Please allow 2-3 days for order to be Confirm.<br/>
    // - Thank you For Booking.<br/><br/>
    // By Alexander Photography..!";



    echo smtp_mailer($email, "Order Summary", $message);
}




?>

<html>

<body>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style type="text/css">
        body {
            background: #f2f2f2;
        }

        .payment {
            border: 1px solid #f2f2f2;
            height: 280px;
            border-radius: 20px;
            background: #fff;
        }

        .payment_header {
            background: #7AB3E1;
            padding: 20px;
            border-radius: 20px 20px 0px 0px;

        }

        .check {
            margin: 0px auto;
            width: 50px;
            height: 50px;
            border-radius: 100%;
            background: #fff;
            text-align: center;
        }

        .check i {
            vertical-align: middle;
            line-height: 50px;
            font-size: 30px;
        }

        .content {
            text-align: center;
        }

        .content h1 {
            font-size: 25px;
            padding-top: 25px;
        }

        .content a {
            width: 200px;
            height: 35px;
            color: #fff;
            border-radius: 10px;
            padding: 5px 10px;
            background: #007bff;
            transition: all ease-in-out 0.3s;
        }

        .content a:hover {
            text-decoration: none;
            background: #7AB3E1;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="payment">
                    <div class="payment_header">
                        <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
                    </div>
                    <form method="POST">
                        <div class="content">
                            <h1>Payment Success !</h1>
                            <p>Thank you by,</p>
                            <div>
                                <p>Alexander Photography</p>

                                <!-- <h6><a href='../../Product/index.php' value="Go to Home">Go to Home</a></h6> -->
                                <input type="submit" name="btnsub" value="Go To Home" class="btn btn-primary">
                            </div>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>