<?php session_start();
error_reporting(0);
include('connect.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- SELECT * FROM `dummy_data` WHERE emp_id = 'S730' AND month = 3
   -->
    
     <?php 
      $month = (int)substr($_GET['cid'],1);
     $query=mysqli_query($con,"select * from dummy_data where emp_id = '".$_GET['sid']."' and month = '".$_GET['cid']."'");
     $total_rows = mysqli_num_rows($query);
     $time_array = array();
    echo $total_rows;
    echo "<br>";
    echo $month;
    $staf = $_GET['sid'];
    echo $staf;
    echo "<br>";
if ($total_rows > 0) {
    for($i=0; $i<$total_rows;$i++)
    {
        $row = mysqli_fetch_assoc($query);
        $time_array[$i] = $row["time"];
        echo $i." - ".$row["time"]."<br>";
        echo $row["date"];
    }
    echo $time_array[0];
    echo $time_array[$total_rows-1];
while($row=mysqli_fetch_array($query))
{ 

   echo htmlentities($row['complaintDetails']);
                                             
}

}
  else{
  echo "Hello";
  }?>
</body>
</html>
<?php } ?>