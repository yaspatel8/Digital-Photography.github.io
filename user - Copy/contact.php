<?php 
    include_once("hhh.php");
    include_once("connection.php");

    $qry=mysqli_query($con,"select * from contact_us");
?>
		<!-- End header -->


		<!-- *************************************
		*********** Begin body content *********** 
		************************************** -->
		<div id="body-content">


			<!-- ============================
			///// Begin contact section /////
			============================= -->
			<section id="contact-section" class="contact-simple">
				<div class="contact-section-inner full-height-vh"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->

					<div class="full-cover bg-image" style="background-image: url(assets/img/misc/contact-bg-2.jpg); background-position: 50% 50%;"></div>

					<!-- Element cover -->
					<div class="cover bg-transparent-1-dark"></div>

					<!-- Begin contact info -->
					<div class="contact-info-wrap">
                    <?php 
                                    while($row=mysqli_fetch_array($qry))
                                    {
                                ?>
						<!-- Begin tt-heading 
						====================== 
						* Use class "padding-on" to enable heading paddings (useful if you use tt-heading as stand alone element).
						* Use class "text-center" or "text-right" to align tt-heading.
						* Use classes "tt-heading-xs", "tt-heading-sm", "tt-heading-lg", "tt-heading-xlg" or "tt-heading-xxlg" to set tt-heading size.
						-->
						<div class="tt-heading">
							<div class="tt-heading-inner">
								<h1 class="tt-heading-title">Get In Touch</h1>
								<!-- <div class="tt-heading-subtitle">Subtitle Here</div> -->
								<hr class="hr-short">
							</div> <!-- /.tt-heading-inner -->
						</div>
						<!-- End tt-heading -->

						<div class="contact-info margin-top-40">
                        
							<p><i class="fas fa-home"></i> address: <?php echo "$row[address]"; ?></p>
							<p><i class="fas fa-phone"></i> phone: +91  <?php echo "$row[phone]"; ?></p>
							<p><i class="fas fa-envelope"></i> email: <a href="<?php echo "$row[email]"; ?>" target="_blank"><?php echo "$row[email]"; ?></a></p>
                            
                        </div>

						<!-- Begin social buttons -->
						<div class="social-buttons ">
							<ul>
								<li><a href="<?php echo $row['fburl']; ?>" class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="<?php echo $row['xurl']; ?>" class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on X" target="_blank"> X </a></li>
								<li><a href="<?php echo $row['instaurl']; ?>" class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Google+" target="_blank"><i class="fab fa-instagram"></i></a></li>
								
							</ul>
						</div>
						<!-- End social buttons -->
                        <?php } ?>
					</div>
					<!-- End contact info -->
				</div> <!-- /.contact-section-inner -->
			</section>
			<!-- End contact section -->


			<!-- ============================================
			///// Begin footer section (footer minimal) /////
			=================================================
			* Use class "footer-dark" to enable dark footer.
			* Use class "no-margin-top" if needed. 
			-->
		<?php 
            include_once("fff.php");
        ?>
	</body>


<!-- Mirrored from demo.themetorium.net/html/sepia/contact-simple.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Feb 2024 06:59:08 GMT -->
</html>