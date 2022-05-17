<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel=stylesheet href="Formulaire.css">
	<link rel=stylesheet href="home.html">

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulaire:</title>
</head>
<body>
<form method="post" action="">
		Id:<input type="text" name="Id"/><br><br>
		Nom:<input type="text" name="Nom"/><br><br>
		Prenom:<input type="text" name="Prenom"/><br><br>
		Email:<input type="email" name="Email"/><br><br>
		Phone:<input type="text" name="Phone"/><br><br>
        Passwords:<input type="password" name="Passwords"/><br><br>
        Adresse:<input type="text" name="Adresse"/><br><br>
        Hote:<input type="radio" name="Hote"/><br><br>
		DateCreation:<input type="date" name="DateCreation"/><br><br>
        DateModification:<input type="date" name="DateModification"/><br><br>
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
			$Nom = $_POST['Nom'];
			$Prenom = $_POST['Prenom'];
			$Email = $_POST['Email'];
			$Phone = $_POST['Phone']; 	
			$Passwords = $_POST['Passwords'];
			$Adresse = $_POST['Adresse'];
			$Hote = 0;
			if (isset($_POST['Hote'])) {
				$Hote = 1;
			}
			$DateCreation = $_POST['DateCreation'];
			$DateModification = $_POST['DateModification'];
			
			$sql=("INSERT INTO `client`(`Id`, `Nom`, `Prenom`, `Email`, `Phone`, `Passwords`, `Adresse`, `Hote`, `DateCreation`, `DateModification`) VALUES ('$Id','$Nom','$Prenom','$Email','$Phone','$Passwords','$Adresse','$Hote','$DateCreation','$DateModification')");
				
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam('Id', $Id);
			$stmt->bindParam('Nom', $Nom);
			$stmt->bindParam('Prenom', $Prenom);
			$stmt->bindParam('Email', $Email);
			$stmt->bindParam('Phone', $Phone);
			$stmt->bindParam('Passwords', $Passwords);
			$stmt->bindParam('Adresse', $Adresse);
			$stmt->bindParam('Hote', $Hote);
			$stmt->bindParam('DateCreation', $DateCreation);
			$stmt->bindParam('DateModification', $DateModification);
				
			
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