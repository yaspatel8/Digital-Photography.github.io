<?php

include_once("connection.php");

$gid=$_GET['x'];

$qry=mysqli_query($con,"update video set status=0 where vid=$gid");
if($qry)
{
    header("location:video.php");
}
else
{
    echo "<td><label class='btn ripple btn-success btn-rounded'><i class='fe fe-right'></i> Active</a></td>";
}

?>