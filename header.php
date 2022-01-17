<html>

<head>
    <title>WOMEN'S EMPOWERMENT</title>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Custom Theme files -->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="The News Reporter Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!--webfont-->

</head>

<body>
    <!-- header-section-starts -->
    <div class="container">
        <div class="news-paper">
            <div class="header">
                <div class="header-left">
                    <div class="logo">
                        <a href="index.php">
                            <h1><span>WOMEN'S EMPOWERMENT</span></h1>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!--navigation-->
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="blog.php">Blogs</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <?php if (isset($_SESSION['user_id'])) { ?>
                                <li><a href="computertutorial.php">Computer Tutorial</a></li>
                                <li><a href="handicrafttutorial.php">Handicraft Tutorial</a></li>
                                <?php if(isset($_SESSION['admin']) || isset($_SESSION['teacher'])) { ?>
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <?php } ?>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span
                                            class="glyphicon glyphicon-user"></span><?php echo $_SESSION['user_name'];?></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="profile.php">Profile</a></li>
                                    </ul>
                                </li>

                                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
                                </li>
                                <?php } else { ?>
                                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                                <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span>SIGN UP</a>
                                </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </nav>