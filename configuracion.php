<?php 
require_once './vendor/autoload.php';
$clientID = '392889886264-nbtsd3i73rcbvl87i1ahr13977g9mpm9.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost:8888/proyecto-tfg/home.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");


?>