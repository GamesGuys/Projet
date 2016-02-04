<?php
if (isset($_GET["dept"])) {
		$code = $_GET["code"] ;
		$reponse = $bdd->query("SELECT * FROM musees WHERE nomdept LIKE '".$dept."%' LIMIT 0,15");
		$musees = $reponse->fetchall() ;
		echo json_encode($musees);
	}
?>