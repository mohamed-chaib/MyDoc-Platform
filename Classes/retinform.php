<?php
include('Database.php');  // Assurez-vous que Database.php contient la connexion PDO correcte.

class Admin
{
    function setAddtableProgress($orderBy)
    {
        try {
            // Connexion à la base de données
            $db = new Database('localhost', 'mydoc', 'root', '');
            $conn = $db->connect(); 
 
            // Préparer et exécuter la requête SQL
            $stmt = $conn->prepare("SELECT * FROM demand WHERE order_state = 'in progress' ORDER BY $orderBy");
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
             ?>
<td>
    <div class="d-flex align-items-center">
        <form action="admin.php" methode="POST" class="d-flex align-items-center">
            <button onclick="recupETMOdiState()" type="submit" name="action" value="accept" class="btn btn-success me-2"
                style="font-size: 1.25rem; padding: 10px 20px;">
            </button>
            <button onclick="recupETMOdiState()" type="submit" name="action" value="reject" class="btn btn-danger"
                style="font-size: 1.25rem; padding: 10px 20px;">
            </button>
            <input type="text" name="comment" required value="" class="form-control ms-3" style="max-width: 200px;">
            <input type="hidden" name="matricule" value="<?php echo htmlspecialchars($row['etudiant_matricule'])?>">
        </form>
    </div>
    <script>
        function recupETMOdiState() {
            <? php $admin -> recupETMOdiState();?>
        }
    </script>


</td>

<?php
          
          }

            echo "</tbody>";
            echo "</table>";
            
        } catch (PDOException $e) {
            // Afficher l'erreur en cas de problème avec la base de données
            echo "Erreur : " . $e->getMessage();
        }
    }



    function setAddtable($orderBy)
    {
        try {
            // Connexion à la base de données
            $db = new Database('localhost', 'mydoc', 'root', '');
            $conn = $db->connect(); 
            // Préparer et exécuter la requête SQL
            $stmt = $conn->prepare("SELECT * FROM demand WHERE order_state IN ('ready for take', 'requested') ORDER BY $orderBy");
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
              echo "<td>" . htmlspecialchars($row['order_state']) . "</td>";
              echo "</tr>";
          }

            echo "</tbody>";
            echo "</table>";

        } catch (PDOException $e) {
            // Afficher l'erreur en cas de problème avec la base de données
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function recupETMOdiState () {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifier quel bouton a été cliqué
            if (isset($_POST['action'])) {
                // Récupérer la valeur du bouton cliqué
                $action = $_POST['action'];  // 'accept' ou 'reject'
                $comment = $_POST['comment']; // Récupérer le commentaire
                $matricule= $_POST['matricule'];
                // Effectuer une action basée sur le bouton cliqué
                if ($action === 'accept') {
                    // Si le bouton "accept" a été cliqué
                    $status ='ready to take';
                } elseif ($action === 'reject') {
                    $status='requesed';
        
                    // Insérer ou mettre à jour dans la base de données, selon votre logique
        
                    $stmt = $pdo->prepare("UPDATE demand SET etudiant_statue = :statue, admin_comment = :comment WHERE etudiant_matricule = :matricule");
                    $stmt->execute([':statue' => $status , ':comment' => $comment, ':matricule' => $matricule]);
        
        }
        
                  
        }
}
    }}

?>