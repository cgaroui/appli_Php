<?php
    session_start();


    function NombreProduits(){
        $qttProduitsDiff =0;
        if(isset($_SESSION['products']) && !empty($_SESSION['products'])){
            foreach($_SESSION['products'] as $index => $product){  //permet d'excuter produit par produit, les mêmes instructions qui vont permettre l'affichage uniforme de chacun d'entre eux.
            
                $qttProduitsDiff +=1;
            }
        }
        return $qttProduitsDiff;
     
    }

    
    ?>