<?php
    include('dbconnect.php');
    if(isset($_GET["reject"])&&!empty($_GET["reject"]))
    {
    

        $n1=$_GET["reject"];
        
        $sql = "UPDATE leaves SET Status='Rejected' WHERE srno='$n1'";
        echo $sql;
        if (mysqli_query($conn, $sql)) {
        } else {
          echo "Error updating record: " . mysqli_error($conn);
        }
        header("Location:leaveapproval.php");
            mysqli_close($conn);
    }
            
        
    
        
    ?>