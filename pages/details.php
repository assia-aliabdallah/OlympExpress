<?php include '../include/header.php'; ?>

<main class=mainDetail>

<a href="./services.php" class="back">Retour</a>

<?php
$id_Dieu = isset($_GET['id_Dieu']) ? intval($_GET['id_Dieu']) : 0;

$sql = "SELECT Nom, Image, Description FROM Dieu WHERE id_Dieu = $id_Dieu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $dieu = $result->fetch_assoc();
    echo '<div class="details-container">';
    echo '<img src="/' . htmlspecialchars($dieu['Image']) . '" alt="' . htmlspecialchars($dieu['Nom']) . '">';
    echo '<div>';
    echo '<h2><span class="underline">' . htmlspecialchars($dieu['Nom']) . '</span></h2>';
    echo '<div class="line"></div>';
    echo '<h3>Description</h3>';
    echo '<p>' . htmlspecialchars($dieu['Description']) . '</p>';
    
    $sql_services = "SELECT id_Service, Description FROM Service WHERE id_Dieu = $id_Dieu";
    $result_services = $conn->query($sql_services);
    
    if ($result_services->num_rows > 0) {
        echo '<div class="line"></div>';
        echo '<h3>Services</h3>';
        echo '<ul>';
        while ($service = $result_services->fetch_assoc()) {
            echo '<li>' . htmlspecialchars($service['Description']) . '</li>';
        }
        echo '</ul>';
        echo '<a href="./forms.php?id_Dieu=' . htmlspecialchars($id_Dieu) . '" class="button"><span>Acheter un service</span></a>';
    } else {
        echo '<p>Aucun service disponible pour ce dieu.</p>';
    }
    echo '</div>';
    echo '</div>';
} else {
    echo '<p>Aucun dieu trouvé avec cet identifiant.</p>';
}
?>

</main>

<script>
function changeTitle(newTitle) {
    document.title = newTitle;
    document.getElementById("page-title").innerText = newTitle;
}

document.addEventListener("DOMContentLoaded", function() {
    changeTitle("<?php echo htmlspecialchars($dieu['Nom']); ?> " + "Services — Olympe Express");
});
</script>

<?php include '../include/footer.php'; ?>