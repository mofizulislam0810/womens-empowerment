<?php
session_start();
include_once 'dbconnect.php';
include_once 'header.php';
?>
<!-- script for menu -->
<div class="clearfix"></div>
<div class="main-content">
    <div class="about-section">
        <div class="about-us">
            <div class="col-md-12">
                <h3>ABOUT US</h3>
                <div class="abt_image">
                    <img src="images/ga4.jpg" alt="" />
                </div>
                <h5><strong>WOMENS EMPOWERMENT SYSTEM</strong></h5>
                <p>This project is to develop a tool will help womens to learning about the computer tutorial and the
                    handicraft tutorial. In this system the admin and member can create tutorial about the computer and
                    handicraft. The admin can see all members and user information and all document. But member can see
                    his or her create tutorial and edit or delete it. The main site user can see the members all
                    information like as email, and Skype id. If any user cannot understand any tutorial she can contact
                    by creator with Skype id. Member and admin see the result of the online examination.</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php 
require 'footer.php';
?>