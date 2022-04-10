<!DOCTYPE html>
<html class="full" lang="en">

<head>
    <?php
    $pageName = "Thank you!";
    include "functions/header.php";
    ?>
    <style>
        a {
            color: inherit;
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
                ?>
            </div>
        </div>
    </div>
    <div class="container animated tada">
        <div class="row" style="margin-top:20px">
            <div class="modal-dialog">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title" id="contactLabel"><span class="fa fa-info-circle"></span> Thank You</h4>
                    </div>
                    <form method="post" action="?op=contact" accept-charset="utf-8">
                        <div class="modal-body">
                            <div class="row">
                                <h3 class="text-info" style="text-align: center"> We have received your message </h3>
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
            $("#copy-button").zclip({
                path: "js/ZeroClipboard.swf",
                copy: function() {
                    return $('#urlbox').val();
                },
                beforeCopy: function() {},
                afterCopy: function() {
                    $("#copy-button").html('Copied');
                }
            });
        });
    </script>
</body>

</html>