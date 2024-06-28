<?php
include_once("hhh.php");
include_once("connection.php");


?>

<!-- *************************************
		*********** Begin body content *********** 
		************************************** -->
<div id="body-content">


	<!-- ========================
			///// Begin page header /////
			=============================
			* Use classes "ph-xs", "ph-sm", "ph-lg" or "ph-xlg" to set page header size.
			* Use class "ph-center" or "ph-right" to align page header caption.
			-->
	<section id="page-header">

		<!-- Begin page header image 
				============================= 
				* Use class "parallax-bg-1" up to "parallax-bg-6" to enable background image parallax effect.
				* Use class "fade-out-scroll-3" to enable fade out effect if page scroll.
				* Use class "hide-ph-image" to hide page header image without removing the code.
				-->
		<div class="page-header-image parallax-bg-3 bg-image" style="background-image: url(assets/img/misc/page-header-bg-18.jpg);">

			<!-- Element cover 
					===================
					* You can use prepared background transparent classes depends on brightness of your page header image. More info: file "helper.css".
					-->
			<div class="cover bg-transparent-5-dark"></div>

		</div>
		<!-- End page header image -->

		<!-- Begin page header inner -->
		<div class="page-header-inner tt-wrap">

			<!-- Begin page header caption 
					===============================
					* Use classes "ph-caption-xs", "ph-caption-sm", "ph-caption-lg" or "ph-caption-xlg" to set page header size.
					* Use class "parallax-1" up to "parallax-6" to enable parallax effect.
					* Use class "fade-out-scroll-1" up to "fade-out-scroll-6" to enable fade out effect if page scroll.
					-->
			<div class="page-header-caption ph-caption-lg parallax-4 fade-out-scroll-3">
				<h1 class="page-header-title">FAQ - Frequently Asked Questions</h1>
				<hr class="hr-short">
				<!-- <div class="page-header-description">
							<p>A Collection Of Common Questions And Answers.</p>
						</div> -->

			</div>
			<!-- End page header caption -->

		</div>
		<!-- End page header inner -->

	</section>
	<!-- End page header -->


	<!-- ========================
			///// Begin faq section /////
			========================= -->
	<section id="faq-section">
		<div class="faq-section-inner tt-wrap"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->

			<div class="row">


				<div class="col-md-12 ">

					<!-- Begin accordion 
							===================== -->
					<div class="panel-group accordion-wrap" id="accordion-76845678" role="tablist" aria-multiselectable="true">

						<!-- Begin tt-heading 
								====================== 
								* Use class "padding-on" to enable heading paddings (useful if you use tt-heading as stand alone element).
								* Use class "text-center" or "text-right" to align tt-heading.
								* Use classes "tt-heading-xs", "tt-heading-sm", "tt-heading-lg", "tt-heading-xlg" or "tt-heading-xxlg" to set tt-heading size.
								-->

						<div class="tt-heading tt-heading-sm margin-bottom-50">
							<div class="tt-heading-inner">
								<h1 class="tt-heading-title">General Questions:</h1>
								<!-- <div class="tt-heading-subtitle">Subtitle Here</div> -->
								<hr class="hr-short">
							</div> <!-- /.tt-heading-inner -->
						</div>

						<!-- End tt-heading -->
						



						<?php
						$qry = mysqli_query($con, "select * from faq");
						while ($row = mysqli_fetch_array($qry)) {
						?>
						<div class="panel panel-default no-border">
							<div class="panel-heading" role="tab" id="acc-76845678-head-3">
								<h4 class="panel-title">
									<a class="collapsed bg-gray-2" role="button" data-toggle="collapse" data-parent="#accordion-76845678" href="#acc-76845678-collapse-3" aria-expanded="false" aria-controls="acc-76845678-collapse-3"><span class="acc-arrow"><i class="fas fa-chevron-up"></i></span>
									<?php echo "$row[que]"; ?>
									</a>
								</h4>
							</div>
							<div id="acc-76845678-collapse-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="acc-76845678-head-3">
								<div class="panel-body no-border-top">
								<?php echo "$row[ans]"; ?>
								</div>
							</div>
						</div>
						<?php } ?>

						<div class="panel panel-default no-border">
							<div class="panel-heading" role="tab" id="acc-76845678-head-4">
								<h4 class="panel-title">
									<a class="collapsed bg-gray-2" role="button" data-toggle="collapse" data-parent="#accordion-76845678" href="#acc-76845678-collapse-4" aria-expanded="false" aria-controls="acc-76845678-collapse-4"><span class="acc-arrow"><i class="fas fa-chevron-up"></i></span>
										Do you have an assistant?
									</a>
								</h4>
							</div>
							<div id="acc-76845678-collapse-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="acc-76845678-head-4">
								<div class="panel-body no-border-top">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
								</div>
							</div>
						</div>

						<div class="panel panel-default no-border">
							<div class="panel-heading" role="tab" id="acc-76845678-head-5">
								<h4 class="panel-title">
									<a class="collapsed bg-gray-2" role="button" data-toggle="collapse" data-parent="#accordion-76845678" href="#acc-76845678-collapse-5" aria-expanded="false" aria-controls="acc-76845678-collapse-5"><span class="acc-arrow"><i class="fas fa-chevron-up"></i></span>
										Do you also provide video services?
									</a>
								</h4>
							</div>
							<div id="acc-76845678-collapse-5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="acc-76845678-head-5">
								<div class="panel-body no-border-top">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
								</div>
							</div>
						</div>

						<div class="panel panel-default no-border">
							<div class="panel-heading" role="tab" id="acc-76845678-head-6">
								<h4 class="panel-title">
									<a class="collapsed bg-gray-2" role="button" data-toggle="collapse" data-parent="#accordion-76845678" href="#acc-76845678-collapse-6" aria-expanded="false" aria-controls="acc-76845678-collapse-6"><span class="acc-arrow"><i class="fas fa-chevron-up"></i></span>
										Do you have past clients we can speak to as references?
									</a>
								</h4>
							</div>
							<div id="acc-76845678-collapse-6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="acc-76845678-head-6">
								<div class="panel-body no-border-top">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
								</div>
							</div>
						</div>


						<!-- Begin tt-heading 
								====================== 
								* Use class "padding-on" to enable heading paddings (useful if you use tt-heading as stand alone element).
								* Use class "text-center" or "text-right" to align tt-heading.
								* Use classes "tt-heading-xs", "tt-heading-sm", "tt-heading-lg", "tt-heading-xlg" or "tt-heading-xxlg" to set tt-heading size.
								-->


					</div> <!-- /.col -->
				</div> <!-- /.row -->

			</div> <!-- /.faq-section-inner -->
	</section>
	<!-- End faq section -->

	<!-- ================================
			///// Begin latest work cection /////
			================================= -->
	<!-- End latest work cection -->


	<!-- ===========================
			///// Begin footer section /////
			================================
			* Use class "footer-dark" to enable dark footer.
			* Use class "no-margin-top" if needed. 
			-->
	<?php
	include_once("fff.php");
	?>