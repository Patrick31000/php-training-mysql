<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
	
</head>
<body>
	<a href="index.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="POST">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="tres facile">Tres facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="tres difficile">Tres difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
<?php

try{
$bdd = new PDO('mysql:host=localhost;dbname=reunion_island', 'root', 'root');
}

catch (Exception $e){
    die('Erreur :'.$e->getMessage());
}

//Recupération des données du formulaire

$nom=$_POST['name'];
$difficulty=$_POST['difficulty'];
$distance=$_POST['distance'];
$duration=$_POST['duration'];
$height_difference=$_POST['height_difference'];



//Insertion des données du formulaire dans la table Hiking

if(isset($_POST['button'])){
	
$req=$bdd->prepare('INSERT INTO hiking (name, difficulty, distance, duration, height_difference) VALUES (:nom, :difficulty, :distance, :duration, :height_difference);');

$res = $req->execute(array(
	':nom'=>$nom,
	':difficulty'=>$difficulty,
	':distance'=>intval($distance),
	':duration'=>intval($duration),
	':height_difference'=>intval($height_difference)
));
if ($res === false){
	echo "erreur";
	echo "\nPDOStatement::errorCode(): ";
	print_r($bdd->errorCode());
}else{
echo "La randonnée a bien été ajoutée ! : )";
}
};


?>
</html>