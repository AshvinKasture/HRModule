<?php
session_start();
include('dbconnect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HR Module</title>
    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <div class="wrapper">
        <?php include("navbar.php");?>
        <div class="main_content">
            <div class="header">Leave Approval</div>

            <div class="info">
                <div>
                    <?php
                                                $selectQuery = "Select * from leaves where Status='pending'";
                                                $result = mysqli_query($conn, $selectQuery);
                                                if (mysqli_num_rows($result) > 0) {
                                                    ?>
                    <div class="table-responsive">

                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                <th scope="col">Srno.</th>

                                    <th scope="col">Employee Name</th>
                                    <th scope="col">Employee Id</th>
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
                                                        $eid = $row1['Employee_ID'];
                                                            $selectQuery3 = "Select * from employee where staff_id = '$eid'";
                                                            $result3 = mysqli_query($conn, $selectQuery3);
                                                            if (mysqli_num_rows($result3) == 1) {
                                                                if ($row3 = mysqli_fetch_assoc($result3)) {
                                                                    $fn = $row3['firstname'];
                                                                    $ln = $row3['lastname'];
                                                                    

                                                                }
                                                            }
                                                            
                                                        
                                                        $lt = $row1['Leave_Type'];
                                                        $sd = $row1['StartDate'];
                                                        $ed = $row1['EndDate'];
                                                        $st = $row1['StartTime'];
                                                        $et = $row1['EndTime'];
                                                        $reason = $row1['Reason'];
                                                        $status=$row1["Status"];
                                                        $n1=$row1['srno'];

                                    ?>
                                    <td><?php echo $n1?></td>

                                    <td><?php echo $eid?></td>
                                    <td><?php echo $fn.' '.$ln;?></td>

                                    <td><?php echo $lt?></td>
                                    <td><?php echo $sd?></td>
                                    <td><?php echo $ed?></td>
                                    <td><?php echo $st?></td>
                                    <td><?php echo $et?></td>
                                    <td><?php echo $reason?></td>
                                    <td> 
                                    <a href="approve.php?approve=<?php echo $n1; ?>">
                                    <button type="submit" class="btn btn-success" name="btn1"><i class="fa fa-check" aria-hidden="true"></i></button></a>
                                    <a href="rejected.php?reject=<?php echo $n1; ?>">
                                    <button type="submit" class="btn btn-danger"  name="btn2"><i class="fa fa-times" aria-hidden="true"></i></button></a>
                                    </td>



                                </tr>
                                <?php
                                                    }
                                                }
                                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

</body>

</html>