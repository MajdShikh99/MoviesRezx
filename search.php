<?php

require "core.php";

$errors = '';

$minLength = 3;

// Search

if(getParamsQuery()){

$queryGet = clearGetData(getParamsQuery());

if(strlen($queryGet) >= $minLength){ 

$sqlQuery = "(SELECT movie_id as id, movie_slug as slug, movie_image as image, movie_title as title, movie_year as year, 'movie' as type FROM movies WHERE movie_title LIKE '%" . $queryGet . "%' OR movie_stars LIKE '%" . $queryGet . "%')";

$sentence = $connect->prepare($sqlQuery);

$sentence->execute();

$qResults = $sentence->fetchAll(PDO::FETCH_ASSOC);
$totalResults = $sentence->rowCount();

if (empty($qResults)){
	
     $errors .='<div class="errors">'._NORESULTSFOUND.'</div>';
}

}

}else{

	$errors .='<div class="errors">'._NORESULTSFOUND.'</div>';

}

// Title

if(getParamsQuery()){

$queryGet = getParamsQuery();

$titleHeader = getTitle($connect, $queryGet);
$projectname = projectname($connect);
$facebook_personal = facebook_personal($connect);
$author = author($connect);

}else{

$titleHeader = getTitle($connect, _SEARCHPAGETITLE);


}

require './views/header.view.php';
require './views/search.view.php';
require './views/bottom.view.php';

?>