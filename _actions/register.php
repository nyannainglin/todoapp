<?php 
  require '../config/config.php';

  if(!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stat = $pdo->prepare("INSERT INTO `users`(name, email, password) VALUES (:name, :email, :password)");
    $result = $stat->execute(
      array(
        ':name' => $name,
        ':email' => $email, 
        ':password' => $password
      )
    );
    if($result) {
        echo "<script>alert('Please login now!!')</script>";
         header('location: login.php');
    }
 }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../dist/css/partial/login.css">
  </head>
  <body>
    <div class="card" id="login-form">
        <h3 class="text-center mb-3">To Do <span style="font-weight: 400;">List</span></h3>
        <div class="card-body" id="login-body">
            <form method="post" action="register.php">
                <p class="text-center">Register to start your session</p>
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                    <div class="input-group-text">
                        <i class="fa-solid fa-user"></i>
                    </div>
                  </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-text">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                  </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary form-control">Register</button>
                <p>
                    <a href="login.php" class="float-start">Login Now</a>
                </p>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>