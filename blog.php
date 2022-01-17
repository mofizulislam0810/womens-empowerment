<?php
session_start();
include_once 'dbconnect.php';
include_once 'header.php';
?>
<!-- script for menu -->
<div class="clearfix"></div>
<div class="blog-main-content">
    <div class="col-md-9 total-news">
        <!----start-content----->

        <div class="content">
            <div class="grids">
                <?php 
include("dbconnect.php");
$select_posts = "select * from blog order by 1 DESC LIMIT 0,5";
$run_posts = mysqli_query($con,$select_posts);
while($row=mysqli_fetch_assoc($run_posts)){
	$post_id = $row['id']; 
	$post_title = $row['title'];
	$post_date = $row['date'];
	$post_author = $row['author'];
	$post_image = $row['images'];
	$post_content = substr($row['content'],0,500);
?>
                <div class="grid box">
                    <div class="grid-header">
                        <a class="gotosingle"
                            href="blogdetail.php?id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                        <ul>
                            <li><span>Post by:&nbsp;<a href="#"><?php echo $post_author; ?></a></span></li>
                        </ul>
                    </div>
                    <div class="grid-img-content">
                        <a href="blogdetail.php?id=<?php echo $post_id; ?>"><img src="images/<?php echo $post_image; ?>"
                                class="blog" width="330" height="225" alt="" /></a>
                        <p><?php echo $post_content; ?>...</p>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="clearfix"> </div>

            <div class="clearfix"> </div>

        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php 
require 'footer.php';
?>