<?php 

require "../classes/ErrorPage.php";

$newPage = new ErrorPage("/waaw-offline/", $conn);
$newPage->buildErrorPage(500);