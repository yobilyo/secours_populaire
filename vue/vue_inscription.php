<?php
//require_once("../gestion_inscription.php");
?>


<!doctype html>
<html>
    <body>
        <h2> Inscription au secours populaire </h2>
            <form action="" method="post">
                <table border="0">
                    <tr>
                        <td> Nom : </td> <td><input type="text" name="nom"></td>
                    </tr>
                    <tr>
                        <td> Prenom : </td> <td><input type="text" name="prenom"></td>
                    </tr>
                    <tr>
                        <td> Email : </td> <td><input type="text" name="email"></td>
                    </tr>
                    <tr>
                        <td> Mot de passe : </td> <td><input type="password" name="mdp"></td>
                    </tr>
                    <tr>
                        <td> 
                            <input type="reset" name="annuler" value ="Annuler">
                        </td> 
                        <td>
                            <input type="submit" name="sinscrire" value ="S'inscrire">

                            
                        </td>
                    </tr>
                </table>
        </form>

    </body>
</html>

