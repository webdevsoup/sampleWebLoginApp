<?php
session_start();
include_once(__DIR__.'/assets/includes/includes.php');
$user = new User();
$user->logout();
header('Location: /');

?>