<?php include '../include/header.php'; ?>

<script>
function changeTitle(newTitle) {
    document.title = newTitle;
    document.getElementById("page-title").innerText = newTitle;
}

document.addEventListener("DOMContentLoaded", function() {
    changeTitle("Services — Olympe Express");
});
</script>

<aside class="service">
    <div>
        <h2>Nos services sont garantis...</h2>
        <div>
            <section>
                <h3><span class="underline">Efficace</span></h3>
                <p>Livraison divine, assurée par Hermès, garantissant des services impeccables et efficaces.</p>
            </section>
            <section>
                <h3><span class="underline">Rapide</span></h3>
                <p>Nos réservations sont instantanées, vous propulsant vers l'aventure avec rapidité et fiabilité.</p>
            </section>
            <section>
                <h3><span class="underline">Sécurisée</span></h3>
                <p>Protégés par la vigilance de l'Olympe, vos transactions sont sécurisées, garantissant votre tranquillité.</p>
            </section>
        </div>
    </div>
</aside>
<main>
<div class="filter-container">
        <div class="search-container">
            <form action="">
                <label for="searchInput"></label>
                <input type="search" id="searchInput" placeholder="Rechercher...">
            </form>
        </div>
        <div class="sort-container">
            <label for="sortSelect">Trié par:</label>
            <select id="sortSelect">
                <option value="all">Tous</option>
                <option value="god">Dieux</option>
                <option value="goddess">Déesses</option>
            </select>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    var searchInput = document.getElementById('searchInput');
    var sortSelect = document.getElementById('sortSelect');
    var gridItems = document.getElementsByClassName('grid-item');

    // Fonction pour mettre à jour l'affichage en fonction des filtres de recherche et de tri
    function updateDisplay() {
        var filter = searchInput.value.trim().toLowerCase(); // Récupère la valeur du champ de recherche et la met en minuscule
        var sortBy = sortSelect.value; // Récupère la valeur du champ de tri

        for (var i = 0; i < gridItems.length; i++) {
            var itemName = gridItems[i].getElementsByTagName('h3')[0].textContent.trim().toLowerCase(); // Récupère le nom du dieu et le met en minuscule
            var itemType = gridItems[i].getElementsByClassName('type')[0].textContent.trim().toLowerCase(); // Récupère le type du dieu et le met en minuscule

            // Vérifie si le type du dieu contient le mot "mariage" (pour exclure Héra de la liste des déesses)
            var Hera = itemType.includes('mariage');

            // Vérifie si le type ou le nom du dieu correspond aux critères de recherche et de tri
            var matchesSearch = itemName.includes(filter) || itemType.includes(filter);
            var matchesSort = (sortBy === 'all') ||
                              (sortBy === 'god' && itemType.includes('dieu') && !Hera) ||
                              (sortBy === 'goddess' && itemType.includes('déesse'));

            // Affiche ou masque le dieu en fonction des résultats de recherche et de tri
            if (matchesSearch && matchesSort) {
                gridItems[i].style.display = '';
            } else {
                gridItems[i].style.display = 'none';
            }
        }
    }

    // Ajoute des écouteurs d'événements pour les champs de recherche et de tri
    searchInput.addEventListener('input', updateDisplay);
    sortSelect.addEventListener('change', updateDisplay);
});
</script>

<?php
$sql = "SELECT id_Dieu, Nom, Image, Type FROM Dieu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="grid-container" id="gridContainer">';

    while($row = $result->fetch_assoc()) {
        echo '<div class="grid-item">';
        echo '<img src="/' . htmlspecialchars($row['Image']) . '" alt="' . htmlspecialchars($row['Nom']) . '">';
        echo '<h3><spans class="underline">' . htmlspecialchars($row['Nom']) . '</spans></h3>';
        echo '<p class="type">' . htmlspecialchars($row['Type']) . '</p>';
        echo '<a href="./details.php?id_Dieu=' . htmlspecialchars($row['id_Dieu']) . '" class="button2">Achetez un service</a>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<p>Aucun dieu trouvé.</p>';
}
?>

</main>
<?php include '../include/footer.php'; ?>