<?php
session_start();
?>
<?php
if(isset($_POST['change_password']))
{
	include("connection.php");
    $id=$_SESSION['user_id'];
    $opass=$_POST['opass'];
    $npass=$_POST['npass'];
	$rpass=$_POST['rpass'];
	if($npass==$rpass)
	{
	$sql1="select pass from user_table where pass='$opass' and userid='$id'";
	$sql2="select pass from chef_table where pass='$opass' and chefid='$id'";
	$sql3="select pass from admin_table where pass='$opass' and adminid='$id'";
    $u=mysqli_query($con,$sql1);
    $c=mysqli_query($con,$sql2);
    $a=mysqli_query($con,$sql3);
        if(mysqli_num_rows($u)>0)
        {
            $u_user="update user_table set pass='$npass' where userid='$id'"; 
            if(mysqli_query($con,$u_user))
            {
                $_SESSION['user_login_status']="loged out";
	            unset($_SESSION['user_id']);
                $_SESSION['toast']=1;
                header("Location:login.php");  
            }  
            else{
                echo "Old Password Not Match";
            }
        }
	    else if(mysqli_num_rows($c)>0)
	    {
            $u_chef="update chef_table set pass='$npass' where chefid='$id'"; 
            if(mysqli_query($con,$u_chef))
            {
                $_SESSION['user_login_status']="loged out";
	            unset($_SESSION['user_id']);
                header("Location:index.php");   
            }
            else{
                echo "Old Password Not Match";
            }      
	    }
        else{
            $u_admin="update admin_table set pass='$npass' where adminid='$id'"; 
            if(mysqli_query($con,$u_chef))
            {
                $_SESSION['admin_login_status']="loged out";
	            unset($_SESSION['user_id']);
                header("Location:login.php");   
            }
            else{
                echo "Old Password Not Match";
            }      
        }
	}
    else
    {
        echo "New password does not match with re-type password";
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
                        <a class="nav-link active" aria-current="page" href="#">Recipes</a>
                    </li>
                </ul>

                <div class="d-flex" role="search">
                    <ul class="navbar-nav me-5">
                        <li class="nav-item dropdown btn-outline-success ">
                            <a class="nav-link dropdown-toggle btn " href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <?php
                                include("connection.php");
                                $userid=$_SESSION['user_id'];
                                $sql="select lname from user_table where userid='$userid'";
                                $sql1="select lname from chef_table where chefid='$userid'";
                                 $r=mysqli_query($con,$sql);
                                 $r1=mysqli_query($con,$sql1);
                                 if(mysqli_num_rows($r)>0){

                                     $row=mysqli_fetch_assoc($r);
                                     $lname=$row['lname'];
                                     echo "<b>$lname</b>";
                                 }
                                 else{
                                    $row=mysqli_fetch_assoc($r1);
                                     $lname=$row['lname'];
                                     echo "<b>$lname</b>";
                                 }
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
    <section class="vh-110 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Change Password</h2>
                                <form action="change_password.php" method="post">
                                    <div class="form-outline form-white mb-4">
                                        <input name="opass" type="password" id="typePasswordX"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Old Password</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input name="npass" type="password" id="typePasswordX"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">New Password</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input name="rpass" type="password" id="typePasswordX"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Re-Type Password</label>
                                    </div>


                                    <button name="change_password" class="btn btn-outline-light btn-lg px-5"
                                        type="submit">Change Password</button>
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