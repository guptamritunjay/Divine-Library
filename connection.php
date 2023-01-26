<?php
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];

$conn = new mysqli('localhost','root','','registration');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into signup(mail, pass, cpass)
    values(?, ?, ?)");
    $stmt->bind_param("iii",$mail, $pass, $cpass);
    $stmt->execute();
    echo "registration successfully";
    $stmt->close();
    $conn->close();
}
?>