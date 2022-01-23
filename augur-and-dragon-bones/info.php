<?php 

require "../classes/InfoPage.php";

$newPage = new InfoPage("/augur-and-dragon-bones/", $conn);
$newPage->buildInfoPage();