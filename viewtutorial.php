<?php 
session_start();
if(!isset($_SESSION['user_name'])){
header("location: login.php");
}
else if(isset($_SESSION['admin']) || isset($_SESSION['teacher'])){
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
                            <div class="panel-title text-center">View All Tutorial</div>
                        </div>
                        <div class="panel-body">
                            <table cellpadding="0" cellspacing="0" border="1px"
                                class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Videos</th>
                                        <th>Content</th>
                                        <th>Type</th>
                                        <?php if(isset($_SESSION['admin'])) { ?>
                                        <th>Delete</th>
                                        <?php } ?>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <?php 
include("dbconnect.php");
$query = "select * from tutorial";
$run = mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($run)){

	$id = $row['id'];
	$date = $row['date'];
	$author = $row['author'];
	$title = $row['title'];
	$image = $row['images'];
	$content = substr($row['content'],0,100);
    $type = $row['type'];
?>

                                <tbody>
                                    <tr class="odd gradeX">
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $author; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><video width="100" height="50" controls>
                                                <source src="images/<?php echo $image; ?>" type="video/mp4">
                                                <source src="images/<?php echo $image; ?>" type="video/ogg">
                                            </video></td>
                                        <td><?php echo $content; ?></td>
                                        <td><?php echo $type; ?></td>
                                        <?php if(isset($_SESSION['admin'])) { ?>
                                        <td><a href="deletetutorial.php?del=<?php echo $id; ?>">Delete</a></td>
                                        <?php } ?>
                                        <td><a href="edittutorial.php?edit=<?php echo $id; ?>">Edit</a></td>
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