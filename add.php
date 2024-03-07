<?php 
 require 'config/config.php';

 if(empty($_SESSION['user_id']) && empty($_SESSION['singged_in'])) {
    
    header('location: _actions/login.php');
  }

 if(!empty($_POST)) {
    $desc = $_POST['description'];

    $stat = $pdo->prepare("INSERT INTO `todolist`(`description`) VALUES (:desc)");
    $stat->bindValue(':desc', $desc);
    $result = $stat->execute();
    if($result) {
        echo "<script>alert('Updated success!!')</script>";
         header('location: index.php');
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- BS css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- custom css -->
    <link rel="stylesheet" href="dist/css/style.css">
    <style>
        #logout a{
            color: #EDF4F2;
            padding: 8px 16px;
            background: #31473A;
            border-radius: 8px 0 8px 0;
            transition: .3s ease-in-out;
        }
        #logout a:hover {
            color: #31473A;
            background-color: #EDF4F2;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row g-0">
            <nav class="col-2 pe-3" id="nav">
                <div class="user d-flex align-items-center" style="margin-bottom: 20px;">
                    <img src="dist/img/user.jpeg" alt="" width="100" height="100">
                    <h5 class="ms-3">
                        <span class="fw-bold" style="font-size: 24px;"><?php echo $_SESSION['user_name'] ?></span>
                    </h5>
                </div>

                <ul class="text-center text-lg-start navbar nav">
                    <li class="nav-item">
                        <a href="index.php" class="active mb-3 nav-link">
                            <i class="fa-solid fa-list-check me-2"></i>
                            <span class="d-none d-lg-inline">Tasks</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="add.php" class="mb-3 nav-link" id="active">
                            <i class="fa-solid fa-plus me-2"></i>
                            <span class="d-none d-lg-inline">New Add</span>
                        </a>
                    </li>
                </ul>
                <div id="logout">
                <a href="_actions/logout.php" style="text-decoration: none;"><i class="fa fa-sign-out me-2" aria-hidden="true"></i>Logout</a>
                </div>
            </nav>
            <main class="col-10" id="main-side">
                <div class="card"  style="width: 70vw;" id="add">
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">Description</label>
                                <textarea name="description" id="" cols="30" rows="6" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">Date</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <button type="submit" class="btn">Add</button>
                          </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>