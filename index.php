<?php

require "core.php";

// Title

$titleHeader = getTitle($connect);
$projectname = projectname($connect);
$facebook_personal = facebook_personal($connect);
$author = author($connect);

// Featured Movies

$featuredMovies = getFeaturedMovies($connect, $site_config['items_featured']);

// Recent Movies

$recentMovies = getRecentMovies($connect, $site_config['items_recent']);

require './views/header.view.php';

require './views/home.view.php';

require './views/bottom.view.php';