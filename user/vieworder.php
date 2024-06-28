<?php

session_start();

$uid = $_SESSION['uid'];
if (!isset($uid))
    echo "<script>window.location.assign('login.php');</script>";
include_once("hhh.php");
include_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="tt-heading tt-heading-lg padding-on text-center">
        <div class="tt-heading-inner tt-wrap"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->
            <h1 class="tt-heading-title">Order</h1>
            <hr class="hr-short">
        </div> <!-- /.tt-heading-inner -->
    </div>
    <?php
    $uid = $_SESSION['uid'];
    
    // $qry1=mysqli_query($con,"select * From booking_master where uid=$uid");
    $qry1 = mysqli_query($con, "select b.*,p.*,ps.*,pg.* from booking_master b,packagecategory_master p,packagesub_category ps,photographer pg where p.cid=ps.cid and b.sid=ps.sid and b.pid=pg.id and b.uid=$uid");
    while ($row = mysqli_fetch_array($qry1)) {
    ?>
        <table class="table text-center">
            <thead>

                <tr>
                    <td>Order Id</td>
                    <td><?php echo "$row[order_id]"; ?></td>
                </tr>

                <tr>
                    <td>Package Category Name</td>
                    <td><?php echo "$row[cname]"; ?></td>
                </tr>

                <tr>
                    <td>Package Sub Category Name</td>
                    <td><?php echo "$row[sname]"; ?></td>
                </tr>


                <tr>
                    <td>Photographer Name</td>
                    <td><?php echo "$row[name]"; ?></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td>&#8377; <?php echo "$row[amt]"; ?> /-</td>
                </tr>

                <tr>
                    <td>Date To</td>
                    <td><?php echo "$row[date_to]"; ?></td>
                </tr>

                <tr>
                    <td>Date From</td>
                    <td><?php echo "$row[date_from]"; ?></td>
                </tr>

                <tr>
                    <td>Status</td>
                    
                        <?php
                        $status = $row[12];
                        if ($status == 1) {
                            echo "<td class='badge bg-success-light border-success fs-11' title='Not Cancle Order Beacuse Order Is Confirm'>Compalated</td>";
                            
                        }else
                        {
                            echo "<td class='badge bg-success-light border-success fs-11'>Not Compalated</td>";
                            echo "<tr><td><a href='cancle.php?id=$row[bid]' class='btn btn-pill btn-danger' onclick='javascript: return confirm('Do Cancle?')'>Cancle Order</a></td></tr>";
                        }
                            ?>
                    
                </tr>
                <!-- <tr>
                    <td><a href="cancle.php" class="btn btn-pill btn-danger" onclick="javascript: return confirm('Do Cancle?')">Cancle Order</a></td>
                </tr> -->
            </thead>
        </table>
    <?php } ?>
</body>

</html>
<?php
include_once("fff.php");
?>