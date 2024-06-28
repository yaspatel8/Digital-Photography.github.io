
		<!-- End header -->


		<!-- *************************************
		*********** Begin body content *********** 
		************************************** -->
		

			<!-- ===========================
			///// Begin footer section /////
			================================
			* Use class "footer-dark" to enable dark footer.
			* Use class "no-margin-top" if needed. 
			-->
			<?php 
				include_once("connection.php");
			?>
			<section id="footer" class="footer-dark">
				<div class="footer-inner">
					<div class="footer-container tt-wrap">
						<div class="row">
							<div class="col-md-3">

								<!-- Begin footer logo -->
								<div id="footer-logo">
									<?php 
										$qry=mysqli_query($con,"select * from about");
										$qry1=mysqli_query($con,"select * from contact_us");
										while ($row = mysqli_fetch_array($qry))
										while ($row1 = mysqli_fetch_array($qry1)) {
									?>
									<a href="index.php" class="logo-dark"><img src="<?php echo "../Images/$row[image]"; ?>" alt="logo"></a>
									<a href="index.php" class="logo-light"><img src="<?php echo "../Images/$row[image]"; ?>" alt="logo"></a>
									

									<!-- for small screens -->
									<a href="index.php" class="logo-dark-m"><img src="<?php echo "../Images/$row[image]"; ?>" alt="logo"></a>
									<a href="index.php" class="logo-light-m"><img src="<?php echo "../Images/$row[image]"; ?>" alt="logo"></a>
									<br><br>
									<p><i class="fa fa-phone"></i> phone : +91 <?php echo $row1['phone']; ?></p>	
									<p><i class="fas fa-envelope"></i> email : <?php echo $row1['email']; ?></p> 															
											<?php } ?>
								</div>
								<!-- End footer logo -->

							</div> <!-- /.col -->

							<div class="col-md-5">

								<!-- Begin footer text -->
								<div class="footer-text">
								<?php 
										$qry=mysqli_query($con,"select * from about");
										while ($row = mysqli_fetch_array($qry)) {
									?>
									<h4>- <?php echo $row['title']; ?></h4>
									<?php echo $row['description']; ?><br>
									
								</div>
								<!-- End footer text -->
									<?php } ?>
							</div> <!-- /.col -->

							<div class="col-md-4">
										<?php 
											$qry1=mysqli_query($con,"select * from contact_us");
											while ($row1 = mysqli_fetch_array($qry1))
										{	
										?>
								<!-- Begin social buttons -->
								<div class="social-buttons" style="margin-right:20vh;">
									<ul>
										<li><a href="<?php echo $row1['fburl']; ?>" class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="<?php echo $row1['instaurl']; ?>" class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
										<li><a href="<?php echo $row1['xurl']; ?>" class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on X" target="_blank">X</a></li>
										<!-- <li><a href="https://www.pinterest.com/themetorium" class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Pinterest" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
										<li><a href="https://dribbble.com/Themetorium" class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Dribbble" target="_blank"><i class="fab fa-dribbble"></i></a></li>
										<li><a href="contact.html" class="btn btn-social-min btn-default btn-rounded-full" title="Drop me a line" target="_blank"><i class="fas fa-envelope"></i></a></li> -->
									</ul>
								</div>
								<!-- End social buttons -->

								<!-- Begin footer subscribe form -->
								
								<!-- End footer subscribe form -->
									<?php 
									}
									?>
							</div> <!-- /.col -->

						</div> <!-- /.row -->
					</div> <!-- /.footer-container -->

					<div class="footer-bottom">
						<div class="footer-container tt-wrap">
							<div class="row">
								<div class="col-md-6 col-md-push-6">

									<!-- Begin footer menu -->
									<ul class="footer-menu">
										<li><a href="index.php">Home</a></li>
										<li><a href="about.php">About</a></li>
										<li><a href="albums-grid-fluid-2.html">Portfolio</a></li>
										<li><a href="blog-list-grid.html">Blog</a></li>
										<li><a href="faq.php">FAQ</a></li>
										<li><a href="contact.php">Contact</a></li>
									</ul>
									<!-- End footer menu -->

								</div> <!-- /.col -->

								<div class="col-md-6 col-md-pull-6">

									<!-- Begin footer copyright -->
									<?php 
										$qry=mysqli_query($con,"select * from about");
										while ($row = mysqli_fetch_array($qry)) {
									?>
								
									<div class="footer-copyright">
										<p style="font-size:3vh;">&copy; <?php echo $row['title']; ?>  / All rights reserved</p>
									</div>
									<!-- End footer copyright -->
									<?php } ?>

								</div> <!-- /.col -->

							</div> <!-- /.row -->
						</div> <!-- /.footer-container -->
					</div> <!-- /.footer-bottom -->

				</div> <!-- /.footer-inner -->

				<!-- Scroll to top button -->
				<a href="#body" class="scrolltotop sm-scroll" title="Scroll to top"><i class="fas fa-chevron-up"></i></a>

			</section>
			<!-- End footer section -->


		

		<!-- Core JS -->
		<script src="assets/vendor/jquery/jquery.min.js"></script> <!-- jquery JS (https://jquery.com) -->
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- bootstrap JS (http://getbootstrap.com) -->

		<!-- Libs and Plugins JS -->
		<script src="assets/vendor/animsition/js/animsition.min.js"></script> <!-- Animsition JS (http://git.blivesta.com/animsition/) -->
		<script src="assets/vendor/jquery.easing.min.js"></script> <!-- Easing JS (http://gsgd.co.uk/sandbox/jquery/easing/) -->
		<script src="assets/vendor/isotope.pkgd.min.js"></script> <!-- Isotope JS (http://isotope.metafizzy.co) -->
		<script src="assets/vendor/imagesloaded.pkgd.min.js"></script> <!-- ImagesLoaded JS (https://github.com/desandro/imagesloaded) -->
		<script src="assets/vendor/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel JS (https://owlcarousel2.github.io/OwlCarousel2/) -->
		<script src="assets/vendor/jquery.mousewheel.min.js"></script> <!-- A jQuery plugin that adds cross browser mouse wheel support (https://github.com/jquery/jquery-mousewheel) -->
		<script src="assets/vendor/ytplayer/js/jquery.mb.YTPlayer.min.js"></script> <!-- YTPlayer JS (more info: https://github.com/pupunzi/jquery.mb.YTPlayer) -->

		<script src="assets/vendor/lightgallery/js/lightgallery-all.min.js"></script> <!-- lightGallery Plugins JS (http://sachinchoolur.github.io/lightGallery) -->
		
		<!-- Theme master JS -->
		<script src="assets/js/theme.js"></script>

		<!-- FOR DEMO SITE ONLY! JS -->
		<script src="assets/demo-panel/js/demo-panel.js"></script>
		<script src="assets/demo-panel/js/styleswitch.js"></script>


	</body>


<!-- Mirrored from demo.themetorium.net/html/sepia/footer-styles.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Feb 2024 06:59:19 GMT -->
</html>