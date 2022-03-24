<?php

require "core.php";

// Title

$titleHeader = getTitle($connect);
$projectname = projectname($connect);
$facebook_personal = facebook_personal($connect);
$author = author($connect);

require './views/header.view.php';
require './views/error.view.php';
require './views/bottom.view.php';

?>