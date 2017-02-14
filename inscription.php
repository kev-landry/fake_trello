<?php
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
}
?>
