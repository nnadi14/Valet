<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Contact results";
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //no neeed to show user below message
    //echo "Connected successfully <br />"; 
     }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
 
$query=$conn->prepare("INSERT INTO `Contact messages` (name,email,subject, message) VALUES (?,?,?,?)");

$query->bindParam(1, $name);
$query->bindParam(3, $email);
$query->bindParam(2, $subject);
$query->bindParam(4, $message);
 
$name=$_POST['name'];
$email=$_POST['email']; 
$subject=$_POST['subject'];
$message=$_POST['message'];

$query->execute();

$conn = null;
//will automatically refresh page
header("refresh:3; url=contact.html");
//displays success message
echo 'We will contact you at '. $_POST['email'].' soon.</br>';
?>