<?php

use voku\helper\AntiXSS;

require_once __DIR__ . '/classes/anti-xss/autoload.php';

function connect($database){
    try{
        $connect = new PDO('mysql:host='.$database['host'].';dbname='.$database['db'],$database['user'],$database['pass'], array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        return $connect;
        
    }catch (PDOException $e){
        return false;
    }
}

function isLogged(){

    if (isset($_SESSION['signedin']) && $_SESSION['signedin'] == true) {
        return true;
    }else{
        return false;
    }
}

function isAdmin($connect){

    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);
    
    $sentence = $connect->prepare("SELECT * FROM users WHERE user_email = '".$emailSession."' AND user_status = 1 AND user_role = 1 LIMIT 1"); 
    $sentence->execute();
    $row = $sentence->fetch();

    if ($row) {
        
        return true;

    }else{

        return false;
    }

}

function echoOutput($data){
    $data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
    return $data;
}

function clearData($data){
    $antiXss = new AntiXSS();
    $data = $antiXss->xss_clean($data);
    return $data;
}

function clearGetData($data){

    $antiXss = new AntiXSS();
    $data = $antiXss->xss_clean($data);
    return $data;
}

function getNumPage(){
    
    return isset($_GET['p']) && is_numeric($_GET['p']) ? $_GET['p'] : 1;
}

function getItemId(){
    
    return isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : NULL;
}

function isEditing(){
    
    return isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'edit';
}

function isWatch(){
    
    return isset($_GET['watch']) && !empty($_GET['watch']) && $_GET['watch'] == '1';
}

function getParamsTitle(){
    
    return isset($_GET['title']) && !empty($_GET['title']) ? $_GET['title'] : NULL;
}

function getParamsGenre(){
    
    return isset($_GET['genre']) && !empty($_GET['genre']) ? $_GET['genre'] : NULL;
}

function getParamsYear(){
    
    return isset($_GET['year']) && !empty($_GET['year']) ? $_GET['year'] : NULL;
}

function getParamsQuery(){
    
    return isset($_GET['query']) && !empty($_GET['query']) ? $_GET['query'] : NULL;
}

function getFullUrl(){

    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    return htmlspecialchars($url);

}

function getCurrentUrl(){
    
    
    $url = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

    return $url;
}

function gotToWatch(){
    
    $url = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

    return htmlspecialchars($url.'?watch=1');
}

function goToPage($parameter, $value) { 
    $params = array(); 
    $output = "?"; 
    $firstRun = true; 
    foreach($_GET as $key=>$val) { 
        if($key != $parameter) { 
            if(!$firstRun) { 
                $output .= "&"; 
            } else { 
                $firstRun = false; 
            } 
            $output .= $key."=".urlencode($val); 
        } 
    } 

    if(!$firstRun) 
        $output .= "&"; 
    $output .= $parameter."=".urlencode($value); 
    return htmlentities($output); 
} 

function formatDate($FormatDate){

    $timestamp = strtotime($FormatDate);
    $mouthes = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $day = date('d', $timestamp);
    $mouth = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);

    $FormatDate = "$day " . $mouthes[$mouth] . " $year";
    return $FormatDate;
}

function generatePassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

function maskEmail($email)
{
    $mail_parts = explode('@', $email);
    $username = '@'.$mail_parts[0];
    $len = strlen($username);

    return $username;
}

function showStars($value){

    for($i = 0; $i < 10; $i++){
        if($i < $value){
            echo "<i class='ion-ios-star star'></i>";
        } else {
            echo "<i class='ion-ios-star star-o'></i>";
        }
    }
}

function showRating($value){

    if ($value) {
        $num = round($value, 1).'<span></span>';
    }else{
        $num = '-<span></span>';
    }
    return $num;
}

function showOrder($value){

    $num = $value+1;
    $output = $num.'&ordm;';

    return $output;
}

/*------------------------------------------------------------ */
/* USERS */
/*------------------------------------------------------------ */

