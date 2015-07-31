<?php

	

$nameErr=$emailErr=$phoneErr=$feedbackErr=$sexErr=$countryErr=$stateErr=$interestErr="";
$name=$email=$phone=$feedback=$sex=$country=$state="";
$emailFormat=$phoneFormat="";

		if (empty($_GET["name"]))
		$nameErr = "true";
		else
		$nameErr = "false";

		if (empty($_GET["email"]))
		$emailErr = "true";
		else
		$emailErr = "false";

		if (empty($_GET["phone"]))                   
		$phoneErr = "true";
		else
		$phoneErr = "false";	

		if (empty($_GET["feedback"]))
		$feedbackErr = "true";
		else
		$feedbackErr = "false";

		if (empty($_GET["country"]))
		$countryErr = "true";
		else
		$countryErr = "false";	

		if (empty($_GET["state"]))
		$stateErr = "true";
		else
		$stateErr = "false";	

		if ($_GET["sex"]=="undefined") 
		$sexErr = "true";
		else
		$sexErr = "false";

		if ($_GET["cb1"]=="false" && $_GET["cb2"]=="false" && $_GET["cb3"]=="false") 
		$interestErr = "true";
		else
		$interestErr = "false";	
		



		if (!empty($_GET["email"]))
		{	
			$email = $_GET["email"];
			if (filter_var($email, FILTER_VALIDATE_EMAIL))
			 $emailFormat = "true";
			 else
			 $emailFormat = "false";
			
		}
		else
			 $emailFormat = "false"; 


		if (!empty($_GET["phone"]))
		{      
			$phone = $_GET["phone"];
			if (strlen($phone)==10)
			 $phoneFormat = "true"; 
			else
			 $phoneFormat = "false";

		}else
		$phoneFormat = "false"; 
 


	 $text = "{
	   	\"nameErr\":".$nameErr.",
	   	\"emailErr\":".$emailErr.",
	   	\"phoneErr\":".$phoneErr.",
	   	\"feedbackErr\":".$feedbackErr.",
	   	\"sexErr\":".$sexErr.",
	   	\"countryErr\":".$countryErr.",
	   	\"stateErr\":".$stateErr.",
	   	\"emailFormat\":".$emailFormat.",
	   	\"phoneFormat\":".$phoneFormat.",
	   \"interestErr\":".$interestErr."
	   	
	   }";


	   if($nameErr=="false" && $emailErr=="false" && $phoneErr=="false" && $feedbackErr=="false" && $sexErr=="false" && $countryErr=="false" && $stateErr=="false" && $emailFormat=="true" && $phoneFormat=="true" && $interestErr=="false")
		{

		$csvData=$_GET['name'].",".$_GET['email'].",".$_GET['phone'].",".$_GET['sex'].",".$_GET['country'].",".$_GET['state'].",".$_GET['feedback'].",".$_GET['cb1V'].",".$_GET['cb2V'].",".$_GET['cb3V'];

		if(file_exists("userData.csv"))
		{
			$myfile = fopen("userData.csv", "a+");
			fwrite($myfile, ",\n");
			fwrite($myfile, $csvData);
			echo "Subscription";
		}
		else
		{
			$myfile = fopen("userData.csv", "a+");
			$csvDataHeading="Name,Email,Phone,Sex,Country,State,Feedback,Interest_1,Interest_2,Interest_3";
			fwrite($myfile, $csvDataHeading);
			fwrite($myfile, ",\n");
			fwrite($myfile, $csvData);
			echo "Subscription";
		} 

	}
	else
	{

		 echo $text;
	 
	}	
		
?>