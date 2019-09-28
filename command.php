<?php	"INSERT INTO users (username, email, password, priority) VALUES('prof_5', 'prof_5@gmail.com', '962012d09b8170d912f0669f6d7d9d07', '2')";
	$sql = "CREATE TABLE `users` (`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,`username` varchar(100) NOT NULL,`email` varchar(100) NOT NULL,`password` varchar(100) NOT NULL,`priority` int(11) NOT NULL)";
	$sql = "CREATE TABLE `prof_1` (`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,`Username` varchar(100) NOT NULL,`Grades` int(11) NOT NULL)";
?>

INSERT INTO prof_3 (Username, Grades) VALUES('student_6', '0');

CREATE TABLE `courses` (`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,`Coursename` varchar(100) NOT NULL);

INSERT INTO courses (Coursename) VALUES('prof_1');
