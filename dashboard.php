<?php 
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['user_name'])){
header("location: login.php");
}
else if(isset($_SESSION['admin']) || isset($_SESSION['teacher'])){
	include_once 'header.php';
?>
<div class="page-content">
    <div class="row">
        <?php include 'dashboardnav.php';?>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12 panel-warning">
                    <div class="content-box-header panel-heading">
                        <div class="panel-title ">Women's Empowerment System</div>
                    </div>
                    <div class="content-box-large box-with-header">
                        This project is to develop a tool will help women's to learning about the computer tutorial
                        and the handicraft tutorial. Here there are three types of users like admin, teacher and user.
                        In this system the admin and teacher can create tutorial about the computer and handicraft. The
                        admin can see all information and all document. The main site user can see tutorial after
                        registration.
                        <br /><br />
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