<?php

include "connection.php"; 

$email = $_GET['id']; 

$qry = mysqli_query($con,"delete from userdb where email='$email'"); 

if($qry)
{
    mysqli_close($con); 
    header("location:all_records.php"); 
    exit;	
}
else
{
    echo "Error deleting record"; 
}
?>