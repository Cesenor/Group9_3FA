
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="temp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>User Registration</title>
</head>
<body style="background-image: url('images/top_secret.png'); background-repeat: no-repeat; background-size: 1850px; background-position-y:24%;">
    <div class="page-container">
        <nav class="navbar navbar-expand navbar-dark bg-dark justify-content-between">
            <a class="navbar-brand" href="#">Secure Login Service</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="Stage1_Verification.php">Login</a>
                    <a class="nav-item nav-link" href="registration1.php">Registration</a>
                </div>
            </div>
        </nav>
    <div class="recover-info">
       
            <div class="recover-entry">
                <label class="field-name">Email Address<span class="required-asterisk">*</span></label>
                <input class="field-input" placeholder="Email/Username" type="text" name="userLogin" id="email-input" required>
            </div>
            <div class="submit-button">
                <button type="button" id="submit" class="btn btn-success" onclick="sendMailer()">Submit</button>
                <button type="reset" id="clearButton" class = "btn btn-danger">Clear</button>
            </div>
        
    </div>
    </div>

<script ="text/javaScript">
    function sendMailer() {
        import nodemailer from 'nodemailer';

        var transporter = nodemailer.createTransport({
            service: 'gmail',
            auth: {
                user: 'fluffymcflufferstines@gmail.com',
                pass: 'fatboy54622'
            }
        });

        var mailOptions = {
            from: 'fluffymcflufferstines@gmail.com',
            to: "document.getElementById('email-input')",
            subject: 'Recovery Email',
            text: 'Here is you new password: Password'
        };

        transporter.sendMail(mailOptions, function (error, info) {
            if (error) {
                console.log(error);
            } else {
                console.log('Email sent: ' + info.response);
            }
        });
    }
</script>
</body>
</html>