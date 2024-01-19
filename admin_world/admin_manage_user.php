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
    <link rel="stylesheet" href="../registration.css">
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
                        <a class="nav-link" aria-current="page" href="admin_home.php">Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin_manage_recipe.php">Manage Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="admin_manage_chef.php">Manage Chef</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin_manage_user.php">Manage User</a>
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

    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>User Name</th>
                <th>User ID</th>
                <th>Profession</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
    if(isset($_GET['LtoO']) and $_GET['LtoO']=="click") {
        include("../connection.php");
        $chefid=$_SESSION['user_id'];
        $sql = "SELECT recipeid,postdate,pic,preparationtime, recipename,cuisinetype,description,ingredients,steps FROM recipe_table ORDER BY postdate DESC;";
        $r = mysqli_query($con, $sql);
        if(mysqli_num_rows($r) > 0){
            while($row = mysqli_fetch_array($r))
            {
                $recipeid=$row['recipeid'];
                $pic = $row['pic'];
                $recipename = $row['recipename'];
                $postdate = $row['postdate'];
                $preparationtime = $row['preparationtime'];
                $cuisinetype=$row['cuisinetype'];
                $description=$row['description'];
                $ingredients=$row['ingredients'];
                $steps=$row['steps'];
                echo "<tr>";
                echo "    <td>";
                echo "        <div class='d-flex align-items-center'>";
                echo "            <img src='../images/recipe_images/$pic' alt='' style='width: 45px; height: 45px' />";
                echo "            <div class='ms-3'>";
                echo "                <p class='fw-bold mb-1'>$recipename</p>";
                echo "            </div>";
                echo "        </div>";
                echo "    </td>";
                echo "    <td>";
                echo "        <p class='fw-normal mb-1'>$postdate</p>";
                echo "    </td>";
                echo "    <td>";
                echo "        <span class='rounded-pill d-inline'>Acive</span>";
                echo "    </td>";
                echo "    <td>";
                echo "            <a class='btn btn-link btn-rounded btn-sm fw-bold' href='admin_update_recipe.php?recipeid=$recipeid'>Update</a>";
                echo "    </td>";
                echo "    <td>";
                echo "<a class='btn btn-link btn-rounded btn-sm fw-bold' href='admin_delete_recipe.php?recipeid=$recipeid'>Delete</a>";
                echo "    </td>";
                echo "</tr>";
            }
        }  
    }
    else if(isset($_GET['OtoL']) and $_GET['OtoL']=="click") {
        include("../connection.php");
        $chefid=$_SESSION['user_id'];
        $sql = "SELECT * FROM chef_table ORDER BY lname";
        $r = mysqli_query($con, $sql);
        if(mysqli_num_rows($r) > 0){
            while($row = mysqli_fetch_array($r))
            { 
                $lname=$row['lname'];
                $chefid=$row['chefid'];
                $email = $row['email'];
                $mobileno = $row['mobileno'];
                $cuisinetype=$row['cuisinetype'];
                $pic=$row['pic'];
                echo "<tr>";
                echo "    <td>";
                echo "        <div class='d-flex align-items-center'>";
                echo "            <img src='../images/chef_images/$pic' alt='' style='width: 45px; height: 45px' />";
                echo "            <div class='ms-3'>";
                echo "                <p class='fw-bold mb-1'>$lname</p>";
                echo "            </div>";
                echo "        </div>";
                echo "    </td>";
                echo "    <td>";
                echo "        <p class='fw-normal mb-1'>$chefid</p>";
                echo "    </td>";
                echo "    <td>";
                echo "        <span class='rounded-pill d-inline'>Acive</span>";
                echo "    </td>";
                echo "    <td>";
                echo "           <p class='fw-normal mb-1'>$email</p>";
                echo "    </td>";
                echo "    <td>";
                echo "<a class='btn btn-link btn-rounded btn-sm fw-bold' href='admin_delete_chef.php?chefid=$chefid'>Delete</a>";
                echo "    </td>";
                echo "</tr>";
            }
        }  
    }
    else{
        include("../connection.php");
    $chefid=$_SESSION['user_id'];
    $sql = "SELECT * FROM user_table";
    $r = mysqli_query($con, $sql);
    if(mysqli_num_rows($r) > 0){
        while($row = mysqli_fetch_array($r))
        {
            $lname=$row['lname'];
            $userid=$row['userid'];
            $email = $row['email'];
            $mobileno = $row['mobileno'];
            $profession=$row['profession'];
            $pic=$row['pic'];
            echo "<tr>";
            echo "    <td>";
            echo "        <div class='d-flex align-items-center'>";
            echo "            <img src='../images/user_images/$pic' alt='' style='width: 45px; height: 45px' />";
            echo "            <div class='ms-3'>";
            echo "                <p class='fw-bold mb-1'>$lname</p>";
            echo "            </div>";
            echo "        </div>";
            echo "    </td>";
            echo "    <td>";
            echo "        <p class='fw-normal mb-1'>$userid</p>";
            echo "    </td>";
            echo "    <td>";
            echo "        <span class='rounded-pill d-inline'>$profession</span>";
            echo "    </td>";
            echo "    <td>";
            echo "           <p class='fw-normal mb-1'>$email</p>";
            echo "    </td>";
            echo "    <td>";
            echo "<a class='btn btn-link btn-rounded btn-sm fw-bold' href='admin_delete_chef_or_user.php?userid=$userid'>Delete</a>";
            echo "    </td>";
            echo "</tr>";
        }
    }  
    }
?>
        </tbody>
    </table>

    <div style="width:100px;">
        <ul class="navbar-nav me-5>
        <li class=" nav-item dropdown btn-outline-success ">
            <a class=" nav-link dropdown-toggle btn " href=" #" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <b>Sort By Date</b>
            </a>
            <ul class="dropdown-menu custom-font-size">
                <li><a class="dropdown-item" href="?LtoO=click">Latest To Oldest</a></li>
                <li><a href="?OtoL=click" class="dropdown-item">Oldest To Newest</a></li>
            </ul>
            </li>
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>