<?php
   session_start();
   if($_SESSION['admin_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:../login.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['admin_login_status']="loged out";
	unset($_SESSION['user_id']);
   header("Location:../login.php");    
   }
   if (isset($_GET['recipeid'])) {
    $recipeid = $_GET['recipeid'];
    $_SESSION['recipe_id']=$recipeid;
}
   include("../connection.php");
    $session_recipeid=$_SESSION['recipe_id'];
    $sql = "SELECT recipeid,postdate,pic,preparationtime,recipename,cuisinetype,description,ingredients,steps FROM recipe_table where recipeid='$session_recipeid'";
    $r = mysqli_query($con, $sql);
    if(mysqli_num_rows($r) > 0){
            $row = mysqli_fetch_array($r);
            $pic = $row['pic'];
            $recipename = $row['recipename'];
            $postdate = $row['postdate'];
            $preparationtime = $row['preparationtime'];
            $cuisinetype=$row['cuisinetype'];
            $description=$row['description'];
            $ingredients=$row['ingredients'];
            $steps=$row['steps'];

            $_SESSION['recipe_name']=$recipename;
            $_SESSION['preparationtime']=$preparationtime;
            $_SESSION['postdate']=$postdate;
            $_SESSION['cuisinetype']=$cuisinetype;
            $_SESSION['description']=$description;
            $_SESSION['ingredients']=$ingredients;
            $_SESSION['steps']=$steps;
          
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../registration.css">
    <link rel="stylesheet" href="admin_home.css">
    <title>Dish Discovery</title>
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

    <section class="vh-120 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-3">Update Recipe</h3>
                            <form action="admin_update_recipe.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div class="form-outline">
                                            <?php
                                            $recipename=$_SESSION['recipe_name'];
                                            echo "<input  type='text' value='$recipename' name='recipeName' id='lastName'";
                                            echo "class='form-control form-control-lg' />";
                                            ?>
                                            <label class="form-label" for="lastName">Recipe Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <?php
                                            $preparationtime=$_SESSION['preparationtime'];
                                            echo"   <input type='text' value='$preparationtime' name='preparationTime'";
                                            echo "    class='form-control form-control-lg' id='birthdayDate' >'"
                                            ?>

                                            <label for="birthdayDate" class="form-label">Preparation Time</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <?php
                                            $postdate=$_SESSION['postdate'];
                                           echo" <input type='date' value='$postdate' name='date' class='form-control form-control-lg'
                                                id='birthdayDate' />";
                                        ?>

                                            <label for="birthdayDate" class="form-label">Date</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="file" name="pic" id="phoneNumber"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="phoneNumber">Image</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-1">
                                        <select name="cuisineType" class="select form-control-lg">
                                            <option value="Bangladeshi">Bangladeshi</option>
                                            <option value="Indian">Indian</option>
                                            <option value="Chinese">Chinese</option>
                                            <option value="Others">Others</option>
                                        </select><br>
                                        <label class="form-label select-label">Cuisine Type</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                    $description=$_SESSION['description'];
                                    echo "<textarea name='description' rows='8' cols='18'>$description</textarea>"
                                ?>

                                    <br>
                                    <label>Description</label>
                                </div>
                                <div class="row">
                                    <?php
                                    $ingredients=$_SESSION['ingredients'];
                                echo"<textarea name='ingredients' rows='8' cols='18'>$ingredients</textarea>"
                                ?>
                                    <br>
                                    <label>Ingredients</label>
                                </div>
                                <div class="row">
                                    <?php
                                    $steps=$_SESSION['steps'];
                                echo"<textarea name='steps' rows='8' cols='18'>$steps</textarea>"
                                ?>
                                    <br>
                                    <label>Steps</label>
                                </div>
                                <div class="mt-4 pt-2">
                                    <input name="updaterecipe" class="btn btn-primary btn-lg" type="submit"
                                        value="Update Recipe" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
if(isset($_POST['updaterecipe'])){
        include("../connection.php");
        $chefid=$_SESSION['user_id'];
    	$recipename=$_POST['recipeName'];
        $preparationtime=$_POST['preparationTime'];
    	$postdate=$_POST['date'];
    	$cuisinetype=$_POST['cuisineType'];
    	$description=$_POST['description'];
    	$ingredients=$_POST['ingredients'];
    	$steps=$_POST['steps'];
        $num=rand(10,100);
    	$cus_id="c-".$num;

    	//image upload code
    	$ext= explode(".",$_FILES['pic']['name']);
        $c=count($ext);
        $ext=$ext[$c-1];
        $date=date("D:M:Y");
        $time=date("h:i:s");
        $image_name=md5($date.$time.$cus_id);
        $image=$image_name.".".$ext;

    	$query="UPDATE recipe_table SET recipename='$recipename',preparationtime='$preparationtime',postdate='$postdate',cuisinetype='$cuisinetype',ingredients='$ingredients',steps='$steps' WHERE recipeid='$session_recipeid'";
    	if(mysqli_query($con,$query))
    	{
    		if($image !=null){
    	                move_uploaded_file($_FILES['pic']['tmp_name'],"../images/recipe_images/$image");
                        }
                        echo '<script>window.location.href = "admin_home.php";</script>';

        }
    	else
    	{
    		echo "error!".mysqli_error($con);
    	}
}
?>