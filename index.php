<?php 

require "classes/InfoPage.php";

$newPage = new InfoPage("/waaw-offline/", $conn);
$newPage->buildInfoPage();