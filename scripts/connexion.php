<?php





// Paramètres de connexion à la base de données
//this works well
$hostname = "localhost";
$username = "admin";
$password = "admin";
$database = "tch056_projet_integrateur";

try {

      echo "test";

    // Établir la connexion avec PDO
<<<<<<< Updated upstream
    $conn = new PDO("mysql:host=$hostname;dbname=$database",
                    $username,
                    $password);
=======
      $conn = new PDO("mysql:host=$hostname;dbname=tch056_projet_integrateur", 'admin', 'admin');
>>>>>>> Stashed changes

    // Activer le mode d'erreur
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Afficher un message si la connexion est réussie
    echo "Connexion réussie avec PDO!";

}   catch(PDOException $e) {// Arrêter le script si la connexion échoue
    die("Connexion échouée: " . $e->getMessage());
}


<<<<<<< Updated upstream


=======
print_r($resultTest);
>>>>>>> Stashed changes

?>

