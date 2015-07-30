<?php

require "db_files/dboperation.php"; 

$result=selectSubsciberDetails();
$_SESSION["updateF"]="";

if ($result->num_rows > 0)
	 {	   
	    echo "<table border=0 cellspacing=10 cellpadding=5>";
	    echo "<tr>";
	    	echo "<th>";
	    	echo "ID";
	    	echo "</th>";
	    	echo "<th>";
	    	echo "Name";
	    	echo "</th>";
	    	echo "<th>";
	    	echo "Email Id";
	    	echo "</th>";
	    	echo "<th>";
	    	echo "Phone";
	    	echo "</th>";
	    	echo "<th>";
	    	echo "Sex";
	    	echo "</th>";
	    	echo "<th>";
	    	echo "Country";
	    	echo "</th>";
	    	echo "<th>";
	    	echo "State";
	    	echo "</th>";
	    	echo "<th>";
	    	echo "Feedback";
	    	echo "</th>";								
	    echo "</tr>";
	    while($row = $result->fetch_assoc())
	     {
   
	        echo "<tr id=".$row["ID"].">";
	        	echo "<td>";
		        echo "<span id=id".$row["ID"]." >".$row["ID"]."</span>";
		        echo "</td>";
		        echo "<td>";
		        echo "<span id=name".$row["ID"]." >".$row["SUBSCRIBER_NAME"]."</span>";
		        echo "</td>";
		        echo "<td>";
		        echo "<span id=email".$row["ID"]." >".$row["SUBSCRIBER_MAIL_ID"]."</span>";
		        echo "</td>";
		        echo "<td>";
		        echo "<span id=phone".$row["ID"]." >".$row["SUBSCRIBER_PHONE"]."</span>";
		        echo "</td>";
		        echo "<td>";
		        echo "<span id=sex".$row["ID"]." >".$row["SUBSCRIBER_SEX"]."</span>";
		        echo "</td>";
		        echo "<td>";
		        echo "<span id=country".$row["ID"]." >".$row["SUBSCRIBER_COUNTRY"]."</span>";
		        echo "</td>";
		        echo "<td>";
		        echo "<span id=state".$row["ID"]." >".$row["SUBSCRIBER_STATE"]."</span>";
		        echo "</td>";
		        echo "<td>";
		        echo "<span id=feedback".$row["ID"]." >".$row["SUBSCRIBER_FEEDBACK"]."</span>";
		        echo "</td>";

		        echo "<td>";
		        echo "<span id=feedback".$row["ID"]." >".$row["SUBSCRIBER_FEEDBACK"]."</span>";
		        echo "</td>";

		         echo "<td>";
		        echo "<span id=feedback".$row["ID"]." >".$row["SUBSCRIBER_FEEDBACK"]."</span>";
		        echo "</td>";

		         echo "<td>";
		        echo "<span id=feedback".$row["ID"]." >".$row["SUBSCRIBER_FEEDBACK"]."</span>";
		        echo "</td>";

		        echo "<td>";
		        echo "<a href=\"dataupdate.php?id=".$row["ID"]."\">Edit</a>";
		        echo "</td>";

		        echo "<td>";
		        echo "<a href=\"actionFile.php?submit=delete&id=".$row["ID"]."\">Delete</a>";
		        echo "</td>";
	        echo "</tr>";

	       
	    }

	    	 echo "</table>";

	}
	else 
	{
	    echo "0 results";
	}


	if(isset($_SESSION["deleteF"]) && $_SESSION["deleteF"])
	{
		echo "Record deleted successfully";
	}	

	
?>





