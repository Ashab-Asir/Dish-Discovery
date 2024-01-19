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
    <link rel="stylesheet" href="../registration.css">
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
                        <a class="nav-link " aria-current="page" href="chef_home.php">Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="add_recipes.php">Add Recipes</a>
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
                                $sql="select lname from chef_table where chefid='$chefid'";
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

    <section class="vh-120 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-3">Add Recipe</h3>
                            <form action="add_recipes.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="recipeid" id="firstName"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="firstName">Recipe ID</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="recipeName" id="lastName"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="lastName">Recipe Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <input type="text" name="preparationTime"
                                                class="form-control form-control-lg" id="birthdayDate" />
                                            <label for="birthdayDate" class="form-label">Preparation Time</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <input type="date" name="date" class="form-control form-control-lg"
                                                id="birthdayDate" />
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
                                    <textarea name="description" rows="8" cols="18"></textarea>
                                    <br>
                                    <label>Description</label>
                                </div>
                                <div class="row">
                                    <textarea name="ingredients" rows="8" cols="18"></textarea>
                                    <br>
                                    <label>Ingredients</label>
                                </div>
                                <div class="row">
                                    <textarea name="steps" rows="8" cols="18"></textarea>
                                    <br>
                                    <label>Steps</label>
                                </div>
                                <div class="mt-4 pt-2">
                                    <input name="addRecipe" class="btn btn-primary btn-lg" type="submit"
                                        value="Add Recipe" />
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
include("../connection.php");
if(isset($_POST['addRecipe']))
{ 
    $chefid=$_SESSION['user_id'];
    $recipeid=$_POST['recipeid'];
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

	$query="insert into recipe_table values('$recipeid','$chefid','$recipename','$preparationtime','$postdate','$image','$cuisinetype','$description','$ingredients','$steps',0)";
	if(mysqli_query($con,$query))
	{
		echo "Successfully inserted!";
		if($image !=null){
	                move_uploaded_file($_FILES['pic']['tmp_name'],"../images/recipe_images/$image");
                    }
    }
	else
	{
		echo "error!".mysqli_error($con);
	}
}
?>