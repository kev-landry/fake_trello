<?php
include 'head.php';
session_start();
try {    //Connexion  BDD via PDO
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=trello;charset=utf8', 'root', 'root'); //le array sert à montrer les erreurs
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
    $reponse = $bdd->query('SELECT * FROM user WHERE pseudo = \''.$_SESSION['pseudo'].'\'');
?>
<div class="barre">
</div>
<div class="row-fluid">
  <div class="col-lg-12">
    <h1><medium>Bonjour <span id="bonjourUser"><?php echo $_SESSION['pseudo']; ?></span></medium></h1>
</div>
</div>

<?php

    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch()) {
        ?>
						<div class="row-fluid infoCompte">
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
?>

<div class="row-fluid"> <!--création des listes -->
   <div class="col-lg-12 crealiste">
    <form method="post" action="crealiste.php">
        <button id="boutonCrea"class="btn btn-primary" type="submit" name="liste">Créer liste</button>
        <input name="liste"/>
    </form>
  </div>
</div>


<div class="container-fluid" id="bandeau"> <!-- bandeau liste -->
	<div class="row tableau"> <!-- row qui défile -->
      <?php
      $reponse = $bdd->query('SELECT * FROM liste');
      while ($donnees = $reponse->fetch()) {  // Boucle qui permet d'afficher toutes les listes de l'utilisateur
          ?>
        <div class="col-lg-2 liste"> <!-- liste -->
          <p><span id="titreListe"><?php echo $donnees['titre'];?></span></p>
          <div class="deleteliste">
            <form method="post" action="suppliste.php">  <!--supprimer liste-->
                <input type="hidden" class="btn btn-default btn-sm" name="suppliste" value="<?php echo $donnees['id'];?>"/>
                  <button type="submit" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                  </button>
            </form>
          </div>
        </div>  <?php
      }
          $reponse->closeCursor();
    ?>
	</div>
</div>

<?php
include'footer.php';

?>
