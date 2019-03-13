<?php
function Connexion(){
  //Connexion a la base de donnéees
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=interface_sol;charset=utf8','root','');
  }

//Gestion des Erreurs
  catch(Exception $e){
    die('Erreur :'.$e->getMessage());
  }
}

function Disconnect(){
  session_start();
  $_SESSION = array();
  session_unset();
  session_destroy();
  header('Location : index.php');
}

function Traitement_Connexion(){

  //Connexion a la base de donnéees
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=interface_sol;charset=utf8','root','');
  }
//Gestion des Erreurs
  catch(Exception $e){
    die('Erreur :'.$e->getMessage());
  }

  // Si je boutton est de connexion appuyé
  if(isset($_POST['button'])){
    //Vérification des champs
    if(empty($_POST['login'])){
      echo "Le champ pseudo est vide.";
    }
    else{
      if(empty($_POST['password'])){
        echo "Le champ mot de passe est vide.";
      }
      else{
        $login = htmlentities($_POST['login'], ENT_QUOTES, "ISO-8859-1");
        $password = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
        //hashage du mot de passe avec Bcrypt
        $req = $bdd->prepare("SELECT id, password, id_role FROM membre WHERE nom = :login");
        $req->execute(array(
          'login'=>$login));

        $resultat = $req->fetch();
        if(!$resultat)
        {
          echo"Mauvais pseudo ou mot de passe.";
        }
        else{
          $password_hashed = $resultat['password'];
          if(password_verify($password, $password_hashed)){
            echo "Mot de passe correct !";
          } else{
            echo "Mauvais pseudo ou mot de passe";
          }
        }

        //Redirection vers l'interface admin ou gestionnaire
        $groupe = $resultat['id_role'];

        if(!$resultat){
          echo " Ou vous n'avez pas de groupe !";
        }
        else{
          if($groupe == 4){
            session_start();
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['id_role'] = $groupe;
            header('Location: PanelAdmin/panel.php');
            exit();
          }

          if($groupe == 3){
            session_start();
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['id_role'] = $groupe;
            header('Location: add_fly.php');
            exit();
          }

          if($groupe == 2){
            session_start();
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['id_role'] = $groupe;
            header('Location: add_fly.php');
            exit();
          }

          if($groupe == 1){
            session_start();
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['id_role'] = $groupe;
            header('Location: add_fly.php');
            exit();
          }
        }
      }
    }
  }
}

function InscriptionMembre(){
 //Déclaration du tableau qui stockera tout les messages d'erreurs
  $error = array();

  //Vérification des champs
  if(isset($_POST['Btn_Inscription'])){
    //Vérification des champs
    if(empty($_POST['nom'])){
      $error[] = "Le nom n'est pas référencé !";
    }
    if(empty($_POST['prenom'])){
      $error[] = "Le prénom n'est pas référencé !";
    }
    if(empty($_POST['motdepasse'])){
      $error[] = "Le mot de passe n'est pas référencé ou valide !";
    }
    if(empty($_POST['role'])){
      $error[] = "Le role n'est pas référencé !";
    }
    else
    {
      //Connexion a la base de donnéees
      try{
        $bdd = new PDO('mysql:host=localhost;dbname=interface_sol;charset=utf8','root','');
      }
     //Gestion des Erreurs
      catch(Exception $e){
        die('Erreur :'.$e->getMessage());
      }
      //Récupération des informations du formulaire
      $password = $_POST['motdepasse'];
      $name = $_POST['nom'];
      $first_name = $_POST['prenom'];
      $role = $_POST['role'];
      //hashage du mot de passe avec Bcrypt
      $password_hashed = password_hash($password, PASSWORD_BCRYPT);
      //Préparation de la requete d'Inscription
      $requete = $bdd->prepare("INSERT INTO membre(nom, prenom, password, Date_inscription, id_role)
      VALUES(:nom, :prenom, :password, NOW(), :id_role)");
      //Exécution de la raquete
      $requete->execute(array(
        'nom'=> $name,
        'prenom'=> $first_name,
        'password'=> $password_hashed,
        'id_role'=> $role
      ));
      //Message qui valide l'inscription
      $success = "Vous avez inscits un membre !";
    }
}
}

function InscriptionMachine(){
  //Déclaration du tableau qui stockera tout les messages d'erreurs
   $error = array();

   //Vérification des champs
   if(isset($_POST['Btn_Machine'])){
     //Vérification des champs
     if(empty($_POST['type'])){
       $error[] = "Le type n'est pas référencé !";
     }
     if(empty($_POST['marque'])){
       $error[] = "La marque n'est pas référencé !";
     }
     if(empty($_POST['modele'])){
       $error[] = "Le modele n'est pas référencé ou valide !";
     }
     if(empty($_POST['years'])){
       $error[] = "L'année n'est pas référencé !";
     }
     if(empty($_POST['finesse'])){
       $error[] = "La finesse n'est pas référencé !";
     }
     else
     {
       //Connexion a la base de donnéees
       try{
         $bdd = new PDO('mysql:host=localhost;dbname=interface_sol;charset=utf8','root','');
       }
      //Gestion des Erreurs
       catch(Exception $e){
         die('Erreur :'.$e->getMessage());
       }
       //Récupération des informations du formulaire
       $type = $_POST['type'];
       $marque = $_POST['marque'];
       $modele = $_POST['modele'];
       $years = $_POST['years'];
       $finesse = $_POST['finesse'];
       //Préparation de la requete d'Inscription
       $requete = $bdd->prepare("INSERT INTO machine(Type, Marque, Modèle, Année, FinesseThéorique)
       VALUES(:type, :marque, :modele, :annee, :finesse)");
       //Exécution de la raquete
       $requete->execute(array(
         'type'=> $type,
         'marque'=> $marque,
         'modele'=> $modele,
         'annee'=> $years,
         'finesse'=> $finesse
       ));
       //Message qui valide l'inscription
       $success = "Vous avez mis un nouvel appareil !";
     }
 }
}