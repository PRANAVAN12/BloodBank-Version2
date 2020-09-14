

<!DOCTYPE html>
<html lang="en">
<head>
<?php
	include('user_header.php');
?>
    <Script>
    

function calculateBmi() {
var weight = document.bmiForm.weight.value
var height = document.bmiForm.height.value
if(weight > 0 && height > 0){	
var finalBmi = weight/(height/100*height/100)
document.bmiForm.bmi.value = finalBmi
if(finalBmi < 18.5){
document.bmiForm.meaning.value = "That you are too thin."
}
if(finalBmi > 18.5 && finalBmi < 25){
document.bmiForm.meaning.value = "That you are healthy."
}
if(finalBmi > 25){
document.bmiForm.meaning.value = "That you have overweight."
}
}
else{
alert("Please Fill in everything correctly")
}
}


    </Script>
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
                <h2>Calcuate Your BMI</h2>
<form name="bmiForm">
Your Weight(kg): <input type="text" name="weight" size="10"><br />
Your Height(cm): <input type="text" name="height" size="10"><br />
<input type="button" value="Calculate BMI" onClick="calculateBmi()"><br />
Your BMI: <input type="text" name="bmi" size="10"><br />
This Means: <input type="text" name="meaning" size="25"><br />
<input type="reset" value="Reset" />
</form>
</div>
</div>
</div>
</body>
</html>