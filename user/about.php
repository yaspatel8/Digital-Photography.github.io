<?php 
    include_once("hhh.php");
    include_once("connection.php");

    $qry=mysqli_query($con,"select * from about");
    
?>		<!-- End header -->


		<!-- *************************************
		*********** Begin body content *********** 
		************************************** -->
		<div id="body-content">


			<!-- =============================
			///// Begin about me section /////
			============================== -->
			<section id="about-me-section" class="about-me-simple">
				<div class="about-me-inner"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->
						
					<!-- ======================
					///// Begin split box /////
					based on: http://www.minimit.com/articles/solutions-tutorials/bootstrap-3-responsive-columns-of-same-height
					======================= -->
					<div class="split-box about-me">
						<div class="container-fluid">
							<div class="row">
								<div class="row-lg-height">

									<!-- Column -->
                                    <?php 
                                    while ($row = mysqli_fetch_array($qry))
                                    {
                                    ?>
									<div class="col-lg-6 col-lg-height split-box-image no-padding bg-image" style="background-image: url(<?php echo "../Images/$row[image]"; ?>); background-position: 50% 50%;">

										<!-- Split box image height
										============================
										* You can use prepared "padding-height-*" helper classes to set split box image height. Example: "padding-height-85" (useful if "split-box-content" contend/text is very short). Also you can use class "full-height-vh" for full height image. Find out "helper.css" file for more info. Note: class "sbi-height" is required.
										-->
										<div class="sbi-height full-height-vh"></div>

									</div> <!-- /.col -->
                                    

									<!-- Column -->
									<div class="col-lg-6 col-lg-height col-lg-middle no-padding">

										<!-- Begin split box content 
										============================= 
										* Use class "shifted-left" or "shifted-right" to enable shifted content (do not use for long content).
										-->
										<div class="split-box-content sb-content-right shifted-left">

											<!-- Begin tt-heading 
											====================== 
											* Use class "padding-on" to enable heading paddings (useful if you use tt-heading as stand alone element).
											* Use class "text-center" or "text-right" to align tt-heading.
											* Use classes "tt-heading-xs", "tt-heading-sm", "tt-heading-lg", "tt-heading-xlg" or "tt-heading-xxlg" to set tt-heading size.
											-->
											<div class="tt-heading">
												<div class="tt-heading-inner">
													<h1 class="tt-heading-title"><?php echo $row['title']; ?> </h1>
													<div class="tt-heading-subtitle">Artist &amp; Photographer</div>
													<hr class="hr-short">
												</div> <!-- /.tt-heading-inner -->
											</div>
											<!-- End tt-heading -->

											<div class="margin-top-30">
												<p><?php echo $row['description']; ?></p>
											</div>
											<!-- Begin signature -->
											
											<!-- End signature -->

										</div>
										<!-- End split box content -->

									</div> <!-- /.col -->
                                    <?php } ?>
								</div> <!-- /.row-height -->
							</div> <!-- /.row -->
						</div> <!-- /.container -->
					</div>
					<!-- End split box -->

				</div> <!-- /.about-me-inner -->
			</section>
			<!-- End about me section -->
<?php 
    include_once("fff.php");
?>

			<!-- ============================================
			///// Begin footer section (footer minimal) /////
			=================================================
			* Use class "footer-dark" to enable dark footer.
			* Use class "no-margin-top" if needed. 
			-->
		

	</body>


<!-- Mirrored from demo.themetorium.net/html/sepia/about-me-2-fluid.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Feb 2024 06:57:55 GMT -->
</html>