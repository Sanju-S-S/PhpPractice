<?php

include "connection.php"; // Using database connection file here

$email = $_GET['id']; // get id through query string

$qry = mysqli_query($con,"select * from userdb where email='$email'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $names = $_POST['names'];
    $passwords = $_POST['password'];
	
    $edit = mysqli_query($con,"update userdb set names='$names', passwords='$passwords' where email='$email'");
	
    if($edit)
    {
        mysqli_close($con); // Close connection
        header("location:all_records.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>

<h3>Update Data</h3>

<form method="POST">
  <input type="text" name="names" value="<?php echo $data['names'] ?>" placeholder="Enter Your Name" Required>
  <input type="text" name="password" value="<?php echo $data['passwords'] ?>" placeholder="Enter Your Password" Required>
  <input type="submit" name="update" value="Update">
</form>