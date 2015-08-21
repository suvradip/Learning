
<?php
session_start();

?>

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
<form method="post"  action="php_Files/actionFile.php" >
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
						<p class="p_h1">Subscription Form  <?php if(!empty($_SESSION["msg"])) echo $_SESSION["msg"]; ?>  </p> 
						
						<div class="con2_2">
							<table border="0" cellspacing="5" cellpadding="5">
								<tr>
									<td><span>Name</span></td>
									<td><input id="name" name="name" type="text" class="text_input_style text_input_bgcolor"  <?php if(isset($_SESSION["nameErr"]) &&  empty($_SESSION["nameErr"])) { echo " value=\"". $_SESSION["name"] ."\" ";} ?>  /></td>
									<td><?php if( isset($_SESSION["nameErr"]) && !empty($_SESSION["nameErr"])) { echo " <span class=\"error\">required</span> ";} ?></td>
								</tr>
								<tr>
									<td><span>Email</span></td>
									<td><input id="email" name="email" type="email" class="text_input_style text_input_bgcolor"  <?php if(isset($_SESSION["emailErr"]) && empty($_SESSION["emailErr"])) { echo " value=\"". $_SESSION["email"] ."\" ";} ?>  /></td>
									<td><?php if(isset($_SESSION["emailErr"]) && !empty($_SESSION["emailErr"])) { echo " <span class=\"error\">required</span> ";} ?>
										<?php if(isset($_SESSION["emailCheck"]) &&  !empty($_SESSION["emailCheck"])) { echo " <span class=\"error\">invalid</span> ";} ?>

									</td>
								</tr>
								<tr>
									<td><span>Phone</span></td>
									<td><input maxlength="10" name="phone"   title="Indian(+91) 10 digit Mobile number"  id="phone" type="text" class="text_input_style text_input_bgcolor" onkeypress="return numbercheck(event)" onblur="checkIndia();" <?php if( isset($_SESSION["phoneErr"]) && empty($_SESSION["phoneErr"])) { echo " value=\"". $_SESSION["phone"] ."\" ";} ?> /></td>
									<td><?php if( isset($_SESSION["phoneErr"]) && !empty($_SESSION["phoneErr"])) { echo " <span class=\"error\">required</span> ";} ?>
										<?php if( isset($_SESSION["phoneCheck"]) && !empty($_SESSION["phoneCheck"])) { echo " <span class=\"error\">invalid</span> ";} ?>
									</td>
								</tr>
								<tr>
									<td><span>Sex</span></td>
									<td>
										<input type="radio" name="sex" value="Male" <?php if(isset($_SESSION["sexErr"]) &&  empty($_SESSION["sexErr"]) && $_SESSION["sex"]=="Male" ) { echo " checked";} ?> /><span>Male</span>
										<input type="radio" name="sex" value="Female" <?php if(isset($_SESSION["sexErr"]) && empty($_SESSION["sexErr"]) && $_SESSION["sex"]=="Female" ) { echo " checked";} ?>  /><span>Female</span>
									</td>
									<td><?php if(isset($_SESSION["sexErr"]) && !empty($_SESSION["sexErr"])) { echo " <span class=\"error\">required</span> ";} ?></td>
								</tr>
								<tr>
									<td><span>Interest</span></td>
									<td>
										<input id="cb1" type="checkbox" onchange='overlay(1);' value="Football" /><span>Games</span> &nbsp;&nbsp;
										<input id="cb2" type="checkbox" onchange='overlay(2);' value="Movie" /><span>Movie</span> &nbsp;&nbsp;
										<input id="cb3" type="checkbox" onchange='overlay(3);' value="Reading" /><span>Reading</span> &nbsp;&nbsp;	
									</td>
								</tr>
							</table>
						</div><!-- end of con2_2 -->

						<div class="con2_3">
							<table  cellspacing="5" cellpadding="5">
								<tr>
									<td><span>Country</td>
									<td><!-- <input id="country" type="text" class="text_input_style text_input_bgcolor" required/> -->

										<select id="country" name="country" class="text_input_style text_input_bgcolor" onchange="stateChange(this);" >
											<option value="" ></option>
											
											<option value="IN" <?php if(isset($_SESSION["countryErr"]) && empty($_SESSION["countryErr"]) && $_SESSION["country"]=="IN" ) { echo "selected";} ?> >India</option>
											<option value="US" <?php if(isset($_SESSION["countryErr"]) && empty($_SESSION["countryErr"]) && $_SESSION["country"]=="US" ) { echo "selected";} ?> >United States</option>
	
										</select>

									</td>

									<td><?php if(isset($_SESSION["countryErr"]) && !empty($_SESSION["countryErr"])) { echo " <span class=\"error\">*</span> ";} ?></td>

								</tr>
								<tr>
									<td><span>States</span></td>
									<td>
										<select id="state" name="state" class="text_input_style text_input_bgcolor"  disabled>
									    <option value=""></option>
									    <?php if( isset($_SESSION["stateErr"]) && empty($_SESSION["stateErr"])) { echo " <option value=\"".$_SESSION["state"]."\" selected>".$_SESSION["state"]."</option>";} ?>
									    </select>
									</td>
								</tr>
								<tr>
									<td valign="top"><span>Feedback</span></td>
									<td>
									<textarea name="feedback" spellcheck="true" id="feedback" type="text" class="text_textarea_style text_input_style text_input_bgcolor" ><?php if(isset($_SESSION["feedbackErr"]) && empty($_SESSION["feedbackErr"])) {echo trim($_SESSION["feedback"]);} ?></textarea>
									</td> 
									<td valign="top"><?php if( isset($_SESSION["feedbackErr"]) && !empty($_SESSION["feedbackErr"])) { echo " <span class=\"error\">*</span> ";} ?></td>
								</tr>
							</table>
						</div><!-- end of con2_3 -->

						
						<input type="reset" class="reset" title="Click me to reset this form" onclick="removeOptions();" />
						<input type="submit" class="subscribe"  title="Click me to subscribe" value ="Subscribe"  />
				</div> <!-- end of con2_1 -->
	</div> <!-- end of tab2  -->

