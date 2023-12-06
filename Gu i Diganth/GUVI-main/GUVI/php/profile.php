<?php

require 'vendor/autoload.php';  

 
$client = new MongoDB\Client('mongodb://localhost:27017');

 
$db = $client->nithindb;
$collection = $db->nithincol;

 
$Username= $_POST['Username'];
$age = $_POST['age'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];
$address = $_POST['address'];


 
$document = [
    'Username' => $Username,
    'age' => $age,
    'dob' => $dob,
    'contact' => $contact,
    'address' => $address,

];
 
if(empty($_POST['Username']) || empty($_POST['age']) || empty($_POST['dob']) || empty($_POST['contact']) || empty($_POST['address'])){
    echo json_encode( array('message' => 'fill all the fields') );
  exit();
}

$result = $collection->insertOne($document);
 
if($result){
    echo json_encode( array('success' => true) );
    
}
else{
    echo json_encode( array('message' => 'error') );
    exit();
}




exit();
?>




