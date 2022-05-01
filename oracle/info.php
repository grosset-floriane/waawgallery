<?php 

require "../classes/InfoPage.php";

$newPage = new InfoPage("/oracle/", $conn);
$newPage->buildInfoPage();