<?php

    
    function getDatabaseConnexion()
    {
        try {
            $user = "root";
            $pass = "";
            $pdo = new PDO('mysql:host=localhost;dbname=menuiz', $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    
    // récupere tous les users
    function getAllUsers()
    {
        $con = getDatabaseConnexion();
        $requete = 'SELECT * from t_d_user_usr';
        $rows = $con->query($requete);
        return $rows;
    }

    // creer un user
    function createUser($nom, $prenom, $email, $password, $pseudo)
    {
        try {
            $con = getDatabaseConnexion();
            $sql = "INSERT INTO t_d_user_usr (USR_LASTNAME, USR_FIRSTNAME, USR_MAIL, USR_PASSWORD, username) 
					VALUES ('$nom', '$prenom', '$email', '$password', '$pseudo' )";
            $con->exec($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    //recupere un user
    function readUser($id)
    {
        $con = getDatabaseConnexion();
        $requete = "SELECT * from t_d_user_usr where USR_ID = '$id' ";
        $stmt = $con->query($requete);
        $row = $stmt->fetchAll();
        if (!empty($row)) {
            return $row[0];
        }
    }

    //met à jour le user
    function updateUser($id, $nom, $prenom, $email, $password, $pseudo)
    {
        try {
            $con = getDatabaseConnexion();
            $requete = "UPDATE t_d_user_usr set 
						USR_LASTNAME = '$nom',
						USR_FIRSTNAME = '$prenom',
						USR_MAIL = '$email',
                        USR_PASSWORD = '$password',
                        username = '$pseudo'
						where USR_ID = '$id' ";
            $stmt = $con->query($requete);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    // suprime un user
    function deleteUser($id)
    {
        try {
            $con = getDatabaseConnexion();
            $requete = "DELETE from t_d_user_usr where USR_ID = '$id' ";
            $stmt = $con->query($requete);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    // Formulaire de connexion
    function connexionUser()
    {
        @$nom = $_POST["nom"];
        @$prenom = $_POST["prenom"];
        @$pseudo = $_POST["pseudo"];
        @$password = $_POST["password"];
        @$passwordConf = $_POST["passconf"];
        @$pass_crypt = md5($_POST["password"]);
        @$email = $_POST["email"];
        @$valider = $_POST["valider"];
        $erreur = "";
        if (isset($valider)) {
            include("connexion.php");
            $verify = $pdo->prepare("select * from t_d_user_usr where username=? and USR_PASSWORD=? limit 1");
            $verify->execute(array($pseudo, $pass_crypt));
            $user = $verify->fetchAll();
            if (count($user) > 0) {
                $_SESSION["prenom_nom"] = $pseudo;
                // ucfirst(strtolower($user[0]["prenom"])) .
                // " "  .  strtoupper($user[0]["nom"]);
                $_SESSION["connecter"] = "yes";
                header("location:index.php");
            } else {
                $erreur = "Mauvais login ou mot de passe!";
            }
        } ?>

        <body  onLoad="document.fo.login.focus()">
        <h1>Authentification</h1>
        <div  class="erreur"><?php  echo  $erreur  ?></div>
        <form  name="form"  method="post"  action="">
        <input  type="text"  name="pseudo"  placeholder="Votre Pseudo"  /><br  />
        <input  type="password"  name="password"  placeholder="Mot de passe"  /><br  />
        <input  type="submit"  name="valider"  value="S'authentifier"  />
        <a  href="inscription.php">Créer votre Compte</a>
        </form>
        </body>
        <?php
    }

    // Formulaire d'inscription et vérification que le nouvel utilisateur n'est
    // pas déjà dans la base de données.
    function verifUser()
    {
        @$nom = $_POST["nom"];
        @$prenom = $_POST["prenom"];
        @$pseudo = $_POST["pseudo"];
        @$password = $_POST["password"];
        @$passwordConf = $_POST["passconf"];
        @$pass_crypt = md5($_POST["password"]);
        @$email = $_POST["email"];
        @$valider = $_POST["inscrire"];
        $erreur = "";
        if (isset($valider)) {
            if (empty($nom)) {
                $erreur = "Le champs nom est obligatoire !";
            } elseif (empty($prenom)) {
                $erreur = "Le champs prénom est obligatoire !";
            } elseif (empty($pseudo)) {
                $erreur = "Le champs Pseudo est obligatoire !";
            } elseif (empty($email)) {
                $erreur = "Le champs Email est obligatoire !";
            } elseif (empty($password)) {
                $erreur = "Le champs mot de passe est obligatoire !";
            } elseif ($password != $passwordConf) {
                $erreur = "Mots de passe differents !";
            } else {
                include("connexion.php");
                $verify_pseudo = $pdo->prepare("select USR_ID from t_d_user_usr where username=? limit 1");
                $verify_pseudo->execute(array($pseudo));
                $user_pseudo = $verify_pseudo->fetchAll();
                if (count($user_pseudo) > 0) {
                    $erreur = "Pseudo existe déjà!";
                }


                /* Vérifier si l'e-mail est déjà dans la base de données. */
                $verify_email = $pdo->prepare("select USR_ID from t_d_user_usr where USR_MAIL=? limit 1");
                $verify_email->execute(array($email));
                $user_email = $verify_email->fetchAll();
                if (count($user_email) > 0) {
                    $erreur = "Email déjà existant !";
                } else {
                    // $ins = $pdo->prepare("insert into t_d_user_usr(USR_LASTNAME,USR_FIRSTNAME,username,USR_PASSWORD, USR_MAIL) values(?,?,?,?,?)");
                    // if ($ins->execute(array($nom, $prenom, $pseudo, md5($password), $email)))
                    createUser($nom, $prenom, $email, md5($password), $pseudo);
                    header("location:login.php");
                }
            }
        } ?>
        <body>
        <h1>Inscription</h1>
        <div  class="erreur"><?php  echo  $erreur  ?></div>
        <form  name="fo"  method="post"  action="">
        <input  type="text"  name="nom"  placeholder="Nom"  value="<?=  $nom  ?>"  /><br  />
        <input  type="text"  name="prenom"  placeholder="Prénom"  value="<?=  $prenom  ?>"  /><br  />
        <input  type="text"  name="pseudo"  placeholder="Votre Pseudo"  value="<?=  $pseudo  ?>"  /><br  />
        <input  type="email" name="email" placeholder="Votre adresse mail"/> <br>
        <input  type="password"  name="password"  placeholder="Mot de passe"  /><br  />
        <input  type="password"  name="passconf"  placeholder="Confirmer votre Mot de passe"  /><br  />
        <input  type="submit"  name="inscrire"  value="S'inscrire"  />
        <a  href="login.php">Deja un compte</a>
        </form>
        </body>
        <?php
    }
