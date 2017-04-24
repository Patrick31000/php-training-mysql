<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
  <a href="create.php">Créer une randonnée</a>
     <?php
try{
$bdd = new PDO('mysql:host=localhost;dbname=reunion_island', 'root', 'root');
}

catch (Exception $e){
    die('Erreur :'.$e->getMessage());
}


?>
<table border=1px>
<tr>
<th>Id</th>
<th>Name</th>
<th>Difficulty</th>
<th>Distance</th>
<th>Duration</th>
<th>Height Difference</th>
</tr>
 



<?php $reponse = $bdd->query('SELECT * FROM hiking');
while ($donnees = $reponse->fetch()) {
       
        echo "<tr>";
        echo utf8_encode('<td>'.$donnees['id'].'</td>');
        echo utf8_encode('<td><a href=update.php?id='.$donnees['id'].'>'.$donnees['name'].'</a></td>');
        echo utf8_encode('<td>'.$donnees['difficulty'].'</td>');
        echo utf8_encode('<td>'.$donnees['distance'].'</td>');
        echo utf8_encode('<td>'.$donnees['duration'].'</td>');
        echo utf8_encode('<td>'.$donnees['height_difference'].'</td>');
        echo '</tr>';
}
    


$reponse->closeCursor();   
?>
</table>

  </body>
</html>
