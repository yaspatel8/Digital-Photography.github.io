<?php 
    include_once("hhh.php");
    include_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographer</title>
</head>
<body>
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
        <div class="owl-carousel cursor-grab nav-outside-top" data-items="3" data-margin="30"  data-dots="false" data-nav="true" data-nav-speed="500" data-autoplay="true" data-autoplay-timeout="5000" data-autoplay-speed="500" data-autoplay-hover-pause="true" data-tablet-landscape="3" data-tablet-portrait="2" data-mobile-landscape="1" data-mobile-portrait="1">

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
            <?php } ?>x`x`

        </div>
        <!-- End content carousel -->

    </div>
    <!-- End latest news carousel -->

</div> <!-- /.latest-news-section-inner -->
</section>

</body>
</html>
<?php 
    include_once("fff.php");
?>