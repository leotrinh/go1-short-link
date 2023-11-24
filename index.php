<?php
if (!(include "functions/database.php")) {
    echo "<a href='install/index.html'>Please Install the script first or make sure it is installed correctly.</a>";
    exit;
}
include "functions/count.php";

$data = $db->query("SELECT * FROM settings");
$info = $db->fetch_array($data);

$ads = $db->query("SELECT * FROM ads");
$ads_info = $db->fetch_array($ads);
session_start();

$_SESSION["allow"] = true;
?>
<!DOCTYPE html>
<html class="full" lang="en">

<head>
    <?php
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
    <div class="container animated fadeIn" style="max-width: 950px;">
        <form action="create.php" method="POST" enctype="multipart/form-data">


            <div class="row" style='margin-top:20px'>
                <div class="col-lg-12">
                    <div class="input-group">
                        <input id="urlbox" class="form-control cz-shorten-input" name="longurl" value="" placeholder="Bỏ link vào đây" type="text" data-validation-error-msg=" ">
                        <span class="input-group-btn">
                            <button class="btn btn-large btn-primary cz-shorten-btn" type="submit" id="submit">Shorten!</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 8px;">
                <div class="col-lg-6">
                    <div class="input-group" style="margin-top: 2px;">
                        <span class="input-group-addon"><?php echo $info['URL']; ?>/</span>
                        <input type="text" id="cust" data-validation="alphanumeric" data-validation-allowing="-_" data-validation-optional="true" data-validation-error-msg=" " name="cust" class=" span5 form-control" placeholder="Rút gọn (tùy chọn)">
                    </div>
                </div>
                <div class="col-lg-6" style="margin-top: 2px;">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="text" data-validation="alphanumeric" data-validation-allowing="-_" data-validation-optional="true" data-validation-error-msg=" " id="pass" name="pass" class="form-control" placeholder="Mật khẩu (tùy chọn)">
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-lg-12" style="text-align: center; margin-top: 20px;">
                <?php echo '' . $ads_info['ad1'] . ''; ?>
            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-4 text-center">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2 class="newsize" style="font-weight:bolder;"> Tổng số lượt truy cập </h2>
                        <h2 class="newsize" style="letter-spacing:1px;"><?php echo $num_rows3; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2 class="newsize" style="font-weight:bolder;"> Tổng số Link </h2>
                        <h2 class="newsize" style="letter-spacing:1px;"><?php echo $num_rows1; ?></h2>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2 class="newsize" style="font-weight:bolder;"> Link tạo hôm nay </h2>
                        <h2 class="newsize" style="letter-spacing:1px;"><?php echo $num_rows2; ?></h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.form-validator.min.js"></script>
    <script>
        $.validate({
            modules: 'security'
        });
    </script>


</body>

</html>
<?php $db->close_connection(); ?>