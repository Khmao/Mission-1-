<?php

$serveur = "localhost";
$login   = "root";
$mdp     = "root";
$bd      = "gsb";

$connexion 	= mysqli_connect($serveur, $login, $mdp, $bd); 

if($connexion)

{
	// Si la connexion a réussi, rien ne se passe.
}
else // Mais si elle rate…
{
	echo 'Erreur'; // On affiche un message d'erreur.
}
?>