<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include_once 'dbconnect.php';
if(!isset($_SESSION['user_name'])){
    header("location: login.php");
    }
else {
    include_once 'header.php';
?>

<!-- script for menu -->
<div class="clearfix"></div>
<div class="main-content">
    <div class="contact-section">
        <h4>Computer Tutorial</h4>
        <?php if (isset($_SESSION['user_id'])) { ?>
        <div class="l_g_r">
            <div class="posts">

                <?php 
include("dbconnect.php");
	$query = "select * from tutorial where type='computer'";	
	$edit = mysqli_query($con,$query); 	
	while ($row=mysqli_fetch_array($edit)){
	$post_id= $row['id'];
	$title = $row['title'];
?>
                <h6><a href="detailpage.php?id=<?php echo $post_id; ?>"><?php echo $title; ?></a><?php echo "<br>"; ?>
                    <?php } ?></h6>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php include_once 'footer.php';?>
<?php } ?>