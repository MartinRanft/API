<?php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();


if ($_SERVER['REQUEST_METHOD'] == "GET") {

    if ($_GET['url'] == "student") {
        
sdsdsds


    }   
    // get schüler
    // get ausbilder
    // get ausbilder bei schüle
    // get betriebe
    // get betriebe bei schüle
            
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // add schüler 
    // add ausbilder 
    // add betriebe 
   
} else if ($_SERVER['REQUEST_METHOD'] == "PUT") {

    // edit schüler by id
    // edit ausbilder by id
    // edit betriebe by id
    
} else if ($_SERVER['REQUEST_METHOD'] == "DELETE") {

    // delete schüler by id
    // delete ausbilder by id
    // delete betriebe by id

} else {
    http_response_code(405);
}
?>