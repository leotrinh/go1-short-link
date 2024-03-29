﻿<?php
include "functions/database.php";
include "admin/functions/time.php";

$data = $db->query("SELECT * FROM settings");
$info = $db->fetch_array($data);

$shr = $db->escape_value($_GET['id']);

$sql = $db->query("SELECT URL, date, hits, id, pass, last_visit FROM links WHERE BINARY link = '$shr'");
$sql = $db->fetch_array($sql);
$url = $sql["URL"];
$date = $sql["date"];
$hits = $sql["hits"];
$id = $sql["id"];
$pass = $sql["pass"];
$last_visit = $sql["last_visit"];

if ($url == '') {
    $error_msg = "Link you followed is not found";
    include "functions/error.php"; //error page
    $db->close_connection();
    exit;
} else {
    $myweb = $info['URL'];
    $created_link = $myweb . '/' . $shr;
?>
    <!DOCTYPE html>
    <html class="full" lang="en">
    <!-- The full page image background will only work if the html has the custom class set to it! Don't delete it! -->

    <head>
        <?php
        $pageName = "URL Stats";
        include "functions/header.php";
        ?>
        <style>
            a {
                color: inherit;
            }

            .input-group span {
                box-shadow: none;
            }
        </style>
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
        <div class="container animated fadeIn">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="input-group">
                    <input id="urlbox" class="form-control Url-field" name="url" value="<?php echo $created_link; ?>" type="text">
                    <span class="input-group-btn">
                        <button class="btn btn-small btn-success Copy-btn col-lg-pull-12" type="copy" id="copy-button">Copy</button>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 QR colored rounded flex-col">
                    <div class="col-lg-12">
                        <h2 class="text-center"> QR Code</h2>
                    </div>
                    <div class="col-lg-12"><img alt="QR Code" src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=<?php echo $created_link; ?>" class="size center-block" /></div>
                    <hr>
                    <div class="col-lg-12  text-center">
                        <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $created_link; ?>"><i class="fab fa-facebook-f fa-3x fb anim "></i></a>
                        <a target="_blank" href="https://twitter.com/share?url=<?php echo $created_link; ?>"><i class="fab fa-twitter fa-3x twit anim "></i></a>
                        <a target="_blank" href="https://plus.google.com/share?url=<?php echo $created_link; ?>"> <i class="fab fa-google-plus fa-3x gplus anim"></i></a>
                        <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo $created_link; ?>"><i class="fab fa-pinterest fa-3x pin anim"></i></a>

                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 bg-primary rounded shadow flex-col">
                    <div class="col-lg-12">
                        <h2 class="text-center"><strong>Total Hits</strong></h2>
                        <h3 class="text-center"><?php echo $hits; ?></h3>
                        <hr>
                        <h2 class="text-center"><strong>Last Visit</strong></h2>
                        <h3 class="text-center" title="<?php echo $last_visit; ?>"><?php echo time_ago($last_visit); ?></h3>
                        <hr>
                        <h2 class="text-center col-lg-12"><strong>Date Created</strong></h2>
                        <h3 class="text-center col-lg-12" title="<?php echo $date; ?>"><?php echo date('d M Y', strtotime($date)); ?></h3>
                    </div>
                </div>
            </div>
        </div>
        </div>


        </div>


        <!-- JavaScript -->
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/jquery.zclip.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#copy-button").click(function() {
                    $(this).html("Copied!");
                    $("#urlbox").select();
                    document.execCommand("copy");
                });
            });
        </script>


    </body>

    </html>
<?php
}
$db->close_connection();
?>