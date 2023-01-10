<?php
$name=$_POST['name'];
$email=$_POST['email'];
$problem = (isset($_POST['problem']) ? $_POST['problem'] : '');

// Database connection
$con=new mysqli('localhost','root','','problem');

if($con->connect_error)
{die('Connection Failed');}
else{
    $sbmt=$con->prepare("insert into system(name,email,problem)
    values(?,?,?)");
    $sbmt->bind_param("sss",$name,$email,$problem);
    $sbmt->execute();
    echo"successful!!";
    $sbmt->close();
    $con->close();
}

?>