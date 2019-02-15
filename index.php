<?php 

require_once("config.php");

if(isset($_POST['sign-in'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sqlLogin = "SELECT * FROM users WHERE username=:username OR email=:username";
    $stmtLogin = $db->prepare($sqlLogin);
    
    $paramsLogin = array(
        ":username" => $username,
        ":password" => $password
    );

    $stmtLogin->execute($paramsLogin);

    $user = $stmtLogin->fetch(PDO::FETCH_ASSOC);

    if($user){
        if(password_verify($password, $user["password"])){
            $sqlUpdateLogin = "UPDATE users SET sign_in_counter = sign_in_counter + 1, last_login = NOW() WHERE users.id=:user_id";
            $stmtUpdateLogin = $db->prepare($sqlUpdateLogin);
            

            $paramsUpdateLogin = array(
                ":user_id" => $user['id']
            );

            $stmtUpdateLogin->execute($paramsUpdateLogin);

            session_start();
            $_SESSION["user"] = $user;
            header("Location: dashboard.php");
        }
    }else{
        $msgLogin = "Login Failed. Email, Username or Password Is Incorect";
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
</head>
<body class="">
    <main>
        <div class="container">
            <div class="card">
                <div class="card-header">
                <h3>Sign In</h3>
                or <a href="./register.php">create an account</a>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($msgLogin) & !empty($msgLogin)){
                            echo "<div class='alert alert-danger' role='alert'>". $msgLogin ."</div>";
                        }
                    ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <small id="emailHelp" class="form-text text-muted">Username or email address</small>
                            <input type="text" class="form-control" name="username" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                            <small id="" class="form-text text-muted"><input type="checkbox" onclick="myFunction()"> Show password</small>
                        </div>
                        <button type="submit" class="btn btn-primary float-right" name="sign-in">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>