<?php 

require "../classes/NewsletterPage.php";

$newPage = new NewsletterPage("/waaw-offline/", $conn);
$newPage->buildNewsletterPage('confirmation');
