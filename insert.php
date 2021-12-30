<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$age = $_POST['age'];
$currentrole = $_POST['currentrole'];
$travelled = $_POST['travelled'];
$exposed = $_POST['exposed'];
$vaccinated = $_POST['vaccinated'];
$symptoms = $_POST['symptoms'];
$report = $_POST['report'];

$connect = new  mysqli_connect('localhost','root','','testdb'); 
if($conn->connect_error){
    die('CONNECTION FAILED : ' .$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into survey(firstname, lastname, email, age, currentrole, travelled, exposed, vaccinated, symptoms, report")
    values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->blind_param("sssissssss",$firstname, $lastname, $email, $age, $currentrole, $travelled, $exposed, $vaccinated, $symptoms, $report); 
    $stmt->execute(); 
    echo "submitted successfully";
    $stmt->close();
    $conn->close();

}
?>