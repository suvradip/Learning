<?php


require "db_files/dboperation.php"; 

session_start();

// define variables and set to empty values
$_SESSION["nameErr"] = $_SESSION["emailErr"] = $_SESSION["phoneErr"] = $_SESSION["feedbackErr"] = $_SESSION["sexErr"] = $_SESSION["countryErr"] = $_SESSION["stateErr"]= $_SESSION["emailCheck"] = $_SESSION["phoneCheck"] = $_SESSION["msg"] = "";
$_SESSION["name"] = $_SESSION["email"] = $_SESSION["phone"] = $_SESSION["feedback"] = $_SESSION["sex"] = $_SESSION["country"] = $_SESSION["state"]="";
$_SESSION["game"] = $_SESSION["movies"] = $_SESSION["reading"] = "";
   
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
	


		if($_POST["submit"]=="cancel")
		{
			$target="Location:http:showdata.php";
		}	


		if($_GET["submit"]=="delete")
		{
			$_SESSION["deleteF"]=false;

			if(deleteeSubscriberDetails($_GET["id"]))
			{
			  $_SESSION["deleteF"]=true;
			  echo "true";
			  $target="Location:http:showdata.php";

			}
			else
			{
				$_SESSION["deleteF"]=false; 
				echo "false";
				$target="Location:http:showdata.php";

			}

			
		}	




		if($_POST["submit"]=="update")
		{
			$_SESSION["updateF"]=false;

			$data=array
			(
			$_POST['name'],
			$_POST['email'],
			$_POST['phone'],
			$_POST['sex'],
			$_POST['country'],
			$_POST['state'],
			$_POST['feedback'],
			$_POST['game'],
			$_POST['movie'],
			$_POST['reading']

			);



			if(updateSubsciberDetails($_POST["id"] , $data))
			{

				$_SESSION["updateF"]=true;
				
				$target="Location:http:dataupdate.php?id=".$_POST["id"];
			}
			else
			{

				$_SESSION["updateF"]=false;
				$target="Location:http:dataupdate.php?id=".$_POST["id"];
			}

		}

		if($_POST["submit"]=="Subscribe")
		{	

			if(isset($_POST["game"]))
				$_SESSION["game"]="checked";
			else
				$_SESSION["game"]="";


			if(isset($_POST["movie"]))
				$_SESSION["movie"]="checked";
			else
				$_SESSION["movie"]="";

			if(isset($_POST["reading"]))
				$_SESSION["reading"]="checked";
			else
				$_SESSION["reading"]="";


			if($_POST['name'] !=null && $_POST['email']!=null && $_POST['phone']!=null && $_POST['sex']!=null && $_POST['country']!=null && $_POST['state']!=null && $_POST['feedback']!=null && $_POST['country']!=null)
			{	
			$_SESSION["toggle_flag"]=true;



			/*
			$csvData=$_POST['name'].",".$_POST['email'].",".$_POST['phone'].",".$_POST['sex'].",".$_POST['country'].",".$_POST['state'].",".$_POST['feedback'].",".$_POST['games'][0].",".$_POST['games'][1].",".$_POST['games'][2].",".$_POST['movies'][0].",".$_POST['movies'][1].",".$_POST['movies'][2].",".$_POST['reading'][0].",".$_POST['reading'][1].",".$_POST['reading'][2];

			if(file_get_contents("userData.csv"))
			{
				$myfile = fopen("userData.csv", "a+");
				fwrite($myfile, ",\n");
				fwrite($myfile, $csvData);
			}
			else
			{
				$myfile = fopen("userData.csv", "a+");
				$csvDataHeading="Name,Email,Phone,Sex,Country,State,Feedback,Game_1,Game_2,Game_3,Movie_1,Movie_2,Movie_3,Reading_1,Reading_2,Reading_3";
				fwrite($myfile, ",\n");
				fwrite($myfile, $csvDataHeading);
				fwrite($myfile, ",\n");
				fwrite($myfile, $csvData);
			} 
			*/


			$data=array
			(
			$_POST['name'],
			$_POST['email'],
			$_POST['phone'],
			$_POST['sex'],
			$_POST['country'],
			$_POST['state'],
			$_POST['feedback']

			);


			if(isset($_POST["game"]))
				array_push($data,$_POST["game"]);
			else	
				array_push($data,"unchecked");


			if(isset($_POST["movie"]))
				array_push($data,$_POST["movie"]);
			else	
				array_push($data,"unchecked");

			if(isset($_POST["reading"]))
				array_push($data,$_POST["reading"]);
			else	
				array_push($data,"unchecked");


			insertSubscriberDetails($data);		

			$_SESSION["msg"]="<span style=\"color: green; font-size:15px;\"> subscription is successful</span>";
			$target="Location:http:../index.php";
			}
			else
			{
				$_SESSION["toggle_flag"]=true;
				$_SESSION["msg"]="<span style=\"color: red; font-size:15px;\"> * Required</span>";
				$target="Location:http:../index.php";	
			}
	    }


	
	header($target);  //Redirect browser 	
		
	echo $_SESSION["deleteF"];
	 
	

?>


