<?php 
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
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
        <div class="contact-section-head">
            <h3>User Profile</h3>
        </div>
        <div class="contact-form-bottom">
            <div class="col-md-4 address">

            </div>
            <?php 
include("dbconnect.php");
$member = $_SESSION['user_id'];
$query = "select * from user where id='$member'";
$run = mysqli_query($con,$query);
while($row=mysqli_fetch_array($run)){

	$id = $row['id'];
	$date = $row['date'];
	$fullname = $row['fullname'];
	$email = $row['email'];
?>

            <div class="col-md-4 contact-form">
                <form>
                    <div class="contact-form-row">
                        <div>
                            <span>Name</span>
                            <input type="text" class="text" value="<?php echo $fullname; ?>" disabled>
                        </div>
                        <div>
                            <span>Email</span>
                            <input type="text" class="text" value="<?php echo $email; ?>" disabled>
                        </div>
                        <div>
                            <span>Join Date</span>
                            <input type="text" class="text" value="<?php echo $date; ?>" disabled>
                        </div>
                        <div class="clearfix"> </div>
                        <a href="changename.php?id=<?php echo $id; ?>" class="start">Change Name</a>
                    </div>
                </form>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php require 'footer.php';?>
<?php } ?>