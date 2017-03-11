<?php
try {    //Connexion  BDD via PDO
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=trello;charset=utf8', 'root', 'root'); //le array sert à montrer les erreurs
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//On check si le formulaire est remplie pour ne pas créer nos var pour rien
if (isset($_POST['newPseudo']) AND isset($_POST['newEmail']) AND isset($_POST['newPassword'])) {
	//On capture nos variables
		$newPseudo=$_POST['newPseudo'];
		$newEmail=$_POST['newEmail'];
		$newPassword=$_POST['newPassword'];

		//Méthode prepare + execute plus safe
		$req = $bdd->prepare('INSERT INTO user(pseudo, mail, password) VALUES(:newPseudo, :newEmail, :newPassword)');
		$req->execute(array(
		'newPseudo' => $newPseudo,
		'newEmail' => $newEmail,
		'newPassword' => $newPassword
	));
	header('Location:landingpage.php');
	$req->closeCursor();
}

?>
