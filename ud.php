<?php
	
	//Dictionary Script by Monir
	//Saidul Mursalin
	//Facebook.com/itzmonir
	
	//DB Info
	$host = 'localhost';
	$user = 'sfmu';
	$pass = 'sfmu321';
	$db   = 'sfmu';
	
	//DB Connection
	$connect = mysqli_connect($host, $user, $pass) or die('Database Connection Error!');
	mysqli_select_db($connect, $db) or die('Database Selection Error!');
	
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
		
		$query = "INSERT INTO words(word, bengali, noun, pronoun, adjective, verb, adverb, preposition, conjunction, synonym, antonym)
		VALUES('$word', '$bengali', '$noun', '$pronoun', '$adjective', '$verb', '$adverb', '$preposition', '$conjunction', '$synonym', '$antonym')";	
		mysqli_query($connect, $query);
		$text = "Word Added<br>";
		header("Location: ".$_SERVER['PHP_SELF']);
	}
	
	
	
?>
<!Doctype html>
<html>
	<head>
		<title>Add Word - E2B Dictionary</title>
	</head>
	<body>
		<?php 
			if(!empty($text)) 
			{
				echo $text;
				echo '<br>';
			}
		?> <br>
		<form action="ud.php" method="post">
			<label>Word:<label>
				<input type="text" name="word" /><br>
				<label>Bengali:<label>
					<input type="text" name="bengali" /><br>
					<label>Noun:<label>
						<input type="text" name="noun" /><br>
						<label>Pronoun:<label>
							<input type="text" name="pronoun" /><br>
							<label>Adjective:<label>
								<input type="text" name="adjective" /><br>
							<label>Verb:<label>
							<input type="text" name="verb" /><br>
							<label>Adverb:<label>
							<input type="text" name="adverb" /><br>
							<label>Preposition:<label>
							<input type="text" name="preposition" /><br>
							<label>Conjunction:<label>
							<input type="text" name="conjunction" /><br>
							<label>Synonym:<label>
							<input type="text" name="synonym" /><br>
							<label>Antonym:<label>
							<input type="text" name="antonym" /><br>
							
							<button type="submit" name="add">Add Word</button>
							</form>
							</body>
							</html>							