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
	if(isset($_GET['search'])){
		$sword = $_GET['sword'];
		$text = '';
		
		//Fetching Data From DB
		$sql = "SELECT * FROM words WHERE word='$sword'";
		$result = mysqli_query($connect, $sql);
		
		//Storing The Data
		//if($data != 1){
		//	$query2 = "INSERT INTO searchw(sword)
		//	VALUES('$sword')";	
		//	mysqli_query($connect, $query2);
		//	$text = "Sorry to say that *$sword* not found on our database<br>We will add it as soon as possible.<br>Thank you.";
		
		
		//else {
		foreach($result as $row) {
			$word        = $row["word"];
			$bengali     = $row["bengali"];
			$noun        = $row["noun"];
			$pronoun     = $row["pronoun"];
			$adjective   = $row["adjective"];
			$verb	     = $row["verb"];
			$adverb      = $row["adverb"];
			$preposition = $row["preposition"];
			$conjunction = $row["conjunction"];
			$synonym     = $row["synonym"];
			$antonym     = $row["antonym"];			
		}				
		//End Of Else 
		//}			
	?>
	
	<!Doctype html>
	<html>
		<head>
			<title><?php echo $sword; ?> - E2B Dictionary</title>
		</head>
		<body>
		
			<br>
			<form action="index.php" method="get">
				<label>Enter a Word:<label>
					<input type="text" name="sword" required />
					<button type="submit" name="search">Search</button>
				</form>
				<br><br>
				<?php
					
					if(!empty($word)){
						echo 'Word: '.$word.'';
						echo "<br>";
					}
					else{
						echo 'Word "<b>'.$sword.'</b>" not found in our database';
					}
					
					if(!empty($bengali)){
						echo 'Bengali: '.$bengali.'';
						echo "<br>";
					}
					
					if(!empty($noun)){
						echo 'Noun: '.$noun.'';
					echo "<br>"; }
					
					if(!empty($pronoun)){
						echo 'Pronoun: '.$pronoun.'';
					echo "<br>"; }
					
					if(!empty($adjective)){
						echo 'Adjective: '.$adjective.'';
					echo "<br>"; }
					
					if(!empty($verb)){
						echo 'Verb: '.$verb.'';
					echo "<br>"; }
					
					if(!empty($adverb)){										
						echo 'Adverb: '.$adverb.'';
					echo "<br>"; }
					
					if((!empty($preposition))){
						echo 'Preposition: '.$preposition.'';
					echo "<br>"; }
					
					if(!empty($conjunction)){
						echo 'Conjunction: '.$conjunction.'';
					echo "<br>"; }
					
					if(!empty($synonym)){
						echo 'Synonym: '.$synonym.'';
					echo "<br>"; }
					
					if(!empty($antonym)){
						echo 'Antonym: '.$antonym.'';
					}
					
				?>
				</body>
			</html>
			
			<?php
				
				//End Of GET
			}
			
			else {
				
			?>
			
			<!Doctype html>
			<html>
				<head>
					<title>E2B Dictionary - C5Lab Projects</title>
				</head>
				<body>
					<?php 
						if(!empty($text)) 
						{
							echo $text;
							echo '<br>';
						}
					?> <br>
					<form action="index.php" method="get">
						<label>Enter a Word:<label>
							<input type="text" name="sword" required />
							<button type="submit" name="search" value="Search">Search</button>
						</form>
						</body>
					</html>
					
					<?php }
					?>																																									