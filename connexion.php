<?php
  session_start();

  include 'head.php';

 ?>
    <div class="row"> <!--  CONNEXION    -->
      <div id="carre1" class="col-lg-12 ">
        <form class="form-inline" method="POST" action="trello.php">
          <h3>Se connecter</h3>
          <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" value="<?php if (isset($_POST['newPseudo'])){
            echo $_POST['newPseudo'];
          } ?>"
          name="pseudo" placeholder="Pseudo" required>
          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon">$</div>
            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
          </div>
          <div>
            <button type="submit" class="btn btn-primary">Valider</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row"> <!--  INSCRIPTION   -->
      <div class="col-lg-6 inscri">
        <form method="post" action="#">
          <h3>S'inscrire</h3>
          <div class="form-group">
            <label for="exemplePseudo">Pseudo</label>
            <input type="text" class="form-control" name=" newPseudo" placeholder="Pseudo" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="newEmail" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="newPassword" placeholder="Password" required>
          </div>
          <button type="submit" class="btn btn-primary">Valider</button>
        </form>
      </div>

    </div>
    <?php
    try {
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=trello;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }


    ?>


    <?php

    // INSCRIPTION -----------------------
    include'inscription.php';
    include 'footer.php';
    ?>
