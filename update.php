<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=location1", "root", "root"); 
    function date_Js2Db($dateStr){
        if (isset($dateStr)&& trim($dateStr)!="")
            return str_replace("T", " ", $dateStr);
        return "";
    }
    $pdoStat = $pdo->prepare('UPDATE client set Nom=:Nom Prenom=:Prenom Email=:Email Phone=:Phone Passwords=:Passwords Adresse=:Adresse Hote=:Hote DateCreation=:DateCreation DateModification=:DateModification WHERE Id=:Id Limit 1');
    
    $pdoStat->bindValue(':Id', $_POST['Id'], PDO::PARAM_INT);
	$pdoStat->bindValue(':Nom', $_POST['Nom'], PDO::PARAM_STR_CHAR);
    $pdoStat->bindValue(':Prenom', $_POST['Prenom'], PDO::PARAM_STR_CHAR);
    $pdoStat->bindValue(':Email', $_POST['Email'], PDO::PARAM_STR_CHAR);
    $pdoStat->bindValue(':Phone', $_POST['Phone'], PDO::PARAM_STR_CHAR);
    $pdoStat->bindValue(':Passwords', $_POST['Passwords'], PDO::PARAM_STR_CHAR);
    $pdoStat->bindValue(':Adresse', $_POST['Adresse'], PDO::PARAM_STR_CHAR);
    $pdoStat->bindValue(':Hote', $_POST['Hote'], PDO::PARAM_INT);
    $pdoStat->bindValue(':DateCreation', date_Js2Db ($_POST['DateCreation'], PDO::PARAM_INT));
    $pdoStat->bindValue(':DateModification', date_Js2Db ($_POST['DateModification'], PDO::PARAM_INT));
	
    
    $executeIsOk = $pdoStat->execute();
    if($executeIsOk){
        $mess = 'L identifiant a bien été modifié';
    }
    else{
        $mess = 'Echec de la modification';
    }    
} catch (PDOException $modif) {
    echo $modif->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="submit" value="Update" name="Update"/>
    <h1>Modification</h1>
    <p><?= $mess ?></p>    
</body>
</html>