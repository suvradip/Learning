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
	