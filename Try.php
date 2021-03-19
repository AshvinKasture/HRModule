<?php 
session_start();
error_reporting(0);
include('connect.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:login.html');
}
else{
    

    function minusTime($laterTime, $earlierTime)
    {
        $a = new DateTime($laterTime);
        $b = new DateTime($earlierTime);
        $interval = $a->diff($b);
        return intval($interval->format("%H"))*60 + intval($interval->format("%i"));
    }
        $selectQuery1 = "Select * from staff";
        $result1 = mysqli_query($con, $selectQuery1);
        if (mysqli_num_rows($result1)>0) 
        {
            while ($row1 = mysqli_fetch_assoc($result1))
            {
                $id = $row1["staff_id"];

                for($x=1;$x<=18;$x++)
                {
                $query = "SELECT time FROM dummy_data WHERE emp_id='$id' AND date='$x' AND month='3' AND year=2021 ORDER BY time";
                $result = mysqli_query($con,$query);
                $total_rows = mysqli_num_rows($result);
                $time_array = array();
                if ($total_rows > 0) 
                {
                    for($i=0; $i<$total_rows;$i++)
                    {
                        $row = mysqli_fetch_assoc($result);
                        $time_array[$i] = $row["time"];
                    }
                
                    $total_time = 0;
                    $i = 0;
                    while($i<$total_rows)
                    {
                        $total_time += minusTime($time_array[$i+1],$time_array[$i]);
                        $i+=2;
                    }

                    if ($total_time>54)
                    {   echo $x;
                        echo "PRESENT<br>";
                        // echo "<br>First in time is ".$time_array[0]." and last out time is ".$time_array[$total_rows-1]."Total time calculated is ".$total_time."<br>";
                    }
                    
                } 
                else 
                {        echo $x;
                        echo "Absent <br>"; 
                }
            }
            echo "<br><br>"; 
        }
        
    }
        
?>
<?php } ?>