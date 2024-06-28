<?php
include_once("hhh.php");
include_once("connection.php");
$cid = $_GET['cid'];
$subcategories = mysqli_query($con, "select * from packagesub_category inner join packagecategory_master on packagesub_category.cid=packagecategory_master.cid where  packagesub_category.cid=$cid");
($row1 = mysqli_fetch_array($subcategories))

?>

<center>
	<h1 class='tt-heading-title margin-bottom-50 margin-top-40'> <?php echo $row1['cname']; ?> </h1>
</center>
<!-- Begin price boxes container=================================-->
<div class="price-boxes-container margin-bottom-80">
	<div class="row">
		<!-- <center><h1 class="tt-heading-title">GALLERY</h1></center><br> -->
		<?php
		$categories = mysqli_query($con, "select * from packagesub_category where status=0 and cid=$cid");
		while ($row = mysqli_fetch_array($categories)) {
		?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

				<!-- Begin price box -->
				<div class="price-box" style="height: 190vh;">
					<div class="pr-box price-heading bg-image" style="background-image: url(<?php echo "../package_image/$row[sphoto]" ?>);  height:45vh;">
						<div class="price-heading-inner">
							<!--	<i class="fas fa-"></i>-->
							<h3 class="price-title"><?php echo $row['sname'] ?> </h3>
							
						</div>
					</div>

					<div class="pr-box price-box-price">
						<div class="price"><span class="price-currency">Rs</span><?php echo $row['price'] ?></div>
						<!-- <div class="price-tenure">Per 1 Month</div> -->
					</div>
					<div class="pr-box price-features">
						<ul class="list-unstyled">
							<?php echo $row['sdetail']; ?>
						</ul>
						<!--	<ul class="list-unstyled">
											<li>Indoor Photo Session </li>
											<li>6 hour indoor pre wedding  theme based studio session</li>
											<li>3 hour engagement ceremony coverage</li>
											<li>engagement portraits</li>
											<li>Ring ceremony small videography</li>
										</ul>-->
					</div>
					<!--	<br><br>-->
					<!--	<h5>Photoprints Collection:</h5>-->
					<!--	<ul>
										<li>Countdown captures(10 images)</li>
										<li>A Fineart  engagement album(100 images)</li>
										<li>Size:5*7(50)& 8*10(50)</li>
									</ul>-->

					<div class="pr-box">
<?php
	echo "<a href='packageform.php?cid=$cid&sid=$row[0]' class='btn btn-price-box btn-dark btn-lg'>Enquire Now</a>";
?>					</div>
				</div>
				<!-- End price box -->

			</div> <!-- /.col -->


		<?php } ?>

	</div>
</div>

<?php
include("fff.php");
?>