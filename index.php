<?php
	
	//Dictionary Script by Monir
	//Saidul Mursalin
	//Facebook.com/itzmonir
	
	//Lets Start The Session
	session_start();
	
	//DB Info
	include 'config.php';
	
	//Site Link
	$site = 'http://localhost/d';
	
	//Functions
	function pword($wid) {
		
		include 'config.php';
		$site = 'http://localhost/d';
		
		$sql = "SELECT * FROM words WHERE id='$wid'";
		$result = mysqli_query($connect, $sql);	
		$row = mysqli_fetch_array($result);	
		$pword = $row["word"];
		echo '&laquo; <a href="'.$site.'/'.$pword.'.html"><font color="red">'.$pword.'</font></a> ';	
	}
	//Nextword Function
	function nword($wid) {	
		
		include 'config.php';
		$site = 'http://localhost/d';
		
		$sql = "SELECT * FROM words WHERE id='$wid'";
		$result = mysqli_query($connect, $sql);	
		$row = mysqli_fetch_array($result);	
		$nword = $row["word"];
		echo ' <a href="'.$site.'/'.$nword.'.html"><font color="red">'.$nword.'</font></a> &raquo;';	
	}
	
	//Taking value From The Form
	if(isset($_POST['search'])){
		$sword = $_POST['sword'];
		$text = '';
		
		if(!empty($sword)){
			header('location: '.$site.'/'.$sword.'.html');
		}
	}
	if (isset($_GET['word'])) {		
		$sword = $_GET['word'];
		//Fetching Data From DB
		$sql = "SELECT * FROM words WHERE word='$sword'";
		$result = mysqli_query($connect, $sql);
		
		//Storing The Data
		foreach($result as $row) {
			$id          = $row["id"];
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
			
			//Previous Word
			$pid = $id - 1;
			$pid1 = $id - 2;
			$pid2 = $id - 3;
			
			//Next Word
			$sql = "SELECT max(id) as max FROM words";
			$result = mysqli_query($connect, $sql);
			$row = mysqli_fetch_array($result);
			$result = mysqli_query($connect, $sql);			
			$mid   = $row["max"];
			$mid1  = $mid - 1;
			$mid2   = $mid - 2;
			
			if($id != $mid){
				$nid = $id+1;
				$nid1 = $id+2;
				$nid2 = $id+3;
				
			}
		}
		
		
	?>
	
	<!Doctype html>
	<html>
		<head>
			<title><?php echo $sword; ?> - C5Lab Dictionary</title>
			<link rel="stylesheet" href="<?php echo $site; ?>/css/style.css"/>
			<link rel="shortcut icon" href="<?php echo $site; ?>/favicon.png" />
		</head>
		<body>
			<div class="header">
				<a href="<?php echo $site; ?>">$C5Lab Dictionary;</a>						
			</div>
			
			<div class="content">
				<?php
					
					if (isset($_SESSION['uname'])) {
						$name = $_SESSION['uname'];
					?>
					<nav class="logout">	
						<a href="../wap/index.php">Home</a> | <a href="../wap/shout.php">Shoutbox</a> | <a href="../wap/user.php?username=<?php echo $name ?>">Profile</a> | <a href="../wap/forum.php">Forum</a> | <a href="../wap/services.php"><mark>Services</mark></a> | <a href="../wap/shout.php?logout">Log Out</a>
					</nav>
					<hr>
				<?php	}	?>
				
				<form action="<?php echo $site; ?>/index.php" class="center" method="post">
					<div class="input-group">
						<label>Enter a Word:<label>
							<input type="text" name="sword" placeholder="Type a Word" required />
							
							<button type="submit" class="btn" name="search" value="Search">Search</button>
						</div>
						</form>
						<hr>
						<?php
							
							if(!empty($word)){
								echo 'Word: <font color="green">'.$word.'</font>';
								echo "<br>";
								
								
								
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
								
								echo '<hr><div class="center">';
								
								if(($id != 1) and ($id != 2) and ($id != 3)){
									pword($pid2);
								}
								if(($id != 1) and ($id != 2)){
									pword($pid1);
								}									
								if($id != 1){
									pword($pid);
									echo ' - Previous Words |';
								}
								
								if($id != $mid){
									echo '| Next Word - ';
									nword($nid);
								}
								if(($id != $mid) and ($id != $mid1)){
									nword($nid1);
								}
								if(($id != $mid) and ($id != $mid1) and ($id != $mid2)){
									nword($nid2);
								}
								
								echo '</div>';
							}
							
							else{
								echo '<div class="center">Word - <font color="green">"<b>'.$sword.'</b>"</font> not found in our database...</div>';
							}
							
						?>
					</div>
					<div class="footer">
						<a href="http://facebook.com/C5LabProjects" target="_blank">&copy; C5Lab Projects 2019</a>
					</div>
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
					<title>C5Lab Dictionary</title>
					<link rel="stylesheet" href="<?php echo $site; ?>/css/style.css"/>
					<link rel="shortcut icon" href="<?php echo $site; ?>/favicon.png" />
				</head>
				<body>
					<div class="header">
						<a href="http://localhost/dictionary">$C5Lab Dictionary;</a>						
					</div>
					<div class="content">
						
						<?php
							
							if (isset($_SESSION['uname'])) {
								$name = $_SESSION['uname'];
							?>
							<nav class="logout">	
								<a href="../wap/index.php">Home</a> | <a href="../wap/shout.php">Shoutbox</a> | <a href="../wap/user.php?username=<?php echo $name ?>">Profile</a> | <a href="../wap/forum.php">Forum</a> | <a href="../wap/services.php"><mark>Services</mark></a> | <a href="../wap/shout.php?logout">Log Out</a>
							</nav>
							<hr>
						<?php	}	?>
						
						<?php 
							if(!empty($text)) 
							{
								echo '<div class="logout">';
								echo $text;
								echo '</div>';
							}
						?>
						<form action="<?php echo $site; ?>/index.php" class="center" method="post">
							<div class="input-group">
								<label>Enter a Word:<label>
									<input type="text" name="sword" placeholder=" Type a Word" required />
									
									<button type="submit" class="btn" name="search" value="Search">Search</button>
								</div>
								</form>
								
							</div>
							<div class="footer">
								<a href="http://facebook.com/C5LabProjects" title="C5Lab Projects" target="_blank">&copy; C5Lab Projects 2019</a>
							</div>
						</body>
					</html>
					
					<?php }
				?>																																																																																																																																																					