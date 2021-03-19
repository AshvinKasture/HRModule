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

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>

    <div class="wrapper">
        <?php include("navbar.php");?>
        <div class="main_content">
            <div class="header">Apply for Leave</div>

            <div class="info">
                <div>
                <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-4">
                            <form action="" method="post" name="form1">
                                <div class="form-group">
                                    <label for="lbl1">Employee ID:</label>
                                    <select class="form-control" name="id" id="id1" required>
                                        <?php
                                            $searchquery = "SELECT * FROM staff";
                                            $result = mysqli_query($con, $searchquery);

                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $id = $row["staff_id"];
                                            ?>

                                        <option value="<?php echo $id; ?>"> <?php echo $id; ?></option>
                                        <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        ?>
                                    </select>


                                </div>
                                <input type="submit" class="btn btn-outline-info" name="btn" value="Check">


                            </form>
                            <?php
                                            if (isset($_POST["id"]) && !empty($_POST["id"]))
                                            {                            
                                                $lbl = $_POST["btn"];
                                            if ($lbl == "Check") {
                                                $id = $_POST['id'];
                                                $selectQuery = "Select * from staff where staff_id = '$id'";
                                                $result = mysqli_query($con, $selectQuery);
                                                if (mysqli_num_rows($result) == 1) {
                                                    if ($row1 = mysqli_fetch_assoc($result)) {
                                                        $fn = $row1['firstname'];
                                                        $ln = $row1['lastname'];
                                                        $userphoto=$row1['photo'];
                                                        $_SESSION['id']=$_POST['id'];

                                                    }
                                                }
                                                ?>
                            <hr>
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Employee Details</h5>
                
                                     <p > 
                                            <?php
                                            if($userphoto==""):
                                            ?>
                                            <img src="asset/img.png"   width="100" height="100" alt="Photo Size Is More Than 2MB Can't Be Displayed" >
                                            <?php else:?>
                                            <img src="profilePhoto/<?php echo htmlentities($userphoto);?>"   width="100" height="100" style = "border-radius : 50px; align:center" alt="Photo Size Is More Than 2MB Can't Be Displayed">

                                            <?php endif;?>
                                             
                                            </p>
                                            <br><br>
                                    <h6 class="card-subtitle mb-2 text-muted">Name:</h6>
                                    <p class="card-text"><?php echo $fn.' '.$ln;?></p>
                                </div>
                            </div>
                            <?php
                                }
                                }
                                ?>

                        </div>
                        <div class="col-sm-4">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="lbl3" class="form-label">Duration:</label>
                                    <select class="form-control" name="type" id="type" onchange="yesnoCheck(this);"
                                        required>
                                        <option value="">--Select--</option>
                                        <option value="short">Short</option>
                                        <option value="long">Long</option>
                                        <option value="whole">Whole day</option>
                                    </select><br>
                                    <div class="form-group" id="ifYes" style="display: none;">
                                        <label for="example-date-input" class="form-label">Date:</label>
                                        <input class="form-control" type="date" id="example-date-input" name="date">
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <input type="time" class="form-control" name="time1">
                                            </div>
                                            <div class="col">
                                                <input type="time" class="form-control" name="time2">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-group" id="long" style="display: none;">
                                        <label for="example-date-input" class="form-label">Start Date:</label>
                                        <input class="form-control" type="date" id="example-date-input" name="startdate"><br>
                                        <label for="example-date-input" class="form-label">End Date:</label>
                                        <input class="form-control" type="date" id="example-date-input" name="enddate">

                                    </div>
                                    <div class="form-group" id="whole" style="display: none;">
                                        <label for="example-date-input" class="form-label"> Date:</label>
                                        <input class="form-control" type="date" id="example-date-input" name="date1"><br>
                                    </div><br>
                                   
                                    <div class="form-group">
                                        <label for="comment">Reason:</label>
                                        <textarea class="form-control" rows="3" id="reason1" name="reason"></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-outline-success" name="btn1" value="Submit">

                                </div>
                            </form>
                            <?php
                                            if (isset($_POST["type"]) && !empty($_POST["type"]) && !empty($_POST["date"]) && isset($_POST["date"]))
                                            {                           
                                                
                                               $type = $_POST["type"];
                                               $reason = $_POST["reason"];
                                               $date=$_POST["date"];
                                               $time1=$_POST["time1"];
                                               $time2=$_POST["time2"];
                                               $n1=$_SESSION['id'];
                                               $lbl = $_POST["btn1"];
                                               $status="pending";

                                               if ($lbl == "Submit") {
                                                   $insertQuery = "INSERT INTO `leaves`(`Staff_ID`, `Leave_Type`, `StartDate`, `StartTime`, `EndTime`, `Reason`,`Status`) 
                                                   VALUES ('$n1','$type','$date','$time1','$time2','$reason','$status')";
                                                   if (mysqli_query($conn, $insertQuery)) {
                                                       echo "<script>alert('Successfully inserted');</script>";
                                                   } else {
                                                       echo "error" . $insertQuery . "<br>" . mysqli_error($con);
                                                   }
                                                   #mysqli_close($con);
                                               }
                                           }
                                           if (isset($_POST["type"]) && !empty($_POST["type"]) && !empty($_POST["startdate"]) && isset($_POST["startdate"]))
                                            {                           
                                                
                                               $type = $_POST["type"];
                                               $reason = $_POST["reason"];
                                               $n1=$_SESSION['id'];
                                               $lbl = $_POST["btn1"];
                                               $startdate=$_POST["startdate"];
                                               $enddate=$_POST["enddate"];
                                               $status="pending";


                
                                               if ($lbl == "Submit") {
                                                   $insertQuery = "INSERT INTO `leaves`(`Staff_ID`, `Duration`, `StartDate`, `EndDate`, `Reason`,`Status`)  
                                                   VALUES ('$n1','$type','$startdate','$enddate','$reason','$status')";
                                                   if (mysqli_query($con, $insertQuery)) {
                                                       echo "<script>alert('Successfully inserted1');</script>";
                                                   } else {
                                                       echo "error" . $insertQuery . "<br>" . mysqli_error($con);
                                                   }
                                                   #mysqli_close($con);
                                               }
                                           }
                                           if (isset($_POST["type"]) && !empty($_POST["type"]) && !empty($_POST["date1"]) && isset($_POST["date1"]))
                                            {                           
                                                
                                               $type = $_POST["type"];
                                               $reason = $_POST["reason"];
                                               $n1=$_SESSION['id'];
                                               $lbl = $_POST["btn1"];
                                               $date1=$_POST["date1"];
                                               $status="pending";
                                               if ($lbl == "Submit") {
                                                   $insertQuery = "INSERT INTO `leaves`(`Staff_ID`, `Leave_Type`, `StartDate`, `Reason`,`Status`)  
                                                   VALUES ('$n1','$type','$date1','$reason','$status')";
                                                   if (mysqli_query($con, $insertQuery)) {
                                                       echo "<script>alert('Successfully inserted2');</script>";
                                                   } else {
                                                       echo "error" . $insertQuery . "<br>" . mysqli_error($con);
                                                   }
                                                   #mysqli_close($con);
                                               }
                                           }
                                           
                           
                           
                            ?>
                        </div>
                        <div class="col-sm-2">
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
                    function yesnoCheck(that) {
                        if (that.value == "short") {
                            document.getElementById("ifYes").style.display = "block";
                        } 
                        else
                        {
                            document.getElementById("ifYes").style.display = "none";

                        }
                        if (that.value == "long"){
                            document.getElementById("long").style.display = "block";
                        }
                        else
                        {
                            document.getElementById("long").style.display = "none";

                        }
                        
                        if (that.value == "whole"){
                            document.getElementById("whole").style.display = "block";

                        }
                        else
                        {
                            document.getElementById("whole").style.display = "none";

                        }
                        
                    }
                    </script>




</body>

</html>
<?php } ?>