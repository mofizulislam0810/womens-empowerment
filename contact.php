<?php
session_start();
include_once 'dbconnect.php';
include_once 'header.php';
?>
<!-- script for menu -->
<div class="clearfix"></div>
<div class="main-content">
    <div class="contact-section">
        <div class="contact-section-head">
            <h3>Contact us</h3>
        </div>
        <div class="contact-form-bottom">
            <div class="col-md-4 address">
                <address>
                    <h5>Address:</h5>
                    <p>Himalaya Company</p>
                    <p>77 Mass. Ave., E14/E15</p>
                    <p class="bottom">Cambridge, MA 02139-4307 USA</p>
                    <h5>Phone:</h5>
                    <p>615.987.1234</p>
                </address>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php 
require 'footer.php';
?>