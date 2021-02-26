<?php 
session_start();
error_reporting(0);
include('connect.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>List Of Staff</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="css/listStaff.css">
    
 
<body>
    <div><h1>STAFF LIST</h1></div>
<div class="container">
    
             <table>
                <thead class="dark">
                    <tr>
                    <th>Staff ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
          <?php 
  $query=mysqli_query($con,"select * from staff");
  while($row=mysqli_fetch_array($query))
{
  ?>
                        <tr>
                                <td align="center"><?php echo  htmlentities($row['staff_id']);?></td>
                                  <td align="center"><?php echo htmlentities($row['firstname']);?></td>
                                  <td align="center"><?php echo htmlentities($row['lastname']);?></td>
                                  <td align="center"><?php echo  htmlentities($row['gender']);?></td>
                                  <td align="center"><?php echo  htmlentities($row['email']);?></td>
                                  <td align="center"><?php echo  htmlentities($row['phone']);?></td>
                                  <td align="center"><?php echo  htmlentities($row['position']);?></td>
                                  <td align="center"><?php echo  htmlentities($row['sal']);?></td>
                                  <td> 
                                      <button type="button" >Edit</button>
                                      <button type="button" >View</button>
                                 </td>
                        </tr>
                              <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div> 

 
</body>
 
</html>
<?php } ?>
