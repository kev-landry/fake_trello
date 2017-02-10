<?php
include 'head.php';
?>

		<?php
        try {
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=trello;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        // On capture nos POST en variable
				
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];

        //On compte combien de fois on retrouve le pseudo avec COUNT
        $verif_pseudo = $bdd->query('SELECT COUNT(*) FROM user WHERE pseudo = \''.$pseudo.'\' ');
        if ($verif_pseudo->fetchColumn() == 0) {
            ?>
			<h1>Veuillez vous inscrire</h1>
			<?php

        } else { //Login existant
            //matching mdp -> pseudo
            $reponse_login = $bdd->query('SELECT password FROM user WHERE pseudo = \''.$pseudo.'\' LIMIT 1');
            $donnees = $reponse_login->fetch();

            //compare le mdp
            if ($password == $donnees['password']) {
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

$newPseudo=$_POST['newPseudo'];
$newEmail=$_POST['newEmail'];
$newPassword=$_POST['newPassword'];

$req = $bdd->prepare('INSERT INTO user(pseudo, mail, password) VALUES(:newPseudo, :newEmail, :newPassword)');
$req->execute(array(
    'newPseudo' => $newPseudo,
    'newEmail' => $newEmail,
    'newPassword' => $newPassword
    ));

    include 'footer.php';
    ?>
