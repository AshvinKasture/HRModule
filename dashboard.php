<?php 
session_start();
error_reporting(0);
include('connect.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:login.html');
}
else{
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HR Module</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</head>

<body>

    <div class="wrapper">
        <?php include("navbar.php");?>
        <div class="main_content">

            <main class="bg-light" style="float: left;">

                <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom mx-1">
                <h1 class="h2 mx-3">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">

                    <li class="mx-3 my-3 text-nowrap" type="none">
                        <div class="dropdown">
                            <button class="btn btn-white  bg-white border-dark " type=" button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false" style="color: gray;">
                                <b>Abhishek Awasarmal </b> <img class="user"
                                    src="https://img.icons8.com/bubbles/50/000000/user-male.png" />
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user-alt"></i> Profile </a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-cog"  ></i> Settings</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-address-book" aria-hidden="true"></i> Activity log </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout </a></li>

                            </ul>
                        </div>
                    </li>
                </div>
            </div>

            <div class="row mx-1" >

    
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Attendance</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">89%</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Payment(remaining)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


            <div class="row  mx-1">

                <!-- Area Chart -->
                <div class="col-xl-8 col-md-12 mb-4">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Daily Attendance</h6>

                        </div>
                        <!-- Card Body -->
                        <div class="card-body" style="height: 455px;" >

                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-md-12 mb-4">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Overtime Status</h6>

                        </div>
                        <!-- Card Body -->
                        <div class="card-body" style="height: 455px;">
                    
                        </div>

                    </div>
                </div>

                <div class="col-lg-12 mb-4">

                    <!-- Illustrations -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                    src="img/undraw_posting_photo.svg" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae repellendus sapiente
                                quas asperiores officiis, atque, nulla suscipit mollitia tenetur ducimus
                                consequuntur molestiae neque modi quis ratione incidunt aut, possimus perferendis
                                facere earum voluptatum vel ex maiores? Id a excepturi mollitia ipsum nobis culpa
                                animi, facilis quaerat similique doloremque aliquam magnam quam quisquam harum qui,
                                iusto ipsam ex aperiam veniam, blanditiis saepe laboriosam vitae dolorem!
                                Consequuntur reprehenderit alias nobis voluptatem facilis totam odit! Nesciunt
                                perspiciatis consequuntur id aliquam quaerat, quas necessitatibus sit iste dolores
                                exercitationem laboriosam eaque corporis corrupti illo. Fugit voluptatem molestiae
                                necessitatibus soluta quam dolorem quibusdam, accusantium laborum sapiente?</p>
                            <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                unDraw →</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>


</body>

</html>
<?php } ?>