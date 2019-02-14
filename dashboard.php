<?php require_once("auth.php"); ?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
</head>
<body class="">
    <main>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-body">
                    <h5 class="card-title">Name</h5>
                    <p class="card-text"><?php echo  $_SESSION["user"]["name"] ?></p>
                    <h5 class="card-title">Email</h5>
                    <p class="card-text"><?php echo  $_SESSION["user"]["email"] ?></p>
                    <h5 class="card-title">Username</h5>
                    <p class="card-text"><?php echo  $_SESSION["user"]["username"] ?></p>
                    <h5 class="card-title">Sign In Counter</h5>
                    <p class="card-text"><?php echo  $_SESSION["user"]["sign_in_counter"] ?> Times</p>
                    <h5 class="card-title">Last Login</h5>
                    <p class="card-text"><?php echo  $_SESSION["user"]["last_login"] ?></p>
                    
                    <a href="logout.php" class="btn btn-primary">Logout</a>
                </div>
            </div>

        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
	<script>
	</script>
</body>
</html>