<?php 
 require '../config/config.php';

 if(!empty($_POST['email'])){
   $email = $_POST['email'];
   $password = $_POST['password'];

   $stat = $pdo->prepare("SELECT * FROM users WHERE email= :email");
   $stat->bindValue(':email', $email);
   $stat->execute();
   $user = $stat->fetch(PDO::FETCH_ASSOC);

   if($user) {
    if($user['password'] == $password ) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['name'];
      $_SESSION['singged_in'] = time();

      header('location: ../index.php');
    }
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
            <form method="post" action="login.php">
                <p class="text-center">Sign in to start your session</p>
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
                <button type="submit" class="btn btn-primary form-control">Login</button>
                <p>
                    <a href="register.php" class="float-end">Register</a>
                </p>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>