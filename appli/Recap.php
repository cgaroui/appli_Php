<?php
  session_start();
?>
<div class="container">
    <?php
    //verifier si le panier est vide 
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){ //isset pour verifier qu'aucun produit n'existe et le empty c'est pour verifier que la session product est vide 
       //affichage si le panier est vide 
        echo "<p>Aucun produit en session..</p>";
    }
    else {
    ?>

        <div class="table-responsive mt-4">
            <!-- tableau pour afficher les produits -->
            <table  class='table table-bordered border-primary '>                   
                <thead class='table-primary'>
                    <tr >
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>   
                    </tr>
                
                </thead>
                <tbody> 
                <?php
        
    
        //initialisation variables pour calculer prix total et nombre total de produit 
        $totalGeneral = 0;
        $nbProduits =0;
        

        foreach($_SESSION['products'] as $index => $product){  //permet d'excuter produit par produit, les mêmes instructions qui vont permettre l'affichage uniforme de chacun d'entre eux.
        
            $prixToalProduit = $product['price']*$product['qtt'] ;  //calcul le prix total d'un SEUL produit en fonction de la quantité qu'on choisi
            echo "<tr>" .
                    "<td>" . $index . "</td>" .
                    "<td>" . $product['name'] . "</td>" .
                    "<td>" . $product['price'] . "</td>" .
                    "<td>" . $product['qtt'] .
                    "&nbsp;&nbsp;"
                    //boutons pour gerer la quantité du produit et ou  le suprimer
                    ."<a id='qtt' href='traitement.php?action=ajouterQtt&id=$index' class='btn btn-info'>+</a>" . "&nbsp;&nbsp;".
                    "<a id='qtt' href='traitement.php?action=diminuerQtt&id=$index' class='btn btn-secondary'>-</a>" ."&nbsp;&nbsp;".
                    "<a id='qtt' href='traitement.php?action=supprimer&id=$index' class='btn btn-info'>Supprimer</a>" . 
                    "</td>" .
                    "<td>".$prixToalProduit."</td>",
                    "</tr>";

                    $nbProduits +=$product['qtt'];             //calcul la quantité d'elements total dans le panier (additionne la qtt de tous les produits dans le panier) 
                    $totalGeneral += $product['price']*$product['qtt'];        //calcul le prix total (additionne le prix de tous les produits dans le panier)
                 
        }
        ?>        
         
                    <!-- Ligne pour afficher le nombre total de produits -->
                    <tr>
                        <td colspan="3">Nombre total de produits :</td>
                        <td colspan="2"><strong><?= $nbProduits ?></strong></td>
                    </tr>
                    <!-- Ligne pour afficher le total général -->
                    <tr>
                        <td colspan="3">Total Général :</td>
                        <td colspan="2"><strong><?= number_format($totalGeneral, 2, ',', ' ') ?> €</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php       
    }    
    ?>  

    <!-- Bouton pour vider le panier -->
    <a href='traitement.php?action=viderPanier' class='btn btn-danger mt-3'>Vider le panier</a>

    <?php
    // Affiche un message s'il y en a un dans la session
    if (isset($_SESSION['message'])) {
        echo "<p class='mt-3'>" . $_SESSION['message'] . "</p>";
        // Supprime le message de la session après l'avoir affiché
        unset($_SESSION['message']);
    }
    ?>
</div>

<?php
$content = ob_get_clean();
$titre = "Récapitulatif des produits";
require_once "template.php";
?>
