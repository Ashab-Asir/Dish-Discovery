<?php
   session_start();
   if($_SESSION['chef_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:../login.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['chef_login_status']="loged out";
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
    <link rel="stylesheet" href="chef_home.css">
    <title>Dish Discovery</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="chef_home.php">Dish Discovery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="chef_home.php">Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_recipes.php">Add Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage-recipes.php">Manage Recipes</a>
                    </li>
                </ul>

                <div class="d-flex" role="search">
                    <ul class="navbar-nav me-5">
                        <li class="nav-item dropdown btn-outline-success ">
                            <a class="nav-link dropdown-toggle btn " href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <?php
                                include("../connection.php");
                                $chefid=$_SESSION['user_id'];
                                $sql="select lname,fname from chef_table where chefid='$chefid'";
                                 $r=mysqli_query($con,$sql);     
                                $row=mysqli_fetch_assoc($r);
                                $lname=$row['lname'];     
                                echo "<b>$lname</b>";
                                ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="chef_profile.php">Profile</a></li>
                                <li><a href="?sign=out" class="dropdown-item">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-4 py-5 my-5 text-center">
        <div class="lc-block mb-4">
            <div editable="rich">
                <?php
            include("../connection.php");
            $chefid=$_SESSION['user_id'];
            $sql="select fname,lname from chef_table where chefid='$chefid'";
            $r=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($r);
            $fname=$row['fname']; 
            $lname=$row['lname'];
            $concatenatedString = $fname ." ". $lname;
            echo "<h2 class='display-2 fw-bold'>Hello <span class='text-primary'>$concatenatedString !</span></h2>";
            ?>
            </div>
        </div>
        <div class="lc-block col-lg-6 mx-auto mb-2">
            <div editable="rich">
                <p class="lead">Welcome To <b>Dish Discovery</b>.Find Your Favorite Recipes</p>
            </div>
        </div>

        <form action="chef_home.php" method="post">
            <div class="lc-block d-flex flex-column  gap-2 d-sm-flex align-items-center justify-content-sm-center mb-5">
                <input class="form-control search-bar me-2 text-center p-2 border-2 border-primary" type="search"
                    placeholder="Enter Recipe...." aria-label="Search" name="search">
                <button class="btn search-bar btn-primary" name="search-btn" type="submit">Search</button>
            </div>
        </form>
    </div>
    <h1 class="text-center b">RECIPES</h1>
    <section class="recipes-section d-flex justify-content-center">
        <div class="recipes-container d-flex lg justify-content-between flex-wrap gap-5">
            <?php
            include("../connection.php");

            // Check if a search query was submitted
            if(isset($_POST['search-btn'])){
                $search = $_POST['search'];

                // Construct a SQL query to search for recipes
                $sql = "SELECT recipeid, pic, recipename, description,ingredients,steps FROM recipe_table WHERE status=1 and recipename LIKE '%$search%' OR description LIKE '%$search%' OR cuisinetype LIKE '%$search%' OR ingredients LIKE '%$search%' OR steps LIKE '%$search%'";
                $r = mysqli_query($con, $sql);

                if(mysqli_num_rows($r) > 0){
                    while($row = mysqli_fetch_array($r))
                    {
                        $recipeid=$row['recipeid'];
                        $pic = $row['pic'];
                        $recipename = $row['recipename'];
                        $description = $row['description'];
                        $words = explode(' ', $description);
                        $shortDescription = implode(' ', array_slice($words, 0, 10));
                        
                        echo "<div class='card col-12 col-lg-3'>";
                        echo "<img src='../images/recipe_images/$pic' class='card-img-top' alt='...' style='height: 250px;'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>$recipename</h5>";
                        echo "<p class='card-text'>$shortDescription...</p>";
                        echo "<a href='chef_recipe_details.php?recipeid=$recipeid'class='btn btn-primary'>Read More</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "No matching recipes found.";
                }
            }
            else {
                $sql = "SELECT recipeid, pic, recipename, description FROM recipe_table where status=1";
                $r = mysqli_query($con, $sql);

                if(mysqli_num_rows($r) > 0){
                    while($row = mysqli_fetch_array($r))
                    {
                        $recipeid=$row['recipeid'];
                        $pic = $row['pic'];
                        $recipename = $row['recipename'];
                        $description = $row['description'];
                        $words = explode(' ', $description);
                        $shortDescription = implode(' ', array_slice($words, 0, 10));
                        echo "<div class='card col-12 col-lg-3'>";
                        echo "<img src='../images/recipe_images/$pic' class='card-img-top' alt='...' style='height: 250px;'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>$recipename</h5>";
                        echo "<p class='card-text'>$shortDescription...</p>";
                        echo "<a href='chef_recipe_details.php?recipeid=$recipeid'class='btn btn-primary'>Read More</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "No recipes available.";
                }
            }
        ?>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>