<?php 

require "classes/AboutPage.php";

$newPage = new AboutPage("/waaw-offline/", $conn);
$newPage->buildAboutPage();