<?php 
session_start();
if(!isset($_SESSION['user_name'])){
header("location: login.php");
}
else if(isset($_SESSION['admin'])){
include("dbconnect.php"); 
include("header.php"); 
?>
<div class="page-content">
    <div class="row">
        <?php include 'dashboardnav.php';?>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12 panel-warning">
                    <div class="content-box-large">
                        <div class="panel-heading">
                            <div class="panel-title text-center">View All Users</div>
                        </div>
                        <div class="panel-body">
                            <table cellpadding="0" cellspacing="0" border="1px"
                                class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>FullName</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <?php 
include("dbconnect.php");
$query = "select * from user";
$run = mysqli_query($con,$query);
while($row=mysqli_fetch_array($run)){

	$id = $row['id'];
	$date = $row['date'];
	$fullname = $row['fullname'];
	$email = $row['email'];
	$password = $row['password'];
    $role = $row['role']
?>

                                <tbody>
                                    <tr class="odd gradeX">
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $fullname; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $password; ?></td>
                                        <td><?php echo $role;?></td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>
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
} ?>