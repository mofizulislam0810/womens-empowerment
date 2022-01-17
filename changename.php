<?php 
session_start();
if(!isset($_SESSION['user_name'])){
header("location: login.php");
}
else {
	require 'header.php';
?>

<!-- script for menu -->
<div class="clearfix"></div>
<div class="main-content">
    <div class="contact-section">
        <div class="contact-section-head">
            <h3>Change Name</h3>
        </div>
        <div class="contact-form-bottom">
            <div class="col-md-4 address">

            </div>
            <?php
 include("dbconnect.php");
	if(isset($_POST['submit'])){
	$update_id = $_GET['edit_form'];
	$name = $_POST['fullname'];
	$pass = $_POST['pass'];
	$query = "select * from user where id='$update_id'";
	$edit = mysqli_query($con,$query); 
	while ($row=mysqli_fetch_array($edit)){
	$password = $row['password'];
    if($password==$pass){
	 $update_query = "update user set fullname='$name' where id='$update_id'";
		if(mysqli_query($con,$update_query)){
		echo "<script>alert('Name Change Successfully. Please login again!!')</script>";
		echo "<script>window.open('logout.php','_self')</script>";
		exit();
		}
	}
	if($password==$pass){
	echo "<script>alert('Password Doesn't Match')</script>";
	echo "<script>window.open('changename.php','_self')</script>";
		exit();	
		}
	}
}
?>
            <?php 
include("dbconnect.php");
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$query = "select * from user where id='$id'";	
	$edit = mysqli_query($con,$query); 	
	while ($row=mysqli_fetch_array($edit)){
	$id = $row['id'];
	$date = $row['date'];
	$name = $row['fullname'];
	}
}
?>
            <div class="col-md-4 contact-form">
                <form method="POST" action="changename.php?edit_form=<?php echo $id; ?>">
                    <div class="contact-form-row">
                        <div>
                            <span>FullName</span>
                            <input type="text" class="text" name="fullname" value="<?php echo $name; ?>">
                        </div>

                        <div>
                            <span>Password</span>
                            <input type="password" class="form-control" name="pass" required>
                        </div>
                        <input type="submit" name="submit" value="Submit" />
                        <div class="clearfix"> </div>

                    </div>
                </form>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php require 'footer.php';?>
<?php } ?>