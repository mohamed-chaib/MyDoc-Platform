<?php
include('Database.php');  // Assurez-vous que Database.php contient la connexion PDO correcte.

class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database('localhost', 'mydoc', 'root', '');  // Connexion à la base de données
    }

    /**
     * Affiche la table pour les demandes en cours (order_state = 'in progress').
     */
    public function displayInProgress($orderBy)
    {
        try {
            $conn = $this->db->connect();
            $stmt = $conn->prepare("SELECT * FROM demand WHERE order_state IN ('in progress') ORDER BY $orderBy");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['etudiant_matricule']) . "</td>";
                echo "<td>" . htmlspecialchars($row['etudiant_first_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['etudiant_last_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['etudiant_year']) . "</td>";
                echo "<td>" . htmlspecialchars($row['type_of_document']) . "</td>";
                ?>
                <td>
                    <form action="admin.php" method="POST" class="d-flex align-items-center">
                        <button type="submit" name="action" value="accept" class="btn btn-success me-2">Accept</button>
                        <button type="submit" name="action" value="reject" class="btn btn-danger">Reject</button>
                        <input type="text" name="comment" placeholder="Add a comment" class="form-control ms-3" required>
                        <input type="hidden" name="matricule" value="<?php echo htmlspecialchars($row['etudiant_matricule']); ?>">
                    </form>
                </td>
                <?php
                echo "</tr>";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    /**
     * Affiche la table pour les demandes prêtes ou demandées (order_state = 'ready for take' or 'requested').
     */
    public function displayReadyOrRequested($orderBy)
    {
        try {
            $conn = $this->db->connect();
            $stmt = $conn->prepare("SELECT * FROM demand WHERE order_state IN ('ready for take', 'rejected') ORDER BY $orderBy");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['etudiant_matricule']) . "</td>";
                echo "<td>" . htmlspecialchars($row['etudiant_first_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['etudiant_last_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['etudiant_year']) . "</td>";
                echo "<td>" . htmlspecialchars($row['type_of_document']) . "</td>";
                echo "<td>" . htmlspecialchars($row['order_state']) . "</td>";
                echo "<td>" . htmlspecialchars($row['admin_comment']) . "</td>";
                ?>
                <td>
                    <form action="admin.php" method="POST" class="d-flex align-items-center">
                        <button type="submit" name="action" value="modify" class="btn btn-primary">Modify</button>
                        <input type="hidden" name="matricule" value="<?php echo htmlspecialchars($row['etudiant_matricule']); ?>">
                    </form>
                </td>
                <?php
                echo "</tr>";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    /**
     * Traite les actions des formulaires (Accept, Reject, Modify).
     */
    public function handleFormSubmission()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
            try {
                $action = $_POST['action'];  // Get the action (accept, reject, modify)
                $matricule = $_POST['matricule'];  // Get the student's matricule
                $comment = $_POST['comment'] ?? '';  // Get the optional comment (if any)
                $status = '';  // Initialize the status variable

                // Connect to the database
                $conn = $this->db->connect();

                // Determine the status based on the action
                if ($action === 'accept') {
                    $status = 'ready for take';  // Set the status for 'accept'
                } elseif ($action === 'reject') {
                    $status = 'rejected';  // Set the status for 'reject'
                } elseif ($action === 'modify') {
                    $status = 'in progress';  // Set the status for 'modify'
                }

                // Update the status and comment in the database
                $stmt = $conn->prepare("UPDATE demand SET order_state = :status, admin_comment = :comment WHERE etudiant_matricule = :matricule");
                $stmt->execute([
                    ':status' => $status,
                    ':comment' => $comment,
                    ':matricule' => $matricule,
                ]);

                // Fetch the email of the student for notification
                $stmt = $conn->prepare("SELECT email FROM users WHERE matricule = :matricule");
                $stmt->execute([':matricule' => $matricule]);
                $student = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($student) {
                    // Send an email to the student if an email is found
                }

                // echo "Action '$action' effectuée avec succès pour l'étudiant $matricule.";
            } catch (PDOException $e) {
                // echo "Erreur lors du traitement : " . $e->getMessage();
            }
        }
    }

    /**
     * Envoie un email à l'étudiant pour notifier du changement d'état.
     */
    
}

// Utilisation de la classe Admin
$admin = new Admin();
$admin->handleFormSubmission();
?>
