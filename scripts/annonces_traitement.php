<?php 

require "database.php";
$genre = $nom = $prenoms = $telephone = $email = $type = $ville = $quartier = $surface = nb_piece = $nb_chambre = $nb_salon = $nb_douche = "";

function inputVerify($var){

    $var = trim($var);
    $var = htmlspecialchars($var);
    $var = stripslashes($var);

    return $var;
}

if (!empty($_POST)) {
    $titre = inputVerify($_POST["titre"]);
    $desc = inputVerify($_POST["desc"]);
    $image = inputVerify($_FILES["pp"]["name"]);
    $imagePath = '../inter/image/'.basename($image);
    $imageExtension = pathinfo($imagePath,PATHINFO_EXTENSION);
    
    $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg") 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $imageError = "Le fichier existe déjà, pensez à renommer le fichier";
                $isUploadSuccess = false;
            }
            if($_FILES["pp"]["size"] > 500000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["pp"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
    
    if($isUploadSuccess){
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO services_tables (titre,descr,photo) values(?, ?, ?)");
        $statement->execute(array($titre,$desc,$image));
        Database::disconnect();
        $felicitations = "Le service a été ajouté";
    }
    
}

?>