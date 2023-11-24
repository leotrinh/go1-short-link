<?php
include "functions/database.php";
header('Content-Type: application/json');

if (!isset($_GET['search'])) {
    http_response_code(400); //BAD_REQUEST
    echo json_encode(['success' => false, 'msg' => 'Invalid Request']);
    exit;
}

$searchValue = $db->escape_value($_GET['search']);

$getLink = $db->query("SELECT URL,link, date, hits, id, pass FROM links WHERE BINARY link LIKE '%$searchValue%' OR URL LIKE '%$searchValue%'");
$getLink = $db->fetch_array($getLink);
$url = '';
if ($getLink) {

    $jsonData = [
        'url' => $getLink["URL"],
        'link' => $getLink["link"],
        'date' => $getLink["date"],
        'hits' => $getLink["hits"],
        'id' => $getLink["id"],
        'pass' => $getLink["pass"],
    ];

    echo json_encode($jsonData); // Convert the array to JSON format
    exit;
}

if (empty($jsonData)) {
    echo "{}";
    exit;
}
