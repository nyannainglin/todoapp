<?php
  require '../config/config.php';
// edit
    $statement = $pdo->prepare("SELECT * FROM todolist WHERE id=".$_GET['id']);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

//   update
    if(!empty($_POST)) {
        $description = $_POST['description'];

        $stat = $pdo->prepare("UPDATE `todolist` SET `description`='$description' WHERE id=".$_GET['id']);
        $updated = $stat->execute();
        if($updated) {
            echo "<script>alert('Updated success!!')</script>";
            header('location: ../index.php');
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
    <link rel="stylesheet" href="../dist/css/style.css">
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
                <h3 class="h5 py-3 text-center text-md-start">
                    <i class="fa-solid fa-person-running text-lg-center"></i>
                    <span class="d-none d-lg-inline" style="font-size: 24px;">Todo List</span>
                </h3>

                <ul class="text-center text-lg-start navbar nav">
                    <li class="nav-item">
                        <a href="../index.php" class="active mb-3 nav-link">
                            <i class="fa-solid fa-list-check me-2"></i>
                            <span class="d-none d-lg-inline">Tasks</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../add.php" class="mb-3 nav-link">
                            <i class="fa-solid fa-plus me-2"></i>
                            <span class="d-none d-lg-inline">New Add</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../user.php" class="mb-3 nav-link">
                            <i class="fa-regular fa-user me-2"></i>
                            <span class="d-none d-lg-inline">User Profile</span>
                        </a>
                    </li>
                </ul>
                <div id="logout">
                <a href="logout.php" style="text-decoration: none;"><i class="fa fa-sign-out me-2" aria-hidden="true"></i>Logout</a>
                </div>
            </nav>
            <main class="col-10" id="main-side">
                <div class="card"  style="width: 70vw;" id="add">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">Description</label>
                                <textarea name="description" id="" cols="30" rows="6" class="form-control"><?php echo $result['description'] ?></textarea>
                            </div>
                            <button type="submit" class="btn">Update</button>
                          </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>