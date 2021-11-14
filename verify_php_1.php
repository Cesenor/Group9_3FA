

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


    //get_user($first_name, $password)

    
    /* Look for the username in the database. */
    //$query = 'SELECT passWord FROM group9_db WHERE (account_name = :name)';
    //$sql = "SELECT passWord FROM group9_db WHERE (userName = "Cesenor")";
    $sql = "SELECT passWord FROM group9_db WHERE (userName = 'Cesenor')";



    //$password = $_SESSION['pass'];

    //$pass_db = $link->query($sql);

    //$result = mysqli_query($link, "$sql");
    //echo mysqli_query($result, 0);
    //echo $result;

    //while ($row = $result->fetch_assoc()) {
     //   echo $row['classtype']."<br>";
    //}


    echo gettype($result);
    

    //if(password_verify($password,  $result)) {
        // If the password inputs matched the hashed password in the database
        // Do something, you know... log them in.
      //  echo "true";
   // } 


   

    // close connection
    mysqli_close($link);

?>
