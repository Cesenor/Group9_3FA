<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stage 3 Verification</title>
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
    <form style="text-align: center;" action = "normal_user.html">
        <div class="image-grid" style="vertical-align: top; text-align: center; margin-top: 5%;">
            <div class="container">
                <div class="row">
                    <div class="col-">
                        <img style="width:200px;height:200px; background-color: rgb(80, 183, 247)">
                        <img style="width:200px;height:200px; background-color: rgb(32, 178, 129)">
                        <img style="width:200px;height:200px;  background-color: rgb(150, 150, 150)">
                    </div>
                    <div class="col-">
                        <img style="width:200px;height:200px; background-color: yellow">
                        <img style="width:200px;height:200px; background-color: rgb(255, 149, 122)">
                        <img style="width:200px;height:200px; background-color: rgb(32, 32, 32)">
                    </div>
                    <div class="col-">
                        <img style="width:200px;height:200px; background-color: rgb(250, 184, 61)">
                        <img style="width:200px;height:200px; background-color: rgb(230, 134, 243)">
                        <img style="width:200px;height:200px; background-color: rgb(117, 78, 46)">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div>
                <a target="_blank" href="recover.html">Forgot your password?</a>
            </div>
            <small id="captchaHelp" class="form-text text-muted">Please enter your RGB passcode to continue.</small></br>
            <button type="submit" class="btn btn-success">Verify</button>
        </div>
    </form>
</body>
</html>