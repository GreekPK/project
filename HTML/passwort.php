<?php 
include("connect_db.php");
 
function random_string() {
	if(function_exists('random_bytes')) {
		$bytes = random_bytes(16);
		$str = bin2hex($bytes); 
	} else if(function_exists('openssl_random_pseudo_bytes')) {
		$bytes = openssl_random_pseudo_bytes(16);
		$str = bin2hex($bytes); 
	} else if(function_exists('mcrypt_create_iv')) {
		$bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
		$str = bin2hex($bytes); 
	} else {
		//Bitte euer_geheim_string durch einen zufälligen String mit >12 Zeichen austauschen
		$str = md5(uniqid('euer_geheimer_string', true));
	}	
	return $str;
}
 
 
$showForm = true;
 
if(isset($_GET['send']) ) {
	if(!isset($_POST['EMail']) || empty($_POST['EMail'])) {
		$error = "<b>Bitte eine E-Mail-Adresse eintragen</b>";
	} else {
		$statement = $pdo->prepare("SELECT * FROM benutzer WHERE EMail = :EMail");
		$result = $statement->execute(array('EMail' => $_POST['EMail']));
		$user = $statement->fetch();	
 
		if($user === false) {
			$error = "<b>Kein Benutzer gefunden</b>";
		} else {
			//Überprüfe, ob der User schon einen Passwortcode hat oder ob dieser abgelaufen ist 
			$passwort = random_string();
			$statement = $pdo->prepare("UPDATE benutzer SET passwort = :passwort, passwort_time = NOW() WHERE Benutzer_ID = :benutzer_id");
			$result = $statement->execute(array('passwort' => sha1($passwort), 'benutzer_id' => $user['Benutzer_ID']));
			
			$empfaenger = $user['EMail'];
			$betreff = "Neues Passwort für deinen Account auf www.SofortSpielen.de"; //Ersetzt hier den Domain-Namen
			$from = "From: Georgios Stoikos <1428240766@bbs2.de>"; //Ersetzt hier euren Name und E-Mail-Adresse
			$url_passwortcode = 'http://localhost/Beispiel/HTML/passwort.php?benutzer_id='.$user['id'].'&code='.$passwort; //Setzt hier eure richtige Domain ein
			$text = 'Hallo '.$user['Benutzername'].',
			für deinen Account auf www.SofortSpielen.de wurde nach einem neuen Passwort gefragt. Um ein neues Passwort zu vergeben, rufe innerhalb der nächsten 24 Stunden die folgende Website auf:
			'.$url_passwortcode.'
 
			Sollte dir dein Passwort wieder eingefallen sein oder hast du dies nicht angefordert, so bitte ignoriere diese E-Mail.
 
			Viele Grüße,
			dein SofortSpielen.de-Team';
			 
			echo "<pre>$text</pre>";
			/* mail($empfaenger, $betreff, $text, $from);
 
			echo "Ein Link um dein Passwort zurückzusetzen wurde an deine E-Mail-Adresse gesendet.";	
			$showForm = false; */
		}
	}
}
 
if($showForm):
?>
 
<h1>Passwort vergessen</h1>
Gib hier deine E-Mail-Adresse ein, um ein neues Passwort anzufordern.<br><br>
 
<?php
if(isset($error) && !empty($error)) {
	echo $error;
}
?>
 
<form action="?send=1" method="post">
E-Mail:<br>
<input type="EMail" name="EMail" value="<?php echo isset($_POST['EMail']) ? htmlentities($_POST['EMail']) : ''; ?>"><br>
<input type="submit" value="Neues Passwort">
</form>
 
<?php
endif; //Endif von if($showForm)
?>