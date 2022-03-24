<?php 

session_start();
if (isset($_SESSION['user_email'])){
    
    
require '../../config.php';
require '../functions.php';

$connect = connect($database);
if(!$connect){
	header('Location: ./error.php');
	} 


$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$st_sitename = cleardata($_POST['st_sitename']);
	$st_description = cleardataTextArea($_POST['st_description']);
	$projectname = cleardata($_POST['projectname']);
	$facebook_personal = cleardataTextArea($_POST['facebook_personal']);
	$author = cleardataTextArea($_POST['author']);
	$st_keywords = cleardata($_POST['st_keywords']);

$statment = $connect->prepare(
	"UPDATE settings SET
	st_sitename = :st_sitename,
	st_description = :st_description,
	projectname = :projectname,
	facebook_personal = :facebook_personal,
	author = :author,
	st_keywords = :st_keywords
	");

	$statment->execute(array(
		':st_sitename' => $st_sitename,
		':st_description' => $st_description,
		':projectname' => $projectname,
		':facebook_personal' => $facebook_personal,
		':author' => $author,
		':st_keywords' => $st_keywords
		));

}

}else{

	header('Location: ./home.php');
}

    
}else {
		header('Location: ./login.php');		
		}


?>