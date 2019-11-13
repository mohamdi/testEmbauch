<?php

// l'inclusion du fichier conn.php contenant les parameters de la connexion a la base de donnee
include("conn.php");

//verification du reception de l'appel a partir du formulaire
if(isset($_POST['submit'])){
    try 
    {
        //Object PDO pour la connexion a la base de donnee
        $conn = new PDO("mysql:host=$dbHost; port=3306; dbname=$dbName", $dbUser, $dbPass);
        
        // mettre mode d'erreur du PDO a exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //recuperation des donnees envoyer par le formulair
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $dateNaiss = $_POST['dateNaiss'];
        $sex = $_POST['sex'];
        //$image = $_POST['image'];
        $sang = $_POST['sang'];
        $poids = $_POST['poids'];
        $taille = $_POST['taille'];
        $observations = $_POST['observations'];

        //id du personne qui vient d'etre enregistrer pour enregistrer sa consultation aussi.
        //id du personne est une cle etrangere dans la table des consultations.
        $idPersonne;

        //preparations de l'upload des informations de la personne.
        $dossier ="images/"; //le dossier dans lequel sera deplacer l'image.
        $image = $_FILES['image']['name']; //recuperation de l'image envoye par le formulair
        $chemin = $dossier . $image ;  //le chemin de destination de l'image.
        $fichier_cible=$image.basename($_FILES["image"]["name"]); //le chemin source de l'image.
        $typeImage=pathinfo($fichier_cible,PATHINFO_EXTENSION); //l'extension de l'image
        $extensionsDispo=array('jpeg','png' ,'jpg');  //liste des extensions permises
        $nomFichier=$_FILES['image']['name']; //Nom de l'image
        //verification si l'extension de l'image apparteint a la liste des extensions permises
        $ext=pathinfo($nomFichier, PATHINFO_EXTENSION); if(!in_array($ext,$extensionsDispo) ) 
        {
            echo "L'image doit avoir l'une des extensions suivantes JPG, JPEG, PNG ou GIF .";
        }
        else{ 
        move_uploaded_file( $_FILES['image'] ['tmp_name'], $chemin); //deplacement de l'image ver le dosssier de destination
        //la requette d'insertion des informations de la personne dans la base de donnee
        $sqlPers =$conn->prepare("insert into personne (Nom, Prenom, DateNaissance, img, sex) values (:nom, :prenom, :dateNaiss, :image, :sex)");
        //passer les parametres correspondants
        $sqlPers->bindParam(':nom', $nom);
        $sqlPers->bindParam(':prenom', $prenom);
        $sqlPers->bindParam(':dateNaiss', $dateNaiss);
        $sqlPers->bindParam(':image', $image);
        $sqlPers->bindParam(':sex', $sex);
        //execution de la requette
        $sqlPers->execute(); 
        } 
        //Requette de recuperation de l'identifiant du personne qu'on vient d'enregistrer.
        $sqlIdPersonne = $conn->prepare("SELECT id FROM personne WHERE Nom = :nom AND Prenom = :prenom AND DateNaissance = :dateNaiss AND sex = :sex");
        //l'execute de la requette
        $sqlIdPersonne->execute(['nom' => $nom, 'prenom' =>$prenom, 'dateNaiss'=>$dateNaiss, 'sex'=>$sex]);
        //recuperation de l'id.
        $idPersonne = $sqlIdPersonne->fetch()[0];

        //requette d'insertion de la consultation du personne.
        $sqlConsult = $conn->prepare("insert into consultation (GroupeSanguin, Poids, Taille, Observation, id_personne) VALUES (:sang, :poids, :taille, :observations, :idPersonne)");
        //rempplissage des parametres de la requette avec les donnees correspodantes.
        $sqlConsult->bindParam(':sang', $sang);
        $sqlConsult->bindParam(':poids', $poids);
        $sqlConsult->bindParam(':taille', $taille);
        $sqlConsult->bindParam(':observations', $observations);
        $sqlConsult->bindParam(':idPersonne', $idPersonne);
        //l'execution de la requette d'enregistrement de la consultation.
        $sqlConsult->execute();

        //La redirection vers la page principal apres l'enregistrement des donnees dans la base de donnee
        header("Location: index.php");
    }
    catch(PDOException $e)
    {
        //Message d'erreur lors d'un probleme de connexion avec la base de donnee
        echo "Probleme de connexion: " . $e->getMessage();
    }
}else{
    //Redirection vers la page principal pour interdir l'acces a ce fichier sans passer par le formulair.
    header("Location: index.php");
}



?>