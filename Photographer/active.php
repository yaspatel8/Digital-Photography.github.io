<?php

include_once("connection.php");

$gid=$_GET['x'];

$qry=mysqli_query($con,"update gallery set status=1 where gid=$gid");
if($qry)
{
    header("location:gallery.php");
}
else
{
    echo "<td><label class='btn ripple btn-success btn-rounded'><i class='fe fe-right'></i> Active</a></td>";
}

?>