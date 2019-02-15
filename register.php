<?php

require_once("config.php");

if(isset($_POST['register'])){

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $passwordConfirmation = filter_input(INPUT_POST, 'password-confirmation', FILTER_SANITIZE_STRING);
    
    if($password != $passwordConfirmation){
        $msgPassword = "passwords doesn't match";
    }else{
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $passwordConfirmation = password_hash($_POST["password-confirmation"], PASSWORD_DEFAULT);
    }

    $paramsRegister = array(
        ":name" => $name,
        ":email" => $email,
        ":username" => $username,
        ":password" => $password
    );

    $paramsCheckEmail = array(
        ":email" => $email
    );

    $paramsCheckUsername = array(
        ":username" => $username
    );

    $sqlCheckEmail = "SELECT * FROM users WHERE email=:email";
    $stmtCheckEmail = $db->prepare($sqlCheckEmail);

    $stmtCheckEmail->execute($paramsCheckEmail);
    $checkEmail = $stmtCheckEmail->fetch(PDO::FETCH_BOUND);

    $sqlCheckUsername = "SELECT * FROM users WHERE username=:username";
    $stmtCheckUsername = $db->prepare($sqlCheckUsername);

    $stmtCheckUsername->execute($paramsCheckUsername);
    $checkUsername = $stmtCheckUsername->fetch(PDO::FETCH_BOUND);

    if($checkEmail === true)
    {
        $msgEmail = 'Email already exists';
    }

    if ($checkUsername === true) {
        $msgUsername = 'Username already exists';
    }

    if ($checkEmail === false AND $checkUsername === false) {
        $sqlRegister = "INSERT INTO users (name, username, email, password, created_at) 
        VALUES (:name, :username, :email, :password, NOW())";
        $stmtRegister = $db->prepare($sqlRegister);

        $saved = $stmtRegister->execute($paramsRegister);
        if ($saved) {
            header("Location: index.php");
        }
    }
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
</head>
<body class="">
    <main>
    <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Register</h3>
                    or <a href="./index.php">Sign In</a>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($msgEmail) & !empty($msgEmail)){
                            echo "<div class='alert alert-danger' role='alert'>". $msgEmail ."</div>";
                        }
                        if(isset($msgUsername) & !empty($msgUsername)){
                            echo "<div class='alert alert-danger' role='alert'>". $msgUsername ."</div>"; 
                        } 
                        if(isset($msgPassword) & !empty($msgPassword)){
                            echo "<div class='alert alert-danger' role='alert'>". $msgPassword ."</div>";
                        }
                    ?>
                    <form action="" method="POST">

                        <div class="form-group">
                            <label for="">Your Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" name="name" placeholder="Enter Your Name" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Your Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                </div>
                                <input type="email" class="form-control" name="email" placeholder="Enter Your Email" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-users"></i></div>
                                </div>
                                <input type="text" class="form-control" name="username" placeholder="Enter Your Username" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                </div>
                                <input type="password" class="form-control" name="password-confirmation" data-parsley-equalto="#password" placeholder="Confirm Your Password" value="" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right" name="register">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>