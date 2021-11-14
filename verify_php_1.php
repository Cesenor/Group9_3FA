

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


    $_SESSION['name'] = $_POST['userName_vera'];
    $_SESSION['pass'] = $_POST['userPass_vera'];

    //echo "\r\n";
    //echo $_SESSION['name'];
    //echo "\r\n";
    //echo $_SESSION['pass'];


    $first_name = $_SESSION['name'];
    $password = $_SESSION['pass'];


    //$getID = mysqli_fetch_assoc(mysqli_query($link, "SELECT userName FROM group9_db WHERE id = 1"));
    $getID = mysqli_fetch_assoc(mysqli_query($link, "SELECT userName FROM group9_db WHERE userName = '$first_name'"));
    //$userID = $getID['userName'];

    if(isset($getID)){
        $userID = $getID['userName'];
        echo $userID;
        // it exists so continue to verify. 
        $getPass = mysqli_fetch_assoc(mysqli_query($link, "SELECT passWord FROM group9_db WHERE userName = '$first_name'"));
        $userPass = $getPass['passWord'];
        echo $userPass;

        //verify password.
        if(password_verify($password,  $userPass)) {
            // If the password inputs matched the hashed password in the database
            // Do something, you know... log them in.
            echo "true";
        } else {
            echo "Incorrect Password Attempt.";
        }


    } else {
        echo "Username not stored within database.";
    }



    //$getPass = mysqli_fetch_assoc(mysqli_query($link, "SELECT passWord FROM group9_db WHERE id = 1"));
    //$getPass = mysqli_fetch_assoc(mysqli_query($link, "SELECT passWord FROM group9_db WHERE userName = '$first_name'"));
    //$userPass = $getPass['passWord'];
    //echo $userPass;


    

    //if(password_verify($password,  $userPass)) {
        // If the password inputs matched the hashed password in the database
        // Do something, you know... log them in.
        //echo "true";
    ///} else {
        //echo "Incorrect Password Attempt.";
   // }


   

    // close connection
    mysqli_close($link);

?>
