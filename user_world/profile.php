<?php
   session_start();
   if($_SESSION['user_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:../login.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['user_login_status']="loged out";
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
    <link rel="stylesheet" href="profile.css">
    <title>Dish Discovery</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="user_home.php">Dish Discovery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="user_home.php">Recipes</a>
                    </li>
                </ul>

                <div class="d-flex" role="search">
                    <ul class="navbar-nav me-5">
                        <li class="nav-item dropdown btn-outline-success ">
                            <a class="nav-link dropdown-toggle btn " href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <?php
                                include("../connection.php");
                                $userid=$_SESSION['user_id'];
                                $sql="select lname from user_table where userid='$userid'";
                                 $r=mysqli_query($con,$sql);
                                $row=mysqli_fetch_assoc($r);
                                $lname=$row['lname'];
                                echo "<b>$lname</b>";
                                ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><a href="?sign=out" class="dropdown-item">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <?php
                                include("../connection.php");
                                $userid=$_SESSION['user_id'];
                                $sql="select fname,lname,pic,profession from user_table where userid='$userid'";
                                 $r=mysqli_query($con,$sql);
                                $row=mysqli_fetch_assoc($r);
                                $fname=$row['fname'];
                                $lname=$row['lname'];
                                $image=$row['pic'];
                                $profession=$row['profession'];
                                $concatenatedString = $fname ." ". $lname;
                                echo"<img src='../images/user_images/$image';
                                    alt='Avatar' class='img-fluid my-5 mb-3' style='width: 80px;' />";
                                echo "<h5>$concatenatedString</h5>";
                                echo "<p>Profession: $profession</p>";
                                echo "<button class='text-white bg-dark rounded-4'><a href='user_change_password.php' class='text-decoration-none text-white'>Change Password</a></button>";
                                ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>User ID</h6>
                                            <?php
                                        include("../connection.php");
                                        $userid=$_SESSION['user_id'];
                                        echo "<p class='text-muted'>$userid</p>";
                                        ?>


                                        </div>
                                        <div class="col-8 mb-3">
                                            <h6>Email</h6>
                                            <?php
                                        include("../connection.php");
                                        $userid=$_SESSION['user_id'];
                                        $sql="select email from user_table where userid='$userid'";
                                        $r=mysqli_query($con,$sql);
                                        $row=mysqli_fetch_assoc($r);
                                        $email=$row['email'];
                                        echo "<p class='text-muted'>$email</p>";
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
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