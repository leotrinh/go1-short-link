
<!DOCTYPE html>
<html class="full" lang="en">

    <head>
    <?php
    $pageName = "Redirecting...";
    include "functions/header.php";
    ?>
    </head>

    <body>


    </body>

</html>
<?php
header("Location:".$url, true, 301);
exit();?>