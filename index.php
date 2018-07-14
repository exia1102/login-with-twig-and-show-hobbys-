<?php 

require_once './vendor/autoload.php';


$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader);


echo $twig->render('singlepage.html.twig', //templete file
	array(//data array
		'hobbys'=>$hobbys,
		'basicinformation'=>$basicInfo
	)
);

?>