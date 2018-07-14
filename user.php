<?php 

echo "user page<br>";



function getHobby($id){
	$pdo = new PDO('mysql:host=localhost;dbname=login;charset=utf8mb4', 'root', 'root');
	$stmt=$pdo->prepare("SELECT hobby from hobby where user_id = :user_id");
	$stmt->execute(
		array(
			":user_id"=>$id,
		)
	);
	return $stmt->fetchall(PDO::FETCH_ASSOC);
};

 
session_start();

$hobbys=getHobby($_SESSION['id']);


require_once './vendor/autoload.php';


$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader);


echo $twig->render('login.html.twig', //templete file
	array(//data array
		'hobbys'=>$hobbys,
		'email'=>$_SESSION['email'],
	)
);




 ?>





