<?php 

require "../classes/InfoPage.php";

$newPage = new InfoPage("/inabsence/", $conn);
$newPage->buildInfoPage();