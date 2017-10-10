<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="bandeau">
            <h3></h3>
            <div id="conteneur">
                <fieldset>
                    <legend> Reservation du vol : <?php echo $numero ?> </legend>
                    <form action="index.php?action=validerReservation" method="POST">
                        <input type="hidden" name="numero" value=<?php echo $numero?> />

                        
                       <p><label for="nom"> Nom: </label>
                            <input type="text" name="nom" id="nom" /></p>
                        <p><label for="prenom"> Prenom: </label>
                            <input type="text" name="prenom" id="prenom" /></p>
                        <p><label for="adresse"> Adresse: </label>
                            <input type="text" name="adresse" id="adresse" /></p>
                        <p><label for="mail"> Mail: </label>
                            <input type="text" name="mail" id="mail" /></p>
                        <p><label for="nombreVoyageur"> Nombre de voyageurs: </label></br>
                            <input type="text" name="nombreVoyageur" id="nombreVoyageur" /></p>
                        <p> <input class= "bouton" type=submit value=Valider /></a> </p>
                        <p> <input class= "bouton" type=submit value=Annuler /> </p>

                       
                </form>
            </fieldset>
        </div>
    </body>
</html>