

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>
    <div    id="wrapper">
        <?=$content?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" > </script>
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
        

        
    
        
    </body>
</html>