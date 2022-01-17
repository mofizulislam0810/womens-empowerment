<?php 
session_start();
if(!isset($_SESSION['user_name'])){
header("location: login.php");
}
else if(isset($_SESSION['admin'])){
include("dbconnect.php"); 
include("header.php"); 
$author_name = $_SESSION['user_name'];
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $user_email = $_SESSION['user_email'];
    $type = strtolower($_POST['select']);
    $query = mysqli_query($con,"SELECT * FROM user where email='$user_email'");
    if($row = mysqli_fetch_assoc($query)){
        $role = $row['role'];
        if($role=='admin'){
            mysqli_query($con,"UPDATE user SET role='$type' WHERE email='$email'");
            echo "<script>alert('Update Successfully')</script>";
		    echo "<script>window.open('viewusers.php','_self')</script>";
        }
        else{
            echo "<script>alert('You have no permission for this.')</script>";
            echo "<script>window.open('makeauth.php','_self')</script>";
        }
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
                            <div class="panel-title text-center">Make Admin Or Teacher From</div>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="select-1">Select</label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="select-1" name="select">
                                            <option></option>
                                            <option>Admin</option>
                                            <option>Teacher</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" name="email"
                                            placeholder="Please enter a email" required>
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