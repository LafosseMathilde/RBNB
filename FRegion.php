<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annonce</title>
</head>
<body>
<form method="post" action="">
		Id:<input type="text" name="Id"/><br><br>

		PrixHT:<input type="text" name="PrixHT"/><br><br>
		Adresse:<input type="text" name="Adresse"/><br><br>
		DateCreation:<input type="date" name="DateCreation"/><br><br>
		DateModification:<input type="date" name="DateModification"/><br><br>
        Client_Id:<input type="text" name="Client_Id"/><br><br>
        TypeImmo_Id:<input type="text" name="TypeImmo_Id"/><br><br>
        Region_Id:<input type="text" name="Region_Id"/><br><br>
		<input type="submit" value="Envoyer" name="Envoyer"/>
</form>
</body>
</html>
<?php
	//Connexion à la BDD
  $host= 'localhost';
  $dbname = 'location1';
  $username = 'root';
  $password = 'root';
  
	if (isset($_POST['Envoyer'])){
		try{
			$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$Id = $_POST['Id'];
			//$Publication = $_POST['Publication'];
			$PrixHT = $_POST['PrixHT'];
			$Adresse = $_POST['Adresse'];
			$DateCreation = $_POST['DateCreation']; 	
			$DateModification = $_POST['DateModification'];
			$Client_Id = $_POST['Client_Id'];
			$TypeImmo_Id = $_POST['TypeImmo_Id']; 	
			$Region_Id = $_POST['Region_Id'];
		
			
			$sql=("INSERT INTO `annonce`(`Id`,`PrixHT`, `Adresse`, `DateCreation`, `DateModification`, `Client_Id`, `TypeImmo_Id`, `Region_Id`) VALUES ('$Id','$PrixHT','$Adresse','$DateCreation','$DateModification','$Client_Id','$TypeImmo_Id','$Region_Id')");
				
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam('Id', $Id);

			$stmt->bindParam('PrixHT', $PrixHT);
			$stmt->bindParam('Adresse', $Adresse);
			$stmt->bindParam('DateCreation', $DateCreation);
			$stmt->bindParam('DateModification', $DateModification);
			$stmt->bindParam('Client_Id', $Client_Id);
			$stmt->bindParam('TypeImmo_Id', $TypeImmo_Id);
			$stmt->bindParam('Region_Id', $Region_Id);

				
			
			if($stmt->execute()){
				echo '<script>alert("Enregistré avec succès");</script>';
			}else{
				$error = "Erreur: ".$e->getMessage();
				echo '<script>alert("'.$error.'");</script>';
			}
			
		}catch (PDOException $e){  
			$error = "Erreur: ".$e->getMessage();
			echo '<script>alert("'.$error.'");</script>'; 
		}
	}
		
?>