function getUserInfo($connect){
    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);

    $sentence = $connect->prepare("SELECT * FROM users WHERE user_email = '".$emailSession."' LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();
    return $row;
}


/*------------------------------------------------------------ */
/* SITE */
/*------------------------------------------------------------ */


function getTitle($connect, $pageTitle = NULL){

    $separator = ' - ';

    if ($pageTitle == NULL) {
        
        $sentence = $connect->prepare("SELECT st_sitename FROM settings");
        $sentence->execute();
        $row = $sentence->fetch();
        return $row['st_sitename'];

    } else {

        $sentence = $connect->prepare("SELECT st_sitename FROM settings");
        $sentence->execute();
        $row = $sentence->fetch();

        return $row['st_sitename'] . $separator . $pageTitle;
        
    }

}

function projectname($connect, $pageTitle = NULL){

    $separator = ' - ';

    if ($pageTitle == NULL) {
        
        $sentence = $connect->prepare("SELECT projectname FROM settings");
        $sentence->execute();
        $row = $sentence->fetch();
        return $row['projectname'];

    } else {

        $sentence = $connect->prepare("SELECT projectname FROM settings");
        $sentence->execute();
        $row = $sentence->fetch();

        return $row['projectname'] . $separator . $pageTitle;
        
    }

}

function facebook_personal($connect, $pageTitle = NULL){

    $separator = ' - ';

    if ($pageTitle == NULL) {
        
        $sentence = $connect->prepare("SELECT facebook_personal FROM settings");
        $sentence->execute();
        $row = $sentence->fetch();
        return $row['facebook_personal'];

    } else {

        $sentence = $connect->prepare("SELECT facebook_personal FROM settings");
        $sentence->execute();
        $row = $sentence->fetch();

        return $row['facebook_personal'] . $separator . $pageTitle;
        
    }

}

function author($connect, $pageTitle = NULL){

    $separator = ' - ';

    if ($pageTitle == NULL) {
        
        $sentence = $connect->prepare("SELECT author FROM settings");
        $sentence->execute();
        $row = $sentence->fetch();
        return $row['author'];

    } else {

        $sentence = $connect->prepare("SELECT author FROM settings");
        $sentence->execute();
        $row = $sentence->fetch();

        return $row['author'] . $separator . $pageTitle;
        
    }

}
function getSettings($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM settings"); 
    $sentence->execute();
    return $sentence->fetch();
}

/*------------------------------------------------------------ */
/* PAGES */
/*------------------------------------------------------------ */

