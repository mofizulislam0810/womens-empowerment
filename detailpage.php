<?php 
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['user_id'])){
	header('location: login.php');
} else {
include_once 'dbconnect.php';
include_once 'header.php';
if (isset($_POST['comment'])) {
$post_id=$_POST['id'];
$post_com=$_POST['text'];
$date = date('m-d-y');
$name=$_SESSION['user_name'];
$sql="INSERT INTO comment(date,name,comment,post_id_fk)VALUES('$date','$name','$post_com','$post_id')";
if(mysqli_query($con,$sql)){
		echo "<script>window.open('detailpage.php?id=$post_id','_self')</script>";
		exit();
	}
}
if (isset($_POST['delete'])) {
$post_id=$_POST['del'];
$delete_id = $_POST['dele'];
$delete_query = "delete from comment where id='$delete_id' ";
if(mysqli_query($con,$delete_query)){
		echo "<script>window.open('detailpage.php?id=$post_id','_self')</script>";
		exit();
	}
}
?>
<div class="clearfix"></div>
<div class="movie-main-content">
    <div class="col-md-9 total-news">
        <div class="grids">
            <div class="msingle-grid box">
                <?php 
include("dbconnect.php");
if(isset($_GET['id'])){
$page_id = $_GET['id'];
$select_query = "select * from tutorial where id='$page_id'";
$run_query = mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($run_query)){

	$post_id = $row['id']; 
	$post_title = $row['title'];
	$post_date = $row['date'];
	$post_author = $row['author'];
	$post_image = $row['images'];
	$post_content =$row['content'];
	$type= $row['type'];
?>

                <div class="grid-header">
                    <h3><?php echo $post_title; ?></h3>
                    <ul>
                        <li><span><?php echo $post_author; ?><?php echo "  "?><?php echo $post_date; ?></span></li>
                    </ul>
                </div>
                <div class="singlepage">
                    <video width="792" height="387" controls>
                        <source src="images/<?php echo $post_image; ?>" type="video/mp4">
                        <source src="images/<?php echo $post_image; ?>" type="video/ogg">
                    </video>
                    <br><br>
                    <div class="clearfix"> </div>
                </div>
                <div class="story-review">
                    <?php echo $post_content; ?>
                </div>
                <?php if (isset($_SESSION['user_id'])) { ?><div class="content-form">
                    <h3>Comment</h3>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="id" value="<?php echo $post_id; ?>" />
                        <textarea style="weight:100px; height:50px" placeholder="Text" name="text" required></textarea>
                        <input type="submit" name="comment" value="SUBMIT" />
                    </form>

                </div>
                <?php } ?>

                <?php
include("dbconnect.php");
$query = "select * from comment where post_id_fk='$post_id'"; 
$run = mysqli_query($con,$query);
while($row=mysqli_fetch_array($run)){
	$post_id = $row['id'];
	$post_date = $row['date'];
	$post_name = $row['name'];
	$post_com = $row['comment'];
	$post_id2 = $row['post_id_fk'];
?>
                <div style="width:785px; border:5px solid #cf0000;padding-left:15px;padding-top:10px;margin:10px;">
                    <strong><?php echo $post_name; ?></strong>
                    <h6><?php echo $post_date; ?></h6>
                    <h5><?php echo $post_com; ?></h5>
                </div>

                <?php if (isset($_SESSION['user_id'])) { ?>
                <?php 
if($post_name==$_SESSION['user_name']) {?>
                <div class="content-form">
                    <form style="float:right;" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="del" value="<?php echo $post_id2; ?>" />
                        <input type="hidden" name="dele" value="<?php echo $post_id; ?>" />
                        <input type="submit" name="delete" value="Delete" />
                    </form>
                </div>

                <div class="content-form">
                    <form style="float:right;" method="POST" action="update.php">
                        <input type="hidden" name="del" value="<?php echo $post_id2; ?>" />
                        <input type="hidden" name="dele" value="<?php echo $post_id; ?>" />
                        <input type="submit" name="edit" value="Edit" />
                    </form>
                </div>
                <div class="clearfix"> </div>
                <?php } else { ?>
                <?php } ?>
                <?php } ?> <?php } ?>
                <?php } }?>

            </div>
            <div class="clearfix"> </div>
        </div>
        <br>
    </div>

    <div class="col-md-3 side-bar">
        <?php if (isset($_SESSION['user_id'])) { ?>
        <b><?php if($type==='computer') {?>Computer <?php } else { ?> Handicraft <?php } ?> Tutorial</b>
        <div class="l_g_r">
            <div class="posts">

                <?php 
include("dbconnect.php");
	$query = "select * from tutorial where type='$type'";	
	$edit = mysqli_query($con,$query); 	
	while ($row=mysqli_fetch_array($edit)){
	$post_id= $row['id'];
	$title = $row['title'];
?>
                <h6><a href="detailpage.php?id=<?php echo $post_id; ?>"><?php echo $title; ?></a><?php echo "<br>"; ?>
                    <?php } ?></h6>
            </div>
        </div>
        <?php } ?>
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
    <div class="clearfix"></div>
</div>
<?php include_once 'footer.php';?>
<?php } ?>