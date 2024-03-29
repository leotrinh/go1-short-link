﻿<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();

if (!isset($_SESSION["allow"])) {
    header("Location: ./404");
    die();
}

session_destroy();

include "functions/random.php";
include "functions/database.php";

$data = $db->query("SELECT * FROM settings");
$info = $db->fetch_array($data);
$url = $db->escape_value(implode("", explode(" ",trim($_POST['longurl']))));
$verify = substr( $url, 0, 4 ) === "http" ? 1 : 0;
$cust = $db->escape_value(trim($_POST['cust']));
$pass = $db->escape_value($_POST['pass']);
$myweb = $info['URL'];

$spam = array("admin", "contact", "tos", "about", "api-about","404");

if (in_array($cust, $spam))
  {
    $error_msg = "Your Custom is marked as spam"; //error message
    include "functions/error.php"; //error page
	} else {


if (!($verify)) {
    $error_msg = "Invalid URL"; //error message
    include "functions/error.php"; //error page
    exit();
}
if (ctype_space($url) OR $url == '') {
    $error_msg = "Your URL is blank"; //error message
    include "functions/error.php"; //error page
    exit();
}
$chk_rand = $db->query("SELECT link FROM links WHERE BINARY link = '$rand'");
if ($db->num_rows($chk_rand) == 0) {
    $nrand = $rand;
} else {
    $nrand = $rand2;
} // checking the generated random links

$chk_cust = $db->query("SELECT link FROM links WHERE BINARY link = '$cust'");
if ($db->num_rows($chk_cust) == !0) {
    $error_msg = "Your Selected custom link is duplicated"; //error message
    include "functions/error.php"; //error page
    exit();
}

if (ctype_space($cust) OR $cust == '') {
    $rand1 = $nrand;
    $is_cust = 0;
} else {
    $rand1 = $cust;
    $is_cust = 1;
} // checking if there a custom link (space checking added)

if (ctype_space($pass) OR $pass == '') {
    $npass = '';
} else {
    $npass = $pass;
} // checking if there a password (space checking added)

$action = $db->query("INSERT INTO links (URL, link, pass, custom, last_visit) 
                VALUES ('$url','$rand1','$npass','$is_cust', NOW())");
if (!$action) {
    $error_msg = "There is Technical Error, Please try again";
    include "functions/error.php";
    $db->close_connection();
    exit();
} else {
    $created_link = $myweb . '/' . $rand1;
    include "functions/created.php";
    $db->close_connection();
    exit();
}
}
?>
