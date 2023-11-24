<?php
include "functions/database.php";
header('Content-Type: application/json');

if (!isset($_GET['search'])) {
    http_response_code(400); //BAD_REQUEST
    echo json_encode(['success' => false, 'msg' => 'Invalid Request']);
    exit;
}

$searchValue = $db->escape_value($_GET['search']);
$query = "SELECT URL, link, date, hits, id, pass FROM links WHERE link COLLATE UTF8_GENERAL_CI LIKE '%$searchValue%' OR `URL` COLLATE UTF8_GENERAL_CI LIKE '%$searchValue%'";

$result = $db->query($query);;
$links = array(); 
while ($r = mysqli_fetch_assoc($result)) {
    $links[] = $r;
}
if (!empty($links)) {
    echo json_encode(['data' => $links, 'msg' => "OK"]); 
    exit;
}

if (empty($jsonData)) {
    echo json_encode(['msg' => "No Data"]); 
    exit;
}
