<?php include '../include/header.php'; ?>

<?php
$id_Dieu = isset($_GET['id_Dieu']) ? intval($_GET['id_Dieu']) : 0;

$sql = "SELECT * FROM Service WHERE id_Dieu = $id_Dieu";

$result = $conn->query($sql);

$services = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $services[] = $row;
    }
}
?>

<div class="reservation-bg">
<main>
    <?php
    echo "<a href='./details.php?id_Dieu=" . htmlspecialchars($id_Dieu) . "' class='back'>Retour</a>";
    ?>

    <div class="reservation-box">
        <div class="form-container">
            <h2><span class="underline">Formulaire de réservation</span></h2>
            <form action="confirmation.php" method="post" id="formulaire">
                <input type="hidden" name="id_Dieu" value="<?php echo $id_Dieu; ?>">

                <p class="txt-required">Tous les champs du formulaire sont obligatoires.</p>
                <fieldset>
                    <legend>1. Information sur le client</legend>
                    <div class="input-box">
                    <input type="email" id="mail" name="mail" placeholder="" required>
                    <label for="mail" class="mail-label">Inscrivez votre e-mail</label>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>2. Informations sur la commande</legend>
                    <label for="service">Choisissez un service</label>
                    <select name="service" id="service" class="service-select" required>
                        <option value="default">----Sélectionnez un service----</option>
                        <?php foreach ($services as $service) { ?>
                        <option value="<?php echo $service['id_Service']; ?>"
                            data-restriction="<?php echo $service['Restrictions']; ?>"
                            data-offrande="<?php echo $service['Offrande']; ?>">
                            <?php echo $service['Description']; ?>
                        </option>
                        <?php } ?>
                    </select>

                    <label for="date">Choisissez une date</label>
                    <input type="date" name="date" id="date" required>
                </fieldset>

                <fieldset>
                    <legend>3. Informations complémentaires</legend>
                    <label for="informations">Informations supplémentaires</label>
                    <textarea id="informations" name="informations" rows="5" cols="10" required></textarea>
                </fieldset>
                <div class="button"><input type="submit" value=""><span>Réserver</span></div>
            </form>
        </div>

        <script>
        // Écouteur d'événement pour le formulaire
        document.getElementById('formulaire').addEventListener('change', function(event) {
            var target = event.target;

            // Vérifie si l'élément modifié est l'email, le service, la date ou les informations
            if (target.id === 'mail' || target.id === 'service' || target.id === 'date' || target.id === 'informations') {
            updateRecapitulatif(); // Met à jour le récapitulatif de la commande
            }
        });
        </script>

        <div class="recap-container">
            <h2><span class="underline">Récapitulatif de votre commande</span></h2>
            <h3><span class="underline">Vos informations</span></h3>
            <p id="recapMail"></p>
            <h3><span class="underline">Votre commande divine</span></h3>
            <p id="recapService"></p>
            <p id="recapDate"></p>
            <p id="recapInformations"></p>
            <p id="recapRestriction"></p>
            <div class="total-container">
            <p class="total">Total :</p>
            <p id="recapOffrande"></p>
            </div>
        </div>
    </div>

    <script>
function updateRecapitulatif() {
        // Récupère les valeurs saisies dans le formulaire
        var mail = document.getElementById('mail').value;
        var serviceSelect = document.getElementById('service');
        var selectedService = serviceSelect.options[serviceSelect.selectedIndex];
        var date = document.getElementById('date').value;
        var informations = document.getElementById('informations').value;

        // Récupère les informations du service sélectionné
        var serviceDescription = selectedService.text;
        var serviceRestriction = selectedService.getAttribute('data-restriction');
        var serviceOffrande = selectedService.getAttribute('data-offrande');

        // Met à jour les informations du récapitulatif
        document.getElementById('recapMail').textContent = 'Mail: ' + mail;
        document.getElementById('recapDate').textContent = 'Pour le: ' + date;
        document.getElementById('recapInformations').textContent = 'Informations complémentaires: ' + informations;

        // Vérifie si un service est sélectionné
        if (selectedService.value === "default") {
            // Si aucun service n'est sélectionné, efface les informations du récapitulatif
            document.getElementById('recapService').textContent = '';
            document.getElementById('recapRestriction').textContent = '';
            document.getElementById('recapOffrande').textContent = '';
        } else {
            // Si un service est sélectionné, affiche les informations du service dans le récapitulatif
            document.getElementById('recapService').textContent = 'Service: ' + serviceDescription;
            document.getElementById('recapRestriction').textContent = 'Restriction: ' + serviceRestriction;
            document.getElementById('recapOffrande').textContent = serviceOffrande;
        }
    }
    </script>

