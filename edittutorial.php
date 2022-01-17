<?php 
session_start();
if(!isset($_SESSION['user_name'])){
header("location: login.php");
}
else if(isset($_SESSION['admin']) || isset($_SESSION['teacher'])){
include("dbconnect.php"); 
include("header.php"); 
if(isset($_POST['update'])){
	$update_id = $_GET['edit_form'];
	$post_title1 = $_POST['title'];
	  $post_date1 = date('m-d-y');
	  $post_content1 = mysqli_real_escape_string($con,$_POST['content']);
	  $post_image1= $_FILES['image']['name'];
	  $image_tmp= $_FILES['image']['tmp_name'];
	  $local_image="images/";
	 move_uploaded_file($image_tmp,$local_image.$post_image1);
	  $update_query = "update tutorial set title='$post_title1',date='$post_date1',images='$post_image1',content='$post_content1' where id='$update_id'";
		if(mysqli_query($con,$update_query)){
		echo "<script>alert('Tutorial Update Successfully')</script>";
		echo "<script>window.open('viewtutorial.php','_self')</script>";
		exit();
	}
	}
?>
<div class="page-content">
    <div class="row">
        <?php include 'dashboardnav.php';?>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12 panel-warning">
                    <div class="content-box-large">
                        <div class="panel-heading">
                            <?php 
include("dbconnect.php");
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$query = "select * from tutorial where id='$id'";	
	$edit = mysqli_query($con,$query); 	
	while ($row=mysqli_fetch_array($edit)){
	$id = $row['id'];
	$date = $row['date'];
	$title = $row['title'];
	$author = $row['author'];
	$image = $row['images'];
	$content = $row['content'];
    $type = $row['type'];
	}
}
?>
                            <div class="panel-title text-center">Edit Tutorial From</div>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="edittutorial.php?edit_form=<?php echo $id; ?>"
                                enctype="multipart/form-data">
                                <div class="form-group"><br>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tutorial Author:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" name="author"
                                            placeholder="Author Name" value="<?php echo $author; ?>" disabled>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group"><br>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" name="title"
                                            value="<?php echo $title; ?>" required>
                                    </div>
                                </div>

                                <br><br>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">File input</label>
                                    <div class="col-md-10">
                                        <input type="file" class="btn btn-default" id="exampleInputFile1" name="image"
                                            required>
                                        <video width="100" height="50" controls>
                                            <source src="images/<?php echo $image; ?>" type="video/mp4">
                                            <source src="images/<?php echo $image; ?>" type="video/ogg">
                                        </video>
                                        <br><br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Tutorial Content:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" placeholder="Textarea" name="content" rows="3"
                                            required><?php echo $content;?></textarea>
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Tutorial Type:</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" placeholder="Tutorial type" name="content" rows="3"
                                            value="<?php echo $type; ?>" disabled>
                                        <br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10"><br>
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
<?php }else {
	header("location: index.php");
} ?>