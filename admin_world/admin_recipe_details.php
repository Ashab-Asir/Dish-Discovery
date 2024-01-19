<?php
   session_start();
   if($_SESSION['admin_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:../login.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['admin_login_status']="loged out";
	unset($_SESSION['user_id']);
   header("Location:../index.php");    
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_home.php">Dish Discovery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin_home.php">Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin_manage_recipe.php">Manage Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin_manage_chef.php">Manage Chef</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin_manage_user.php">Manage User</a>
                    </li>
                </ul>
                <div class="d-flex" role="search">
                    <ul class="navbar-nav me-5">
                        <li class="nav-item dropdown btn-outline-success ">
                            <a class="nav-link dropdown-toggle btn " href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <b>Mohammad</b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="admin_profile.php">Profile</a></li>
                                <li><a href="?sign=out" class="dropdown-item">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <?php
include("../connection.php");
// Get the product_id from the URL parameter
if (isset($_GET['recipeid'])) {
    $chefid=$_SESSION['user_id'];
    $recipeid = $_GET['recipeid'];
    $query = "SELECT * FROM recipe_table WHERE recipeid = '$recipeid'";
    $result = mysqli_query($con, $query); 

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $recipename=$row['recipename'];
        $preparationtime=$row['preparationtime'];
        $postdate=$row['postdate'];
        $cuisinetype=$row['cuisinetype'];
        $ingredients=$row['ingredients'];
        $pic = $row['pic'];
        $description = $row['description'];
        $steps = $row['steps'];


        echo "<div class='container mt-5'>";
        echo "    <div class='col-lg-8'>";
        echo "  <div class='row'>";
        echo "      <article>";
        echo "        <header class='mb-4'>";
        echo "          <h1 class='fw-bolder mb-1'>$recipename</h1>";
        echo "          <div class='text-muted fst-italic mb-2'>";
        echo "            Posted on $postdate";
        echo "          </div>";
        echo "          <a class='badge bg-secondary text-decoration-none link-light' href='#!'>$cuisinetype</a>";
        echo "          <a class='badge bg-secondary text-decoration-none link-light' href='#!'>$preparationtime</a>";
        echo "        </header>";
        echo "        <figure class='mb-4'>";
        echo "          <img src='../images/recipe_images/$pic'>";
        echo "        </figure>";
        echo "        <section class='mb-5'>";
        echo "          <h3>Description</h3>";
        echo "          <p class='fs-5 mb-4'>$description</p>";
        echo "          <h2 class='fw-bolder mb-4 mt-5'>Ingredients:</h2>";
        echo "          <p class='fs-5 mb-4'>$ingredients</p>";
        echo "          <h2 class='fw-bolder mb-4 mt-5'>Steps:</h2>";
        echo "          <p class='fs-5 mb-4'>$steps</p>";
        echo "        </section>";
        echo "      </article>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
        
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid product ID.";
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>