</div> <!-- end of tabs -->


<div id="overlay">
     <div>
          <p id="cb1_sub">
	       <input type="checkbox" name="games[]" value="Football" id="cb1_sub_1"/> <span>Football</span> 
	       <input type="checkbox" name="games[]" value="cricket" id="cb1_sub_2"/>  <span>Cricket</span>
	       <input type="checkbox" name="games[]" value="Hokey" id="cb1_sub_3"/>    <span>Hokey</span> 
          </p>

          <p id="cb2_sub">
	        <input type="checkbox" name="movies[]" value="Horror" id="cb2_sub_1"/>  <span>Horror</span>
	        <input type="checkbox" name="movies[]" value="Action"  id="cb2_sub_2"/> <span>Action</span>
	        <input type="checkbox" name="movies[]" value="Comedy" id="cb2_sub_3"/>  <span>Comedy</span>
          </p>

           <p id="cb3_sub">
	         <input type="checkbox" name="reading[]" value="News Paper" id="cb3_sub_1"/> <span>News Paper</span>
	         <input type="checkbox" name="reading[]" value="Magazine" id="cb3_sub_2"/>  <span>Magazine</span>
	         <input type="checkbox" name="reading[]" value="Comics" id="cb3_sub_3"/>  <span>Comics</span> 
          </p>

          <a href='#' onclick='overlay(); cbcheck(); '>close</a>
     </div>
</div>


</form>
</body>

</html>




<?php

	if(isset($_SESSION["toggle_flag"]) &&  $_SESSION["toggle_flag"] && !empty($_SESSION["toggle_flag"]))
	{ 
		$_SESSION["toggle_flag"]=false;
		

	$_SESSION["nameErr"] = $_SESSION["emailErr"] = $_SESSION["phoneErr"] = $_SESSION["feedbackErr"] = $_SESSION["sexErr"] = $_SESSION["countryErr"]  = $_SESSION["stateErr"] = $_SESSION["emailCheck"] = $_SESSION["phoneCheck"] = $_SESSION["phoneCheck"] = $_SESSION["msg"] = "";
    $_SESSION["name"] = $_SESSION["email"] = $_SESSION["phone"] = $_SESSION["feedback"] = $_SESSION["sex"] = $_SESSION["country"]  = $_SESSION["state"]="";
?>

<script type="text/javascript" >
	tabToggle(1);
</script>


<?php	

}else

{ 


	?>

<script type="text/javascript" >
	tabToggle(0);
</script>
<?php
}




?>
