<?php 
include "functions/database.php";
$links = $db->query("SELECT link, date, hits, id, pass FROM links");
$base_url = "https://click.go1.to/";

header("Content-Type: application/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;


foreach($links as $link)
{
  if(empty($link['pass'])){
     echo '<url>' . PHP_EOL;
     echo '<loc>'. $base_url.$link['link'] .'/</loc>' . PHP_EOL;
     echo '<changefreq>daily</changefreq>' . PHP_EOL;
     echo '<priority>1.00</priority>' . PHP_EOL;
     echo '</url>' . PHP_EOL;
  }
}
echo '</urlset>' . PHP_EOL;
$db->close_connection();
