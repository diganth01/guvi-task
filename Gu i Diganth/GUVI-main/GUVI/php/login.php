<?php


 
$Email = $_POST['Email'];
$password = $_POST['password'];


if(empty($_POST['Email']) || empty($_POST['password'])){
 echo json_encode( array('message' => 'fill all the fields') );
 
  exit();

}
 
$Email=$_POST['Email'];
$Password=$_POST['password'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reg";

$conn = new mysqli($servername, $username, $password, $dbname);
 
$select = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$_POST['Email']."' AND password = '".$_POST['password']."'");

if(mysqli_num_rows($select)) {
  echo json_encode( array('success' => true) );
}

else{
  echo json_encode( array('message' => 'invalid email or password') );
  exit();
}


?>





