<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

use voku\helper\AntiXSS;

require_once __DIR__ . '/../classes/anti-xss/autoload.php';

function connect($database){
    try{
        $connect = new PDO('mysql:host='.$database['host'].';dbname='.$database['db'],$database['user'],$database['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        return $connect;
        
    }catch (PDOException $e){
        return false;
    }
}


function check_access($connect){
    $sentence = $connect->query("SELECT * FROM users WHERE user_email = '".$_SESSION['user_email']."' AND user_status = 1 LIMIT 1");
    $row = $sentence->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function echoOutput($data){
    $data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
    return $data;
}

function cleardata($data){
    $antiXss = new AntiXSS();
    $data = $antiXss->xss_clean($data);
    return $data;
}

function cleardataTextArea($data){

    $antiXss = new AntiXSS();
    $data = $antiXss->xss_clean($data);
    return $data;
}

function get_user_information($connect){
    $sentence = $connect->query("SELECT * FROM users WHERE user_email = '".$_SESSION['user_email']."' LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_movies($connect){

$sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS movies.*, GROUP_CONCAT(genres.genre_title) AS genre_title FROM movies JOIN movies_genres ON movies_genres.movie_id = movies.movie_id JOIN genres ON genres.genre_id = movies_genres.genre_id GROUP BY movies.movie_id ORDER BY movies.movie_date DESC LIMIT 8");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function get_all_movies($connect)
{
    
$sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS movies.*, GROUP_CONCAT(genres.genre_title) AS genre_title FROM movies JOIN movies_genres ON movies_genres.movie_id = movies.movie_id JOIN genres ON genres.genre_id = movies_genres.genre_id GROUP BY movies.movie_id ORDER BY movies.movie_date DESC");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function id_movie($id_movie){
    return (int)cleardata($id_movie);
}

function get_movie_per_id($connect, $id_movie){
    $sentence = $connect->query("SELECT SQL_CALC_FOUND_ROWS movies.*, GROUP_CONCAT(genres.genre_title) AS genre_title FROM movies JOIN movies_genres ON movies_genres.movie_id = movies.movie_id JOIN genres ON genres.genre_id = movies_genres.genre_id WHERE movies.movie_id = $id_movie GROUP BY movies.movie_id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_movie_slug($connect, $slug){

$sentence = $connect->prepare("SELECT * FROM movies WHERE movie_slug = $slug");
$sentence->execute();
$row = $sentence->fetch(PDO::FETCH_ASSOC);
return $row[0];
}

function number_movies($connect){

$total_numbers = $connect->prepare("SELECT * FROM movies");
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function selected_mgenres($connect){

if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare("SELECT genres.genre_title, genres.genre_id FROM genres JOIN movies_genres ON movies_genres.genre_id = genres.genre_id JOIN movies ON movies_genres.movie_id = ? GROUP BY movies_genres.genre_id");
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function not_selected_mgenres($connect){

 if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare("SELECT genres.genre_title, genres.genre_id FROM genres WHERE genres.genre_id NOT IN (SELECT movies_genres.genre_id FROM movies_genres WHERE movies_genres.movie_id = ? GROUP BY movies_genres.genre_id)");
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function get_genres($connect){

$sentence = $connect->prepare("SELECT * FROM genres ORDER BY genre_id DESC LIMIT 8");
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_all_genres($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM genres ORDER BY genre_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_genre($id_genre){
    return (int)cleardata($id_genre);
}

function get_genre_per_id($connect, $id_genre){
    $sentence = $connect->query("SELECT * FROM genres WHERE genre_id = $id_genre LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_genres($connect){

$total_numbers = $connect->prepare("SELECT * FROM genres");
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function get_genre_slug($connect, $slug){

$sentence = $connect->prepare("SELECT * FROM genres WHERE genre_slug = $slug");
$sentence->execute();
$row = $sentence->fetch(PDO::FETCH_ASSOC);
return $row[0];
}


function get_all_users($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM users ORDER BY user_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_user($id_user){
    return (int)cleardata($id_user);
}

function get_user_per_id($connect, $id_user){
    $sentence = $connect->query("SELECT * FROM users WHERE user_id = $id_user LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_users($connect){

$total_numbers = $connect->prepare("SELECT * FROM users");
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function get_settings($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM settings"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_smtp($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM smtp"); 
    $sentence->execute();
    return $sentence->fetchAll();
}


function convert_slug($str, $options = array()) {
  // Make sure string is in UTF-8 and strip invalid UTF-8 characters
  $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
  
  $defaults = array(
    'delimiter' => '-',
    'limit' => null,
    'lowercase' => true,
    'replacements' => array(),
    'transliterate' => false,
  );
  
  // Merge options
  $options = array_merge($defaults, $options);
  
  $char_map = array(
    // Latin
    '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'AE', '??' => 'C', 
    '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'I', '??' => 'I', '??' => 'I', '??' => 'I', 
    '??' => 'D', '??' => 'N', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', 
    '??' => 'O', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'Y', '??' => 'TH', 
    '??' => 'ss', 
    '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'ae', '??' => 'c', 
    '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'i', '??' => 'i', '??' => 'i', '??' => 'i', 
    '??' => 'd', '??' => 'n', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', 
    '??' => 'o', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'y', '??' => 'th', 
    '??' => 'y',

    // Latin symbols
    '??' => '(c)',

    // Greek
    '??' => 'A', '??' => 'B', '??' => 'G', '??' => 'D', '??' => 'E', '??' => 'Z', '??' => 'H', '??' => '8',
    '??' => 'I', '??' => 'K', '??' => 'L', '??' => 'M', '??' => 'N', '??' => '3', '??' => 'O', '??' => 'P',
    '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'Y', '??' => 'F', '??' => 'X', '??' => 'PS', '??' => 'W',
    '??' => 'A', '??' => 'E', '??' => 'I', '??' => 'O', '??' => 'Y', '??' => 'H', '??' => 'W', '??' => 'I',
    '??' => 'Y',
    '??' => 'a', '??' => 'b', '??' => 'g', '??' => 'd', '??' => 'e', '??' => 'z', '??' => 'h', '??' => '8',
    '??' => 'i', '??' => 'k', '??' => 'l', '??' => 'm', '??' => 'n', '??' => '3', '??' => 'o', '??' => 'p',
    '??' => 'r', '??' => 's', '??' => 't', '??' => 'y', '??' => 'f', '??' => 'x', '??' => 'ps', '??' => 'w',
    '??' => 'a', '??' => 'e', '??' => 'i', '??' => 'o', '??' => 'y', '??' => 'h', '??' => 'w', '??' => 's',
    '??' => 'i', '??' => 'y', '??' => 'y', '??' => 'i',

    // Turkish
    '??' => 'S', '??' => 'I', '??' => 'C', '??' => 'U', '??' => 'O', '??' => 'G',
    '??' => 's', '??' => 'i', '??' => 'c', '??' => 'u', '??' => 'o', '??' => 'g', 

    // Russian
    '??' => 'A', '??' => 'B', '??' => 'V', '??' => 'G', '??' => 'D', '??' => 'E', '??' => 'Yo', '??' => 'Zh',
    '??' => 'Z', '??' => 'I', '??' => 'J', '??' => 'K', '??' => 'L', '??' => 'M', '??' => 'N', '??' => 'O',
    '??' => 'P', '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'U', '??' => 'F', '??' => 'H', '??' => 'C',
    '??' => 'Ch', '??' => 'Sh', '??' => 'Sh', '??' => '', '??' => 'Y', '??' => '', '??' => 'E', '??' => 'Yu',
    '??' => 'Ya',
    '??' => 'a', '??' => 'b', '??' => 'v', '??' => 'g', '??' => 'd', '??' => 'e', '??' => 'yo', '??' => 'zh',
    '??' => 'z', '??' => 'i', '??' => 'j', '??' => 'k', '??' => 'l', '??' => 'm', '??' => 'n', '??' => 'o',
    '??' => 'p', '??' => 'r', '??' => 's', '??' => 't', '??' => 'u', '??' => 'f', '??' => 'h', '??' => 'c',
    '??' => 'ch', '??' => 'sh', '??' => 'sh', '??' => '', '??' => 'y', '??' => '', '??' => 'e', '??' => 'yu',
    '??' => 'ya',

    // Ukrainian
    '??' => 'Ye', '??' => 'I', '??' => 'Yi', '??' => 'G',
    '??' => 'ye', '??' => 'i', '??' => 'yi', '??' => 'g',

    // Czech
    '??' => 'C', '??' => 'D', '??' => 'E', '??' => 'N', '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'U', 
    '??' => 'Z', 
    '??' => 'c', '??' => 'd', '??' => 'e', '??' => 'n', '??' => 'r', '??' => 's', '??' => 't', '??' => 'u',
    '??' => 'z', 

    // Polish
    '??' => 'A', '??' => 'C', '??' => 'e', '??' => 'L', '??' => 'N', '??' => 'o', '??' => 'S', '??' => 'Z', 
    '??' => 'Z', 
    '??' => 'a', '??' => 'c', '??' => 'e', '??' => 'l', '??' => 'n', '??' => 'o', '??' => 's', '??' => 'z',
    '??' => 'z',

    // Latvian
    '??' => 'A', '??' => 'C', '??' => 'E', '??' => 'G', '??' => 'i', '??' => 'k', '??' => 'L', '??' => 'N', 
    '??' => 'S', '??' => 'u', '??' => 'Z',
    '??' => 'a', '??' => 'c', '??' => 'e', '??' => 'g', '??' => 'i', '??' => 'k', '??' => 'l', '??' => 'n',
    '??' => 's', '??' => 'u', '??' => 'z'
  );
  
  // Make custom replacements
  $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
  
  // Transliterate characters to ASCII
  if ($options['transliterate']) {
    $str = str_replace(array_keys($char_map), $char_map, $str);
  }
  
  // Replace non-alphanumeric characters with our delimiter
  $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
  
  // Remove duplicate delimiters
  $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
  
  // Truncate slug to max. characters
  $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
  
  // Remove delimiter from ends
  $str = trim($str, $options['delimiter']);
  
  return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}

function FormatDate($FormatDate){

    $timestamp = strtotime($FormatDate);
    $meses = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) - 1;
    $anyo = date('Y', $timestamp);

    $FormatDate = "$dia " . $meses[$mes] . " $anyo";
    return $FormatDate;
}





?>