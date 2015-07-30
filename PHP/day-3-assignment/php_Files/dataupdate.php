<?php
require "db_files/dboperation.php"; 
session_start();

if(isset($_GET["id"]))
{
$result=selectSubsciberDetailsById($_GET["id"]);

$row = $result->fetch_assoc();
}

?>


<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="actionFile.php">
<table>
<tr>
	<th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Sex</th><th>Country</th><th>State</th><th>Feedback</th><th>Game</th><th>Movie</th><th>Reading</th>
</tr>
<tr>
	<td align="center"><span > <?php if(isset($row["SUBSCRIBER_NAME"]))  echo $row["ID"] ?> </span></td>
	<td><input type="text" value="<?php if(isset($row["SUBSCRIBER_NAME"]))  echo $row["SUBSCRIBER_NAME"] ?>" name="name"/></td>
	<td><input type="text" value="<?php if(isset($row["SUBSCRIBER_MAIL_ID"])) echo $row["SUBSCRIBER_MAIL_ID"] ?>" name="email"/></td>
	<td><input type="text" value="<?php if(isset($row["SUBSCRIBER_PHONE"])) echo $row["SUBSCRIBER_PHONE"] ?>" name="phone"/></td>
	<td><input type="text" value="<?php if(isset($row["SUBSCRIBER_SEX"])) echo $row["SUBSCRIBER_SEX"] ?>" name="sex"/></td>
	<td><input type="text" value="<?php if(isset($row["SUBSCRIBER_COUNTRY"])) echo $row["SUBSCRIBER_COUNTRY"] ?>" name="country"/></td>
	<td><input type="text" value="<?php if(isset($row["SUBSCRIBER_STATE"])) echo $row["SUBSCRIBER_STATE"] ?>" name="state"/></td>
	<td><input type="text" value="<?php if(isset($row["SUBSCRIBER_FEEDBACK"])) echo $row["SUBSCRIBER_FEEDBACK"] ?>" name="feedback"/></td>
	<td><input type="text" value="<?php if(isset($row["SUBSCRIBER_FEEDBACK"])) echo $row["INTEREST_GAME"] ?>" name="game"/></td>
	<td><input type="text" value="<?php if(isset($row["SUBSCRIBER_FEEDBACK"])) echo $row["INTEREST_MOVIE"] ?>" name="movie"/></td>
	<td><input type="text" value="<?php if(isset($row["SUBSCRIBER_FEEDBACK"])) echo $row["INTEREST_READING"] ?>" name="reading"/></td>
</tr> 

<tr>
<td><input type="submit" name="submit" value="update" /><input type="submit" name="submit" value="cancel" /></td>

<td>
	<?php if(isset($_SESSION["updateF"]) && $_SESSION["updateF"]) 
	{
		echo "Data Updated Successfully.";
	}


	?>

</td>
</tr>	
</table>

<input type="text" hidden="true" value="<?php echo $row["ID"] ?>" name="id"/>
</form>
</body>
</html>

<?php
$_SESSION["updateF"]="";
?>