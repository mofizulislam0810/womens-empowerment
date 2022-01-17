<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <li class="current"><a href="dashboard.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
            </li>
            <li class="current"><a href="tutorialform.php"><i class="glyphicon glyphicon-list"></i>
                    Create
                    Tutorial</a></li>
            <li class="current"><a href="postform.php"><i class="glyphicon glyphicon-list"></i>
                    Create
                    Post</a></li>
            <li class="current"><a href="blogform.php"><i class="glyphicon glyphicon-list"></i>
                    Create
                    Blog</a></li>
            <li class="current"><a href="viewtutorial.php"><i class="glyphicon glyphicon-list"></i>
                    View
                    All Tutorial</a></li>
            <li class="current"><a href="viewpost.php"><i class="glyphicon glyphicon-list"></i>
                    View
                    All Post</a></li>
            <li class="current"><a href="viewblog.php"><i class="glyphicon glyphicon-list"></i>
                    View
                    All Blog</a></li>
            <?php  if(isset($_SESSION['admin'])){ ?>
            <li class="current"><a href="viewusers.php"><i class="glyphicon glyphicon-list"></i>
                    View
                    All Users</a></li>
            <li class="current"><a href="makeauth.php"><i class="glyphicon glyphicon-list"></i>
                    Make
                    Admin or Teacher</a></li>
            <?php } ?>
        </ul>
    </div>
</div>