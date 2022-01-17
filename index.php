<?php
session_start();
include_once 'dbconnect.php';
include_once 'header.php';
?>

<!-- script for menu -->
<div class="clearfix"></div>
<div class="main-content">
    <div class="col-md-9 total-news">
        <div class="slider">
            <script src="js/responsiveslides.min.js"></script>
            <script>
            // You can also use "$(window).load(function() {"
            $(function() {
                $("#conference-slider").responsiveSlides({
                    auto: true,
                    manualControls: '#slider3-pager',
                });
            });
            </script>
            <div class="conference-slider">
                <!-- Slideshow 3 -->
                <ul class="conference-rslide" id="conference-slider">
                    <li><img src="images/image1.jpg" alt=""></li>
                    <li><img src="images/image2.jpg" alt=""></li>
                    <li><img src="images/image3.jpg" alt=""></li>
                    <li><img src="images/image4.jpg" alt=""></li>
                </ul>
                <!-- Slideshow 3 Pager -->
                <ul id="slider3-pager">
                    <li><a href="#"><img src="images/image1.jpg" alt=""></a></li>
                    <li><a href="#"><img src="images/image2.jpg" alt=""></a></li>
                    <li><a href="#"><img src="images/image3.jpg" alt=""></a></li>
                    <li><a href="#"><img src="images/image4.jpg" alt=""></a></li>
                </ul>
            </div>
        </div>
        <div class="posts">

            <div class="world-news">
                <div class="main-title-head">
                    <h3>Computer Tutorial</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="world-news-grids">
                    <?php 
include("dbconnect.php");
$select_posts = "select * from tutorial where type='computer' order by 1 DESC LIMIT 0,3";
$run_posts = mysqli_query($con,$select_posts);
while($row=mysqli_fetch_array($run_posts)){
	$post_id = $row['id']; 
	$post_title = $row['title'];
	$post_date = $row['date'];
	$post_author = $row['author'];
	$post_image = $row['images'];
	$post_content = substr($row['content'],0,200);
?>
                    <div class="world-news-grid">
                        <div>
                            <a href="detailpage.php?id=<?php echo $post_id; ?>">
                                <video src="images/<?php echo $post_image; ?>" width="90%" height="20%" alt="" />
                                <a href="detailpage.php?id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                                <p><?php echo $post_content; ?></p>
                        </div>
                        <div>
                            <a href="detailpage.php?id=<?php echo $post_id; ?>">Read More</a>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="latest-articles">
                <div class="main-title-head">
                    <h3>Handicraft Tutorial</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="world-news-grids">

                    <?php 
include("dbconnect.php");
$select_posts = "select * from tutorial where type='handicraft' order by 1 DESC LIMIT 0,3";
$run_posts = mysqli_query($con,$select_posts);
while($row=mysqli_fetch_array($run_posts)){
	$post_id = $row['id']; 
	$post_title = $row['title'];
	$post_date = $row['date'];
	$post_author = $row['author'];
	$post_image = $row['images'];
	$post_content = substr($row['content'],0,200);
?>
                    <div class="world-news-grid">
                        <div>
                            <a href="detailpage.php?id=<?php echo $post_id; ?>">
                                <video src="images/<?php echo $post_image; ?>" width="90%" height="20%" alt="" />
                                <a href="detailpage.php?id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                                <p><?php echo $post_content; ?></p>
                        </div>
                        <div>
                            <a href="detailpage.php?id=<?php echo $post_id; ?>">Read More</a>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="gallery">
                <div class="main-title-head">
                    <h3>Gallery</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="gallery-images">
                    <div class="course_demo1">
                        <ul id="flexiselDemo1">
                            <li>
                                <a href="single.html"><img src="images/ga1.jpg" alt="" /></a>
                            </li>
                            <li>
                                <a href="single.html"><img src="images/ga2.jpg" alt="" /></a>
                            </li>
                            <li>
                                <a href="single.html"><img src="images/ga7.jpg" alt="" /></a>
                            </li>
                            <li>
                                <a href="single.html"><img src="images/ga4.jpg" alt="" /></a>
                            </li>
                        </ul>
                    </div>
                    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
                    <script type="text/javascript">
                    $(window).load(function() {
                        $("#flexiselDemo1").flexisel({
                            visibleItems: 3,
                            animationSpeed: 1000,
                            autoPlay: true,
                            autoPlaySpeed: 3000,
                            pauseOnHover: true,
                            enableResponsiveBreakpoints: true,
                            responsiveBreakpoints: {
                                portrait: {
                                    changePoint: 480,
                                    visibleItems: 2
                                },
                                landscape: {
                                    changePoint: 640,
                                    visibleItems: 2
                                },
                                tablet: {
                                    changePoint: 768,
                                    visibleItems: 3
                                }
                            }
                        });

                    });
                    </script>
                    <script type="text/javascript" src="js/jquery.flexisel.js"></script>
                </div>
                <div class="course_demo1">
                    <ul id="flexiselDemo">
                        <li>
                            <a href="single.html"><img src="images/ga4.jpg" alt="" /></a>
                        </li>
                        <li>
                            <a href="single.html"><img src="images/ga5.jpg" alt="" /></a>
                        </li>
                        <li>
                            <a href="single.html"><img src="images/ga6.jpg" alt="" /></a>
                        </li>
                        <li>
                            <a href="single.html"><img src="images/ga1.jpg" alt="" /></a>
                        </li>
                    </ul>
                </div>
                <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
                <script type="text/javascript">
                $(window).load(function() {
                    $("#flexiselDemo").flexisel({
                        visibleItems: 3,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,
                        pauseOnHover: true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint: 480,
                                visibleItems: 2
                            },
                            landscape: {
                                changePoint: 640,
                                visibleItems: 2
                            },
                            tablet: {
                                changePoint: 768,
                                visibleItems: 3
                            }
                        }
                    });

                });
                </script>
                <script type="text/javascript" src="js/jquery.flexisel.js"></script>

            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<?php require 'popularpost.php'; ?>
<div class="clearfix"></div>
</div>
<?php 
require 'footer.php';
?>