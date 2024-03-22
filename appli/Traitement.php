<?php

    session_start();
    if(isset($_post['submit'])){

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST,"price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $name = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

        if($name && $price &&$qtt){
            $product = [
                "name"=>$name,
                "price"=>$price,
                "qtt"  =>$qtt,
                "total"=>$price*$qtt
            ];
            $_session['products'][] =$product;

        }

    }

    header("Location:index.php");
