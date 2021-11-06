<?php
// Start the session
session_start();

/* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */

    // Defined as constants so that they can't be changed
    DEFINE ('DB_USER', 'root');
    DEFINE ('DB_PASSWORD', '');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', '3fa_db');
    // $dbc will contain a resource link to the database
    // @ keeps the error from showing in the browser
    $link = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR die('Could not connect to MySQL: ' .
    mysqli_connect_error());
    echo "Connection Successful ";

    // Check connection

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
   


    // attempt insert query execution
    $first_name = $_SESSION['name'];
    $password = $_SESSION['pass'];
    $type = $_SESSION['pass2'];


    // Use password_hash() function to
    // create a password hash
    // using blowfish algorithm.
    $hash_default_salt = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO group9_db (userName, passWord, captcha_type, rgb) VALUES ('$first_name', '$hash_default_salt', '$type', '1111')";



    
    if(mysqli_query($link, $sql)){
        echo "Contact Request added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    // close connection
    mysqli_close($link);





?>
