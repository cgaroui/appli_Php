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
            if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
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
                $totalGeneral = 0;
                $nbProduits =0;
                foreach($_SESSION['products'] as $index => $product){  //permet d'excuter produit par produit, les mêmes instructions qui vont permettre l'affichage uniforme de chacun d'entre eux.
                    echo "<tr>",
                            "<td>".$index."</td>",
                            "<td>".$product['name']."</td>",
                            "<td>".$product['price']."</td>",
                            "<td>".$product['qtt']."</td>",
                            "<td>".$product['total']."</td>",
                            
                        "</tr>";
                    $totalGeneral+=$product['total'];
                    $nbProduits+=$product['qtt'];
                }      
                echo "<tr>",
                        "<td colspan=1>Nombre de produits : </td>",
                        "<td><strong> ".number_format($nbProduits,0)." </strong></td>",
                        "<td colspan=2>Total Genéral : </td>.",
                        "<td><strong>".number_format($totalGeneral, 2, "," , "&nbsp;")."&nbsp;€</strong></td>",
                       
                    "</tr>",
                    "</tbody>",
                "</table>";
            }
         
            
        
        ?>
        
    </body>
</html>