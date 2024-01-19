<?php
session_start();
?>
<?php
include("connection.php");
if(isset($_POST['login']))
{
	$id=$_POST['id'];
	$pass=$_POST['pass'];

	$sql="select userid,pass from user_table where userid='$id' and pass='$pass'";
    $sql1="select chefid,pass from chef_table where chefid='$id' and pass='$pass'";
    $sql2="select adminid,pass from admin_table where adminid='$id' and pass='$pass'";
            $ur=mysqli_query($con,$sql);
            $cr=mysqli_query($con,$sql1);
            $ar=mysqli_query($con,$sql2);
            if(mysqli_num_rows($ur)>0)
            {
                $_SESSION['user_id']=$id;
                $_SESSION['user_login_status']="loged in";
                header("Location:User_world/user_home.php");
            }
            
            else if(mysqli_num_rows($cr)>0)
            {
                $_SESSION['user_id']=$id;
                $_SESSION['chef_login_status']="loged in";
                header("Location:chef_world/chef_home.php");
            }
            else if(mysqli_num_rows($ar)>0){
                $_SESSION['user_id']=$id;
                $_SESSION['admin_login_status']="loged in";
                header("Location:admin_world/admin_home.php");
            }
            else 
            {
                echo "<p style='color: red;'>Incorrect Id or Password</p>";
            }
	
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Dish Dishcovery</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Dish Discovery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="user_world/user_home.php">Recipes</a>
                    </li>
                </ul>

                <div class="d-flex" role="search">
                    <ul class="navbar-nav me-2">
                        <li class="nav-item dropdown btn-outline-success ">
                            <a class="nav-link dropdown-toggle btn " href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Signup
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="user_signup.php">User Signup</a></li>
                                <li><a class="dropdown-item" href="chef_signup.php">Chef Signup</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a href="login.php" class="btn btn-outline-success me-2" type="submit">Login</a>
                </div>

            </div>
        </div>
    </nav>
    <section class="vh-110 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your ID and password!</p>

                                <form action="login.php" method="post">
                                    <div class="form-outline form-white mb-4">
                                        <input name="id" type="text" id="typeEmailX"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX">ID</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input name="pass" type="password" id="typePasswordX"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Password</label>
                                    </div>
                                    <button name="login" class="btn btn-outline-light btn-lg px-5"
                                        type="submit">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>