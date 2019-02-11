<?php
	
	//Dictionary Script by Monir
	//Saidul Mursalin
	//Facebook.com/itzmonir
	
	//Lets Start The Session
	session_start();
	
	//DB Info
	$host = 'localhost';
	$user = 'sfmu';
	$pass = 'sfmu321';
	$db   = 'sfmu';
	
	//DB Connection
	$connect = mysqli_connect($host, $user, $pass) or die('Database Connection Error!');
	mysqli_select_db($connect, $db) or die('Database Selection Error!');
	
	//If Logged In
	if(isset($_SESSION['admin'])) {
		
		//Taking value From The Form
		if(isset($_POST['add'])){
			$word        = $_POST["word"];
			$bengali     = $_POST["bengali"];
			$noun        = $_POST["noun"];
			$pronoun     = $_POST["pronoun"];
			$adjective   = $_POST["adjective"];
			$verb	     = $_POST["verb"];
			$adverb      = $_POST["adverb"];
			$preposition = $_POST["preposition"];
			$conjunction = $_POST["conjunction"];
			$synonym     = $_POST["synonym"];
			$antonym     = $_POST["antonym"];
			
			if(empty($word))
			{
				$error = "Enter a Word";
			}
			if(empty($bengali))
			{
				$error = "Enter Bengali Meaning";
			}
			
			//Inserting 
			$query = "INSERT INTO words(word, bengali, noun, pronoun, adjective, verb, adverb, preposition, conjunction, synonym, antonym)
			VALUES('$word', '$bengali', '$noun', '$pronoun', '$adjective', '$verb', '$adverb', '$preposition', '$conjunction', '$synonym', '$antonym')";	
			$result = mysqli_query($connect, $query);
			
			if($result){
				$_SESSION['msg'] = "Word Added :)";
				$error = "";
				header("Location: add.php");
			}
			else {
				$error = "Something Wrong!";
			}
		}
		
		
		
	?>
	<!Doctype html>
	<html>
		<head>
			<title>Add Word - C5Lab Dictionary</title>
			<link rel="stylesheet" href="css/style.css"/>
			<link rel="shortcut icon" href="favicon.png" />
		</head>
		<body>
			<div class="header">
				<a href="http://localhost/dictionary">+Add Word+</a>						
			</div>
			
			<form action="add.php" class="form" method="post">
				
				<?php 
					
					//Printing SESSION Masseges
					if(!empty($_SESSION['msg'])) {
						echo '<div class="error">';	
						echo '<div class="erms">';
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
						echo '</div>';
						echo '</div><br>';	
					}
					
					//Error
					if(!empty($error)){
						echo '<div class="error">';
						echo $error;
						echo '</div><br>';	
					}					
				?>				
				
				<div class="input-group">
					<label>Word*:</label>
					<input type="text" name="word" required />
				</div>
				
				<div class="input-group">
					<label>Bengali*:</label>
					<input type="text" name="bengali" required />
				</div>
				
				<div class="input-group">
					<label>Noun:</label>
					<input type="text" name="noun" />
				</div>
				
				<div class="input-group">
					<label>Pronoun:</label>
					<input type="text" name="pronoun" />
				</div>
				
				<div class="input-group">
					<label>Adjective:</label>
					<input type="text" name="adjective" />
				</div>
				
				<div class="input-group">
					<label>Verb:</label>
					<input type="text" name="verb" />
				</div>
				
				<div class="input-group">
					<label>Adverb:</label>
					<input type="text" name="adverb" />
				</div>
				
				<div class="input-group">
					<label>Preposition:</label>
					<input type="text" name="preposition" />
				</div>
				
			<div class="input-group">
			<label>Conjunction:</label>
			<input type="text" name="conjunction" />
			</div>
			
			<div class="input-group">
			<label>Synonym:</label>
			<input type="text" name="synonym" />
			</div>
			
			<div class="input-group">
			<label>Antonym:</label>
			<input type="text" name="antonym" />
			</div>
			
			<div class="input-group">
			<button type="submit" class="btn" name="add">Add Word</button>
			</div>
			
			</form>
			<div class="footer">
			<a href="http://facebook.com/C5LabProjects">&copy; C5Lab Projects 2019</a>
			</div>
			</body>
			</html>	
			<?php 
			} 
			
			//If Not Logged In
			else {
			//Set Password
			$pass = 12345;
			$error = "";
			
			if(isset($_POST['login']))
			{
			$pass2 = $_POST['pass'];
			if(empty($pass2))
			{
			$error = "Enter Password";
			}
			if($pass2 != $pass)
			{
			$error = "Wrong Password";
			}
			else {
			session_set_cookie_params('604800');
			session_regenerate_id(true);
			$_SESSION['admin'] = 'Monir';
			$_SESSION['msg'] = "Welcome Back Admin 😊";
			header('location: add.php');
			
			}
			
			}
			
			?>
			
			<!DOCTYPE html>
			<html>
			<head>
			
			<title>Admin Login - C5Lab Dictionary</title>
			<link rel="stylesheet" href="css/style.css" />
			<link rel="shortcut icon" href="favicon.png" />
			
			</head>
			<body>
			<div class="header">
			<b>Admin Login - C5Lab</b>
			</div>
			
			<form action="add.php" class="form" method="post">
			
			<?php 
			//Printing Error
			if(!empty($error)){
			echo '<div class="error">';
			echo $error;
			echo '</div><br>';	
			}
			?>				
			
			<div class="input-group">
			<label>Admin Password:</label>
			<input type="password" name="pass" placeholder="********" required />
			</div>	
			<div class="input-group">
			<button type="submit" class="btn" name="login">Login</button>
			</div>
			
			</form>
			<div class="footer">
			<a href="http://facebook.com/C5LabProjects">&copy; C5Lab Projects 2019</a>
			</div>
			</body>
			</html>
			
			<?php 	} ?>			