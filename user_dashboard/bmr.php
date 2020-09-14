

<!DOCTYPE html>
<html lang="en">
<head>
<?php
	include('user_header.php');
?>
   
    <Style>button, input, optgroup, select, textarea {
    margin: 20px;
    font: menu;
    color: blue;
}
    </Style>
</head>
<body>
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
      <body>
<h2> Calculate Your BMR</h2>

                <label for = "leeftijd">Age: </label>
						<input type = "text" class = "form-control" id = "leeftijd">
<p></p>
						<label for = "lengte2">Height: </label>
						<input type = "text" class = "form-control" id = "lengte2">
						<p></p>
						<label for = "man">Male</label>
						<input type = "radio" name ="geslacht" id = "man" value = "man"/>
						<label for = "vrouw">Female </label>
						<input type = "radio" name ="geslacht" id = "vrouw" value = "vrouw"/>
						<p></p>
						<label for="gewicht2">Weight: </label>
						<input type = "text" class = "form-control" id = "gewicht2">
						<p></p>
						<button class = "btn btn-warning" type = "button" id = "button2"> Submit</button>
                                  
      </body>
<script>

ready(
  ("#button2").on("click", berekenBMR)
);

function berekenBMR(){
var length = parseFloat($("#lengte2").val());
var weight = parseFloat($("#gewicht2").val());
var age = parseFloat($("#leeftijd").val());
var gender = $("input[name='geslacht']:checked").val();
var BMRCalculation = 0;
if (gender == "man"){
  BMRCalculation = 10*weight + 6.25*length - 5*age + 5;
}
else{
  BMRCalculation = 10*weight + 6.25*length - 5*age -161;
}
var string = "BMR: " + BMRCalculation + " caloriën per dag";
alert(string);
}


</script>
</div>
</div>
</div>
</body>
</html>