<?php
session_start();
$title = 'PHP2';
global $conn;
include 'header.php';
include_once 'PDO_Connection.php';

if (isSet($_SESSION['username'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_company'])) {
        $companyName = htmlspecialchars($_POST['company_name']);
        $contactPerson = htmlspecialchars($_POST['contact_person']);
        $phone = htmlspecialchars($_POST['phone']);
        $address = htmlspecialchars($_POST['address']);
        $createdBy = $_SESSION['user_ID'];
        $createdAt = date('Y-m-d H:i:s');

        $stmt = $conn->prepare("INSERT INTO `clients` (`company_name`, `contact_person`, `phone`, `address`, `created_by`, `created_at`) VALUES (?, ?, ?, ?, ?, ?)");

        $stmt->execute([$companyName, $contactPerson, $phone, $address, $createdBy, $createdAt]);
        $_SESSION['message'] = 'Company added';
        header('Location: home.php');
        exit();

    }

    // Firma bearbeiten
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_company'])) {
        $companyID = htmlspecialchars($_POST['company_ID']);
        $companyName = htmlspecialchars($_POST['company_name']);
        $contactPerson = htmlspecialchars($_POST['contact_person']);
        $phone = htmlspecialchars($_POST['phone']);
        $address = htmlspecialchars($_POST['address']);
        $editedAt = date('Y-m-d H:i:s');

        // Überprüfen, ob der aktuelle Benutzer der Ersteller ist
        $stmt = $conn->prepare("UPDATE `clients` SET `company_name` = ?, `contact_person` = ?, `phone` = ?, `address` = ?, `edited_at` = ? WHERE `company_ID` = ? AND `created_by` = ?");
        $stmt->execute([$companyName, $contactPerson, $phone, $address, $editedAt, $companyID, $_SESSION['user_ID']]);
        $_SESSION['message'] = "Firma erfolgreich bearbeitet!";
        header('Location: home.php');
        exit();

    }

    // Firma löschen
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_company'])) {
        $companyID = htmlspecialchars($_POST['company_ID']);

        // Überprüfen, ob der aktuelle Benutzer der Ersteller ist
        $stmt = $conn->prepare("DELETE FROM `clients` WHERE `company_ID` = ? AND `created_by` = ?");
        $stmt->execute([$companyID, $_SESSION['user_ID']]);
        $_SESSION['message'] = "Firma erfolgreich gelöscht!";
        header('Location: home.php');
        exit();

    }
    // Firmenliste abrufen
        $stmt = $conn->prepare("SELECT * FROM `clients` ORDER BY `created_at` DESC");
        $stmt->execute();
        $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

    <div class="container mt-5">
        <h2 class="mb-4">Guten Tag <?php echo $_SESSION['username']; ?> 🤓</h2>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="alert alert-warning mt-3">'.htmlspecialchars($_SESSION['message']).'</div>';
            unset($_SESSION['message']);
        }
        ?>
        <section class="mb-4">
            <h3>Firma hinzufügen</h3>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="company_name">Firmenname:</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" required>
                </div>
                <div class="form-group">
                    <label for="contact_person">Kontaktperson:</label>
                    <input type="text" class="form-control" id="contact_person" name="contact_person" required>
                </div>
                <div class="form-group">
                    <label for="phone">Telefonnummer:</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="address">Adresse:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <button type="submit" class="btn btn-primary" name="add_company">Firma hinzufügen</button>
            </form>
        </section>

        <!-- Liste der Firmen -->
        <section class="mb-4">
            <h3>Liste der Firmen</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Firmenname</th>
                    <th>Kontaktperson</th>
                    <th>Telefonnummer</th>
                    <th>Adresse</th>
                    <th>Erstellt von</th>
                    <th>Erstellt am</th>
                    <th>Aktionen</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($client['company_ID']); ?></td>
                        <td><?php echo htmlspecialchars($client['company_name']); ?></td>
                        <td><?php echo htmlspecialchars($client['contact_person']); ?></td>
                        <td><?php echo htmlspecialchars($client['phone']); ?></td>
                        <td><?php echo htmlspecialchars($client['address']); ?></td>
                        <td><?php echo htmlspecialchars($client['created_by']); ?></td>
                        <td><?php echo htmlspecialchars($client['created_at']); ?></td>
                        <td>
                            <?php if ($client['created_by'] == $_SESSION['user_ID']): ?>
                                <!-- Bearbeiten -->
                                <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $client['company_ID']; ?>">Bearbeiten</button>

                                <!-- Löschen -->
                                <form method="POST" action="" style="display:inline;">
                                    <input type="hidden" name="company_ID" value="<?php echo $client['company_ID']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" name="delete_company" onclick="return confirm('Möchten Sie diese Firma wirklich löschen?');">Löschen</button>
                                </form>

                                <!-- Bearbeiten Modal -->
                                <div class="modal fade" id="editModal<?php echo $client['company_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $client['company_ID']; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel<?php echo $client['company_ID']; ?>">Firma bearbeiten</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Schließen">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="company_name">Firmenname:</label>
                                                        <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo htmlspecialchars($client['company_name']); ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="contact_person">Kontaktperson:</label>
                                                        <input type="text" class="form-control" id="contact_person" name="contact_person" value="<?php echo htmlspecialchars($client['contact_person']); ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Telefonnummer:</label>
                                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($client['phone']); ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Adresse:</label>
                                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($client['address']); ?>" required>
                                                    </div>
                                                    <input type="hidden" name="company_ID" value="<?php echo $client['company_ID']; ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                                                    <button type="submit" class="btn btn-primary" name="edit_company">Speichern</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <form action="logout.php" method="post">
            <button type="submit" class="btn btn-danger">LOGOUT</button>
        </form>
    </div>
    </div>


<?php
include 'footer.php';
}else {
    header('Location: login.php');
}
?>



