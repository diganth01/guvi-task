<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reg";
$conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
   
    $Email = $_POST["Email"];
    $password = $_POST["password"];
    $Username = $_POST["Username"];
  
    if(empty($_POST['Email']) || empty($_POST['password'])){
        echo json_encode( array('message' => 'fill all the fields') );

      exit();
    }
 
    $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$_POST['Email']."'");
    if(mysqli_num_rows($select)) {
        echo json_encode( array('message' => 'email already exists') );
        exit();
    }
  
    $sql = "INSERT INTO users ( username, Email, password) VALUES ('$Username', '$Email', '$password')";
    if ($conn->query($sql) === TRUE) {
 
        echo json_encode( array('success' => true) );
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
