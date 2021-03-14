<?php 
require("../connect.php");

echo "Hello World<br>";

$query = 'SELECT time FROM dummy_data WHERE emp_id="S994" AND date=14 AND month=3 AND year=2021 ORDER BY time;';


function minusTime($laterTime, $earlierTime){
    echo $laterTime."<br>".$earlierTime."<br>";
    // print_r((explode(":",$laterTime)));
    $a = new DateTime($laterTime);
    $b = new DateTime($earlierTime);
    $interval = $a->diff($b);
    echo"here";
    echo intval($interval->format("%H"))*60 + intval($interval->format("%i"));
    echo "<br><br>";
    return intval($interval->format("%H"))*60 + intval($interval->format("%i"));
}

$result = mysqli_query($conn,$query);
$total_rows = mysqli_num_rows($result);
$time_array = array();
if ($total_rows > 0) {
  // output data of each row
  for($i=0; $i<$total_rows;$i++){
      $row = mysqli_fetch_assoc($result);
      $time_array[$i] = $row["time"];
    //   echo $i." - ".$row["time"]."<br>";
  }
  print_r($time_array);
  echo "<br><br>";
$total_time = 0;
$i = 0;
while($i<$total_rows){
    // echo var_dump($time_array[$i+1]);
    $total_time += minusTime($time_array[$i+1],$time_array[$i]);
    $i+=2;
}
echo "<br>First in time is ".$time_array[0]." and last out time is ".$time_array[$total_rows-1]."Total time calculated is ".$total_time."<br>";
//   while($row = mysqli_fetch_assoc($result)) {
//     echo "time - ".$row["time"]."<br>";
//   }
} else {
  echo "0 results";
}

?>