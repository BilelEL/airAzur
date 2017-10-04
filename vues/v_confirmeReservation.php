<html>
    <head>
        <meta charset="ISO-8859-1">
        <title></title>
    </head>
    <body>
        <div id="confirmeReservation">
            <form action="index.php?action=valierReservation" method="POST">
                <input type="hidden" name="numero" value=<?php echo $numero?> />   
                <input type="hidden" name="nom" value=<?php echo $nom?> /> 
                <input type="hidden" name="prenom" value=<?php echo $prenom?> /> 

                <legend> La réservation pour le vol n°<?php echo $numero?> est confirmé pour le client <?php echo $prenom&$nom ?>  </legend>
        </div>
    </body>   
</html>

