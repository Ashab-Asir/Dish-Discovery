<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
                        <a class="nav-link " aria-current="page" href="user_world/user_home.php">Recipes</a>
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
    <section class="hero">
        <div class="container-fluid px-4 py-5 my-5 text-center">
            <div class="lc-block mb-4">
                <div editable="rich">
                    <h2 class="display-2 fw-bold">Find your <span class="text-primary">Favourite Recipes!</span></h2>
                </div>
            </div>
            <div class="lc-block col-lg-6 mx-auto mb-5">
                <div editable="rich">
                    <p class="lead">Explore our website for easy-to-follow recipe tips, clever tricks, and step-by-step
                        video tutorials, all designed to enhance your cooking experience.</p>
                </div>
            </div>

            <div class="lc-block d-grid gap-2 d-sm-flex justify-content-sm-center mb-5"> <a
                    class="btn btn-primary btn-lg px-4 gap-3" href="user_world/user_home.php" role="button">See
                    Recipes</a>
            </div>
            <div class="lc-block d-grid gap-2 d-sm-flex justify-content-sm-center">
                <img class="img-fluid"
                    src="https://img.freepik.com/premium-photo/gloved-chef-decorating-steak-by-sprinkling-parsley_44622-324.jpg?w=740"
                    width="" height="783" srcset="" sizes="" alt="">
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
</body>

</html>