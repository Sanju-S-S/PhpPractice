<html>
    <body>
        <?php      
            $name = $_POST["name"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $phone = intval($_POST["phone"]);

            $host = "localhost";  
            $user = "root";  
            $password = '';  
            $db_name = "formsdb";  
            
            $con = mysqli_connect($host, $user, $password, $db_name); 

            if(mysqli_connect_errno()) {  
                die("Failed to connect with MySQL: ". mysqli_connect_error());  
            }  

            $stmt = $con->prepare("INSERT INTO userdb (names, passwords, email, phone) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssi",$name, $password, $email, $phone);
            $stmt->execute();
            
            $stmt->close();
            $con->close();
            
            echo "<center><h1>New records created successfully</h1></center>"; 
            echo "<center><h2>Click the below button to redirect to the forms page</h2></center>"
        ?>  
        <center><a href="forms.html">Back</a></center>
    </body>
</html>