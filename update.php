<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="index.php">Liste des données</a>

<?php
try{
$bdd = new PDO('mysql:host=localhost;dbname=reunion_island', 'root', 'root');
}

catch (Exception $e){
    die('Erreur :'.$e->getMessage());
}




$reponse = $bdd->query('SELECT * FROM hiking WHERE id='.$_GET['id']);
while ($donnees = $reponse->fetch()) {
$name=$donnees['name'];
$difficulty = $donnees['difficulty'];
$distance = $donnees['distance'];
$duration = $donnees['duration'];
$height_difference = $donnees['height_difference'];
$id=$_GET['id'];
};

?>

	<h1>Modifier une randonnée</h1>

<?php
echo "<form action='' method='POST'>
		<div>
			<label for='name'>Name</label>
			<input type='text' name='nom' value='$name'>
		</div>

		<div>
			<label for='difficulty'>Difficulté</label>
			<select name='difficulty'>";?>
				<option value='tres facile' <?php if($difficulty=='tres facile'){echo "selected";} ?> >Très facile</option>
				<option value='facile' <?php if($difficulty=='facile'){echo "selected";} ?> >Facile</option>
				<option value='moyen' <?php if($difficulty=='moyen'){echo "selected";} ?> >Moyen</option>
				<option value='difficile' <?php if($difficulty=='difficile'){echo "selected";} ?> >Difficile</option>
				<option value='tres difficile' <?php if($difficulty=='tres difficile'){echo "selected";} ?> >Très difficile</option>
				<?php
				echo "</select>
		</div>
		
		<div>
			<label for='distance'>Distance</label>
			<input type='ext' name='distance' value='$distance'>
		</div>
		<div>
			<label for='duration'>Durée</label>
			<input type='duration' name='duration' value='$duration'>
		</div>
		<div>
			<label for='height_difference'>Dénivelé</label>
			<input type='text' name='height_difference' value='$height_difference'>
		</div>
		<button type='submit' name='button'>Envoyer</button>
	</form>";

if(isset($_POST['button'])){	


$res=$bdd->prepare('UPDATE hiking SET name = :newname, difficulty = :newdifficulty, distance = :newdistance, duration = :newduration, height_difference = :newheight_difference WHERE id=:id;');

$sql= $res->execute(array(
	':newname'=>$_POST['nom'],
	':newdifficulty'=>$_POST['difficulty'],
	':newdistance'=>intval($_POST['distance']),
	':newduration'=>$_POST['duration'],
	':newheight_difference'=>intval($_POST['height_difference']),
	':id'=>$id
));

if ($sql === false){
	echo "erreur";
	echo "\nPDOStatement::errorCode(): ";
	print_r($bdd->errorCode());
}else{
echo "La randonnée a bien été modifiée ! : )";
}
};

echo $_POST['nom'];

?>
	
</body>
</html>