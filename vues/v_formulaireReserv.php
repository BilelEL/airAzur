<html>
    <head>
        <meta charset="ISO-8859-1">
        <title></title>
    </head>
    <body>
        <div id="contenu"> 
            <fieldset>
                <form action="index.php?action=validerReservation" methode="post">
                    <p><input type="hidden" name="numero" value=<?php echo $numVols?> />
                        
                    <legend> reservation du vol : <?php echo $numVols ?> </legend>
                    <p><label for="nom"> Nom: </label>
                        <input type="text" name="nom" id="nom" /></p>
                    <p><label for="prenom"> Prenom: </label>
                        <input type="text" name="prenom" id="prenom" /></p>
                    <p><label for="zdresse"> Adresse: </label>
                        <input type="text" name="adresse" id="adresse" /></p>
                    <p><label for="mail"> Mail: </label>
                        <input type="text" name="mail" id="mail" /></p>
                    <p><label for="nbVoy"> Nombre de voyageur: </label>
                        <input type="text" name="nbVoyageur" id="nbVoyageur" /></p>
                    <p> <input type="submit" values="Valider" /> </p>
                    <p> <input type="submit" values="Annuler" /> </p>
                        
                </form>
            </fieldset>
        </div>
    </body>
</html>

