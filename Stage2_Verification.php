<?php 
$servername = "localhost";
$db_username = "root";
$db_password = "";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, "SE2");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully\n";


$username = "user1";//                                                                                                                                    todo

$sql = "SELECT capcha_type FROM group9_db WHERE userName = '" . $username . "'";
$result = $conn->query($sql);


$user_image_type = "";
if ($result->num_rows > 0) {
	$user_image_type = $result->fetch_assoc()['capcha_type'];
}


$correct_number = 0; //should be gotten form whatever thing cameron was talking about                                                                     todo
//if there is a airplane var, then the form was previously submitted
if (isset($_POST['airplane'])){
	$pass = True;
	foreach ($_POST as $category){
		if ($category = $user_image_type){
			if($_post[$category] != $correct_number){
				$pass = False;
			}
		}else{
			if($_post[$category] > 0){
				$pass = False;
			}
		}
	}
}

$image_groups = array(
	"airplane" => -1,
	"beach" => -1,
	"boat" => -1,
	"car" => -1,
	"forest" => -1,
	"home" => -1,
	"storage" => -1,
	);

$random_keys = array(
	1 => array_rand($image_groups),
	2 => array_rand($image_groups),
	3 => array_rand($image_groups),
	4 => array_rand($image_groups),
	5 => array_rand($image_groups),
	6 => array_rand($image_groups),
	7 => array_rand($image_groups),
	8 => array_rand($image_groups),
	9 => $user_image_type
	);
$random_class_order = array_rand($random_keys,9);

$images = array();

foreach ($random_class_order as $index){
	$current_class = $random_keys[$index];
	//echo $current_class . ";";
	$sql = "SELECT image From " . $current_class . " ORDER BY RAND() LIMIT 1";
	$result = $conn->query($sql);
	array_push($images, $result->fetch_assoc()['image']);
}
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stage 2 Verification</title>
</head>
<body style="background-image: url('images/top_secret.png'); background-repeat: no-repeat; background-size: 2000px; background-position: center">
    <nav class="navbar navbar-expand navbar-dark bg-dark justify-content-between">
        <a class="navbar-brand" href="#">Secure Login Service</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="Stage1_Verification.html">Login <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="registration1.html">Registration</a>
            </div>
        </div>
    </nav>
    <div class="image-grid" style="vertical-align: top; text-align: center; margin-top: 5%;">
        <div class="container">
            <div class="row">
                <div class="col-">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[0]); ?>" style="width:200px;height:200px" class="img-thumbnail">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[1]); ?>" style="width:200px;height:200px" class="img-thumbnail">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[2]); ?>" style="width:200px;height:200px" class="img-thumbnail">
                </div>
                <div class="col-">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[3]); ?>" style="width:200px;height:200px" class="img-thumbnail">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[4]); ?>" style="width:200px;height:200px" class="img-thumbnail">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[5]); ?>" style="width:200px;height:200px" class="img-thumbnail">
                </div>
                <div class="col-">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[6]); ?>" style="width:200px;height:200px" class="img-thumbnail">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[7]); ?>" style="width:200px;height:200px" class="img-thumbnail">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[8]); ?>" style="width:200px;height:200px" class="img-thumbnail">
                </div>
            </div>
        </div>
    </div>

   <form action = "Stage3_Verification.html">
        <div style=" text-align: center">
            <div>
                <a target="_blank" href="recover.html">Forgot your password?</a>
            </div>
            <small id="captchaHelp" class="form-text text-muted">Please select all the pictures associated with your account.</small></br>
            <button type="submit" class="btn btn-success">Verify</button>
        </div>
    </form>
</body>
</html>