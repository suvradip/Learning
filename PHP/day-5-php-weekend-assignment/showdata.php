<html>

<head>
<link rel="stylesheet" type="text/css" href="css/show_Data_Css_File.css">


<script type="text/javascript" src="js/show_Data_Js_File.js"></script>

</head>

<body>

<span class="msg" id="msg"></span>

<?php

require "php_files/db_files/dboperation.php"; 

$result=selectSubsciberDetails();
$_SESSION["updateF"]="";

if ($result->num_rows > 0)
	 {	   
	    echo "<table border=0  cellpadding=3>";
	    echo "<tr>";
	    	echo "<th align=left>";
	    	echo "ID";
	    	echo "</th>";
	    	echo "<th align=left>";
	    	echo "Name";
	    	echo "</th>";
	    	echo "<th align=left>";
	    	echo "Email Id";
	    	echo "</th>";
	    	echo "<th align=left>";
	    	echo "Phone";
	    	echo "</th>";
	    	echo "<th align=left>";
	    	echo "Sex";
	    	echo "</th>";
	    	echo "<th align=left>";
	    	echo "Country";
	    	echo "</th>";
	    	echo "<th align=left>";
	    	echo "State";
	    	echo "</th>";
	    	echo "<th align=left>";
	    	echo "Feedback";
	    	echo "</th>";
	    	echo "<th align=left>";
	    	echo "Game";
	    	echo "</th>";
	    	echo "<th align=left>";
	    	echo "Movie";
	    	echo "</th>";
	    	echo "<th align=left>";
	    	echo "Reading";
	    	echo "</th>";								
	    echo "</tr>";
	    while($row = $result->fetch_assoc())
	     {
   
	        echo "<tr id=".$row["ID"].">";
	        	echo "<td align=left>";
		        echo "<span class=\"id_style\" id=id".$row["ID"]." >".$row["ID"]."</span>";
		        echo "</td>";
		        echo "<td align=left>";
		        echo "<span id=name".$row["ID"]." >".$row["SUBSCRIBER_NAME"]."</span>";
		        echo "</td>";
		        echo "<td align=left>";
		        echo "<span id=email".$row["ID"]." >".$row["SUBSCRIBER_MAIL_ID"]."</span>";
		        echo "</td>";
		        echo "<td align=left>";
		        echo "<span id=phone".$row["ID"]." >".$row["SUBSCRIBER_PHONE"]."</span>";
		        echo "</td>";
		        echo "<td align=left>";
		        echo "<span id=sex".$row["ID"]." >".$row["SUBSCRIBER_SEX"]."</span>";
		        echo "</td>";
		        echo "<td align=left>";
		        echo "<span id=country".$row["ID"]." >".$row["SUBSCRIBER_COUNTRY"]."</span>";
		        echo "</td>";
		        echo "<td align=left>";
		        echo "<span id=state".$row["ID"]." >".$row["SUBSCRIBER_STATE"]."</span>";
		        echo "</td>";
		        echo "<td align=left>";
		        echo "<span id=feedback".$row["ID"]." >".$row["SUBSCRIBER_FEEDBACK"]."</span>";
		        echo "</td>";
		        echo "<td align=left>";
		        echo "<span id=interest_game".$row["ID"]." >".$row["INTEREST_GAME"]."</span>";
		        echo "</td>";
		         echo "<td align=left>";
		        echo "<span id=interest_movie".$row["ID"]." >".$row["INTEREST_MOVIE"]."</span>";
		        echo "</td>";
		         echo "<td align=left>";
		        echo "<span id=interest_reading".$row["ID"]." >".$row["INTEREST_READING"]."</span>";
		        echo "</td>";

		        echo "<td align=left>";
		        echo "<a id=editeButton".$row["ID"]."  href=\"javascript:function_Edite(".$row["ID"].")\">Edite</a>";
		        echo "<a id=updateButton".$row["ID"]." style=\"display:none;\" href=\"javascript:function_Update(".$row["ID"].")\">Update</a>";
		        echo "</td>";

		        echo "<td align=left>";
		        echo "<a id=deleteButton".$row["ID"]."  href=\"javascript:function_Delete(".$row["ID"].")\">Delete</a>";
		        echo "<a id=cancelButton".$row["ID"]."  style=\"display:none;\" href=\"javascript:function_Cancel(".$row["ID"].")\">Cancel</a>";
		        echo "</td>";
	        echo "</tr>";

	       
	    }

	    	 echo "</table>";

	}
	else 
	{
	    echo "0 results";
	}


	
	
?>



</body>
</html>