function getPageById($connect, $idItem)
{

    $sentence = $connect->prepare("SELECT * FROM pages WHERE page_id = $idItem LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();
    return $row;
}

/*------------------------------------------------------------ */
/* CATEGORIES */
/*------------------------------------------------------------ */

function getGenreById($connect, $idItem)
{

    $sentence = $connect->prepare("SELECT * FROM genres WHERE genre_id = $idItem LIMIT 1");
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

/*------------------------------------------------------------ */
/* MOVIES */
/*------------------------------------------------------------ */


function getMovieById($connect, $idItem)
{
    
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS movies.*, GROUP_CONCAT(genres.genre_title) AS genre_title, AVG(rating) AS movie_rate, movies.movie_id AS id, movies.movie_link AS link, movies.movie_trailer AS trailer, movies.movie_title AS title, movies.movie_description AS description  FROM movies JOIN movies_genres ON movies_genres.movie_id = movies.movie_id LEFT JOIN movies_reviews ON movies_reviews.item = movies.movie_id JOIN genres ON genres.genre_id = movies_genres.genre_id WHERE movies.movie_id = $idItem AND movies.movie_status = 1 GROUP BY movies.movie_id LIMIT 1");

    $sentence->execute();
    $row = $sentence->fetch();
    return $row;
}

function getMoviesStarsByMovie($connect, $idItem)
{
    
    $sentence = $connect->prepare("SELECT movie_stars AS stars FROM movies WHERE movie_id = $idItem ORDER BY movie_stars ASC");
    $sentence->execute();
    $result = $sentence->fetch()['stars'];
    return $result;

}

function getMoviesGenresByMovie($connect, $idItem)
{
    
    $sentence = $connect->prepare("SELECT genre_title AS genre FROM genres WHERE genre_id IN (SELECT genre_id FROM movies_genres WHERE movie_id = $idItem)");
    $sentence->execute();
    $result = $sentence->fetch()['genre'];
    return $result;

}

function getMoviesGenres($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM genres WHERE genre_id IN (SELECT genre_id FROM movies_genres GROUP BY genre_id) ORDER BY genre_title ASC");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getMoviesYears($connect)
{
    
    $sentence = $connect->prepare("SELECT movie_year AS year FROM movies GROUP BY movie_year ORDER BY movie_year ASC");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getFeaturedMovies($connect, $limit)
{
    
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS movies.*, GROUP_CONCAT(genres.genre_title) AS genre_title, AVG(rating) AS movie_rate FROM movies JOIN movies_genres ON movies_genres.movie_id = movies.movie_id LEFT JOIN movies_reviews ON movies_reviews.item = movies.movie_id JOIN genres ON genres.genre_id = movies_genres.genre_id WHERE movies.movie_featured = 1 AND movies.movie_status = 1 GROUP BY movies.movie_id ORDER BY movies.movie_date DESC LIMIT $limit");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getAllMovies($connect, $itemsPage, $genreGet = NULL)
{

    $limit = (getNumPage() > 1) ? getNumPage() * $itemsPage - $itemsPage : 0;

    if ($genreGet != NULL) {

        $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS movies.*, GROUP_CONCAT(genres.genre_title) AS genre_title, AVG(rating) AS movie_rate FROM movies JOIN movies_genres ON movies_genres.movie_id = movies.movie_id LEFT JOIN movies_reviews ON movies_reviews.item = movies.movie_id JOIN genres ON genres.genre_id = movies_genres.genre_id WHERE movies.movie_status = 1 AND movies.movie_id IN (SELECT movie_id FROM movies_genres WHERE genre_id = $genreGet) GROUP BY movies.movie_id ORDER BY movies.movie_date DESC LIMIT $limit, $itemsPage");

    }else{

        $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS movies.*, GROUP_CONCAT(genres.genre_title) AS genre_title, AVG(rating) AS movie_rate FROM movies JOIN movies_genres ON movies_genres.movie_id = movies.movie_id LEFT JOIN movies_reviews ON movies_reviews.item = movies.movie_id JOIN genres ON genres.genre_id = movies_genres.genre_id WHERE movies.movie_status = 1 GROUP BY movies.movie_id ORDER BY movies.movie_date DESC LIMIT $limit, $itemsPage");

    }
    

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getRecentMovies($connect, $limit = NULL)
{
    
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS movies.*, GROUP_CONCAT(genres.genre_title) AS genre_title FROM movies JOIN movies_genres ON movies_genres.movie_id = movies.movie_id JOIN genres ON genres.genre_id = movies_genres.genre_id WHERE movies.movie_status = 1 GROUP BY movies.movie_id ORDER BY movies.movie_date DESC LIMIT $limit");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getTopMovies($connect, $limit = NULL)
{
    
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS movies.*, AVG(rating) AS movie_rate FROM movies JOIN movies_reviews ON movies_reviews.item = movies.movie_id WHERE movies.movie_status = 1 GROUP BY movies.movie_id ORDER BY movie_rate DESC LIMIT $limit");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function numTotalMovies($items_page, $connect){

    $total_items = $connect->prepare("SELECT COUNT(*) AS total FROM movies");
    $total_items->execute();
    $total_items = $total_items->fetch()['total'];
    $numPages = ceil($total_items / $items_page);
    return $numPages;
}

?>