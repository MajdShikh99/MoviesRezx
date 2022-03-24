<?php 

session_start();
if (isset($_SESSION['user_email'])){
    
    
require '../../config.php';
require '../functions.php';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: ' . _SITE_URL . '/admin/controller/error.php');
	}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$genre_title = cleardata($_POST['genre_title']);
	$genre_id = cleardata($_POST['genre_id']);

	$statment = $connect->prepare(
		"UPDATE genres SET genre_title = :genre_title WHERE genre_id = :genre_id"
		);
	
$statment->execute(array(

		':genre_title' => $genre_title,
		':genre_id' => $genre_id

		));

		header('Location: ./genres.php');		

} else{

$id_genre = id_genre($_GET['id']);
    
if(empty($id_genre)){
	header('Location: ' . _SITE_URL . '/admin/controller/home.php');
	}

$genre = get_genre_per_id($connect, $id_genre);
    
    if (!$genre){
    header('Location: ' . _SITE_URL . '/admin/controller/home.php');
}

$genre = $genre['0'];

}

require '../views/edit.genre.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
} 
   
} else {
		header('Location: ./login.php');		
		}


?>