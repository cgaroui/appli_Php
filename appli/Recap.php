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
                        "<td colspan=1>Nombre total de produits : </td>",
                        "<td><strong> ".number_format($nbProduits,0)." </strong></td>",//pour afficher le resultat de nb broduit sous forme entier avec 0 decimal apres la virgule(quantité)
                        "<td colspan=2>Total Genéral : </td>.",
                        "<td><strong>".number_format($totalGeneral, 2, "," , "&nbsp;")."&nbsp;€</strong></td>",//pour afficher le resultat de nb broduit sous forme entier avec 2 decimaux apres la virgule(prix)
                       
                    "</tr>",
                    "</tbody>",
                "</table>";
            }
           
            if(isset($_SESSION['message'])){    //s'il ya un message dans la session 
                echo $_SESSION['message'];      //on l'affiche 
                unset($_SESSION['message']);    //ensuite il disparait lorsqu'on raffréchit la page 
            }
            
          
            if(isset($_GET['action'])){

                switch($_GET['action']){
                    case "viderPanier":
                        if (isset($_SESSION['products'])) {
                            unset($_SESSION['products']);
                            
                        }
                        header("Location:recap.php");die;
                        break;
                    
                    case "diminuerQtt":
                        if(isset($_SESSION['products']) && isset($_SESSION['products'][$id]) && $_SESSION['products'][$id]['qtt'] >= 1){ // on verifie bien les 3 conditions entre les && : 1: que session produit existe bien et qu'elle n'est pas nulle ,2: que session produit est liée a un id et 3:que la qtt initiale est bien > 0 (existante)
                            $_SESSION['products'][$id]['qtt']--; //pour decrementer la quantitée de 1
                            $_SESSION['products'][$id]['total'] = $_SESSION['products'][$id]['qtt']*$_SESSION['products'][$id]['price']; //on reevalue le prix totale apres changement de quantitée 
                            if ($_SESSION['products'][$id]['qtt'] == 1) {
                                unset($_SESSION['products'][$id]);  //on verifie si la quantitée est nul apres suppresion de 1 qtt produit et on envoie un message l'indiquant à l'utilisateur 
                                $_SESSION['message'] = '<div  id="message" class="alert alert-success" role="alert"> Votre produit a été supprimé du panier </div>';
                            } else {
                                //on affiche rien car il yaura seulement la quatité qui s'est decrementé
                               
                            }
                        
                        }





                }
            }
        
        ?>
        
    </body>
</html>