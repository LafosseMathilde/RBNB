<?php
$host = 'localhost';
  $dbname = 'location1';
  $username = 'root';
  $password = 'root';
  
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM Region";
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }

  if (isset($_POST['Delete'])){
    $sql = "DELETE FROM `region`";
    $stmt = $pdo->prepare($sql);
    $res = $stmt->execute();
  }

?>

<!DOCTYPE html>
<html>
<head>
<link rel=stylesheet href="TRegion.css">
<link rel=stylesheet href="home.html">

</head>
<body>
 <h1>Region:</h1>
 <table>
   <thead>
     <tr>
      <th>Id</th>
      <th>Nom</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
      <tr>
      <td><?php echo htmlspecialchars($row['Id']); ?></td>
      <td><?php echo htmlspecialchars($row['Nom']); ?></td>
      <td><a href="http://localhost/Mlafosse-TpLocation/delete.php?action=delete&Id=<?=$row['Id']?>"><input type="submit" value="delete" name="delete"></a></td>
      <td><a href="http://localhost/Mlafosse-TpLocation/modif.php?Id=<?=$row['Id']?>"><input type="submit" value="Update" name="Update"/></td>
	  </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
</body>
</html>
	