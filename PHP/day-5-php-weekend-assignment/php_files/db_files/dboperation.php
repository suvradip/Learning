<?php

require "connection.php"; 

function insertSubscriberDetails($data)
{
	$f=false;

	$conn = myConnection(); 

	$sql = "INSERT INTO subscriber_details (SUBSCRIBER_NAME, SUBSCRIBER_MAIL_ID, SUBSCRIBER_PHONE, SUBSCRIBER_SEX, SUBSCRIBER_COUNTRY, SUBSCRIBER_STATE, SUBSCRIBER_FEEDBACK, INTEREST_GAME, INTEREST_MOVIE, INTEREST_READING) VALUES 
											('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]' )";

	if ($conn->query($sql) === TRUE) 
	{
	    //echo "New record created successfully";
	    $f=true;
	} 
	else 
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

	return $f;
}


function selectSubsciberDetails()
{
	$conn = myConnection(); 

	$sql = "SELECT * FROM subscriber_details";
	$result = $conn->query($sql);

	$conn->close();

	return $result;
}



function deleteeSubscriberDetails($ID)
{
	$f=false;
	$conn = myConnection(); 

	// sql to delete a record
	$sql = "DELETE FROM subscriber_details WHERE ID=$ID";

	if ($conn->query($sql) === TRUE)
	{
	   
	    $f=true;
	} else {
	    echo "Error deleting record: " . $conn->error;
	}

	$conn->close();

	return $f;
}


function updateSubsciberDetails($ID, $data)
{
	$f=false;
	$conn = myConnection(); 

	$sql = "UPDATE subscriber_details SET SUBSCRIBER_NAME = '$data[0]', SUBSCRIBER_MAIL_ID = '$data[1]', SUBSCRIBER_PHONE = '$data[2]', SUBSCRIBER_SEX = '$data[3]', SUBSCRIBER_COUNTRY = '$data[4]', SUBSCRIBER_STATE = '$data[5]', SUBSCRIBER_FEEDBACK = '$data[6]', INTEREST_GAME= '$data[7]', INTEREST_MOVIE= '$data[8]', INTEREST_READING= '$data[9]' WHERE ID = $ID";

	if ($conn->query($sql) === TRUE)
	 {
	   
	    $f=true;
	} else {
	    echo "Error updating record: " . $conn->error;
	}

$conn->close();

return $f;
}



?>
