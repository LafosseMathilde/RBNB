<?php
    $pdo = new PDO("mysql:host=localhost;dbname=location1", "root", "root"); 
    $pdoStat = $pdo->prepare('DELETE FROM client WHERE Id=:Id Limit 1');
    $pdoStat->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);
    $executeIsOk = $pdoStat->execute();
    $update= $pdoStat->fetch();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="post" action="">

            Id:<input type="text" name="Id" placeholder="<?php echo $update['Id'];?>"/><br><br>
            Nom:<input type="text" name="Nom" placeholder="<?php echo $update['Nom'];?>"/><br><br>
            Prenom:<input type="text" name="Prenom" placeholder="<?php echo $update['Prenom'];?>"/><br><br>
            Email:<input type="text" name="Email" placeholder="<?php echo $update['Email'];?>"/><br><br>
            Phone:<input type="text" name="Phone" placeholder="<?php echo $update['Phone'];?>"/><br><br>
            Passwords:<input type="passwords" name="Passwords" placeholder="<?php echo $update['Passwords'];?>"/><br><br>
            Adresse:<input type="text" name="Adresse" placeholder="<?php echo $update['Adresse'];?>"/><br><br>
            Hote:<select name="Hote">
                <input type="radio" name="rep" value="Hote" id="Hote"  placeholder="<?php echo $update['Hote'];?>"/> <label for="Hote">Hote</label><br/>
            DateCreation:<input type="date" name="DateCreation" placeholder="<?php echo $update['DateCreation'];?>"/><br><br>
            DateModification:<input type="date" name="DateModification" placeholder="<?php echo $update['DateModification'];?>"/><br><br>
            <input type="submit" value="Envoyer" name="Envoyer"/>
        </form>
    </body>
</html>