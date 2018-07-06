<?php 

	 
	 	include_once 'database.php';
		include_once 'allotsubject_teacher.php';

		$database = new Database();
		$db = $database->getConnection();

		$allot = new AllotSubjectTeacher($db);
		$result=$allot->readAll();

		
		echo json_encode($result);

	?>
	 