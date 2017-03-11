<?php


  include 'head.php';

 ?>
<span class="test"></span>
 <h1 style="margin-top:5%; "> <large><span class="h1trello">TRELLO</span></large></h1>
  <div class="row-fluid rowlogin">
    <div class="col-lg-6 connexion"> <!--  CONNEXION    -->
      <form  method="POST" action="connexion.php">
        <h3>Se connecter</h3>
        <div class="form-group">
          <input type="text" class="form-control" value="<?php if (isset($_POST['newPseudo'])){
            echo $_POST['newPseudo'];
          } ?>" name="pseudo" placeholder="Pseudo" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
        </div>
        <div>
          <button type="submit" class="btn">Valider</button>
        </div>
      </form>
    </div>
    <div class="barre1">
    </div>
    <div class="col-lg-6 inscription"> <!--  INSCRIPTION   -->
      <form method="POST" action="inscription.php">
        <h3>S'inscrire</h3>
        <div class="form-group">
          <input type="text" class="form-control" name="newPseudo" placeholder="Pseudo" required>
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="newEmail" placeholder="Email" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="newPassword" placeholder="Password" required>
        </div>
        <div>
          <button type="submit" class="btn">Valider</button>
        </div>
      </form>
    </div>
  </div>


  <?php
    // try {
    //     $bdd = new PDO('mysql:host=127.0.0.1;dbname=trello;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    // } catch (Exception $e) {
    //     die('Erreur : ' . $e->getMessage());
    // }



    // INSCRIPTION -----------------------
    //include 'inscription.php';
    include 'footer.php';
    ?>
