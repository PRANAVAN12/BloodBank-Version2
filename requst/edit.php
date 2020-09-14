<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$UserName = mysqli_real_escape_string($mysqli, $_POST['UserName']);
	$Email = mysqli_real_escape_string($mysqli, $_POST['Email']);
	$Mobile = mysqli_real_escape_string($mysqli, $_POST['Mobile']);	
	$BloodGroup= mysqli_real_escape_string($mysqli, $_POST['BloodGroup']);	
	$City= mysqli_real_escape_string($mysqli, $_POST['City']);

	// checking empty fields
	if(empty($UserName) || empty($Email) || empty($Mobile)|| empty($BloodGroup)|| empty($City)) {	
			
		if(empty($UserName)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($Email)) {
			echo "<font color='red'>email field is empty.</font><br/>";
		}
		
		if(empty($Mobile)) {
			echo "<font color='red'>Mobile field is empty.</font><br/>";
		}
		if(empty($BloodGroup)) {
			echo "<font color='red'>BloodGroup field is empty.</font><br/>";
		}	
		if(empty($City)) {
			echo "<font color='red'>City field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE request SET UserName='$UserName',Email='$Email',Mobile='$Mobile' ,BloodGroup='$BloodGroup' ,City='$City' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM request WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$UserName = $res['UserName'];
	$Email = $res['Email'];
	$Mobile = $res['Mobile'];
	$BloodGroup = $res['BloodGroup'];
	$City = $res['City'];
}
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Blood Bank</title>

    <!-- Icons font CSS-->
    <link href="edit/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="edit/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="edit/https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="edit/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="edit/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="edit/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Request Update </h2>
                    <form method="post" action="edit.php">
                        <div class="input-group">
                            <input class="input--style-2"  type="text" name="UserName" value="<?php echo $UserName;?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2"  type="text" name="Email" value="<?php echo $Email;?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="number" name="Mobile" value="<?php echo $Mobile;?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2"  type="text" name="City" value="<?php echo $City;?>">
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-2">
                                
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="BloodGroup" value="<?php echo $BloodGroup;?>">
                                            <option   >Blood Group</option>
                                            <option>O</option>
                                            <option>O-</option>
                                            <option>B+</option>
                                            <option>B-</option>
                                            <option>O+</option>
                                            <option>A+</option>
                                            <option>A-</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            
                        </div>
                         
                        <div class="p-t-30">
                           
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                            <button class="btn btn--radius btn--green"  name="update" value="Update" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="edit/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="edit/vendor/select2/select2.min.js"></script>
    <script src="edit/vendor/datepicker/moment.min.js"></script>
    <script src="edit/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="edit/js/global.js"></script>

</body>

</html>
<!-- end document-->