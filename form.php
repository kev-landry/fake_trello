<?php
include 'head.php';
?>

		<?php
        try {	//Connexion  BDD via PDO
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=trello;charset=utf8', 'root', 'root'); //le array sert à montrer les erreurs
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        // On capture nos POST en variable
				if (isset($_POST['pseudo']) AND isset($_POST['password'])){
					$pseudo = $_POST['pseudo'];
					$password = $_POST['password'];



					        //On compte combien de fois on retrouve le pseudo avec COUNT
					        $verif_pseudo = $bdd->query('SELECT COUNT(*) FROM user WHERE pseudo = \''.$pseudo.'\' ');
					        if ($verif_pseudo->fetchColumn() == 0) { // on check le pseudo de colonne en colonne
					            ?>
								<h1>Veuillez vous inscrire</h1> <!-- Si aucun pseudo -->
								<?php

							} else { 	//Pseudo existant

					            //query dans la BDD pour capturer le pseudo
					            $reponse_login = $bdd->query('SELECT password FROM user WHERE pseudo = \''.$pseudo.'\' LIMIT 1');
					            $donnees = $reponse_login->fetch();// On recupere la ligne du pseudo

					            //compare le mdp
					            if ($password == $donnees['password']) { //Si dans cette ligne il y a le bon pseudo
					                ?>
									<div class="row tete">
										<div class="col-lg-6 col-lg-offset-3">
									<h1 style="text-align:center">Bienvenue sur votre Trello <span style="font-size:5rem; color:thistle"><?php echo "$pseudo"; ?> </span>!</h1>
								</div>
							</div>
									<?php

					            } else {
					                ?>
										<div class="row tete">
											<div class="col-lg-6 col-lg-offset-3">
												<div id="mdp" style="text-align:center">
													<h1 style="color:thistle">Mauvais mot de passe</h1>
													<p><a style="decoration:none"href="http://localhost/mysql/interface.php"> Retourner à l'écran de connexion </a></p>
												</div>
											</div>
										</div>
									<?php

					            }
					            $reponse_login->closeCursor(); //fermeture de la requête
					        }
				}


        $reponse = $bdd->query('SELECT * FROM user WHERE pseudo = \''.$pseudo.'\'');
        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch()) {
            ?>
		<div class="row infoCompte">
			<div class="col-lg-3 col-lg-offset-1 "
		<p>
		<h2> Informations compte : </h2>
		<strong>Pseudo</strong> :
		<?php echo $donnees['pseudo']; ?>
		<br /> Mail :
		<?php echo $donnees['mail']; ?>
		<br /> Mdp :
		<?php echo $donnees['password']; ?>
		<br /> Id :
		<?php echo $donnees['id']; ?>
		<br /> </p>
	</div>
</div>
	<?php

        }
        $reponse->closeCursor();

// INSCRIPTION -----------------------

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

include'board.php';
include'footer.php';


    ?>
