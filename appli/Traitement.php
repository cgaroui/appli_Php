<?php

    session_start();
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
      
        

        

  

    

    header("Location:index.php");
