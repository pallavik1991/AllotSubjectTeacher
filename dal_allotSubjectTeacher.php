<?php
include_once 'database.php';
include_once 'allotsubject_teacher.php';

$database = new Database();
$db = $database->getConnection();

$allot = new AllotSubjectTeacher($db);
$msg="";
 
    try{
    	if (empty($_POST["param_batchcode"])) {
            $msg = " Batchcode is required ";
        }
        else
        {
             $allot->batchcode=$_POST["param_batchcode"];    
        }
    	if (empty($_POST["param_subjectname"])) {
            $msg.= "<br> Subject name is required ";
        }
        else
        {
             $allot->subjectname=$_POST["param_subjectname"];
        }
    	if (empty($_POST["param_staffcode"])) {
            $msg.= "<br> Staffcode is required ";
        }
        else
        {
             $allot->staffcode=$_POST["param_staffcode"];
        }
		    	
    	if (empty($_POST["param_fromdate"])) {
            $msg.= "<br> Fromdate is required ";
        }
        else
        {
             $allot->fromdate=$_POST["param_fromdate"];
        }
        if (empty($_POST["param_todate"])) {
            $msg.= "<br> Todate is required ";
        }
        else
        {
             $allot->todate=$_POST["param_todate"];
        }
        if(empty($msg))
        {


        if($allot->create()){
            $msg="Success";
          
        }
    
    else{
         $msg= "Unable";
        }
         echo json_encode($msg);
    }
    else
    {
    	 echo json_encode($msg);
    }
    }
    catch(Exception $ex)
    {
        $msg=$ex.errorMessage();
    }
    finally{
        //echo $msg;
    }
 
?>
