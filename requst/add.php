<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$UserName = mysqli_real_escape_string($mysqli, $_POST['UserName']);
	$Email = mysqli_real_escape_string($mysqli, $_POST['Email']);
	$Mobile = mysqli_real_escape_string($mysqli, $_POST['Mobile']);
	$BloodGroup = mysqli_real_escape_string($mysqli, $_POST['BloodGroup']);
	$City = mysqli_real_escape_string($mysqli, $_POST['City']);	
	// checking empty fields
	if(empty($UserName) || empty($Email) || empty($Mobile) || empty($BloodGroup)|| empty($City)) {
				
		if(empty($UserName)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($Email)) {
			echo "<font color='red'>email field is empty.</font><br/>";
		}
		
		if(empty($Mobile)) {
			echo "<font color='red'>mobile field is empty.</font><br/>";
		}
		if(empty($BloodGroup)) {
			echo "<font color='red'>blood field is empty.</font><br/>";
		}
		if(empty($City)) {
			echo "<font color='red'>city field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO request (UserName,Email,Mobile,BloodGroup,City) VALUES('$UserName','$Email','$Mobile','$BloodGroup','$City')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='../MemberView.php'>Go Back to Home</a>";
	}
}
?>
</body>
</html>
