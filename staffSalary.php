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
      <link href="style.css" rel="stylesheet" >
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>

</head>

<body id="page-top" style="overflow:hidden">
<div class="wrapper">
     <?php include("navbar.php");?>
     </div>
                 <!-- Begin Page Content -->
                <div class="container-fluid" style="
    margin-top: 100px;
    margin-left: 300px;
      width: 100%;
   ">
                    <?php
                    include('connect.php');

                    ?>
                    <div class="header">Calculate Salary</div>
              

                    <div class="row" style="margin-right:500px;">
                        
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <form action="" method="post" id="my-form1">
                                <div class="form-group"><br><br>
                                    <label for="name">Employee ID:</label>
                                    <input type="text" class="form-control" id="langname" placeholder="Enter Employee ID" name="sid">
                                </div>
                                <button type="submit" class="btn btn-primary align-right" name="btn" value="check">Check</button>
                            
                            </form>
                            <pre id="result"></pre>
                            <?php
                                            if (isset($_POST["sid"]) && !empty($_POST["sid"]))
                                            {                            
                                                $lbl = $_POST["btn"];
                                            if ($lbl == "check") {
                                                $id = $_POST['sid'];
                                                $selectQuery = "Select * from staff where staff_id = '$id'";
                                                $result = mysqli_query($con, $selectQuery);
                                                if (mysqli_num_rows($result) == 1) {
                                                    if ($row1 = mysqli_fetch_assoc($result)) {
                                                    
                                                        $userphoto=$row1['photo'];
                                                        $_SESSION['id']=$_POST['sid'];

                                                    }
                                                }
                                                ?>

                                        <hr>
                                        <div class="card" style="width: 22rem;">
                                            <div class="card-body">
                                                <h4 class="card-title">Employee Details</h4>
                                                 <p > 
                                            <?php
                                            if($userphoto==""):
                                            ?>
                                            <img src="asset/img.png"   width="100" height="100" alt="Photo Size Is More Than 2MB Can't Be Displayed" >
                                            <?php else:?>
                                            <img src="profilePhoto/<?php echo htmlentities($userphoto);?>"   width="100" height="100" style = "border-radius : 50px; align:center" alt="Photo Size Is More Than 2MB Can't Be Displayed">

                                            <?php endif;?>
                                             
                                            </p><br><br>
                                                <h5 class="card-subtitle mb-2 text-muted">First name: <?php echo $row1['firstname']; ?></h5>
                                                <h5 class="card-subtitle mb-2 text-muted">Last name: <?php echo $row1['lastname']; ?></h5>
                                                <h5 class="card-subtitle mb-2 text-muted">Address: <?php echo $row1['address']; ?></h5>
                                                <h5 class="card-subtitle mb-2 text-muted">Date of Birth: <?php echo $row1['dob']; ?></h5>
                                                <h5 class="card-subtitle mb-2 text-muted">Contact number: <?php echo $row1['phone']; ?></h5>
                                                <h5 class="card-subtitle mb-2 text-muted">Email: <?php echo $row1['email']; ?></h5>
                                                <h5 class="card-subtitle mb-2 text-muted">Desgination: <?php echo $row1['position']; ?></h5>
                                                <h5 class="card-subtitle mb-2 text-muted">Salary: <?php echo $row1['sal']; ?></h5>
                                            </div>
                                        </div>
                          

                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <form action="" method="post" id="my-form">
                                <div class="form-group"><br><br>
                                    <label for="name">Salary:</label>
                                    <input type="text" class="form-control" id="langname" readonly placeholder="Enter Salary" name="salary" value=<?php echo $row1['sal']; ?>>
                                </div>
                                <div class="form-group">
                                    <label for="name">PF Percentage:</label>
                                    <input type="text" class="form-control" id="langname" placeholder="Enter PF Percentage" name="pf">
                                </div>
                                <button type="submit" class="btn btn-primary align-right" name="btnn" value="calc">Calculate</button>

                            </form>
                              <?php
                                    }
                                }
                
                            ?>
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
                                $insertQuery = "INSERT INTO staffsalary(staff_id,salary,pfpercent,netsal) VALUES ('$id1','$sal','$pf','$netsal')";
                                if (mysqli_query($con, $insertQuery)) {
                                    ?>
                            
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1">
                        </div>


                    </div>

                    <div class="row">
                
                <div class="col-8 col-md-8 col-lg-8 table-responsive">
                <h4>Salary Details</h4>
                    <table class="table table-bordered">
                        <?php
                        $id = $_SESSION['id'];
                                                $selectQuery = "Select * from staff where staff_id = '$id'";
                                                $result = mysqli_query($con, $selectQuery);
                                                if (mysqli_num_rows($result) == 1) {
                                                    if ($row1 = mysqli_fetch_assoc($result)) {
                                                        $fname=$row1['firstname'];
                                                        $lname=$row1['lastname'];
                                                        $email=$row1['email'];
                                                        $position=$row1['position'];
                                                          
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
                                <?php
                                                    }
                                                }
                                                ?>
                    </table>
                </div>
                <?php
                } else {
                    echo "error" . $insertQuery . "<br>" . mysqli_error($con);
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