<?php
//Connexion à la base de donnée
$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, "root","");

$query = $db->query("SELECT *
FROM matelas
INNER JOIN matelas_dimensions
ON matelas.id = matelas_dimensions.matelas_id
INNER JOIN dimensions
ON matelas_dimensions.dimensions_id = dimensions.id;");
$matelas = $query->fetchAll();
?>

<?php
include("templates/header.php");
?>

<h1>Nos Matelas</h1>

<h1>Ajouter un matelas</h1><!-- <h1><a href="add_product.php"></a></h1> -->


<div class="matelas">
    <?php
    foreach ($matelas as $item) {
    ?>
        <div class="matela">
            <img src="<?= $item["image"] ?>" alt="">
            <h2>
                <?= $item["marque"] ?>
            </h2>
            <h2> <?= $item["reference"] ?></h2>

            <h3>dimension :</h3><p> <?= $item["taille"] ?></p>
            <h3>Prix :</h3><P> <del><?= $item["anc_prix"] ?></del> <?= $item["nouv_prix"] ?></p>
        </div>
    <?php
    }
    ?>
</div>

<?php
include("templates/footer.php");
?>