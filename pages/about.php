<?php include '../include/header.php'; ?>
<script>
function changeTitle(newTitle) {
    document.title = newTitle;
    document.getElementById("page-title").innerText = newTitle;
}

document.addEventListener("DOMContentLoaded", function() {
    changeTitle("À propos — Olympe Express");
});
</script>
<main>
    <div class="me-container">

            <img src="/img/Moi.jpg" alt="">

        <div>
            <h2><span class="underline">Qui suis-je ?<span></h2>
            <p>Étudiante en première année de BUT MMI et grande rêveuse, j'ai pour objectif d'améliorer mon inspiration artistique à travers les défis que me lancent ma formation pour façonner mes rêves à ma guise. Douée dans divers arts, je reste néanmoins une férue du monde de l'informatique. En espérant que ce projet vous plaira autant qu'il m'a enthousiasmée pendant sa conception, je vous invite à découvrir mon précédent projet réalisé durant ma formation: <a href="https://perso-etudiant.u-pem.fr/~assia.ali-abdallah/portrait-chinois/" title="Nouvelle fenêtre" target="_blank" rel="noreferrer noopener">Portrait Chinois - Si j'étais</a>.<br><br>
                <strong>Assia</strong>
            </p>
        </div>
    </div>
    <div class="concept-container">
        <h2 id="concept"><span class="underline">Le concept</span></h2>
        <p>Le deuxième semestre avait pour but de nous familiariser au langage PHP/MySQL et à la gestion de base de données à travers la création d'un site de réservation dont le thème était libre de choix. Adepte de littérature et passionné de mythologie grecque, il ne m'a pas fallu longtemps pour porter mon choix sur la période de la Grèce antique où dieux et héros légendaires étaient de mise. J'ai donc eu l'idée de créer un site de réservation qui permettrait aux passionnés comme moi d'entrer en contact avec les célèbres dieux de l'Olympe. L'enjeu résidait dans la création d'une identité distinctive pour chaque dieu, en respectant fidèlement les récits qui les décrivent. J'ai donc conçu l'entièreté du site Olympe Express en passant par son design, son développement front-end et back-end, et la création de sa base de données.</p>
    </div>
</main>

<?php include '../include/footer.php'; ?>