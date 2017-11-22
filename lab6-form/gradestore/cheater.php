<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		
		<?php
		$checkname = isset($_POST["name"])? $_POST["name"] : ' ';
		$checkID = isset($_POST["ID"])? $_POST["ID"] : ' ';
		$checkcourse = isset($_POST["course"])? $_POST["course"] : ' ';
		$checkgrade = isset($_POST["grade"])? $_POST["grade"] : ' ';
		$checkcard = isset($_POST["card"])? $_POST["card"] : ' ';
		$checkcc = isset($_POST["cc"])? $_POST["cc"] : ' ';
		# Ex 4 : 
		# Check the existance of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		 if (!isset($_POST["name"])||!isset($_POST["ID"])||!isset($_POST["course"])||!isset($_POST["grade"])
		  	||!isset($_POST["card"])||!isset($_POST["cc"])||empty($_POST["name"])||empty($_POST["ID"])
		 	||empty($_POST["course"])||empty($_POST["grade"])||empty($_POST["card"])||empty($_POST["cc"])){
		?>

			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. <a href="gradestore.html">Try again?</a></p>
		

		<?php
		# Ex 5 : 
		# Check if the name is composed of alphabets, dash(-), ora single white space.
		 } elseif (!preg_match('/^\w+((\s)?-*\w+)*$/', $checkname)) { 
		?>


			<h1>Sorry</h1>
			<p>You didn't provide a valid name.<a href="gradestore.html"> Try again?</a></p>


		<?php
		# Ex 5 : 
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5. 
		 } elseif ((!preg_match('/^[4]([0-9]){15}$/',$checkcard)&&$checkcc=="Visa")||(!preg_match('/^5([0-9]){15}$/',$checkcard)&&$checkcc=="MasterCard")) {
		?>

	
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number.<a href="gradestore.html">  Try again?</a></p>

		<?php
		# if all the validation and check are passed 
		} else {
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>
		

		<?php $cou = processCheckbox($checkcourse); ?>
		<!-- Ex 2: display submitted data -->
		<ul> 
			<li>Name: <?= $checkname ?></li>
			<li>ID: <?= $checkID ?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?= $cou ?> </li>
			<li>Grade: <?= $checkgrade ?> </li>
			<li>Credit: <?= $checkcard ?> (<?= $checkcc ?>) </li>
		</ul>
		
		<!-- Ex 3 : -->
			<p>Here are all the loosers who have submitted here:</p>
		<?php
			$filename = "loosers.txt";
			/* Ex 3: 
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */

			$result=array($_POST['name'], $_POST['ID'],$_POST['card'],$_POST['cc']);
			$text=implode(";",$result);
			file_put_contents($filename,$text."\n",FILE_APPEND);
			$text=file_get_contents($filename);
		?>
		
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->
		<pre><?=$text?></pre>
		
		<?php
		 }
		?>
		
		<?php
			/* Ex 2: 
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 * 
			 * The function checks whether the checkbox is selected or not and 
			 * collects all the selected checkboxes into a single string with comma seperation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names){
			$course=implode(",",$names);
				return $course; }
		?>
		
	</body>
</html>
