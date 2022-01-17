<div class="col-md-3 side-bar">
    <div class="popular">
        <div class="main-title-head">
            <h5>POPULAR</h5>
            <div class="clearfix"></div>
        </div>
        <marquee height="463" scrolldelay="200" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
            <?php 
include("dbconnect.php");
$select_posts = "select * from post order by 1 DESC LIMIT 0,6";
$run_posts = mysqli_query($con,$select_posts);
while($row=mysqli_fetch_assoc($run_posts)){
	$post_id = $row['id']; 
	$post_title = substr($row['title'],0,100);
	$post_date = $row['date'];
	$post_author = $row['author'];
	$post_image = $row['images'];
	$post_content = substr($row['content'],0,200);
?>
            <div class="popular-news">

                <i><?php echo $post_date; ?> </i>
                <p><?php echo $post_title; ?> <a href="popularpostdetail.php?id=<?php echo $post_id; ?>"
                        style="color:#cf0000;">Read More</a></p>
                <div class="popular-grid">
                </div>
                <?php } ?>

            </div>
        </marquee>
    </div>
    <div class="clearfix"></div>

    <div class="clearfix"></div>
    <div class="subscribe-now">
        <div class="discount">
            <a href="#">
                <div class="save">
                    <p>Save</p>
                    <p>upto</p>
                </div>
                <div class="percent">
                    <h2>50%</h2>
                </div>
                <div class="clearfix"></div>
        </div>
        <h3 class="sn">subscribe now</h3>
        </a>
    </div>
    <div class="clearfix"></div>
    <div class="popular">
        <div class="main-title-head">
            <br><br>
            <h5>CALENDAR</h5>
            <div class="clearfix"></div>
        </div>
        <div class="popular-news">
            <div>
                <div class="clearfix"></div>
                <link rel="stylesheet" href="caleandar/css/theme1.css" />
                <div id="caleandar"></div>
                <script type="text/javascript" src="caleandar/js/caleandar.js"></script>
                <script type="text/javascript" src="caleandar/js/demo.js"></script>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>