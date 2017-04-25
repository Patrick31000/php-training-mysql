<?php
/**** Supprimer une randonnée ****/

try{
$bdd = new PDO('mysql:host=localhost;dbname=reunion_island', 'root', 'root');
}
catch (Exception $e){
    die('Erreur :'.$e->getMessage());
}




$id=$_GET['id'];


if(isset ($id)){
$sql = "DELETE FROM hiking WHERE id=$id";

if ($bdd->query($sql) === FALSE) {
    echo "Error deleting record: ";
} else {
    echo "La randonnée.' $id '.a bien été supprimée";
}

};
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php';
header("Location: http://$host$uri/$extra");
exit;
?>