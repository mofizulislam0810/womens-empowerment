 <?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['user_id'])){
	header('location: login.php');
} else {
include_once 'dbconnect.php';
include_once 'header.php';
if(isset($_POST['comment'])){
	$update_id = $_GET['edit_form'];
	$post_content2 = $_POST['del'];	
	  $post_content1 = $_POST['text'];		
		$update_query = "update comment set comment='$post_content1' where id='$update_id'";
		if(mysqli_query($con,$update_query)){
		echo "<script>window.open('detailpage.php?id=$post_content2','_self')</script>";
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
if(isset($_POST['edit'])){
$post_id = $_POST['del'];
$select_query = "select * from tutorial where id='$post_id'";
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
                         <li><span><?php echo $post_author; ?><?php echo "  "?><?php echo $post_date; ?></span>
                         </li>
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
                 <?php 
include("dbconnect.php");
if(isset($_POST['edit'])){
	$delete_id=$_POST['dele'];
    $post_id = $_POST['del'];
	$edit_query = "select * from comment where id='$delete_id'";	
	$run_edit = mysqli_query($con,$edit_query); 	
	while ($edit_row=mysqli_fetch_array($run_edit)){
		$post_id = $edit_row['id'];
		$post_name = $edit_row['name'];
		$post_con = $edit_row['comment'];
		$post_id2 = $edit_row['post_id_fk'];
	}
}
?>
                 <div class="content-form">
                     <h3>Comment</h3>
                     <form method="POST" action="update.php?edit_form=<?php echo $post_id; ?>">
                         <p><?php echo $post_name; ?></P>
                         <textarea style="weight:100px; height:50px" placeholder="Text" name="text"
                             required><?php echo $post_con; ?></textarea>
                         <input type="hidden" name="del" value="<?php echo $post_id2; ?>" />
                         <input type="submit" name="comment" value="SUBMIT" />
                     </form>
                 </div>
             </div><?php } }?>
         </div>
         <div class="clearfix"> </div>
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
 <?php include 'footer.php';?>
 <?php } ?>