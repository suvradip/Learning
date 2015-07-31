
<!DOCTYPE html>
<html>
<head>
	<title>Page Designed by Suvradip Saha</title>

	<link rel="stylesheet" type="text/css" href="MyCss.css">
	<script src="js/myjs.js"></script>


<style type="text/css">

.tabs .tab2 .error
{
	font-size: 10px;
	color: red;
	font-weight: bold;
}
</style>

</head>


<body >


<script type="text/javascript">


	function loadXMLDoc(q)
	{
		var xmlhttp;
		var txt,x,i;

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
				//document.getElementById("feedback").innerHTML=xmlhttp.responseText;
				data=xmlhttp.responseText;
				//console.log(data);	

				if(data=="Subscription")
				{
				document.getElementById("nameErr").innerHTML="";
				document.getElementById("phoneErr").innerHTML="";	
				document.getElementById("emailErr").innerHTML="";
				document.getElementById("stateErr").innerHTML="";	
				document.getElementById("feedbackErr").innerHTML="";	
				document.getElementById("sexErr").innerHTML="";	
				document.getElementById("interestErr").innerHTML="";	
				document.getElementById("emailValidate").innerHTML="";	
				document.getElementById("phoneValidate").innerHTML="";
				document.getElementById("countryErr").innerHTML="";		

				document.getElementById("subscription").innerHTML="Subscription Successfull.";
				document.getElementById("subscription").style.color="green";	
				}
				else
				{
				var json =JSON.parse(data);		
				//console.log(json);	

				document.getElementById("subscription").innerHTML="* required";	
				document.getElementById("subscription").style.color="red";
				if(json["nameErr"])
				document.getElementById("nameErr").innerHTML="*";	
				else
				document.getElementById("nameErr").innerHTML="";

				if(json["phoneErr"])
				document.getElementById("phoneErr").innerHTML="*";	
				else
				document.getElementById("phoneErr").innerHTML="";	


				if(json["emailErr"])
				document.getElementById("emailErr").innerHTML="*";	
				else
				document.getElementById("emailErr").innerHTML="";	


				if(json["countryErr"])
				document.getElementById("countryErr").innerHTML="*";	
				else
				document.getElementById("countryErr").innerHTML="";	


				if(json["stateErr"])
				document.getElementById("stateErr").innerHTML="*";	
				else
				document.getElementById("stateErr").innerHTML="";	

				if(json["feedbackErr"])
				document.getElementById("feedbackErr").innerHTML="*";	
				else
				document.getElementById("feedbackErr").innerHTML="";	

				if(json["sexErr"])
				document.getElementById("sexErr").innerHTML="*";	
				else
				document.getElementById("sexErr").innerHTML="";	

				if(json["interestErr"])
				document.getElementById("interestErr").innerHTML="*";	
				else
				document.getElementById("interestErr").innerHTML="";	


				if(json["emailFormat"])
				document.getElementById("emailValidate").innerHTML="";	
				else
				document.getElementById("emailValidate").innerHTML="Invalid";	

				if(json["phoneFormat"])
				document.getElementById("phoneValidate").innerHTML="";	
				else
				document.getElementById("phoneValidate").innerHTML="Invalid";	
				}	


			}
		}

		xmlhttp.open("GET","php_files/action.php?"+q,true);
		xmlhttp.send();


		
	}
	

	function checkValidData()
	{
		var chk1=chk2=chk3="";




			var n=document.getElementById("name").value;
			var e=document.getElementById("email").value;
            var p=document.getElementById("phone").value;
			var con = document.getElementById("country").value;
			var s = document.getElementById("state").value;
			var f=document.getElementById("feedback").value;
			var gender =  radioCheckedValue("sex");

			var cb1=document.getElementById("cb1").checked;
            var cb2=document.getElementById("cb2").checked;
            var cb3=document.getElementById("cb3").checked;
            

            if(cb1)
            var cb1V=document.getElementById("cb1").value;
			
			if(cb2)        
            var cb2V=document.getElementById("cb2").value;
            
            if(cb3)
            var cb3V=document.getElementById("cb3").value;

			var q= "name=" + n + "&email=" + e + "&phone=" + p + "&country=" + con + "&state=" + s + "&feedback=" + f + "&sex=" + gender + "&cb1=" + cb1 + "&cb2=" + cb2 + "&cb3=" + cb3 + "&cb1V=" + cb1V + "&cb2V=" + cb2V + "&cb3V=" + cb3V;


			loadXMLDoc(q);
		

	}
</script>

<form method="get" onsubmit="return false"   >
<h1>Page Designed by Suvradip Saha</h1>


