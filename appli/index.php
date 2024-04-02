<?php

require_once('nbArticles.php');


//session_start();
ob_start();

?>

<div class="d-grid gap-2 col-6 mx-auto">

    <input class="btn btn-primary" type="submit" name="submit" value="ajouter le produit">
        <button type="button" class="btn btn-light">
            <a href="recap.php">Panier</a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?= NombreProduits() ?>
                    <span class="visually-hidden"></span>
                </span>
        </button>

    <h1>Ajouter un produit</h1>
</div>


<div class="d-grid gap-2 col-6 mx-auto">
    <form action="traitement.php?action=ajouterProduit" method="post">           <!-- Utilisation de la méthode POST pour envoyer les données du formulaire au serveur -->
    
        <label >
            Nom du produit : <br>
            <input   style="width: 300px;" type="text" name="name">
        </label>
    
        <label >
            Prix du produit : <br>
            <input min=1 style="width: 300px;"type="number" step="any" name="price">
        </label>
    
        <label >
            Quantité desirée : <br>
            <input min=1 id="" style="width: 300px;" type="number" name="qtt" value="1">
        </label>
    
    

        <input class="btn btn-primary" type="submit" name="submit" value="ajouter le produit">
    </form>
    
    </div>
        

<?php
    $content = ob_get_clean();
    $title = "Ajout produit";
    require_once "template.php"; 
?>