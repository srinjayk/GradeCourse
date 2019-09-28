<?php

$sql = "CREATE TABLE `users` (`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,`Username` varchar(100) NOT NULL,`Email` varchar(100) NOT NULL,`Password` varchar(100) NOT NULL,`Priority` int(11) NOT NULL)";

$host='localhost';
$username='srinjayk';
$password='Srin@6043';
$dbase='classroom';

$conn = mysqli_connect($host,$username,$password,$dbase);

if($conn){
    echo "Successfully connected to server";
}
else{
    echo "Failed";
}

print(mysqli_query($conn,$sql));


?>
