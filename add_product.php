<?php

if(!empty($_POST)){
    //Le formulaire a été soumis
    var_dump($_POST);
    //Utilisation de la fonction stip_tags() pour supprimer d'eventuelle balises HTML qui ce seraient glissées dans le champs de saisi ( et surtout une possible balise script)
    //Utilisation de la fonction trim pour supprimer d'éventuels espace en début et en fin de chaine
    $image = trim(strip_tags($_POST["image"]));
    $marque = trim(strip_tags($_POST["marque"]));
    $reference = trim(strip_tags($_POST["reference"]));
    $taille = trim(strip_tags($_POST["taille"]));
    $nouv_prix = trim(strip_tags($_POST["nouv_prix"]));

    $errors= [];
    if(empty($marque)){
        //Le champs"nom" de la recette est vide
        $errors["marque"] = "La marque du matelas est obligatoire !";
    }

        //Validation de l'url de l'image de la recette
        if(!filter_var($image, FILTER_VALIDATE_URL)){
            $errors["image"] = "Saisissez une URL valide !";
        }

    //On test si le formulaire est validé autrement dit sans erreur 
    if(empty($errors)){
        //Requete d'insertion en base de donnée
        $dsn = "mysql:host=localhost;dbname=literie3000";
        $db = new PDO($dsn, "root","");

        //On associe une variable à chaque parametre de la requete preparé avec la methode bindParam()
        $query= $db->prepare("INSERT INTO matelas
        (image, marque, reference, taille, nouv_prix)
        VALUES
        (:image, :marque, :reference, :taille, :nouv_prix)
        ");
        $query->bindParam(":marque", $marque);
        $query->bindParam(":image", $image);
        $query->bindParam(":reference", $reference);
        $query->bindParam(":taille", $taille);
        $query->bindParam(":nouv_prix", $nouv_prix, PDO::PARAM_INT);

        //Si l'execution de la requete se passe bien la methode execute() nous donne un booléen à vrai , dans ce cas
        //nous redirigereons l'utilisateur vers la page d'acceuil
        if ($query->execute()){
            header("Location: index.php");
        }
    }
}

include("templates/header.php");
?>

<h1>Ajouter un produit</h1>

<form action="" method="post">
    <div class="form-group">
        <label for="inputMarque">Marque du matelas :</label>
        <input id="inputMarque" name="marque" type="text" value="<?= isset($marque) ? $marque : ""?>">
        <?php 
        if(isset($errors["marque"])){
        ?>
        <span class="info-error"><?= $errors["marque"] ?></span>
        <?php
        }
        ?>

    <div class="form-group">
        <label for="inputImage">Photo du matelas :</label>
        <input id="inputImage" name="image" type="text" value="<?= isset($image) ? $image : ""?>">
        <?php 
        if(isset($errors["image"])){
        ?>
        <span class="info-error"><?= $errors["image"] ?></span>
        <?php
        }
        ?>
    </div>

    <div class="form-group">
        <label for="textareaReference">Reference :</label>
        <input id="inputReference" name="reference" type="text" value="<?= isset($reference) ? $reference : ""?>">
    </div>

    <div class="form-group">
        <label for="selectTaille">Choisissez une dimension :</label>
        <select name="taille" id="selectTaille">
            <option value="90 x 190" <?= (isset($taille) && $taille === "90 x 190") ? "selected" : ""?>>90 x 190</option>
            <option value="140 x 190" <?= (isset($taille) && $taille === "140 x 190") ? "selected" : ""?>>140 x 190</option>
            <option value="160 x 200" <?= (isset($taille) && $taille === "160 x 200") ? "selected" : ""?>>160 x 200</option>
            <option value="180 x 200" <?= (isset($taille) && $taille === "180 x 200") ? "selected" : ""?>>180 x 200</option>
            <option value="200 x 200" <?= (isset($taille) && $taille === "200 x 200") ? "selected" : ""?>>200 x 200</option>
        </select>
    </div>

    <div class="form-group">
        <label for="textareaNouv_prix">Nouveau prix :</label>
        <input id="inputNouv_prix" name="nouv_prix" type="text" value="<?= isset($nouv_prix) ? $nouv_prix : ""?>">
    </div>

    <input class="btn-literie3000" type="submit" value="Ajouter le produit">
</form>
<?php
include("templates/footer.php");
?>