<?php
$sql = "SELECT id_Service, Date FROM Disponibilite WHERE Statut = 'Indisponible'";
$result = $conn->query($sql);

$datesIndisponibles = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id_Service = $row['id_Service'];
        $date = $row['Date'];

        if (!isset($datesIndisponibles[$id_Service])) {
            $datesIndisponibles[$id_Service] = [];
        }

        $datesIndisponibles[$id_Service][] = $date;
    }
}

$datesIndisponiblesJSON = json_encode($datesIndisponibles);
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Récupère les dates indisponibles depuis la variable PHP
    var datesIndisponibles = <?php echo $datesIndisponiblesJSON; ?>;
    var serviceSelect = document.getElementById('service');
    var dateInput = document.getElementById('date');
    var today = new Date().toISOString().slice(0, 10);

    // Fonction pour valider la date sélectionnée
    function validateDate(selectedDate, selectedServiceId) {
        // Vérifie si la date sélectionnée est indisponible pour le service sélectionné
        if (datesIndisponibles[selectedServiceId] && datesIndisponibles[selectedServiceId].includes(selectedDate)) {
            alert('Cette date n\'est pas disponible pour ce service. Veuillez en choisir une autre.');
            dateInput.value = '';
        } 
        // Vérifie si la date sélectionnée est antérieure à aujourd'hui
        else if (selectedDate < today) {
            alert('Vous ne pouvez pas sélectionner une date antérieure à aujourd\'hui.');
            dateInput.value = '';
        }
    }

    // Écouteur d'événement pour le changement de service
    serviceSelect.addEventListener('change', function () {
        var selectedServiceId = this.value;
        dateInput.value = '';

        // Vérifie si des dates indisponibles sont associées au service sélectionné
        if (datesIndisponibles[selectedServiceId]) {
            var disabledDates = datesIndisponibles[selectedServiceId];
            dateInput.disabled = false;
            dateInput.setAttribute('min', today);
            dateInput.setAttribute('disabledDates', disabledDates.join(','));
        } else {
            dateInput.disabled = false;
        }
    });

    // Écouteur d'événement pour la saisie de la date
    dateInput.addEventListener('input', function () {
        var selectedDate = this.value;
        var selectedServiceId = serviceSelect.value;
        validateDate(selectedDate, selectedServiceId);
    });
});
</script>

<script>
// Écouteur d'événement pour le chargement du DOM
document.addEventListener('DOMContentLoaded', function () {
    var formulaire = document.getElementById('formulaire');

    // Écouteur d'événement pour la soumission du formulaire
    formulaire.addEventListener('submit', async function (event) {
        event.preventDefault();

        // Récupère la valeur de l'email et supprime les espaces inutiles
        var email = document.getElementById('mail').value.trim();

        try {
            // Effectue une requête pour vérifier si l'email est jetable grâce à l'API debounce.io
            var response = await fetch(`https://disposable.debounce.io/?email=${encodeURIComponent(email)}`);
            var data = await response.json();

            // Condition pour vérifier si l'email est jetable
            if (data.disposable === "true") {
                alert("L'utilisation d'une adresse email temporaire n'est pas autorisée.");
                return;
            }
        } catch (error) {
            console.error('Erreur lors de la vérification de l\'email:', error);
            alert('Erreur lors de la vérification de l\'email. Veuillez réessayer.');
            return;
        }

        // Soumet le formulaire
        this.submit();
    });
});
</script>
</main>
</div>

<?php
$sql_dieux = "SELECT Nom FROM Dieu WHERE id_Dieu = $id_Dieu";
$result_dieux = $conn->query($sql_dieux);

$nom_dieu = "";
if ($result_dieux->num_rows > 0) {
    $row_dieux = $result_dieux->fetch_assoc();
    $nom_dieu = $row_dieux['Nom'];
}
?>

<script>
function changeTitle(newTitle) {
    document.title = newTitle;
    document.getElementById("page-title").innerText = newTitle;
}

document.addEventListener("DOMContentLoaded", function() {
    changeTitle("<?php echo htmlspecialchars($nom_dieu); ?> " + "Réservation — Olympe Express");
});
</script>

<?php include '../include/footer.php'; ?>