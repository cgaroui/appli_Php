<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Document</title>
    </head>
    <body>
        <div class="d-grid gap-2 col-6 mx-auto">
        
            <input class="btn btn-primary" type="submit" name="submit" value="ajouter le produit">
            <a href="recap.php" class="btn btn-light" type="submit"  role="button" >Panier</a>

            <h1>Ajouter un produit</h1>
        </div>
        

        <div class="d-grid gap-2 col-6 mx-auto">
        
            <form action= "traitement.php" method="post">           <!-- Utilisation de la méthode POST pour envoyer les données du formulaire au serveur -->
            
                <label >
                    Nom du produit : <br>
                    <input style="width: 300px;" type="text" name="name">

                </label>
            
                <label >
                    Prix du produit : <br>
                    <input style="width: 300px;"type="number" step="any" name="price">

                </label>
            
                <label >
                    Quantité desirée : <br>
                    <input style="width: 300px;" type="number" name="qtt" value="1">

                </label>
            
            
        
                <input class="btn btn-primary" type="submit" name="submit" value="ajouter le produit">
            
            </div>
           
        </form>
    </body>
</html>