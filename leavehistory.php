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
            <div class="header">Leave History</div>

            <div class="info">
                <div>
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-8">
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


                            </form><br>
                            <?php
                                            if (isset($_POST["id"]) && !empty($_POST["id"]))
                                            {                            
                                                $lbl = $_POST["btn"];
                                            if ($lbl == "Check") {
                                                $id = $_POST['id'];
                                                $selectQuery = "Select * from leaves where Staff_ID= '$id'";
                                                $result = mysqli_query($con, $selectQuery);
                                                if (mysqli_num_rows($result) > 0) {
                                                    ?>
                            <div class="table-responsive">

                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Leave Type</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">From</th>
                                            <th scope="col">To</th>
                                            <th scope="col">Reason</th>
                                            <th scope="col">Status</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <?php
                                               
                                                    // output data of each row
                                                    while ($row1 = mysqli_fetch_assoc($result)) {
                                                        $lt = $row1['Leave_Type'];
                                                        $sd = $row1['StartDate'];
                                                        $ed = $row1['EndDate'];
                                                        $st = $row1['StartTime'];
                                                        $et = $row1['EndTime'];
                                                        $reason = $row1['Reason'];
                                                        $status=$row1["Status"];
                                                        $_SESSION['id']=$_POST['id'];

                                    ?>

                                            <td><?php echo $lt?></td>
                                            <td><?php echo $sd?></td>
                                            <td><?php echo $ed?></td>
                                            <td><?php echo $st?></td>
                                            <td><?php echo $et?></td>
                                            <td><?php echo $reason?></td>
                                            <td> <button type="button"
                                                    class="btn btn-success"><?php echo $status ?></button></td>



                                        </tr>
                                        <?php
                                                    }
                                                
                                                ?>

                                    </tbody>
                                </table>
                            </div>
                            <?php
                                                }
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

</body>

</html>
<?php } ?>