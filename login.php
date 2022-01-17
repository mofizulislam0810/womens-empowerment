<?php
session_start();
include_once 'dbconnect.php';
include_once 'header.php';
//check if form is submitted
if(isset($_SESSION['user_id'])){
	header('location: index.php');
} else {
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM user WHERE email = '" . $email. "' and password = '" . $password . "'");

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['fullname'];
        $_SESSION['user_email'] = $row['email'];
		$user = $row['role'];
		if($user === 'admin'){
			$_SESSION['admin'] = 'admin';
		}
		if($user === 'teacher'){
			$_SESSION['teacher'] = 'teacher';
		}
		if(isset($_SESSION['url'])){
			$url = $_SESSION['url'];
			header("location: $url");
		  }
		 else{
			header("location: index.php");
		  }
    } else {
        $errormsg = "Incorrect Email or Password!!!";
    }	
}
?>

<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                <fieldset>
                    <legend>Login</legend>

                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Your Email" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Your Password" required
                            class="form-control" />
                    </div>

                    <div class="form-group">
                        <input type="submit" name="login" value="Login" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
            New User? <a href="registration.php">Sign Up Here</a>
        </div>
    </div>
</div>

<script src="jss/jquery-1.10.2.js"></script>
<script src="jss/bootstrap.min.js"></script>
<br><br>
<div class="clearfix"></div>
<?php include_once 'footer.php'; }?>