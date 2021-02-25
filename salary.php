<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Salary management</title>

    <!-- Custom fonts for this template-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/admin.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <h4>
                    <div class="sidebar-brand-text mx-3">HR ADMIN</div>
                </h4>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <h3><span>Dashboard</span>
                </a></strong></h3>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Profile Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Profile</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Payments</span>
                </a>

            </li>

            <!-- Nav Item - Leaves -->
            <li class="nav-item">
                <a class="nav-link" href="leave.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Apply Leaves</span></a>
            </li>

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    include('dbconnect.php');

                    ?>
                    <h2 style="text-align:center">Salary Calculation</h2>
                    <hr>

                    <div class="row">
                        <div class="col-sm-1 col-md-1 col-lg-1">
                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <form action="" method="post" id="my-form1">
                                <div class="form-group"><br><br>
                                    <label for="name">Employee ID:</label>
                                    <input type="text" class="form-control" id="langname" placeholder="Enter Employee ID" name="id">
                                </div>
                                <button type="submit" class="btn btn-primary align-right" name="btn" value="check">Check</button>
                            
                            </form>
                            <pre id="result"></pre>
                            <?php
                            if (isset($_POST["btn"]) && !empty($_POST["btn"])) {
                                $id = $_POST["id"];
                                $sql = "SELECT * FROM emp WHERE empid=$id";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $_SESSION['id'] = $_POST['id'];
                                        $_SESSION['fname'] = $row['fname'];
                                        $_SESSION['lname'] = $row['lname'];
                                        $_SESSION['email'] = $row['email'];
                                        $_SESSION['position'] = $row['position'];
                            ?>

                                        <hr>
                                        <div class="card" style="width: 22rem;">
                                            <div class="card-body">
                                                <h4 class="card-title">Employee Details</h4>
                                                <img src='img.png' height="150" width="150" style="border-radius: 50%;"><br><br>
                                                <h5 class="card-subtitle mb-2 text-muted">First name: <?php echo $row['fname']; ?></h5>
                                                <h5 class="card-subtitle mb-2 text-muted">Last name: <?php echo $row['lname']; ?></h5>
                                                <h5 class="card-subtitle mb-2 text-muted">Address: <?php echo $row['address']; ?></h5>
                                                <h5 class="card-subtitle mb-2 text-muted">Date of Birth: <?php echo $row['dob']; ?></h5>
                                                <h5 class="card-subtitle mb-2 text-muted">Contact number: <?php echo $row['contact']; ?></h5>
                                                <h5 class="card-subtitle mb-2 text-muted">Email: <?php echo $row['email']; ?></h5>
                                                <h5 class="card-subtitle mb-2 text-muted">Desgination: <?php echo $row['position']; ?></h5>
                                                <h5 class="card-subtitle mb-2 text-muted">Salary: <?php echo $row['salary']; ?></h5>
                                            </div>
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>

                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <form action="" method="post" id="my-form">
                                <div class="form-group"><br><br>
                                    <label for="name">Salary:</label>
                                    <input type="text" class="form-control" id="langname" placeholder="Enter Salary" name="salary">
                                </div>
                                <div class="form-group">
                                    <label for="name">PF Percentage:</label>
                                    <input type="text" class="form-control" id="langname" placeholder="Enter PF Percentage" name="pf">
                                </div>
                                <button type="submit" class="btn btn-primary align-right" name="btnn" value="calc">Calculate</button>

                            </form>
                            <pre id="result"></pre>
                            <?php
                            if (isset($_POST["btnn"]) && !empty($_POST["btnn"])) {
                                $id1 = $_SESSION['id'];
                                $sal = $_POST["salary"];
                                $_SESSION['sal'] = $sal;
                                $pf = $_POST["pf"];
                                $_SESSION['pf'] = $pf;
                                $ded = ($pf / 100) * $sal;
                                $netsal = $sal - $ded;
                                $_SESSION['netsal'] = $netsal;
                                $insertQuery = "INSERT INTO staffsalary(empid,salary,pfpercent,netsal) VALUES ('$id1','$sal','$pf','$netsal')";
                                if (mysqli_query($conn, $insertQuery)) {
                                    ?>
                            
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1">
                        </div>


                    </div>

                    <div class="row">
                <div class="col-2 col-md-2 col-lg-2"></div>
                <div class="col-8 col-md-8 col-lg-8 table-responsive">
                <h4>Salary Details</h4>
                    <table class="table table-bordered">
                        <?php
                        $fname=$_SESSION['fname'];
                        $lname=$_SESSION['lname'];
                        $email=$_SESSION['email'];
                        $position=$_SESSION['position'];
                        $sal=$_SESSION['sal'];
                        $pf=$_SESSION['pf'];
                        $netsal=$_SESSION['netsal'];
                        ?>
                            <thead>
                                <tr>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Salary</th>
                                    <th>PF Percentage</th>
                                    <th>Net Salary</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $fname; ?></td>
                                        <td><?php echo $lname; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $position; ?></td>
                                        <td><?php echo $sal; ?></td>
                                        <td><?php echo $pf; ?></td>
                                        <td><?php echo $netsal; ?></td>
                                    </tr>
                                </tbody><br>
                    </table>
                </div>
                <?php
                } else {
                    echo "error" . $insertQuery . "<br>" . mysqli_error($conn);
                }
            }
            ?>
                <div class="col-3 col-md-3 col-lg-3"></div>
            </div>

                </div>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
                </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
                </script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
                </script>


</body>

</html>