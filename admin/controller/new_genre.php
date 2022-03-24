<?php 

session_start();
if (isset($_SESSION['user_email'])){
    
    
require '../../config.php';
require '../functions.php';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header('Location: ' . _SITE_URL . '/admin/controller/error.php');
	} 

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$genre_title = cleardata($_POST['genre_title']);

	$slug = convert_slug($genre_title);

	if ($exists > 0)
	{
	    $new_number = $exists + 1;
	    $genre_slug = $slug."-".$new_number;

	}else{

	$genre_slug = convert_slug($genre_title);

	}

	$statment = $connect->prepare(
		'INSERT INTO genres (genre_id,genre_title,genre_slug) VALUES (null, :genre_title, :genre_slug)'
		);

	$statment->execute(array(
		':genre_title' => $genre_title,
		':genre_slug' => $genre_slug
		));

	header('Location:' . _SITE_URL . '/admin/controller/genres.php');

}

require '../views/new.genre.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
}
  
}else {
		header('Location: ./login.php');		
		}


?>