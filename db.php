<?php 




// function loginCheck($email,$pwd){
// 	$pdo = new PDO('mysql:host=localhost;dbname=login;charset=utf8mb4', 'root', 'root');
// 	// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




// 	$sql="SELECT count(*) from login where email ='$email'AND password='$pwd';";

// 	$stmt= $pdo->query($sql);
// 	return $stmt->fetch(PDO::FETCH_ASSOC);

// }

function loginCheck($email,$pwd){
	$pdo = new PDO('mysql:host=localhost;dbname=login;charset=utf8mb4', 'root', 'root');
	// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt=$pdo->prepare("SELECT * from user where email =:email AND password=:pwd");

	$stmt->execute(
		array(
			":email"=>$email,
			":pwd"=>md5($pwd)
		)
	);
	return $stmt->fetch(PDO::FETCH_ASSOC);

}


// if(loginCheck('1@gmail.com',1)){
	
// }else{
// 	return false;
// 	}




 ?>