<?php
  session_start();
   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        <title>Récapitulatif des produits</title>
    </head>
    <body>
        <?php
            if(!isset($_SESSION['products']) || empty($_SESSION['products'])){ //isset pour verifier qu'aucun produit n'existe et le empty c'est pour verifier que la session product est vide 
                echo "<p>Aucun produit en session..</p>";
            }
            else{
                echo "<table>",                     //initialisation du tableau HTML
                        "<thead>",
                            "<tr>",
                                "<th>#</th>",
                                "<th>Nom</th>",
                                "<th>Prix</th>",
                                "<th>Quantité</th>",
                                "<th>Total</th>",   
                            "</tr>",
                        
                        "</thead>",
                        "<tbody>"; 

            }
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
                                ."<a id=qtt href='traitement.php?action=ajouterQtt&id=$index' class='btn btn-success'>+</a>" . "&nbsp;&nbsp;".
                                    "<a id=qtt href='traitement.php?action=diminuerQtt&id=$index' class='btn btn-danger'>-</a>" .
                            "</td>" .
                            "<td>".$prixToalProduit."</td>",

           
                         "</tr>";
                         $nbProduits +=$product['qtt'];             //calcul la quantité d'elements total dans le panier (additionne la qtt de tous les produits dans le panier) 
                         $totalGeneral += $product['price']*$product['qtt'];        //calcul le prix total (additionne le prix de tous les produits dans le panier)

                }
                        
                 
                
     
                echo "<tr>",    
                        "<td colspan=1>Nombre total de produits : </td>",
                        "<td><strong> ".number_format($nbProduits,0)." </strong></td>",//pour afficher le resultat de nb broduit sous forme entier avec 0 decimal apres la virgule(quantité)
                        "<td colspan=2>Total Genéral : </td>.",
                        "<td><strong>".number_format($totalGeneral, 2, "," , "&nbsp;")."&nbsp;€</strong></td>",//pour afficher le resultat de nb broduit sous forme entier avec 2 decimaux apres la virgule(prix)
                       
                    "</tr>",
                    "</tbody>",
                "</table>";
            
           
            if(isset($_SESSION['message'])){    //s'il ya un message dans la session 
                echo $_SESSION['message'];      //on l'affiche 
                unset($_SESSION['message']);    //ensuite il disparait lorsqu'on raffréchit la page 
            }
            
          
            
            
        
        ?>
        
    </body>
</html>