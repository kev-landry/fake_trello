<?php
include 'head.php';
session_start();
try {    //Connexion  BDD via PDO
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=trello;charset=utf8', 'root', 'root'); //le array sert à montrer les erreurs
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}

	$reponse = $bdd->query('SELECT * FROM user WHERE pseudo = \''.$_SESSION['pseudo'].'\'');
	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch()) {
?>
						<div class="row infoCompte">
							<div class="col-lg-3 col-lg-offset-1 "> <p>
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
										  $reponse->closeCursor();
										 }

include'board.php';
include'footer.php';


?>
