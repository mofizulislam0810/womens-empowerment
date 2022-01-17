<?php
session_start();
include("dbconnect.php");
include 'header.php';
$error = false;
if (isset($_POST['signup'])) {
    $date = date('m-d-y');
    $fname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpass']);
	$role = 'user';
    $user_query = mysqli_query($con,"select email from user where email='$email'");
	if (mysqli_num_rows($user_query)>0){
		$error = true;
		$e_mail = "Email Already Exit";
	}
    
    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
        $error = true;
        $fname_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
         if(mysqli_query($con, "INSERT INTO user(date,fullname,email,password,role) VALUES( '" .$date. "','" . $fname . "', '" . $email . "', '" . $password . "', '" . $role . "')")) {
            $successmsg = "Successfully Registered!";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
}
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                <fieldset>
                    <legend>Sign Up</legend>

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="fullname" placeholder="Enter First Name" required value=""
                            class="form-control" />
                        <span class="text-danger"><?php if (isset($fname_error)) echo $fname_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Email" required value="" class="form-control" />
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                        <span class="text-danger"><?php if (isset($e_mail)) echo $e_mail; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="pass" placeholder="Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Confirm Password</label>
                        <input type="password" name="cpass" placeholder="Confirm Password" required
                            class="form-control" />
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
            Already Registered? <a href="login.php">Login Here</a>
        </div>
    </div>
</div>
<script src="jss/jquery-1.10.2.js"></script>
<script src="jss/bootstrap.min.js"></script>
<br><br>
<div class="clearfix"></div>
<?php include 'footer.php';?>