<?php
// Définir les paramètres de connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=gokdo_database';
$username = 'gokdo_user';
$password = 'Gokdowpss10';

// Créer une instance PDO pour se connecter à la base de données
$db = new PDO($dsn, $username, $password);

// Préparer la requête de mise à jour
$sql = "UPDATE users SET parties = 10";

// Exécuter la requête avec un identifiant d'utilisateur spécifique
$stmt = $db->prepare($sql);
$stmt->execute();
?>
