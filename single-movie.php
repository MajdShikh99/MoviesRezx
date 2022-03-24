<?php

require "core.php";

// Get Item Id

$idItem = clearGetData(getItemId());


if(empty($idItem)){

	header('Location: '. $urlPath->home());
}

// Movie Details

$itemDetails = getMovieById($connect, $idItem);

if(empty($itemDetails)){
	
	header('Location: '. $urlPath->error());
}

// Stars by Movie

$getMovieStars = getMoviesStarsByMovie($connect, $idItem);

$movieStars = explode(',', $getMovieStars);


// Genres by Movie

$getMovieGenres = getMoviesGenresByMovie($connect, $idItem);

$movieGenres = explode(',', $getMovieGenres);


// Title

$titleHeader = getTitle($connect, $itemDetails['movie_title']);
$projectname = projectname($connect);
$facebook_personal = facebook_personal($connect);
$author = author($connect);

require './views/header.view.php';
require './views/single-movie.view.php';
require './bottom.php';

?>