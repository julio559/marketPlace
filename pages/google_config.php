<?php
require_once 'vendor/autoload.php';



$client = new Google_Client();
$client->setClientId('313136588037-53ipb0arnqra1l86clhhfoiliq4gjbpr.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/marketPlace/pages/login_callback.php');

$client->addScope("email");
$client->addScope("profile");
?>
