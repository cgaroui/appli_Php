<?php

session_start();
    


    if(isset($_GET['action'])){

        // var_dump($_GET);die;

        switch($_GET['action']){

            case "ajouterProduit":
                if(isset($_POST['submit'])){

                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $price = filter_input(INPUT_POST,"price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            
                    if($name && $price && $qtt){
            
                        $product = [
                            "name"=>$name,
                            "price"=>$price,
                            "qtt"  =>$qtt,
                            "total"=>$price*$qtt,
                            
                        ];
                    
                    
                        $_SESSION['products'][]= $product;
                                
                        $_SESSION['message'] = '<div class="alert alert-success" role="alert"> Votre produit à bien été enregistré ! </div>';
                        } else {
                            $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Votre produit n\'a pas été enregistré !  </div>';
                        }
            
            
                    }
                    header("Location: index.php");
                    exit();


                

            case "viderPanier":

                if (isset($_SESSION['products'])) {
                    unset($_SESSION['products']);
                    
                }
                header("Location: recap.php"); exit;
                break;
            
            
            
                case "ajouterQtt":
                    if (isset($_SESSION['products']) && isset($_GET['id'])) {
                        $id = $_GET['id'];
                        if (isset($_SESSION['products'][$id])) {
                            $_SESSION['products'][$id]['qtt']++; // Incrémentation de la quantité
                            // $_SESSION['products'][$id]['total'] = $_SESSION['products'][$id]['qtt'] * $_SESSION['products'][$id]['price'];
                            $_SESSION['message'] = '<div class="alert alert-success" role="alert">Bravo ! Vous avez augmenté la quantité de votre produit !</div>';
                        }  
                    } else {
                        $_SESSION['message'] = '<div class="alert alert-warning" role="alert">Une erreur s\'est produite lors de l\'incrémentation de la quantité.</div>';
                    }
                    header("Location: recap.php"); exit;
                    break;
                
                
                
            
            
                case "diminuerQtt":
                    $id = $_GET['id'];
                    if(isset($_SESSION['products']) && isset($id) && $_SESSION['products'][$id]['qtt'] >0){ // on verifie bien les 3 conditions entre les && : 1: que session produit existe bien et qu'elle n'est pas nulle ,2: que session produit est liée a un id et 3:que la qtt initiale est bien > 0 (existante)
                        
                        
                        $_SESSION['products'][$id]['qtt']--; //pour decrementer la quantitée de 1
                        $_SESSION['message'] = '<div class="alert alert-success" role="alert"> Vous avez diminué la quantité de votre produit! </div>';
                        // $_SESSION['products'][$id]['total'] = $_SESSION['products'][$id]['qtt']*$_SESSION['products'][$id]['price']; //on reevalue le prix totale apres changement de quantitée 
                        if ($_SESSION['products'][$id]['qtt'] == 0) {
                            unset($_SESSION['products'][$id]);  //on verifie si la quantitée est nul apres suppresion de 1 qtt produit et on envoie un message l'indiquant à l'utilisateur 
                            $_SESSION['message'] = '<div  id="message" class="alert alert-warning" role="alert"> Votre produit a été supprimé du panier </div>';
                        } else {
                            
                            
                        }
                
                }
                
                header("Location: recap.php"); exit;
                break;

                case "supprimer": 
                    //vérifier si le parametre id est defini dans l'url et si le produit existe 
                    if (isset($_GET["id"]) && isset($_SESSION['products'][$_GET["id"]])) {
                        $supprimerProd = $_SESSION['products'][$_GET["id"]];
                        //suppprimer le produit 
                        unset($_SESSION['products'][$_GET['id']]);
                        //afficher le message indiquant la supression 
                        $_SESSION['message'] = '<div class="alert alert-success" role="alert"> Le produit a été supprimé avec succès ! </div>';
                    } 
                    else {//sinnon message d'erreur 
                        $_SESSION['message'] = '<div class="alert alert-danger" role="alert"> le produit à supprimer n\'existe pas ! </div>';
                    }
                    
                    header("Location:recap.php");die;
                    break;




            }

  
    header("Location:recap.php");
            }