<?php 
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['user_name'])){
header("location: login.php");
}
else if(isset($_SESSION['admin']) || isset($_SESSION['teacher'])) {
include("dbconnect.php"); 
include("header.php"); 
$author_name = $_SESSION['user_name'];
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $date = date('m-d-y');
    $content = mysqli_real_escape_string($con,$_POST['content']);
    $post_image= $_FILES['image']['name'];
    $image_tmp= $_FILES['image']['tmp_name'];
    $local_image="images/";
    move_uploaded_file($image_tmp,$local_image.$post_image);
    $insert_query = "insert into blog (date,author,title,images,content) values ('$date','$author_name','$title','$post_image','$content')";
    if(mysqli_query($con,$insert_query)){
    echo "<script>alert('Blog published successfuly')</script>";
    echo "<script>window.open('blogform.php','_self')</script>";
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
                            <div class="panel-title text-center">Create Blog From</div>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Post Author:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" name="author"
                                            placeholder="Author Name" value="<?php echo $_SESSION['user_name']; ?>"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" name="title"
                                            placeholder="Title" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">File input</label>
                                    <div class="col-md-10">
                                        <input type="file" class="btn btn-default" id="exampleInputFile1" name="image"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Post Content:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" placeholder="Textarea" name="content" rows="3"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <br><br>
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
<?php } else { 
    header("location: index.php");
    }
?>