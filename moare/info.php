<?php 

require "../classes/InfoPage.php";

$newPage = new InfoPage("/moare/", $conn);
$newPage->buildInfoPage();