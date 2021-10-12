<?php
include "connection.php"; 
$email = $_GET['id']; 
$qry = mysqli_query($con,"select * from userdb where email='$email'"); 
$data = mysqli_fetch_array($qry); 

if(isset($_POST['update']))
{
    $names = $_POST['names'];
    $passwords = $_POST['password'];

    $edit = mysqli_query($con,"update userdb set names='$names', passwords='$passwords' where email='$email'");
	
    if($edit)
    {
        mysqli_close($con); 
        header("location:all_records.php"); 
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