<?php
include_once("hhh.php");
include_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
</head>

<body>
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
									<video src="<?php echo "../Photographer/video/$row[video]"; ?>" controls autoplay muted  width="345" alt=""></video>
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
						<!-- End isotope pagination -->

					</div>
					<!-- End isotope -->

				</div> <!-- /.isotope-wrap -->
		</section>
	</section>
	
</body>

</html>

<?php
include_once("fff.php");
?>