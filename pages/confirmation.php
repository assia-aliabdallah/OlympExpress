<?php include '../include/header.php'; ?>
<div class="confirmation-bg">

<main>

<a href="/index.php" class="back">Accueil</a>
<div class="confirmation">

<?php 
$id_Dieu = isset($_POST['id_Dieu']) ? intval($_POST['id_Dieu']) : 0;
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$id_Service = isset($_POST['service']) ? intval($_POST['service']) : 0;
$informations = isset($_POST['informations']) ? $_POST['informations'] : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';

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
    changeTitle("<?php echo htmlspecialchars($nom_dieu); ?> " + "Confirmation — Olympe Express");
});
</script>

<?php

$conn->begin_transaction();

try {

    $sql_check_email = "SELECT id_Client FROM Client WHERE mail = ?";
    $stmt_check_email = $conn->prepare($sql_check_email);

    if ($stmt_check_email) {
        $stmt_check_email->bind_param("s", $mail);
        $stmt_check_email->execute();
        $result_check_email = $stmt_check_email->get_result();

        if ($result_check_email->num_rows > 0) {
            $row = $result_check_email->fetch_assoc();
            $id_Client = $row['id_Client'];
        } else {

            $sql_insert_client = "INSERT INTO Client (mail) VALUES (?)";
            $stmt_insert_client = $conn->prepare($sql_insert_client);

            if ($stmt_insert_client) {
                $stmt_insert_client->bind_param("s", $mail);
                if ($stmt_insert_client->execute()) {
                    $id_Client = $conn->insert_id;
                } else {
                    throw new Exception("Erreur lors de l'insertion du client.");
                }
            } else {
                throw new Exception("Erreur lors de la préparation de la requête pour l'insertion du client.");
            }
        }
    } else {
        throw new Exception("Erreur lors de la préparation de la requête pour la vérification de l'e-mail.");
    }

    $sql_Reservation = "INSERT INTO Reservation (id_Client, id_Service, Date, Informations) VALUES (?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql_Reservation)) {
        $stmt->bind_param("iiss", $id_Client, $id_Service, $date, $informations);
        if ($stmt->execute()) {
            $sql_Disponibilite = "INSERT INTO Disponibilite (id_Service, Date, Statut) VALUES (?, ?, 'Indisponible')";
            if ($stmt = $conn->prepare($sql_Disponibilite)) {
                $stmt->bind_param("is", $id_Service, $date);
                if ($stmt->execute()) {
                    $sql_Update_Dieu = "UPDATE Dieu SET Nombre_Reservations = Nombre_Reservations + 1 WHERE id_Dieu = ?";
                    if ($stmt = $conn->prepare($sql_Update_Dieu)) {
                        $stmt->bind_param("i", $id_Dieu);
                        if ($stmt->execute()) {

                            $to = $mail;
                            $subject = "Confirmation de votre réservation OlympExpress";
                            $message = "
                            <html>
                            <head>
                            <link rel='preconnect' href='https://fonts.googleapis.com'>
                            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                            <link
                            href='https://fonts.googleapis.com/css2?family=Francois+One&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lora:ital,wght@0,400..700;1,400..700&display=swap'
                            rel='stylesheet'>
                            <title>Confirmation de votre réservation OlympExpress</title>
                            <style>
                                h2 {
                                    font-family: 'Lora', serif;
                                    font-weight: lighter;
                                    font-size: 2.25rem;
                                    color: #141414;
                                    margin-top: 0;
                                    margin-bottom: 24px;
                                    text-align: center;
                                }
                                h3 {
                                    font-family: 'Lato', sans-serif;
                                    margin-top: 0;
                                    margin-bottom: 24px;
                                    font-weight: bold;
                                    font-size: 1.125rem;
                                    text-transform: uppercase;
                                    color: #141414;
                                    text-align: center;
                                }

                                .underline {
                                    border-bottom: 8px solid rgba(197, 207, 198, 0.5);
                                    display: inline-block;
                                }
                                p {
                                    margin:0;
                                    color: #5a5a5a;
                                    text-align: center;
                                }
                                .container {
                                    max-width: 600px;
                                    margin: 0 auto;
                                    background-color: #F2F1EF;
                                    padding: 24px;
                                    border: 1px solid #141414;
                                }
                            </style>
                        </head>
                        <body>
                            <div class='container'>
                                <h2>Merci pour ta réservation !</h2>
                                <h3><span class='underline'>Ton appel a atteint les cieux.</span></h3>
                                <p>Ta commande Olympe Express est prête à descendre jusqu'à ta porte. Au plaisir de te revoir parmi nous.<br><br><strong>Hermès.</strong></p>
                            </div>
                            </body>
                            </html>
                            ";
                            $headers = "From: confirmation@resaweb.ali-abdallah.butmmi.o2switch.site\r\n";
                            $headers .= "Reply-To: confirmation@resaweb.ali-abdallah.butmmi.o2switch.site\r\n";
                            $headers .= "MIME-Version: 1.0\r\n";
                            $headers .= "Content-type: text/html; charset=UTF-8\r\n";

                                if (mail($to, $subject, $message, $headers)) {
                                    echo "<h2>Réservation effectuée avec succès</h2>";
                                    echo "<h3><span class='underline'>Sois béni, Athénien.</span></h3>";
                                    echo "<p>Ta gratitude sera récompensée, et tu recevras ta commande en un battement d'ailes. Patience sera de mise, mais en attendant, un présent t'attend déjà dans tes mails à l'adresse <strong>$mail</strong>.<br><br><strong>Hermès.</strong></p>";
                                    echo "<p class='info'>L'offrande doit être apportée le jour de votre rencontre avec $nom_dieu.</p>";
                                    $conn->commit();
                                } else {
                                    throw new Exception("Erreur lors de l'envoi de l'email.");
                                }
                        } else {
                            throw new Exception("Erreur lors de la mise à jour du nombre de réservations.");
                        }
                    } else {
                        throw new Exception("Erreur lors de la préparation de la requête pour la mise à jour du nombre de réservations.");
                    }
                } else {
                    throw new Exception("Erreur lors de l'insertion de la disponibilité.");
                }
            } else {
                throw new Exception("Erreur lors de la préparation de la requête pour l'insertion de la disponibilité.");
            }
        } else {
            throw new Exception("Erreur lors de l'insertion de la réservation.");
        }
    } else {
        throw new Exception("Erreur lors de la préparation de la requête pour l'insertion de la réservation.");
    }    

}

catch (Exception $e) {
    $conn->rollback();
    echo "<h2>Erreur lors de la réservation</h2>";
    echo "<p>Une erreur est survenue lors de la réservation. Veuillez réessayer ultérieurement.</p>";
    echo "<p>Message d'erreur : " . $e->getMessage() . "</p>";
}
?>
</div>
</main>
</div>

<?php include '../include/footer.php'; ?>