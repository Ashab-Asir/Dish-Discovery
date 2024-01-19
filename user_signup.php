<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Dish Discovery</title>
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

    <section class="vh-120 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">User Registration Form</h3>
                            <form action="user_signup.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="firstName" id="firstName"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="firstName">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="lastName" id="lastName"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="lastName">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <input type="text" name="userid" class="form-control form-control-lg"
                                                id="birthdayDate" />
                                            <label for="birthdayDate" class="form-label">User ID</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6 class="mb-2 pb-1">Gender: </h6>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="gender" type="radio"
                                                name="inlineRadioOptions" id="femaleGender" value="Female" checked />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="gender" type="radio"
                                                name="inlineRadioOptions" id="maleGender" value="Male" />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="gender" type="radio"
                                                name="inlineRadioOptions" id="otherGender" value="Other" />
                                            <label class="form-check-label" for="otherGender">Other</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="email" name="email" id="emailAddress"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="emailAddress">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="tel" name="mobileno" id="emailAddress"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="emailAddress">Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <input type="password" name="pass" id="emailAddress"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="emailAddress">Password</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <input type="file" name="pic" id="phoneNumber"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="phoneNumber">Image</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">

                                        <select name="profession" class="select form-control-lg">
                                            <option value="Student">Student</option>
                                            <option value="House Wife">House Wife</option>
                                            <option value="Teacher">Teacher</option>
                                        </select>

                                        <label class="form-label select-label">Profession</label>

                                    </div>
                                </div>

                                <div class="mt-4 pt-2">
                                    <input name="submit" class="btn btn-primary btn-lg" type="submit"
                                        value="Register" />
                                </div>

                            </form>
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

<?php
include("connection.php");
if(isset($_POST['submit']))
{   $userid=$_POST['userid'];
	$fname=$_POST['firstName'];
    $lname=$_POST['lastName'];
	$email=$_POST['email'];
	$mob=$_POST['mobileno'];
	$profession=$_POST['profession'];
	$gender=$_POST['gender'];
	$pass=$_POST['pass'];

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

	$query="insert into user_table values('$userid','$fname', '$lname','$email','$mob','$image','$profession','$gender','$pass')";
	if(mysqli_query($con,$query))
	{
		echo "Successfully inserted!";
		if($image !=null){
	                move_uploaded_file($_FILES['pic']['tmp_name'],"images/user_images/$image");
                    }
    }
	else
	{
		echo "error!".mysqli_error($con);
	}
}
?>