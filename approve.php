<?php
    include('dbconnect.php');
    if(isset($_GET["approve"])&&!empty($_GET["approve"]))
    {
    

        $n1=$_GET["approve"];
        
        $sql = "UPDATE leaves SET Status='Approved' WHERE srno='$n1'";
        echo $sql;
        if (mysqli_query($conn, $sql)) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . mysqli_error($conn);
        }
        header("Location:leaveapproval.php");
            mysqli_close($conn);
    }
            
        
    
        
    ?>