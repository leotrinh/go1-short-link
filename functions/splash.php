<!DOCTYPE html>
<html class="full" lang="en">

<head>
    <?php
    $pageName = "Redirecting...";
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
                ?>
            </div>
        </div>
    </div>
    <div class="container animated flipInY">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 style="color: #707070;">
                    <p>You will be redirected <span id="cz"> in <span id="counter">5</span> second(s).</span></p>
                </h2>
            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 text-center">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title newsize" style="font-weight:bolder;">Donation!</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo '' . $ads_info['ad3'] . ''; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title newsize" style="font-weight:bolder;">Sponsor!</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo '' . $ads_info['ad4'] . ''; ?>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <script type="text/javascript">
        function countdown() {
            var i = document.getElementById('counter');
            if (parseInt(i.innerHTML) <= 0) {
                document.getElementById("cz").innerHTML = "Now !";
                location.href = '<?php echo str_replace("'", "", $url); ?>';
            }
            i.innerHTML = parseInt(i.innerHTML) - 1;
        }
        setInterval(function() {
            countdown();
        }, 1000);
    </script>

</body>

</html>