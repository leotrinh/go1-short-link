<?php
include "functions/database.php";

$data = $db->query("SELECT * FROM settings");
$info = $db->fetch_array($data);
?>
<!DOCTYPE html>
<html class="full" lang="en">

<head>
    <?php
    $pageName = "About Us";
    include "functions/header.php";
    ?>
</head>

<body>


    <?php
    include "functions/menu.php";
    ?>
    <div class="container">
        <div class="row logo">
            <div class="col-lg-12" style="text-align:center">
                <?php
                include "functions/logo.php";
                include "functions/darkmode.php";
                ?>
            </div>
        </div>
    </div>
    <div class="container  animated fadeIn">

        <div class="row" style="margin-top: -25px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="myModalLabel">About Us</h2>
                    </div>
                    <div class="modal-body" style="min-height:10%; max-height:350px; overflow-y:scroll; overflow-x:none; position:relative;">
                        <p><strong>Whom we are?</strong></p>
                        <p style="margin-left: 25px">We are Go1 people.</p>
                        <p><strong>Want to find more?</strong></p>
                        <p style="margin-left: 25px">Check out <a href="https://go1.to">GO1.TO</a> </p>
                    </div>

                </div><!-- /.modal-content -->
            </div>
        </div>


    </div>
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>