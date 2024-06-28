<?php 

	include_once("connection.php");
	$cid = $_GET['cid'];
	$subcategories = mysqli_query($con, "select * from packagesub_category where cid=$cid");

?>





<?php
include("hhh.php");
?>



<!--wedding shoot-->



			    	<!-- Begin price boxes container 
					================================= -->
					<div class="price-boxes-container margin-bottom-80">
						<div class="row">
						<!-- <center><h1 class="tt-heading-title">GALLERY</h1></center><br> -->
                        	<?php
                            while ($row = mysqli_fetch_array($subcategories)) {
                            ?>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
								
								<!-- Begin price box -->
								<div class="price-box">
									<div class="pr-box price-heading bg-image"  style="background-image: url(assets/img/misc/<?php echo $row['sphoto'] ?>);">
										<div class="price-heading-inner">
										<!--	<i class="fas fa-"></i>-->
											<h3 class="price-title"><?php echo $row['sname'] ?> </h3>
											<div class="price-heading-text"><?php echo $row['subtitle'] ?> </div>
										</div>
									</div>

									<div class="pr-box price-box-price">
									<div class="price"><span class="price-currency">Rs</span><?php echo $row['price'] ?></div>
										<!-- <div class="price-tenure">Per 1 Month</div> -->
									</div>
									<div class="pr-box price-features">
										<?php $details = explode('<br />', $row['sdetail']); 

									  	foreach ($details as $det)
									  	{
									  		echo "$det <br>";
									  	}

									   ?>
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
										
										<a href="packageform.php" class="btn btn-price-box btn-dark btn-lg">Enquire Now</a>
									</div>
								</div>
								<!-- End price box -->
								
							</div> <!-- /.col -->


<?php } ?>

				<!--	<div class="price-boxes-container margin-bottom-80">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

								 Begin price box 
								<div class="price-box">
									<div class="pr-box price-heading bg-image" style="background-image: url(assets/img/misc/price-box-4.jpg);">
										<div class="price-heading-inner">
											<i class="fas fa-gem"></i>
											<h3 class="price-title">Bronze</h3>
											<div class="price-heading-text">Capturing The Beginning Of Forever</div>
										</div>
									</div>
									<div class="pr-box price-box-price">
										<div class="price"><span class="price-currency">Rs</span>45,000</div>
										 <div class="price-tenure">Per 1 Month</div> 
									</div>
									<div class="pr-box price-features">
										<ul class="list-unstyled">
											<li>Indoor Photo Session </li>
											<li>6 hour indoor pre wedding  theme based studio session</li>
											<li>3 hour engagement ceremony coverage</li>
											<li>engagement portraits</li>
											<li>Ring ceremony small videography</li>
										</ul>
									</div>
									<br><br>
									<h5>Photoprints Collection:</h5>
									<ul>
										<li>Countdown captures(10 images)</li>
										<li>A Fineart  engagement album(100 images)</li>
										<li>Size:5*7(50)& 8*10(50)</li>
									</ul>

									<div class="pr-box">
										
										<a href="/sem6 project1/admin/packageform.php" class="btn btn-price-box btn-dark btn-lg">Enquire Now</a>
									</div>
								</div>
								 End price box 
								
							</div>  /.col -->

						<!--	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
								
								 Begin price box (featured) 
								<div class="price-box price-box-featured">
									<div class="pr-box price-heading bg-image" style="background-image: url(assets/img/misc/price-box-5.jpg);">
										<div class="price-heading-inner">
											<i class="fas fa-moon"></i>
											<h3 class="price-title">Silver</h3>
											<div class="price-heading-text"> Some Cocktail Hours Spent Seaside</div>
										</div>
									</div>
									<div class="pr-box price-box-price">
										<div class="price"><span class="price-currency">Rs</span>1,20,000</div>
										 <div class="price-tenure">Per 6 Month</div>
									</div>
									<div class="pr-box price-features">
										<ul class="list-unstyled">
											<li>Outdoor Photo Session</li>
											<li> Two different video shoots:
											<ol>
										   <li>Outdoor couple pre wedding shoot</li>
											<li>Another videography for pre wedding family/friends shoot</li>
										   </ol>
											<li>Engagement ceremony whole coverage</li>
											<li>6 hour main wedding coverage</li>
										</ul>
										<br><br>
								<h5>Photoprints Collection:
									     (no size limit)</h5>
									<ul>
										<li>Countdown captures</li>
										<li>Elegant HD+ albums</li>
									</ul>
									</div>
									<div class="pr-box">
										<a href="form.php" class="btn btn-price-box btn-dark btn-lg">Enquire Now</a>
									</div>
								</div>
								 End price box

							</div>  /.col -->

						<!--	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
								
								 Begin price box 
								<div class="price-box">
									<div class="pr-box price-heading bg-image" style="background-image: url(assets/img/misc/price-box-6.jpg);">
										<div class="price-heading-inner">
											<i class="fas fa-award"></i>
											<h3 class="price-title">Gold</h3>
											<div class="price-heading-text">Candid Tales Of Love</div>
										</div>
									</div>
									<div class="pr-box price-box-price">
										<div class="price"><span class="price-currency">Rs</span>1,50,000</div>
										 <div class="price-tenure">Per 1 Year</div>
									</div>
									<div class="pr-box price-features">
										<ul class="list-unstyled">
											<li>Whole Destination Wedding package</li>
											<li>full  3 Day wedding shoot</li> 
											<li>pre wedding ceremonies like haldi,mehandi,etc videography included</li>
											<li>engagement and pre wedding shoot coverage</li>
										<br><br><li><b>Complimentory traditional theme Videography</b></li>
											
										</ul>
									</div>
									
									<p>Travel,stay and food expenses included.Additional 
									charges for extra day.Arranged outfits as per the 
								   destination.</p>
									<div class="pr-box">
										<a href="" class="btn btn-price-box btn-dark btn-lg">Enquire Now</a>
									</div>
								</div>
								 End price box 

							</div>  /.col -->

						<!--	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
								
								 Begin price box 
								<div class="price-box">
									<div class="pr-box price-heading bg-image" style="background-image: url(assets/img/misc/price-box-7.jpg);">
										<div class="price-heading-inner">
											<i class="fas fa-heartbeat"></i>
											<h3 class="price-title">Diamond</h3>
											<div class="price-heading-text">Memories Forever</div>
										</div>
									</div>
									<div class="pr-box price-box-price">
										<div class="price"><span class="price-currency">Rs</span>2,00,000</div>
										 <div class="price-tenure">Per 1 Year</div>
									</div>
									<div class="pr-box price-features">
										<ul class="list-unstyled">
											<li>All in one  premium package</li>
											<li>Full wedding coverage with all pre wedding 
												 ceremonies(no day limit)<li>
											<li>Engagement full coverage</li>
											<li>Reception Shoot</li>
									  	   <li>Solo photoshoot booths arranged for bride and groom</li>
									<BR><BR>  	<li><b>Complimentory engagement & wedding portraits</b></li>
										</ul>
									
										<p>A whole planned package from engagement to different traditional shoots, 
											from every minor shoot the main wedding day included.</p>
									</div>
									<div class="pr-box">
										<a href="" class="btn btn-price-box btn-dark btn-lg">Enquire Now</a>
									</div>
								</div>
							 End price box

							</div>  /.col -->
						</div> <!-- /.row -->

						



<?php
include("fff.php");
?>
	
