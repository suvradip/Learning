<html>

<head>
<style type="text/css">
span
{
display:inline-table;
width: 7em;
padding-left: 2px;

outline: none;
}

th
{
text-decoration: underline;
}
.id_style
{
	width:2em; 
}
.msg
{
	display: block;
	width: auto;
	padding: 0;
	margin-bottom: 2%;
}
</style>
</head>

<body>

<script type="text/javascript">
	

	function function_Update(id)
	{
		var name = document.getElementById('name'+id).innerHTML;
		var email = document.getElementById('email'+id).innerHTML;
		var phone = document.getElementById('phone'+id).innerHTML;
		var sex = document.getElementById('sex'+id).innerHTML;
		var country = document.getElementById('country'+id).innerHTML;
		var state = document.getElementById('state'+id).innerHTML;
		var feedback = document.getElementById('feedback'+id).innerHTML;
		var game = document.getElementById('interest_game'+id).innerHTML;
		var movie = document.getElementById('interest_movie'+id).innerHTML;
		var reading = document.getElementById('interest_reading'+id).innerHTML;

		
		var q="id=" + id + "&name=" + name + "&email=" + email + "&phone=" + phone + "&sex=" + sex + "&country=" + country + "&state=" + state + "&feedback=" + feedback + "&game=" + game + "&movie=" + movie + "&reading=" + reading ;
		loadXMLDoc("php_files/action_files/actionshowData.php?submit=Update&" + q);

	}

	function function_Cancel(id)
	{
		document.getElementById('updateButton'+id).style.display="none";
		document.getElementById('cancelButton'+id).style.display="none";
		document.getElementById('editeButton'+id).style.display="block";
		document.getElementById('deleteButton'+id).style.display="block";

		content_NotEditable('name'+id);
		content_NotEditable('email'+id);
		content_NotEditable('phone'+id);
		content_NotEditable('sex'+id);
		content_NotEditable('country'+id);
		content_NotEditable('state'+id);
		content_NotEditable('feedback'+id);
		content_NotEditable('interest_game'+id);
		content_NotEditable('interest_movie'+id);
		content_NotEditable('interest_reading'+id);

		document.getElementById("msg").innerHTML="";
		
	}



	function function_Delete(id)
	{
		loadXMLDoc("php_files/action_files/actionshowData.php?submit=delete&id="+id);
	}

	function function_Edite(id)
	{
		document.getElementById('editeButton'+id).style.display="none";
		document.getElementById('deleteButton'+id).style.display="none";
		document.getElementById('updateButton'+id).style.display="block";
		document.getElementById('cancelButton'+id).style.display="block";
		content_Editable('name'+id);
		content_Editable('email'+id);
		content_Editable('phone'+id);
		content_Editable('sex'+id);
		content_Editable('country'+id);
		content_Editable('state'+id);
		content_Editable('feedback'+id);
		content_Editable('interest_game'+id);
		content_Editable('interest_movie'+id);
		content_Editable('interest_reading'+id);	
	}


	function content_Editable(id)
	{
		document.getElementById(id).contentEditable=true;
		document.getElementById(id).style.border="2px groove ";
		
		
	}

	function content_NotEditable(id)
	{
		document.getElementById(id).contentEditable=false;
		document.getElementById(id).style.border="none";	
	}





	function loadXMLDoc(query)
	{
		var xmlhttp;

		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{

				var ajaxTextData=xmlhttp.responseText;
				var json =JSON.parse(ajaxTextData);	

				if(json["deleted"])
				{
                document.getElementById("msg").innerHTML="record no." + json["id"]  + " Deleted Successfully.";	
                document.getElementById(json["id"]).remove();
				}
				else if(json["updated"])
				{	
				document.getElementById("msg").innerHTML="record no." + json["id"]  + " Updated Successfully.";	
       			}else
       			{
       			document.getElementById("msg").innerHTML= json["id"] + " Error Occured.";	
       			}


			}
		}

		xmlhttp.open("GET",query,true);
		xmlhttp.send();
	
	}
	

</script>

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


