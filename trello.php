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
<div class="row-fluid">
   <div class="col-lg-12 crealiste">
    <form method="post" action="scriptBoard.php">
        <button class="btn btn-primary" type="submit" name="liste">Créer liste</button>
        <input name="liste"/>
    </form>
  </div>

</div>


<div class="container-fluid" id="bandeau">
	<div class="row tableau">
      <?php
      $reponse = $bdd->query('SELECT * FROM liste');
      while ($donnees = $reponse->fetch()) {
          ?>
        <div class="col-lg-2 liste">
          <p><span id="titreListe"><?php echo $donnees['titre'];?></span></p>
          <div class="deleteliste">
            <form method="post" action="suppliste.php">
                <input type="hidden" class="btn btn-default btn-sm" name="suppliste" value="<?php echo $donnees['id'];?>"/>
                  <button type="submit" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                  </button>
            </form>
            <?php echo $donnees['id'];?>
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
