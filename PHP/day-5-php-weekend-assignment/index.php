
<!DOCTYPE html>
<html>
<head>
	<title>Page Designed by Suvradip Saha</title>

	<link rel="stylesheet" type="text/css" href="css/MyCss.css">
	<script src="js/myjs.js"></script>

</head>

<body >

<form method="get" onsubmit="return false"  autocomplete="off" >
<h4 align="center">Page Designed by Suvradip Saha</h4>


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



