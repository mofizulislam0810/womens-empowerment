<?php 
session_start();
include("dbconnect.php");
if(!isset($_SESSION['user_name'])){
	header("location: login.php");
	}
else if(isset($_SESSION['admin']) || isset($_SESSION['teacher'])){
if(isset($_GET['del'])){
	$delete_id = $_GET['del'];
	$delete_query = "delete from post where id='$delete_id' ";
	if(mysqli_query($con,$delete_query)){
	echo "<script>alert('Post Has been Deleted')</script>";
	echo "<script>window.open('viewpost.php','_self')</script>";
	}
}
}else {
	header("location: index.php");
}
?>