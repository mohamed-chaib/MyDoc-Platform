<?php
include('Database.php');  // Assurez-vous que Database.php contient la connexion PDO correcte.

class Admin
{
    function setAddtablePret()
    {
        try {
            // Connexion à la base de données
            $db = new Database('localhost', 'mydoc', 'root', '');
            $conn = $db->connect(); 

            // Définir le critère de tri (sort_by) basé sur l'URL
            $orderBy = isset($_GET['sort_by']) && in_array($_GET['sort_by'], ['etudiant_year', 'etudiant_matricule']) ? $_GET['sort_by'] : 'etudiant_matricule'; 
            
            // Préparer et exécuter la requête SQL
            $stmt = $conn->prepare("SELECT * FROM demand WHERE order_state = 'ready for take' ORDER BY $orderBy");
            $stmt->execute();

            // Récupérer tous les résultats sous forme de tableau associatif
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Afficher les données récupérée

            foreach ($results as $row) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($row['etudiant_matricule']) . "</td>";
              echo "<td>" . htmlspecialchars($row['etudiant_first_name']) . "</td>";
              echo "<td>" . htmlspecialchars($row['etudiant_last_name']) . "</td>";
              echo "<td>" . htmlspecialchars($row['etudiant_place_of_birth']) . "</td>";
              echo "<td>" . htmlspecialchars($row['etudiant_date_of_birth']) . "</td>";
              echo "<td>" . htmlspecialchars($row['etudiant_year']) . "</td>";
              echo "<td>" . htmlspecialchars($row['type_of_document']) . "</td>";
              echo "<td>" . htmlspecialchars($row['comment']) . "</td>";
              echo "</tr>";
          }

            echo "</tbody>";
            echo "</table>";

        } catch (PDOException $e) {
            // Afficher l'erreur en cas de problème avec la base de données
            echo "Erreur : " . $e->getMessage();
        }
    }



    function setAddtablePret()
    {
        try {
            // Connexion à la base de données
            $db = new Database('localhost', 'mydoc', 'root', '');
            $conn = $db->connect(); 

            // Définir le critère de tri (sort_by) basé sur l'URL
            $orderBy = isset($_GET['sort_by']) && in_array($_GET['sort_by'], ['etudiant_year', 'etudiant_matricule']) ? $_GET['sort_by'] : 'etudiant_matricule'; 
            
            // Préparer et exécuter la requête SQL
            $stmt = $conn->prepare("SELECT * FROM demand WHERE order_state = 'ready for take' ORDER BY $orderBy");
            $stmt->execute();

            // Récupérer tous les résultats sous forme de tableau associatif
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Afficher les données récupérée

            foreach ($results as $row) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($row['etudiant_matricule']) . "</td>";
              echo "<td>" . htmlspecialchars($row['etudiant_first_name']) . "</td>";
              echo "<td>" . htmlspecialchars($row['etudiant_last_name']) . "</td>";
              echo "<td>" . htmlspecialchars($row['state']) . "</td>";
              echo "<td>" . htmlspecialchars($row['etudiant_year']) . "</td>";
              echo "<td>" . htmlspecialchars($row['type_of_document']) . "</td>";
              echo "</tr>";
          }

            echo "</tbody>";
            echo "</table>";

        } catch (PDOException $e) {
            // Afficher l'erreur en cas de problème avec la base de données
            echo "Erreur : " . $e->getMessage();
        }
    }
}
?>
