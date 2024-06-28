<?php
include_once("hhh.php");

include_once("connection.php");
?>
<head>
<script>
        function getXMLHTTP() {
            var xmlhttp = false;
            xmlhttp = new XMLHttpRequest();
            return xmlhttp;
        }

        function getState() {

            var strURL = "video.php";

            var req = getXMLHTTP();
            if (req) {
                req.onreadystatechange = function() {
                    if (req.readyState == 4 && req.status == 200) {
                        document.getElementById().innerHTML = req.responseText;
                    }
                }
                req.open("GET", strURL, true);
                req.send();
            }
        }
    </script>
</head>
<!-- *************************************
		*********** Begin body content *********** 
		************************************** -->
<div id="body-content">


	<!-- ==========================
			///// Begin intro section /////
			=========================== -->
	<section id="tt-intro" class="slideshow-intro">
		<div class="tt-intro-inner"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->
			<div class="gl-carousel-wrap no-padding"> <!-- Optional: use class "no-padding" to disable paddings -->

				<!-- Begin content carousel (https://owlcarousel2.github.io/OwlCarousel2/)
						====================================================================
						* Use class "nav-outside" for outside nav (requires boxed layout).
						* Use class "nav-outside-top" for outside top nav (requires enough space at the top of the carousel).
						* Use class "nav-bottom-right" for bottom right nav.
						* Use class "nav-rounded" for rounded nav.
						* Use class "nav-light" to enable nav light style.
						* Use class "dots-outside" for outside dots (requires enough space at the bottom of the carousel).
						* Use class "dots-left", "dots-right" or "dots-center-right" to align dots.
						* Use class "dots-rounded" for rounded dots.
						* Use class "owl-mousewheel" to enable mousewheel support.
						* Use class "cursor-grab" to enable cursor grab icon (no effect on links!).
						* Use class "cc-hover-light", "cc-hover-dark" or "cc-hover-zoom" to enable carousel items hover effect.
						* Use class "cc-height-1", "cc-height-2", "cc-height-3", "cc-height-4", "cc-height-5", "cc-height-6" or "cc-height-full" to set carousel height (do not use with data-autoheight="true"!!!).
						* Use class "cc-height-m" to set full height for small screens (do not use with data-autoheight="true"!!!).
						================================================================
						* Available carousel data attributes:
								data-items="5".......................(items visible on desktop)
								data-tablet-landscape="4"............(items visible on mobiles)
								data-tablet-portrait="3".............(items visible on mobiles)
								data-mobile-landscape="2"............(items visible on tablets)
								data-mobile-portrait="1".............(items visible on tablets)
								data-loop="true".....................(true/false)
								data-margin="10".....................(space between items)
								data-center="true"...................(true/false)
								data-start-position="0"..............(item start position)
								data-animate-in="fadeIn".............(fade-in animation)
								data-animate-out="fadeOut"...........(fade-out animation)
								data-mouse-drag="false"..............(true/false)
								data-touch-drag="false"..............(true/false)
								data-autoheight="true"...............(true/false)
								data-autoplay="true".................(true/false)
								data-autoplay-timeout="5000".........(milliseconds)
								data-autoplay-hover-pause="true".....(true/false)
								data-autoplay-speed="800"............(milliseconds)
								data-drag-end-speed="800"............(milliseconds)
								data-nav="true"......................(true/false)
								data-nav-speed="800".................(milliseconds)
								data-dots="false"....................(true/false)
								data-dots-speed="800"................(milliseconds)
						-->
				<div class="owl-carousel cc-height-5 cursor-grab dots-right bg-dark" data-items="1" data-loop="true" data-nav="true" data-nav-speed="500" data-dots-speed="500" data-autoplay="true" data-autoplay-timeout="8000" data-autoplay-speed="500" data-autoplay-hover-pause="true">

					<!-- Begin carousel item 
							========================= -->
					<div class="cc-item">

						<!-- Element cover -->
						<span class="cover bg-transparent-3-dark"></span>

						<!-- cc image -->
						<div class="cc-image bg-image" style="background-image: url(assets/img/intro/intro-10.jpg); background-position: 50% 50%;"></div>

						<!-- Begin intro caption 
								=========================
								* Position classes: "top-left", "top-center", "top-right", "center-left", "center", "center-right", "bottom-left", "bottom-center", "bottom-right". 
								* Size classes: "intro-caption-xs", "intro-caption-sm", "intro-caption-lg", "intro-caption-xlg", "intro-caption-xxlg".
								-->
						<div class="intro-caption caption-animate intro-caption-xxlg center-left">
							<h1 class="intro-title">Sepia</h1>
							<h2 class="intro-subtitle">Photography Portfolio Theme</h2>

							<p class="intro-description max-width-650">
								Made for photographers, photo studios, design agencies. <br>
								Create your own unique and beautiful photography website!
							</p>

							<div class="margin-top-30">
								<a href="https://themeforest.net/item/sepia-photography-portfolio-html-website-template/20195226?ref=Themetorium" class="btn btn-primary margin-top-5 margin-right-10" target="_blank">Buy It Now!</a>
								<a href="albums-grid-fluid-2.html" class="btn btn-white-bordered margin-top-5">Discover More</a>
							</div>
						</div>
						<!-- End intro caption -->

					</div>
					<!-- End carousel item -->

					<!-- Begin carousel item 
							========================= -->
					<div class="cc-item">

						<!-- Element cover -->
						<span class="cover bg-transparent-3-dark"></span>

						<!-- cc image -->
						<div class="cc-image bg-image" style="background-image: url(assets/img/intro/intro-11.jpg); background-position: 50% 50%;"></div>

						<!-- Begin intro caption 
								=========================
								* Position classes: "top-left", "top-center", "top-right", "center-left", "center", "center-right", "bottom-left", "bottom-center", "bottom-right". 
								* Size classes: "intro-caption-xs", "intro-caption-sm", "intro-caption-lg", "intro-caption-xlg", "intro-caption-xxlg".
								-->
						<div class="intro-caption caption-animate intro-caption-xxlg center-left">
							<h1 class="intro-title">Creative</h1>
							<h2 class="intro-subtitle">Photography Portfolio Theme</h2>

							<p class="intro-description max-width-650">
								Made for photographers, photo studios, design agencies. <br>
								Create your own unique and beautiful photography website!
							</p>

							<div class="margin-top-30">
								<a href="https://themeforest.net/item/sepia-photography-portfolio-html-website-template/20195226?ref=Themetorium" class="btn btn-primary margin-top-5 margin-right-10" target="_blank">Buy It Now!</a>
								<a href="albums-grid-fluid-2.html" class="btn btn-white-bordered margin-top-5">Discover More</a>
							</div>
						</div>
						<!-- End intro caption -->

					</div>
					<!-- End carousel item -->

					<!-- Begin carousel item 
							========================= -->
					<div class="cc-item">

						<!-- Element cover -->
						<span class="cover bg-transparent-3-dark"></span>

						<!-- cc image -->
						<div class="cc-image bg-image" style="background-image: url(assets/img/intro/intro-12.jpg); background-position: 50% 50%;"></div>

						<!-- Begin intro caption 
								=========================
								* Position classes: "top-left", "top-center", "top-right", "center-left", "center", "center-right", "bottom-left", "bottom-center", "bottom-right". 
								* Size classes: "intro-caption-xs", "intro-caption-sm", "intro-caption-lg", "intro-caption-xlg", "intro-caption-xxlg".
								-->
						<div class="intro-caption caption-animate intro-caption-xxlg center-left">
							<h1 class="intro-title">Powerful</h1>
							<h2 class="intro-subtitle">Photography Portfolio Theme</h2>

							<p class="intro-description max-width-650">
								Made for photographers, photo studios, design agencies. <br>
								Create your own unique and beautiful photography website!
							</p>

							<div class="margin-top-30">
								<a href="https://themeforest.net/item/sepia-photography-portfolio-html-website-template/20195226?ref=Themetorium" class="btn btn-primary margin-top-5 margin-right-10" target="_blank">Buy It Now!</a>
								<a href="albums-grid-fluid-2.html" class="btn btn-white-bordered margin-top-5">Discover More</a>
							</div>
						</div>
						<!-- End intro caption -->

					</div>
					<!-- End carousel item -->

					<!-- Begin carousel item 
							========================= -->
					<div class="cc-item">

						<!-- Element cover -->
						<span class="cover bg-transparent-3-dark"></span>

						<!-- cc image -->
						<div class="cc-image bg-image" style="background-image: url(assets/img/intro/intro-13.jpg); background-position: 50% 50%;"></div>

						<!-- Begin intro caption 
								=========================
								* Position classes: "top-left", "top-center", "top-right", "center-left", "center", "center-right", "bottom-left", "bottom-center", "bottom-right". 
								* Size classes: "intro-caption-xs", "intro-caption-sm", "intro-caption-lg", "intro-caption-xlg", "intro-caption-xxlg".
								-->
						<div class="intro-caption caption-animate intro-caption-xxlg center-left">
							<h1 class="intro-title">Perfect</h1>
							<h2 class="intro-subtitle">Photography Portfolio Theme</h2>

							<p class="intro-description max-width-650">
								Made for photographers, photo studios, design agencies. <br>
								Create your own unique and beautiful photography website!
							</p>

							<div class="margin-top-30">
								<a href="https://themeforest.net/item/sepia-photography-portfolio-html-website-template/20195226?ref=Themetorium" class="btn btn-primary margin-top-5 margin-right-10" target="_blank">Buy It Now!</a>
								<a href="albums-grid-fluid-2.html" class="btn btn-white-bordered margin-top-5">Discover More</a>
							</div>
						</div>
						<!-- End intro caption -->

					</div>
					<!-- End carousel item -->

					<!-- Begin carousel item 
							========================= -->
					<!-- <div class="cc-item">
								<a class="owl-video" href="https://vimeo.com/7282791"></a>

								<div class="intro-caption caption-animate intro-caption-xxlg center-left">
									<h1 class="intro-title">Sepia</h1>
									<h2 class="intro-subtitle">Photography Portfolio Theme</h2>

									<p class="intro-description max-width-650">
										Made for photographers, photo studios, design agencies. <br> 
										Create your own unique and beautiful photography website!
									</p>

									<div class="margin-top-30">
										<a href="https://themeforest.net/item/sepia-photography-portfolio-html-website-template/20195226?ref=Themetorium" class="btn btn-primary margin-top-5 margin-right-10" target="_blank">Buy It Now!</a> 
										<a href="albums-grid-fluid-2.html" class="btn btn-white-bordered margin-top-5">Discover More</a>
									</div>
								</div> -->
					<!-- End carousel item -->

				</div>
				<!-- End content carousel -->

			</div> <!-- /.gl-carousel-wrap -->
		</div> <!-- /.tt-intro-inner -->
	</section>
	<!-- End intro section -->


	<!-- =============================
			///// Begin about me section /////
			============================== -->
	<section id="about-me-section">
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
							<div class="col-lg-5 col-lg-height split-box-image no-padding bg-image" style="background-image: url(assets/img/misc/me-2.jpg); background-position: 50% 50%;">

								<!-- Split box image height
										============================
										* You can use prepared "padding-height-*" helper classes to set split box image height. Example: "padding-height-85" (useful if "split-box-content" contend/text is very short). Also you can use class "full-height-vh" for full height image. Find out "helper.css" file for more info. Note: class "sbi-height" is required.
										-->
								<div class="sbi-height padding-height-80"></div>

							</div> <!-- /.col -->

							<!-- Column -->
							<div class="col-lg-7 col-lg-height col-lg-middle no-padding">

								<div class="full-cover for-light-style bg-gray-3 bg-image" style="background-image: url(assets/img/pattern/bg-pattern-1-light.png); background-position: 50% 50%;"></div>
								<div class="full-cover for-dark-style bg-gray-3 bg-image" style="background-image: url(assets/img/pattern/bg-pattern-1-dark.png); background-position: 50% 50%;"></div>

								<!-- Begin split box content 
										============================= 
										* Use class "shifted-left" or "shifted-right" to enable shifted content (do not use for long content).
										-->
								<div class="split-box-content sb-content-right">

									<!-- Begin tt-heading 
											====================== 
											* Use class "padding-on" to enable heading paddings (useful if you use tt-heading as stand alone element).
											* Use class "text-center" or "text-right" to align tt-heading.
											* Use classes "tt-heading-xs", "tt-heading-sm", "tt-heading-lg", "tt-heading-xlg" or "tt-heading-xxlg" to set tt-heading size.
											-->
									<div class="tt-heading">
										<div class="tt-heading-inner">
											<h1 class="tt-heading-title">Buy Products</h1>
											<div class="tt-heading-subtitle">For photography and use tools</div>
											<hr class="hr-short">
										</div> <!-- /.tt-heading-inner -->
									</div>
									<!-- End tt-heading -->

									<!-- <div class="margin-top-30">
										<p>Hi, my name is <strong>Martin Vegas</strong>. I am an artist and photographer. Nemo enim ipsam voluptatem quia voluptas aspernatur aut odit aut fugit. Vivamus at nibh tincidunt, bibendum ligula id. Nemo enim ipsam voluptatem quiatotam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem.</p>
									</div> -->
									<div class="latest-news-section-inner tt-wrap"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->

			<!-- Begin latest news carousel
					================================ -->
			<div class="latest-news-carousel">

				<!-- Begin content carousel (https://owlcarousel2.github.io/OwlCarousel2/)
						====================================================================
						* Use class "nav-outside" for outside nav (requires boxed layout).
						* Use class "nav-outside-top" for outside top nav (requires enough space at the top of the carousel).
						* Use class "nav-bottom-right" for bottom right nav.
						* Use class "nav-rounded" for rounded nav.
						* Use class "nav-light" to enable nav light style.
						* Use class "dots-outside" for outside dots (requires enough space at the bottom of the carousel).
						* Use class "dots-left", "dots-right" or "dots-center-right" to align dots.
						* Use class "dots-rounded" for rounded dots.
						* Use class "owl-mousewheel" to enable mousewheel support.
						* Use class "cursor-grab" to enable cursor grab icon (no effect on links!).
						* Use class "cc-hover-light", "cc-hover-dark" or "cc-hover-zoom" to enable carousel items hover effect.
						* Use class "cc-height-1", "cc-height-2", "cc-height-3", "cc-height-4", "cc-height-5", "cc-height-6" or "cc-height-full" to set carousel height (do not use with data-autoheight="true"!!!).
						* Use class "cc-height-m" to set full height for small screens (do not use with data-autoheight="true"!!!).
						================================================================
						* Available carousel data attributes:
								data-items="5".......................(items visible on desktop)
								data-tablet-landscape="4"............(items visible on mobiles)
								data-tablet-portrait="3".............(items visible on mobiles)
								data-mobile-landscape="2"............(items visible on tablets)
								data-mobile-portrait="1".............(items visible on tablets)
								data-loop="true".....................(true/false)
								data-margin="10".....................(space between items)
								data-center="true"...................(true/false)
								data-start-position="0"..............(item start position)
								data-animate-in="fadeIn".............(fade-in animation)
								data-animate-out="fadeOut"...........(fade-out animation)
								data-mouse-drag="false"..............(true/false)
								data-touch-drag="false"..............(true/false)
								data-autoheight="true"...............(true/false)
								data-autoplay="true".................(true/false)
								data-autoplay-timeout="5000".........(milliseconds)
								data-autoplay-hover-pause="true".....(true/false)
								data-autoplay-speed="800"............(milliseconds)
								data-drag-end-speed="800"............(milliseconds)
								data-nav="true"......................(true/false)
								data-nav-speed="800".................(milliseconds)
								data-dots="false"....................(true/false)
								data-dots-speed="800"................(milliseconds)
						-->
				<div class="owl-carousel cursor-grab nav-outside-top" data-items="3" data-margin="30" data-dots="false" data-nav="true" data-nav-speed="500" data-autoplay="true" data-autoplay-timeout="5000" data-autoplay-speed="500" data-autoplay-hover-pause="true" data-tablet-landscape="3" data-tablet-portrait="2" data-mobile-landscape="1" data-mobile-portrait="1">

					<!-- Begin carousel item 
							========================= -->
					<?php
					$qry = mysqli_query($con, "select * from catrgory_master");
					while ($row = mysqli_fetch_array($qry)) {

					?>
						<div class="cc-item">

							<!-- Begin blog list item -->
							<article class="blog-list-item">

								<!-- Blog list item image -->
								<?php 
                    echo "<a href='' class='bl-item-image'><img src='../product_image/$row[photo]' style='height: 45vh; width:80vh'></a>";
                    ?>
					

								<!-- Begin blog list item info -->
								<a href="blog-single.html" class="bl-item-title">
								<div class="bl-item-info">


									<center><h2><?php echo $row['cname']; ?></h2></center>

									<!-- <div class="bl-item-meta">
										<span class="published"> Join Date - <?php echo $row['datetime']; ?> </span>

									</div> -->
									</a>
									<!-- Use data attributes to set text maximum characters or words (example: data-max-characters="120" or data-max-words="40") -->
									<!-- <div class="bl-item-desc" data-max-words="14">Suspendisse imperdiet ante at tortor consequat consectetur. Quisque rhoncus blandit justo praesen congue convallis artula ellis.</div> -->

									<!-- <a href="blog-single.html" class="bl-item-read-more" title="Read More"><span></span></a> -->

									<!-- Begin blog list item attributes -->
									
									<!-- End blog list item attributes -->

								</div>
								<!-- End blog list item info -->

							</article>
							<!-- End blog list item -->

						</div>
					<?php } ?>
					<!-- End carousel item -->

					<!-- Begin carousel item 
							========================= -->
					<!-- End blog list item -->

				</div>
				<!-- End carousel item -->

			</div>
			<!-- End content carousel -->

		</div>

									<a href="about-me-fluid.html" class="btn btn-primary margin-top-20">Buy Now</a>
									<!-- <a href="contact.html" class="btn btn-dark margin-top-20">Hire Me!</a> -->

									<!-- Begin signature -->
									<!-- <div class="signature">
												<img class="signature-dark" src="assets/img/signature-dark.png" alt="">
												<img class="signature-light" src="assets/img/signature-light.png" alt="">
											</div> -->
									<!-- End signature -->

								</div>
								<!-- End split box content -->

							</div> <!-- /.col -->

						</div> <!-- /.row-height -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div>
			<!-- End split box -->

		</div> <!-- /.about-me-inner -->
	</section>
	<!-- End about me section -->


	<!-- =================================
			///// Begin gallery list section /////
			================================== -->
	<section id="gallery-list-section">

		<!-- Begin tt-heading 
				====================== 
				* Use class "padding-on" to enable heading paddings (useful if you use tt-heading as stand alone element).
				* Use class "text-center" or "text-right" to align tt-heading.
				* Use classes "tt-heading-xs", "tt-heading-sm", "tt-heading-lg", "tt-heading-xlg" or "tt-heading-xxlg" to set tt-heading size.
				-->
		<div class="tt-heading tt-heading-lg padding-on text-center">
			<div class="tt-heading-inner tt-wrap"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->
				<h1 class="tt-heading-title">GALLERY</h1>
				<hr class="hr-short">
				<a class="btn btn-primary margin-top-5" onchange="getState(this.value)">Video</a>
			</div> <!-- /.tt-heading-inner -->
		</div>
		<!-- End tt-heading -->


		<section id="gallery-single-section">
			<div class="isotope-wrap tt-wrap"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->

				<!-- Begin isotope
					===================
					* Use class "gutter-1", "gutter-2" or "gutter-3" to add more space between items.
					* Use class "col-1", "col-2", "col-3", "col-4", "col-5" or "col-6" for columns.
					-->
				<div class="isotope col-3 gutter-3">

					<!-- Begin isotope top content -->
					<div class="isotope-top-content">

						<!-- Begin gallery share button 
							================================
							* Use class "gs-right" to align gallery share button.
							-->
						<a href="#0" class="gallery-share gs-right" data-toggle="modal" data-target="#modal-64253091" title="Share this gallery"><i class="fas fa-share-alt"></i></a>
						<!-- End gallery share button -->

						<!-- Begin modal 
							=================
							* Use class "modal-center" to enable modal center position (use for short content only!).
							* Use class "modal-left" to enable left sidebar modal.
							* Use class "modal-right" to enable right sidebar modal.
							-->

						<!-- Begin isotope items wrap 
						==============================
						* Use classes "gsi-color", "gsi-zoom" or "gsi-simple" to change gallery single item cover variations.
						-->
						<div id="gallery" class="isotope-items-wrap lightgallery gsi-zoom">

							<!-- Grid sizer (do not remove!!!) -->
							<div class="grid-sizer"></div>


							<!-- ===================== 
							/// Begin isotope item ///
							========================== 
							* If you use background image on isotope-item child element, then you need to use class "iso-height-1" or "iso-height-2" to set the item height. If you use simple image tag, then don't use height classes.
							-->
							<?php
							$qry = mysqli_query($con, "select * from gallery");
							while ($row = mysqli_fetch_array($qry)) {


							?>

								<div class="isotope-item">

									<!-- Begin gallery single item -->
									<a href="<?php echo "../Photographer/Images/$row[image]"; ?>" class="gallery-single-item lg-trigger" data-sub-html="<p><?php echo $row['title']; ?></p>">

										<!-- Begin gallery single item image -->
										<img src="<?php echo "../Photographer/Images/$row[image]"; ?>" class="gs-item-image" alt="">
										<!-- End gallery single item image -->

										<!-- Gallery single item image caption -->
										<!-- <div class="gsi-image-caption">Yes, you can use image captions :)</div> -->

										<!-- Gallery single item icon -->
										<!-- <div class="gs-item-icon"><i class="fas fa-search"></i></div> -->

									</a>
									<!-- End gallery single item -->

								</div>
							<?php } ?>
							<!-- End isotope item -->

							<!-- ===================== 
							/// Begin isotope item ///
							========================== 
							* If you use background image on isotope-item child element, then you need to use class "iso-height-1" or "iso-height-2" to set the item height. If you use simple image tag, then don't use height classes.
							-->

							<!-- End isotope item -->

							<!-- ===================== 
							/// Begin isotope item ///
							========================== 
							* If you use background image on isotope-item child element, then you need to use class "iso-height-1" or "iso-height-2" to set the item height. If you use simple image tag, then don't use height classes.
							-->
							<?php
							$qry = mysqli_query($con, "select * from video");
							while ($row = mysqli_fetch_array($qry)) {


							?>

								<div class="isotope-item">

									<!-- Begin gallery single item -->


									<!-- Begin gallery single item image -->
									<video src="<?php echo "../Photographer/video/$row[video]"; ?>" controls autoplay muted width="345" alt=""></video>
									<!-- End gallery single item image -->

									<!-- Gallery single item icon -->
									<div class="gs-item-icon"><i class="fas fa-play"></i></div>

									</a>
									<!-- End gallery single item -->

								</div>
							<?php } ?>
							<!-- End isotope item -->

							<!-- ===================== 
							/// Begin isotope item ///
							========================== 
							* If you use background image on isotope-item child element, then you need to use class "iso-height-1" or "iso-height-2" to set the item height. If you use simple image tag, then don't use height classes.
							-->

							<!-- End isotope item -->

							<!-- ===================== 
							/// Begin isotope item ///
							========================== 
							* If you use background image on isotope-item child element, then you need to use class "iso-height-1" or "iso-height-2" to set the item height. If you use simple image tag, then don't use height classes.
							-->

							<!-- End isotope item -->

							<!-- ===================== 
							/// Begin isotope item ///
							========================== 
							* If you use background image on isotope-item child element, then you need to use class "iso-height-1" or "iso-height-2" to set the item height. If you use simple image tag, then don't use height classes.
							-->

							<!-- End isotope item -->


						</div>
						<!-- End isotope items wrap -->


						<!-- Begin isotope pagination 
						============================== -->
						<div class="isotope-pagination">
							<div class="iso-load-more">
								<a class="btn btn-dark-bordered btn-lg" href="gallery.php">View More <i class="fas fa-refresh"></i></a>
							</div>
						</div>
						<!-- End isotope pagination -->

					</div>
					<!-- End isotope -->

				</div> <!-- /.isotope-wrap -->
		</section>
	</section>
	<!-- End gallery list section -->


	<!-- ===========================
			///// Begin prices section /////
			============================ -->
	<section id="prices-section">

		<!-- Begin tt-heading 
				====================== 
				* Use class "padding-on" to enable heading paddings (useful if you use tt-heading as stand alone element).
				* Use class "text-center" or "text-right" to align tt-heading.
				* Use classes "tt-heading-xs", "tt-heading-sm", "tt-heading-lg", "tt-heading-xlg" or "tt-heading-xxlg" to set tt-heading size.
				-->
		<div class="tt-heading tt-heading-lg padding-on">
			<div class="tt-heading-inner tt-wrap"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->

				<div class="row">
					<div class="col-md-4">

						<h1 class="tt-heading-title">PACKAGES </h1>
						<div class="tt-heading-subtitle">Please choose your package</div>
						<hr class="hr-short">

					</div> <!-- /.col -->

					<div class="col-md-8">
						<p>Nunc euismod ipsum vel metus rhoncus, a accumsan sapien mollis. Donec malesuada lacus rhoncus ipsum dignissim, sed fringilla orci faucibus. Proin non odio dui. Donec ut tristique dolor, at interdum sem. Quisque finibus viverra lectus vitae pulvinar.</p>
					</div> <!-- /.col -->
				</div> <!-- /.row -->

			</div> <!-- /.tt-heading-inner -->
		</div>
		<!-- End tt-heading -->

		<div class="prices-section-inner tt-wrap"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->

			<!-- Begin price boxes container 
					================================= -->
			<div class="price-boxes-container margin-bottom-80">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

						<!-- Begin price box -->
						<div class="price-box">
							<div class="pr-box price-heading bg-image" style="background-image: url(assets/img/misc/price-box-1.jpg);">
								<div class="price-heading-inner">
									<i class="fas fa-umbrella"></i>
									<h3 class="price-title">Studio</h3>
									<div class="price-heading-text">Studio Photo Session</div>
								</div>
							</div>
							<div class="pr-box price-box-price">
								<div class="price"><span class="price-currency">$</span>59</div>
								<!-- <div class="price-tenure">Per 1 Month</div> -->
							</div>
							<div class="pr-box price-features">
								<ul class="list-unstyled">
									<li>Ascimo Ellan Tareck</li>
									<li>Fitrim Namzeck</li>
									<li>Fartimo antera Maunos</li>
								</ul>
							</div>
							<div class="pr-box">
								<a href="contact.html" class="btn btn-price-box btn-dark btn-lg">Purchase Now</a>
								<a href="page-dummy-classic-sidebar-right.html" class="btn btn-link btn-lg btn-block">or Read More...</a>
							</div>
						</div>
						<!-- End price box -->

					</div> <!-- /.col -->

					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

						<!-- Begin price box (featured) -->
						<div class="price-box price-box-featured">
							<div class="pr-box price-heading bg-image" style="background-image: url(assets/img/misc/price-box-2.jpg);">
								<div class="price-heading-inner">
									<i class="fas fa-tree"></i>
									<h3 class="price-title">Outdoor</h3>
									<div class="price-heading-text">Outdoor Photo Session</div>
								</div>
							</div>
							<div class="pr-box price-box-price">
								<div class="price"><span class="price-currency">$</span>89</div>
								<!-- <div class="price-tenure">Per 6 Month</div> -->
							</div>
							<div class="pr-box price-features">
								<ul class="list-unstyled">
									<li>Cunning Fuziness</li>
									<li>Lartem Sainter Omna</li>
									<li>Bullerti Naiten</li>
								</ul>
							</div>
							<div class="pr-box">
								<a href="contact.html" class="btn btn-price-box btn-dark btn-lg">Purchase Now</a>
								<a href="page-dummy-classic-sidebar-right.html" class="btn btn-link btn-lg btn-block">or Read More...</a>
							</div>
						</div>
						<!-- End price box -->

					</div> <!-- /.col -->

					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

						<!-- Begin price box -->
						<div class="price-box">
							<div class="pr-box price-heading bg-image" style="background-image: url(assets/img/misc/price-box-3.jpg);">
								<div class="price-heading-inner">
									<i class="fas fa-user"></i>
									<h3 class="price-title">Personal</h3>
									<div class="price-heading-text">Personal Photo Session</div>
								</div>
							</div>
							<div class="pr-box price-box-price">
								<div class="price"><span class="price-currency">$</span>129</div>
								<!-- <div class="price-tenure">Per 1 Year</div> -->
							</div>
							<div class="pr-box price-features">
								<ul class="list-unstyled">
									<li>Artemize Naice Femme</li>
									<li><strong>Putras Torrim</strong></li>
									<li>10 Voites Trante</li>
								</ul>
							</div>
							<div class="pr-box">
								<a href="contact.html" class="btn btn-price-box btn-dark btn-lg">Purchase Now</a>
								<a href="page-dummy-classic-sidebar-right.html" class="btn btn-link btn-lg btn-block">or Read More...</a>
							</div>
						</div>
						<!-- End price box -->

					</div> <!-- /.col -->

					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

						<!-- Begin price box -->
						<div class="price-box">
							<div class="pr-box price-heading bg-image" style="background-image: url(assets/img/misc/price-box-4.jpg);">
								<div class="price-heading-inner">
									<i class="fas fa-gem"></i>
									<h3 class="price-title">Wedding</h3>
									<div class="price-heading-text">Wedding Photo Session</div>
								</div>
							</div>
							<div class="pr-box price-box-price">
								<div class="price"><span class="price-currency">$</span>299</div>
								<!-- <div class="price-tenure">Per 1 Year</div> -->
							</div>
							<div class="pr-box price-features">
								<ul class="list-unstyled">
									<li>Mollimo Namis Ferra</li>
									<li><strong>Oppera Tulpas</strong></li>
									<li><strong>Verrum Daster Hunza</strong></li>
								</ul>
							</div>
							<div class="pr-box">
								<a href="contact.html" class="btn btn-price-box btn-dark btn-lg">Purchase Now</a>
								<a href="page-dummy-classic-sidebar-right.html" class="btn btn-link btn-lg btn-block">or Read More...</a>
							</div>
						</div>
						<!-- End price box -->

					</div> <!-- /.col -->
				</div> <!-- /.row -->

				<!-- <div class="row margin-top-70 margin-auto max-width-800">
					<div class="col-md-12 text-center">
						<p>Duis mattis quam quis quam cursus, a rutrum ante luctus.
							Phasellus porta ornare enim ac euismod. Nulla fringilla
							lectus ac tincidunt viverra a accumsan <a href="#">sapien mollis</a>.</p>
					</div>
				</div>  -->
			</div>
			<!-- End price boxes container -->

		</div> <!-- /.prices-section-inner -->
	</section>
	<!-- End prices section -->


	<!-- =================================
			///// Begin testimonials section /////
			================================== -->
	<section id="testimonials-section" class="bg-dark bg-image-fixed" style="background-image: url(assets/img/misc/misc-4.jpg); background-position: 50% 50%;">

		<!-- Element cover -->
		<span class="cover bg-transparent-7-dark"></span>

		<div class="testimonials-section-inner tt-wrap"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->

			<!-- Begin testimonials carousel
					=================================
					* Use class "tm-hide-image" to hide testimonial image.
					* Use class "tm-center" or "tm-right" to align testimonials.
					-->
			<div class="testimonials-carousel tm-center">

				<!-- Begin tt-heading 
						====================== 
						* Use class "padding-on" to enable heading paddings (useful if you use tt-heading as stand alone element).
						* Use class "text-center" or "text-right" to align tt-heading.
						* Use classes "tt-heading-xs", "tt-heading-sm", "tt-heading-lg", "tt-heading-xlg" or "tt-heading-xxlg" to set tt-heading size.
						-->
				<!-- <div class="tt-heading tt-heading-lg text-center">
							<div class="tt-heading-inner tt-wrap">
								<h1 class="tt-heading-title text-white">Testimonials</h1>
								<div class="tt-heading-subtitle text-gray-3">What customers say</div>
								<hr class="hr-short">
							</div>
						</div> -->
				<!-- End tt-heading -->


				<!-- Begin content carousel (https://owlcarousel2.github.io/OwlCarousel2/)
						====================================================================
						* Use class "nav-outside" for outside nav (requires boxed layout).
						* Use class "nav-outside-top" for outside top nav (requires enough space at the top of the carousel).
						* Use class "nav-bottom-right" for bottom right nav.
						* Use class "nav-rounded" for rounded nav.
						* Use class "nav-light" to enable nav light style.
						* Use class "dots-outside" for outside dots (requires enough space at the bottom of the carousel).
						* Use class "dots-left", "dots-right" or "dots-center-right" to align dots.
						* Use class "dots-rounded" for rounded dots.
						* Use class "owl-mousewheel" to enable mousewheel support.
						* Use class "cursor-grab" to enable cursor grab icon (no effect on links!).
						* Use class "cc-hover-light", "cc-hover-dark" or "cc-hover-zoom" to enable carousel items hover effect.
						* Use class "cc-height-1", "cc-height-2", "cc-height-3", "cc-height-4", "cc-height-5", "cc-height-6" or "cc-height-full" to set carousel height (do not use with data-autoheight="true"!!!).
						* Use class "cc-height-m" to set full height for small screens (do not use with data-autoheight="true"!!!).
						================================================================
						* Available carousel data attributes:
								data-items="5".......................(items visible on desktop)
								data-tablet-landscape="4"............(items visible on mobiles)
								data-tablet-portrait="3".............(items visible on mobiles)
								data-mobile-landscape="2"............(items visible on tablets)
								data-mobile-portrait="1".............(items visible on tablets)
								data-loop="true".....................(true/false)
								data-margin="10".....................(space between items)
								data-center="true"...................(true/false)
								data-start-position="0"..............(item start position)
								data-animate-in="fadeIn".............(fade-in animation)
								data-animate-out="fadeOut"...........(fade-out animation)
								data-mouse-drag="false"..............(true/false)
								data-touch-drag="false"..............(true/false)
								data-autoheight="true"...............(true/false)
								data-autoplay="true".................(true/false)
								data-autoplay-timeout="5000".........(milliseconds)
								data-autoplay-hover-pause="true".....(true/false)
								data-autoplay-speed="800"............(milliseconds)
								data-drag-end-speed="800"............(milliseconds)
								data-nav="true"......................(true/false)
								data-nav-speed="800".................(milliseconds)
								data-dots="false"....................(true/false)
								data-dots-speed="800"................(milliseconds)
						-->
				<div class="owl-carousel cursor-grab nav-outside dots-outside" data-items="1" data-loop="true" data-autoheight="true" data-nav="true" data-nav-speed="500" data-dots-speed="500" data-autoplay="true" data-autoplay-timeout="8000" data-autoplay-speed="500" data-autoplay-hover-pause="true">

					<!-- Begin carousel item 
							========================= -->
					<div class="cc-item">

						<!-- Begin testimonial item -->
						<div class="testimonial-item text-white">
							<div class="tm-image bg-image" style="background-image: url(assets/img/blog/small/avatar/avatar-2.jpg); background-position: 50% 50%;"></div>
							<blockquote>
								<p>"Duis vel ligula non neque varius eleifend quis id elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse lacus dui, pellentesque ut porta et, consequat sit amet."</p>
								<small>Anna Clarkson</small>
							</blockquote>
						</div>
						<!-- End testimonial item -->

					</div>
					<!-- End carousel item -->

					<!-- Begin carousel item 
							========================= -->
					<div class="cc-item">

						<!-- Begin testimonial item -->
						<div class="testimonial-item text-white">
							<div class="tm-image bg-image" style="background-image: url(assets/img/blog/small/avatar/avatar-3.jpg); background-position: 50% 50%;"></div>
							<blockquote>
								<p>"Maecenas sit amet diam iaculis, lobortis tortor sed, bibendum quam. Nam mauris odio, sodales interdum facilisis in, dignissim et massa. In suscipit quam nisi."</p>
								<small>John Smith</small>
							</blockquote>
						</div>
						<!-- End testimonial item -->

					</div>
					<!-- End carousel item -->

					<!-- Begin carousel item 
							========================= -->
					<div class="cc-item">

						<!-- Begin testimonial item -->
						<div class="testimonial-item text-white">
							<div class="tm-image bg-image" style="background-image: url(assets/img/blog/small/avatar/avatar-4.jpg); background-position: 50% 50%;"></div>
							<blockquote>
								<p>"Proin at tincidunt leo. Morbi ut metus sit amet purus molestie sollicitudin. Maecenas convallis est vitae neque feugiat, in accumsan odio vestibulum. Pellentesque sodales fermentum porttitor."</p>
								<small>Jack Paterson</small>
							</blockquote>
						</div>
						<!-- End testimonial item -->

					</div>
					<!-- End carousel item -->

				</div>
				<!-- End content carousel -->

			</div>
			<!-- End testimonials carousel -->

		</div> <!-- /.tt-intro-inner -->
	</section>
	<!-- End testimonials section -->


	<!-- ================================
			///// Begin latest news section /////
			================================= -->
	<section id="latest-news-section">

		<!-- Begin tt-heading 
				====================== 
				* Use class "padding-on" to enable heading paddings (useful if you use tt-heading as stand alone element).
				* Use class "text-center" or "text-right" to align tt-heading.
				* Use classes "tt-heading-xs", "tt-heading-sm", "tt-heading-lg", "tt-heading-xlg" or "tt-heading-xxlg" to set tt-heading size.
				-->
		<div class="tt-heading tt-heading-lg padding-on text-center">
			<div class="tt-heading-inner tt-wrap">
				<h1 class="tt-heading-title">Photographers</h1>

				<hr class="hr-short">
			</div>
		</div>
		<!-- End tt-heading -->

		<div class="latest-news-section-inner tt-wrap"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->

			<!-- Begin latest news carousel
					================================ -->
			<div class="latest-news-carousel">

				<!-- Begin content carousel (https://owlcarousel2.github.io/OwlCarousel2/)
						====================================================================
						* Use class "nav-outside" for outside nav (requires boxed layout).
						* Use class "nav-outside-top" for outside top nav (requires enough space at the top of the carousel).
						* Use class "nav-bottom-right" for bottom right nav.
						* Use class "nav-rounded" for rounded nav.
						* Use class "nav-light" to enable nav light style.
						* Use class "dots-outside" for outside dots (requires enough space at the bottom of the carousel).
						* Use class "dots-left", "dots-right" or "dots-center-right" to align dots.
						* Use class "dots-rounded" for rounded dots.
						* Use class "owl-mousewheel" to enable mousewheel support.
						* Use class "cursor-grab" to enable cursor grab icon (no effect on links!).
						* Use class "cc-hover-light", "cc-hover-dark" or "cc-hover-zoom" to enable carousel items hover effect.
						* Use class "cc-height-1", "cc-height-2", "cc-height-3", "cc-height-4", "cc-height-5", "cc-height-6" or "cc-height-full" to set carousel height (do not use with data-autoheight="true"!!!).
						* Use class "cc-height-m" to set full height for small screens (do not use with data-autoheight="true"!!!).
						================================================================
						* Available carousel data attributes:
								data-items="5".......................(items visible on desktop)
								data-tablet-landscape="4"............(items visible on mobiles)
								data-tablet-portrait="3".............(items visible on mobiles)
								data-mobile-landscape="2"............(items visible on tablets)
								data-mobile-portrait="1".............(items visible on tablets)
								data-loop="true".....................(true/false)
								data-margin="10".....................(space between items)
								data-center="true"...................(true/false)
								data-start-position="0"..............(item start position)
								data-animate-in="fadeIn".............(fade-in animation)
								data-animate-out="fadeOut"...........(fade-out animation)
								data-mouse-drag="false"..............(true/false)
								data-touch-drag="false"..............(true/false)
								data-autoheight="true"...............(true/false)
								data-autoplay="true".................(true/false)
								data-autoplay-timeout="5000".........(milliseconds)
								data-autoplay-hover-pause="true".....(true/false)
								data-autoplay-speed="800"............(milliseconds)
								data-drag-end-speed="800"............(milliseconds)
								data-nav="true"......................(true/false)
								data-nav-speed="800".................(milliseconds)
								data-dots="false"....................(true/false)
								data-dots-speed="800"................(milliseconds)
						-->
				<div class="owl-carousel cursor-grab nav-outside-top" data-items="3" data-margin="30" data-dots="false" data-nav="true" data-nav-speed="500" data-autoplay="true" data-autoplay-timeout="5000" data-autoplay-speed="500" data-autoplay-hover-pause="true" data-tablet-landscape="3" data-tablet-portrait="2" data-mobile-landscape="1" data-mobile-portrait="1">

					<!-- Begin carousel item 
							========================= -->
					<?php
					$qry = mysqli_query($con, "select * from photographer where status=1");
					while ($row = mysqli_fetch_array($qry)) {

					?>
						<div class="cc-item">

							<!-- Begin blog list item -->
							<article class="blog-list-item">

								<!-- Blog list item image -->
								<?php 
                    echo "<a href='photoview.php?x=$row[0]' class='bl-item-image'><img src='../Photographer/images/$row[photo]' style='height: 45vh; width:100vh'></a>";
                    ?>
					

								<!-- Begin blog list item info -->
								<a href="blog-single.html" class="bl-item-title">
								<div class="bl-item-info">


									<h2><?php echo $row['name']; ?></h2>

									<div class="bl-item-meta">
										<span class="published"> Join Date - <?php echo $row['datetime']; ?> </span>

									</div>
									</a>
									<!-- Use data attributes to set text maximum characters or words (example: data-max-characters="120" or data-max-words="40") -->
									<!-- <div class="bl-item-desc" data-max-words="14">Suspendisse imperdiet ante at tortor consequat consectetur. Quisque rhoncus blandit justo praesen congue convallis artula ellis.</div> -->

									<!-- <a href="blog-single.html" class="bl-item-read-more" title="Read More"><span></span></a> -->

									<!-- Begin blog list item attributes -->
									<ul class="bl-item-attr">
										<li>
											<!-- Begin comments count -->

											<!-- End comments count -->
										</li>
										<li>
											<!-- Begin favorite button -->
											<div class="favorite-btn active">
												<div class="fav-inner">

												</div>

											</div>
											<!-- End favorite button -->
										</li>
									</ul>
									<!-- End blog list item attributes -->

								</div>
								<!-- End blog list item info -->

							</article>
							<!-- End blog list item -->

						</div>
					<?php } ?>
					<!-- End carousel item -->

					<!-- Begin carousel item 
							========================= -->
					<!-- End blog list item -->

				</div>
				<!-- End carousel item -->

			</div>
			<!-- End content carousel -->

		</div>
		<!-- End latest news carousel -->

</div> <!-- /.latest-news-section-inner -->
</section>
<!-- End latest news section -->


<!-- ===================================
			///// Begin call to action section /////
			==================================== -->
<section class="call-to-action-section bg-gray-3 margin-top-60">

	<div class="full-cover for-light-style bg-image" style="background-image: url(assets/img/pattern/bg-pattern-2-light.png); background-position: 50% 50%;"></div>
	<div class="full-cover for-dark-style bg-image" style="background-image: url(assets/img/pattern/bg-pattern-2-dark.png); background-position: 50% 50%;"></div>

	<div class="call-to-action-inner tt-wrap"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->
		<div class="row">
			<div class="col-md-12 text-center">

				<!-- Begin tt-heading 
							====================== 
							* Use class "padding-on" to enable heading paddings (useful if you use tt-heading as stand alone element).
							* Use class "text-center" or "text-right" to align tt-heading.
							* Use classes "tt-heading-xs", "tt-heading-sm", "tt-heading-lg", "tt-heading-xlg" or "tt-heading-xxlg" to set tt-heading size.
							-->
				<div class="tt-heading tt-heading-lg text-center">
					<div class="tt-heading-inner tt-wrap">
						<h1 class="tt-heading-title">You Photographer?</h1>
						<div class="tt-heading-subtitle">Interested in working with me?</div>
						<hr class="hr-short">
					</div>
				</div>
				<!-- End tt-heading -->

				<div class="margin-top-30 max-width-1000 margin-auto">
					

					<div class="margin-top-30">
						
						<a href="../Photographer/registation.php" class="btn btn-primary margin-top-5">Let's Work Together!</a>
					</div>
				</div>

			</div> <!-- /.col -->
			 <!-- /.col -->
		</div> <!-- /.row -->
	</div> <!-- /.call-to-action-inner -->
</section>
<!-- End call to action section -->
<?php include_once("fff.php"); ?>

</body>


<!-- Mirrored from demo.themetorium.net/html/sepia/home-landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Feb 2024 06:56:43 GMT -->

</html>