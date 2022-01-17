<?php
session_start();
include_once 'dbconnect.php';
include_once 'header.php';
?>

<div class="clearfix"></div>
<div class="movie-main-content">
    <div class="col-md-9 total-news">

        <div class="grids">
            <div class="msingle-grid box">
                <?php 
if(isset($_GET['id'])){
$page_id = $_GET['id'];

$select_query = "select * from blog where id='$page_id'";
$run_query = mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($run_query)){
	$post_id = $row['id']; 
	$post_title = $row['title'];
	$post_date = $row['date'];
	$post_author = $row['author'];
	$post_image = $row['images'];
	$post_content =$row['content'];
?>

                <div class="grid-header">
                    <h3><?php echo $post_title; ?></h3>
                    <ul>
                        <li><span><?php echo $post_author; ?><?php echo "  "?><?php echo $post_date; ?></span></li>
                    </ul>
                </div>
                <div class="singlepage">
                    <img src="images/<?php echo $post_image; ?>" width="792" height="387" />

                    <br><br>
                    <div class="clearfix"> </div>
                </div>
                <div class="story-review">
                    <?php echo $post_content; ?>
                </div>
                <?php }}?>
            </div>
            <div class="clearfix"> </div>
        </div>
        <br>
    </div>
    <?php require 'popularpost.php'; ?>
    <div class="clearfix"></div>
</div>
<?php
require 'footer.php';
?>