<div class="tabs">

	<div class="tab1" id="x1">
	<h2 id="tab1_h2" onclick="tabToggle(0);" ><a href="#" id="tab1_h2_a"> News</a></h2>

				<div class="con1">

					<p class="p_h1">Welcome </p>

					<p class="p_h2"> 
					Simple and effective AngularJS bindings for FusionCharts JavaScript Chariting Library.Simple and effective AngularJS bindings for FusionCharts JavaScript Chariting Library. simple and effective.</p>  
					
					<p class="p_h3">AngularJS bindings for FusionCharts JavaScript Chariting Library.</p>
			
				</div>  <!-- End of con1 div -->

				<div class="con2" >
					<p class="p_h1">Latest News</p>

					<img src="timcook.jpg" width="350px" height="182px" class="image_div" alt="Image of Tim Cook">

				</div> <!-- end of con2 div  -->


				<h3 class="learn" ><a href="#"> LEARN MORE </a></h3>
	</div> <!-- end of tab1 -->
	


	<div class="tab2" id="x2">
	<h2 onclick="tabToggle(1);" id="tab2_h2"><a href="#" id="tab2_h2_a">Subscribe</a></h2>

				<div class="con2_1">
						<p class="p_h1">Subscription Form  <span id="subscription"></span> </p> 
						
						<div class="con2_2">
							<table border="0" cellspacing="5" cellpadding="5">
								<tr>
									<td><span>Name</span></td>
									<td><input id="name" name="name" type="text" class="text_input_style text_input_bgcolor"  /> </td>
									<td><span id="nameErr" class="error"></span></td>
								</tr>
								<tr>
									<td><span>Email</span></td>
									<td><input id="email" name="email" type="text" class="text_input_style text_input_bgcolor"  /></td>
									<td>
									<span id="emailErr" class="error"></span> 
									<span id="emailValidate" class="error"></span>

									</td>
								</tr>
								<tr>
									<td><span>Phone</span></td>
									<td><input maxlength="10" name="phone"   title="Indian(+91) 10 digit Mobile number"  id="phone" type="text" class="text_input_style text_input_bgcolor" onkeypress="return numbercheck(event)" onblur="checkIndia();"  /></td>
									<td><span id="phoneErr" class="error"></span> 
									<span id="phoneValidate" class="error"></span> 
									</td>
								</tr>
								<tr>
									<td><span>Sex</span></td>
									<td>
										<input type="radio" name="sex" value="Male" /><span>Male</span>
										<input type="radio" name="sex" value="Female"  /><span>Female</span>
									</td>
									<td> <span id="sexErr" class="error"></span> </td>
								</tr>
								<tr>
									<td><span>Interest</span></td>
									<td>
										<input id="cb1" type="checkbox"   name="game" value="Football" /><span>Games</span> &nbsp;&nbsp;
										<input id="cb2" type="checkbox"   name="movie" value="Movie" /><span>Movie</span> &nbsp;&nbsp;
										<input id="cb3" type="checkbox"  name="reading" value="Reading" /><span>Reading</span> &nbsp;&nbsp;	
									</td>
									<td> <span id="interestErr" class="error"></span> </td>
								</tr>
							</table>
						</div><!-- end of con2_2 -->

						<div class="con2_3">
							<table  cellspacing="5" cellpadding="5">
								<tr>
									<td><span>Country</td>
									<td><!-- <input id="country" type="text" class="text_input_style text_input_bgcolor" /> -->

										<select id="country" name="country" class="text_input_style text_input_bgcolor" onchange="stateChange(this);" >
										
											<option></option>
											<option value="IN">India</option>
											<option value="US"  >United States</option>
	
										</select>

									</td>

									<td> <span id="countryErr" class="error"></span> </td>

								</tr>
								<tr>
									<td><span>States</span></td>
									<td>
										<select id="state" name="state" class="text_input_style text_input_bgcolor"  disabled>
									 <option selected></option>
									    </select>
									</td>
									<td><span id="stateErr" class="error"></span></td>
								</tr>
								<tr>
									<td valign="top"><span>Feedback</span></td>
									<td>
									<textarea name="feedback" spellcheck="true" id="feedback" type="text" class="text_textarea_style text_input_style text_input_bgcolor" ></textarea>
									</td> 
									<td valign="top"> <span id="feedbackErr" class="error"></span> </td>
								</tr>
							</table>
						</div><!-- end of con2_3 -->

						
						<input type="reset" class="reset" title="Click me to reset this form" onclick="removeOptions();" />
						<input type="submit" class="subscribe" name="submit"  title="Click me to subscribe" value ="Subscribe" onclick="checkValidData();"  />
				</div> <!-- end of con2_1 -->
	</div> <!-- end of tab2  -->

</div> <!-- end of tabs -->





</form>
</body>

</html>



