<?php

session_start();

// define variables and set to empty values
$_SESSION["nameErr"] = $_SESSION["emailErr"] = $_SESSION["phoneErr"] = $_SESSION["feedbackErr"] = $_SESSION["sexErr"] = $_SESSION["countryErr"] = $_SESSION["stateErr"]= $_SESSION["emailCheck"] = $_SESSION["phoneCheck"] = $_SESSION["msg"] = "";
$_SESSION["name"] = $_SESSION["email"] = $_SESSION["phone"] = $_SESSION["feedback"] = $_SESSION["sex"] = $_SESSION["country"] = $_SESSION["state"]="";

   
function test_input($data) 
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}



   	   if (empty($_POST["name"])) {
	     $_SESSION["nameErr"] = "Name is required";
	   } else {
	     $_SESSION["name"] = test_input($_POST["name"]);
	   }
	   
	   if (empty($_POST["email"])) {
	    $_SESSION["emailErr"] = "Email is required";
	   } else {
	    $_SESSION["email"] = test_input($_POST["email"]);
	   }
	     
	   if (empty($_POST["phone"])) {
	     $_SESSION["phoneErr"] = "Phone is required";
	   } else {
	     $_SESSION["phone"] = test_input($_POST["phone"]);
	   }

	   if (empty($_POST["feedback"])) {
	    $_SESSION["feedbackErr"] = "Feedback is required";
	   } else {
	     $_SESSION["feedback"] = test_input($_POST["feedback"]);
	   }

	   if (empty($_POST["sex"])) {
	     $_SESSION["sexErr"] = "sex is required";
	   } else {
	     $_SESSION["sex"] = test_input($_POST["sex"]);
	   }

	     if (empty($_POST["country"])) {
	     $_SESSION["countryErr"] = "country is required";
	   } else {
	     $_SESSION["country"] = test_input($_POST["country"]);
	   }

	     if (empty($_POST["state"])) {
	     $_SESSION["stateErr"] = "state is required";
	   } else {
	     $_SESSION["state"] = test_input($_POST["state"]);
	   }




$email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $_SESSION["emailCheck"] = "Invalid email format"; 
}



$phone = test_input($_POST["phone"]);
if (strlen($phone)!=10) {
  $_SESSION["phoneCheck"] = "Invalid"; 
}





if($_POST['name'] !=null && $_POST['email']!=null && $_POST['phone']!=null && $_POST['sex']!=null && $_POST['country']!=null && $_POST['state']!=null && $_POST['feedback']!=null && $_POST['country']!=null)
{

	$_SESSION["toggle_flag"]=true;
	
	$data=array(

	'name'=>$_POST['name'],
	'email'=>$_POST['email'],
	'phone'=>$_POST['phone'],
	'sex'=>$_POST['sex'],
	'country'=>$_POST['country'],
	'state'=>$_POST['state'],
	'feedback'=>$_POST['feedback'],
	'games'=>$_POST['games'],
	'movies'=>$_POST['movies'],
	'reading'=>$_POST['reading']
);

	$myfile = fopen("userData_".$_POST['name'].".txt", "w");
	fwrite($myfile, json_encode($data));


	$_SESSION["msg"]="<span style=\"color: green; font-size:15px;\"> subscription is successful</span>";

	$target="Location:http:../index.php";
}
else
{
	$_SESSION["toggle_flag"]=true;
	$_SESSION["msg"]="<span style=\"color: red; font-size:15px;\"> * Required</span>";
	$target="Location:http:../index.php";	
}


	header($target); /* Redirect browser */
	exit();





?>


