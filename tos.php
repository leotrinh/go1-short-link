<?php
include "functions/database.php";

$data = $db->query("SELECT * FROM settings");
$info = $db->fetch_array($data);
?>
<!DOCTYPE html>
<html class="full" lang="en">

<head>
    <?php
    $pageName = "Terms";
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
                        <h2 class="modal-title" id="myModalLabel">Terms &amp; Conditions</h2>
                    </div>
                    <div class="modal-body" style="min-height:10%; max-height:350px; overflow-y:scroll; overflow-x:none; position:relative;">
                        <p>Do not spam the website</p>
                        <p>Do not short virus, malware links</p>
                        <p>Do not short non legal links</p>
                        <a href='<?php echo $info["URL"]; ?>' target="_blank"> <?php echo $info["name"]; ?> </a>
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
<?php $db->close_connection(); ?>