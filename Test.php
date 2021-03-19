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
    
    <?php

$month = $_GET['mid'];
$year = $_GET['yid'];

$start_date = "01-".$month."-".$year;
$start_time = strtotime($start_date);

$end_time = strtotime("+1 month", $start_time);

 function minusTime($laterTime, $earlierTime)
    {
        $a = new DateTime($laterTime);
        $b = new DateTime($earlierTime);
        $interval = $a->diff($b);
        return intval($interval->format("%H"))*60 + intval($interval->format("%i"));
    }

for($i=$start_time; $i<$end_time; $i+=86400)
{
    $check = date('Y-m-d', $i)." ";
    echo date('Y-m-d', $i)." ";
    $query = "SELECT time FROM dummy_data WHERE emp_id='".$_GET['sid']."' and date = '$check' ";
                $result = mysqli_query($con,$query);
                $total_rows = mysqli_num_rows($result);
                echo $total_rows;
                $time_array = array();
                if ($total_rows > 0) 
                {
                    for($j=0; $j<$total_rows;$j++)
                    {
                        $row = mysqli_fetch_assoc($result);
                        $time_array[$j] = $row["time"];
                    }
                
                    $total_time = 0;
                    $x = 0;
                    while($x<$total_rows)
                    {
                        $total_time += minusTime($time_array[$x+1],$time_array[$x]);
                        $x+=2;
                    }
                     
                    if ($total_time>54)
                    {    
                        echo "PRESENT<br>";
                        // echo "<br>First in time is ".$time_array[0]." and last out time is ".$time_array[$total_rows-1]."Total time calculated is ".$total_time."<br>";
                    }
                    
                } 
                else 
                {         
                        echo "Absent <br>"; 
                }
}

 
?>
</body>
</html>
<?php } ?>