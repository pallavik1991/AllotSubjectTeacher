<?php

class AllotSubjectTeacher{
	//database connection and table name

private $conn;
private $table_name="allotsubjectteacher";

//object properties

public $batchcode;
public $subjectname;
public $staffcode;
public $fromdate;
public $todate;

public function __construct($db){
	$this->conn=$db;
}

//create user
function create(){
	//write query

	try{
	$query="INSERT INTO ".$this->table_name. "(batchcode,subjectname,staffcode,fromdate,todate) values(?,?,?,?,?)";
	$stmt=$this->conn->prepare($query);

	//bind values
	$stmt->bindParam(1,$this->batchcode);
	$stmt->bindParam(2,$this->subjectname);
	$stmt->bindParam(3,$this->staffcode);
	$stmt->bindParam(4,$this->fromdate);
	$stmt->bindParam(5,$this->todate);

 	if($stmt->execute()){
		return "success";
	}
	else{
		return "fail";
	}
}
catch(Exception $ex){
	return $ex.errorMessage();
}
}

//select all data
function readAll(){
	$query="SELECT * FROM ". $this->table_name;
	
	$stmt=$this->conn->query($query);
	$output=array();
	$output=$stmt->fetchall(PDO::FETCH_ASSOC);
	return $output;
}

}
?>