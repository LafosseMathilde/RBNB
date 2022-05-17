<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=location1", "root", "root"); 
    $pdoStat = $pdo->prepare('DELETE FROM client WHERE Id=:Id Limit 1');
    $pdoStat->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);
    $executeIsOk = $pdoStat->execute();
    
    if($executeIsOk){
        $mess = 'L identifiant a bien été supprimé';
    }
    else{
        $mess = 'Echec de la suppression';
    }    
} catch (PDOException $err) {
    echo $err->getMessage();
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
    <h1>suppression</h1>
    <p><?= $mess ?></p>    
</body>
</html>