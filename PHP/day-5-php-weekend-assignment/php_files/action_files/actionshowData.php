<?php


require "../db_files/dboperation.php"; 


		

		if(isset($_GET["submit"]) && $_GET["submit"]=="delete")
		{

			if(deleteeSubscriberDetails($_GET["id"]))
			 echo "{
			 		\"deleted\":true,
					\"id\":".$_GET["id"]."
				   }";
			else
			 echo "{
			 		\"deleted\":false,
					\"id\":".$_GET["id"]."
				   }";
			
		}	




		if(isset($_GET["submit"]) && $_GET["submit"]=="Update")
		{
			$_SESSION["updateF"]=false;

			$data=array
			(
			$_GET['name'],
			$_GET['email'],
			$_GET['phone'],
			$_GET['sex'],
			$_GET['country'],
			$_GET['state'],
			$_GET['feedback'],
			$_GET['game'],
			$_GET['movie'],
			$_GET['reading']

			);



			if(updateSubsciberDetails($_GET["id"] , $data))
			 echo "{
			 		\"updated\":true,
					\"id\":".$_GET["id"]."
				   }";
			else
			 echo "{
			 		\"updated\":false,
					\"id\":".$_GET["id"]."
				   }";
			
		}

	
	
	

?>


