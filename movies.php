<?php

require "core.php";

$errors = '';

// Title

$titleHeader = getTitle($connect);
$projectname = projectname($connect);
$facebook_personal = facebook_personal($connect);
$author = author($connect);

// Get All Movies

if (getParamsGenre()) {

	$genreGet = clearGetData(getParamsGenre());

	$rMovies = getAllMovies($connect, $site_config['items_page'], $genreGet);

}else{

	$rMovies = getAllMovies($connect, $site_config['items_page']);

}

$numPages = numTotalMovies($site_config['items_page'], $connect);

require './views/header.view.php';
require './views/movies.view.php';
require './views/bottom.view.php';

?>