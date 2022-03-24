<?php

session_start();

require './config.php';
require './functions.php';
require './routes.php';

$urlPath = new Routes();

$connect = connect($database);

// Settings

$settings = getSettings($connect);

?>