
<html lang="en">
<body>

<script type="text/javascript">
function myFunction() {
  alert("Incorrect Password Attempt.");
}


function myFunctionLock() {
  alert("Max Incorrect Password Attempt Reached.");
}

</script>


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
    //echo "Connection Successful ";

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

    //check if the username exists.
    if(isset($getID)){
        $userID = $getID['userName'];
        //echo $userID;

        // it exists so continue to verify. 
        $getPass = mysqli_fetch_assoc(mysqli_query($link, "SELECT passWord FROM group9_db WHERE userName = '$first_name'"));
        $userPass = $getPass['passWord'];
        //echo $userPass;

        //verify password.
        if(password_verify($password,  $userPass)) {
            // If the password inputs matched the hashed password in the database
            // Do something, you know... log them in.
            
            //reset counter here. 
            



            echo "true";
            //needs to change to second page vera. 
            header("Location: Stage2_Verification.php");
            exit();
        } else {
            //check counter first.  
            $getLock = mysqli_fetch_assoc(mysqli_query($link, "SELECT lockNum FROM group9_db WHERE userName = '$first_name'"));
            $lockNum = $getLock['lockNum'];
            #echo $lockNum;

            # meaning 5.
            if($lockNum > 4){

                echo '<script type="text/javascript">myFunctionLock();</script>';
                echo "Redirecting in 3 seconds.";
                header( "refresh:3;url=lockOut.php" );
                exit();
                
            } else{
                #increment here.
                $increment = $lockNum + 1;
                $sql = "UPDATE group9_db SET lockNum = '$increment' WHERE userName = '$first_name'";


                if(mysqli_query($link, $sql)){
                    #echo "Contact Request added successfully.";
                }


                echo '<script type="text/javascript">myFunction();</script>';
                echo "Redirecting in 3 seconds.";
                #maybe make this dynamic. 
                header( "refresh:3;url=Stage1_Verification.php" );
                exit();

            }
        }


    } else {
        echo "Username not stored within database.";
    }

   
    // close connection
    mysqli_close($link);

?>

</body>
</html>
