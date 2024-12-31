<?php include './include/config.php';?>
<?php
header("Referrer-Policy: no-referrer");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Francois+One&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="./img/favicon/favicon.svg">
    <link rel="icon" type="image/png" href="./img/favicon/favicon.png">
    <link rel="stylesheet" href="style.css">
    <title>Accueil — Olympe Express</title>
    <script src="https://unpkg.com/scrollreveal@4"></script>
    <script>
    window.sr = ScrollReveal({
        distance: '50px',
        duration: 1000,
        easing: 'ease',
        mobile: true,
        reset: true,
        viewFactor: 0.4,
    });
    </script>
</head>

<div class="cursor">

    <div class="cursor__ball cursor__ball--big ">
        <svg height="30" width="30">
            <circle cx="15" cy="15" r="12" stroke-width="0"></circle>
        </svg>
    </div>

    <div class="cursor__ball cursor__ball--small">
        <svg height="10" width="10">
            <circle cx="5" cy="5" r="4" stroke-width="0"></circle>
        </svg>
    </div>
</div>

<body>
    <div class="top">
        <p>Que seriez-vous prêt à perdre pour faire de vos rêves une réalité ?</p>
    </div>

    <!--HEADER-->
    <header>
        <div class="home">
            <h1>
                <span class="sr-only">Olympe Express</span>
                <svg id="Logo" xmlns="http://www.w3.org/2000/svg" xmlns:i="http://ns.adobe.com/AdobeIllustrator/10.0/"
                    version="1.1" viewBox="0 0 500 112.56">
                    <g id="express">
                        <g>
                            <path d="M346.54,94.33h13.12v4.66h-7v2.11h6.33v4.53h-6.33v2.19h7.26v4.74h-13.38v-18.23Z"
                                fill="#000" stroke-width="0" />
                            <path
                                d="M372.27,103.26l-5.39-8.93h6.93l1.25,2.32,1.43,2.53h.08l1.41-2.53,1.28-2.32h6.9l-5.39,8.91,5.76,9.32h-7.24l-1.46-2.63-1.25-2.29h-.08l-2.73,4.92h-7.19l5.7-9.3Z"
                                fill="#000" stroke-width="0" />
                            <path
                                d="M393.47,94.33h8.46c4.77,0,7.79,2.74,7.79,7.03s-3.02,7.01-7.73,7.01h-2.21v4.19h-6.3v-18.23ZM401.1,103.45c1.48,0,2.32-.76,2.32-2.03s-.83-2.03-2.32-2.03h-1.46v4.06h1.46Z"
                                fill="#000" stroke-width="0" />
                            <path
                                d="M416.98,94.33h9.01c4.61,0,7.45,2.55,7.45,6.69,0,2.42-.96,4.3-2.68,5.44l3.04,6.09h-6.93l-2.16-4.84h-1.48v4.84h-6.25v-18.23ZM424.97,103.08c1.38,0,2.16-.7,2.16-1.95s-.78-1.96-2.16-1.96h-1.85v3.91h1.85Z"
                                fill="#000" stroke-width="0" />
                            <path d="M441.42,94.33h13.12v4.66h-7v2.11h6.33v4.53h-6.33v2.19h7.26v4.74h-13.38v-18.23Z"
                                fill="#000" stroke-width="0" />
                            <path
                                d="M461.96,106.57h6.02c0,1.17.65,1.82,1.82,1.82.99,0,1.59-.42,1.59-1.15,0-.89-.91-1.46-2.99-1.8-4.3-.73-6.3-2.58-6.3-5.75,0-3.57,2.79-5.75,7.37-5.75s7.65,2.4,7.73,6.25h-5.88c0-1.15-.63-1.77-1.75-1.77-.96,0-1.56.44-1.56,1.15,0,.83.75,1.3,2.97,1.72,4.56.86,6.56,2.63,6.56,5.75,0,3.73-2.84,5.91-7.71,5.91s-7.86-2.37-7.86-6.38Z"
                                fill="#000" stroke-width="0" />
                            <path
                                d="M484.42,106.57h6.02c0,1.17.65,1.82,1.82,1.82.99,0,1.59-.42,1.59-1.15,0-.89-.91-1.46-2.99-1.8-4.3-.73-6.3-2.58-6.3-5.75,0-3.57,2.79-5.75,7.37-5.75s7.65,2.4,7.73,6.25h-5.88c0-1.15-.63-1.77-1.75-1.77-.96,0-1.56.44-1.56,1.15,0,.83.75,1.3,2.97,1.72,4.56.86,6.56,2.63,6.56,5.75,0,3.73-2.84,5.91-7.71,5.91s-7.86-2.37-7.86-6.38Z"
                                fill="#000" stroke-width="0" />
                        </g>
                    </g>
                    <rect id="Ligne" y="93.93" width="324.83" height="18.63" fill="#000" stroke-width="0" />
                    <g id="Olympe">
                        <g opacity=".93">
                            <path
                                d="M82.86,81.81h-35.44l1.04-17.59c2.69-.7,5.15-2.02,7.36-3.97,2.21-1.96,4.1-4.32,5.67-7.1,1.56-2.78,2.78-5.84,3.65-9.18.87-3.34,1.3-6.71,1.3-10.1,0-3.65-.48-7.19-1.43-10.62-.96-3.43-2.46-6.51-4.5-9.25-2.04-2.74-4.65-4.93-7.82-6.58-3.17-1.65-7.01-2.48-11.53-2.48s-8.27.78-11.53,2.35c-3.26,1.56-5.93,3.67-8.01,6.32-2.08,2.65-3.63,5.71-4.62,9.19-1,3.47-1.5,7.16-1.5,11.07,0,2.87.39,5.88,1.17,9.05.78,3.17,1.93,6.17,3.45,8.99,1.52,2.82,3.41,5.34,5.67,7.56,2.26,2.22,4.82,3.8,7.69,4.76l.91,17.59H0v-18.89h2.87c.52,2.35,1.32,4.54,2.41,6.58,1.08,2.04,2.76,3.06,5.02,3.06h17.46v-4.56c-3.91-.78-7.49-2.28-10.75-4.49-3.26-2.22-6.04-4.89-8.34-8.01-2.3-3.13-4.1-6.56-5.41-10.29-1.3-3.73-1.95-7.51-1.95-11.33,0-4.43.78-8.73,2.35-12.9,1.56-4.17,3.99-7.86,7.3-11.07,3.3-3.21,7.45-5.8,12.44-7.75C28.38.2,34.35-.78,41.3-.78s13.03.98,17.98,2.93c4.95,1.96,8.99,4.56,12.12,7.82s5.41,7.01,6.84,11.27c1.43,4.26,2.15,8.64,2.15,13.16,0,3.65-.54,7.23-1.63,10.75-1.09,3.52-2.74,6.77-4.95,9.77-2.21,3-4.95,5.65-8.21,7.95-3.26,2.3-7.06,4.02-11.4,5.15v4.56h18.11c2.35,0,4.04-1.02,5.08-3.06,1.04-2.04,1.82-4.23,2.35-6.58h3.13v18.89Z"
                                fill="#000" stroke-width="0" />
                            <path
                                d="M159.33,81.81h-66.96v-2.87c3.99-.61,7.08-1.5,9.25-2.67,2.17-1.17,3.26-3.41,3.26-6.71V11.33c0-1.82-.31-3.19-.91-4.1-.61-.91-1.39-1.58-2.35-2.02-.96-.43-2.08-.74-3.39-.91-1.3-.17-2.61-.39-3.91-.65V1.04h34v2.61c-1.22.18-2.45.33-3.71.46-1.26.13-2.39.43-3.39.91-1,.48-1.82,1.2-2.47,2.15-.65.96-.98,2.35-.98,4.17v63.97h19.28c3.39,0,6.27-.13,8.66-.39,2.39-.26,4.41-.87,6.06-1.82,1.65-.96,3-2.39,4.04-4.3,1.04-1.91,1.91-4.51,2.61-7.82h2.87l-1.95,20.84Z"
                                fill="#000" stroke-width="0" />
                            <path
                                d="M243.37,5.34c-.74.78-1.28,1.63-1.63,2.54-.35.91-.57,1.93-.65,3.06-.09,1.13-.13,2.43-.13,3.91v2.21c-.09,5.13-.52,9.45-1.3,12.96-.78,3.52-2.35,6.45-4.69,8.79s-5.75,4.17-10.23,5.47c-4.47,1.3-10.4,2.26-17.78,2.87v23.45c0,3.39.69,5.67,2.08,6.84,1.39,1.17,4.12,1.76,8.21,1.76v2.61h-33.87v-2.61c4.25,0,7.05-.67,8.4-2.02,1.35-1.35,2.02-3.54,2.02-6.58v-23.45c-6.34-.61-11.62-1.41-15.83-2.41-4.21-1-7.6-2.54-10.16-4.62-2.56-2.08-4.36-4.95-5.41-8.6-1.04-3.65-1.56-8.47-1.56-14.46,0-4.17-.44-7.36-1.3-9.58-.87-2.21-2.65-3.76-5.34-4.62V0c13.72,0,20.58,7.08,20.58,21.23,0,3.13.3,5.93.91,8.4.61,2.48,1.65,4.61,3.13,6.38,1.48,1.78,3.43,3.13,5.86,4.04,2.43.91,5.47,1.37,9.12,1.37V12.51c0-1.91-.13-3.43-.39-4.56-.26-1.13-.76-2-1.5-2.61-.74-.61-1.8-1-3.19-1.17-1.39-.17-3.17-.26-5.34-.26V1.04h34.91v2.87c-4.26,0-7.21.61-8.86,1.82-1.65,1.22-2.48,3.48-2.48,6.77v28.92c7.3,0,12.48-1.84,15.57-5.54,3.08-3.69,4.62-8.57,4.62-14.66,0-4.6.59-8.29,1.76-11.07,1.17-2.78,2.69-4.93,4.56-6.45,1.87-1.52,3.93-2.52,6.19-3,2.26-.48,4.51-.72,6.77-.72v2.86c-1.3.87-2.32,1.69-3.06,2.48Z"
                                fill="#000" stroke-width="0" />
                            <path
                                d="M267.3,12.25c0-1.39-.06-2.58-.2-3.58-.13-1-.57-1.82-1.3-2.47-.74-.65-1.82-1.15-3.26-1.5-1.43-.35-3.45-.61-6.06-.78V1.04h23.58l27.36,59.93L334.26,1.04h25.01v2.87c-1.82.17-3.3.35-4.43.52-1.13.17-2.04.39-2.74.65-.7.26-1.22.61-1.56,1.04-.35.44-.7,1.04-1.04,1.83-.7,2.95-1.04,5.34-1.04,7.16v56.41c0,1.65.24,2.95.72,3.91.48.96,1.15,1.69,2.02,2.22.87.52,1.84.87,2.93,1.04,1.08.18,2.28.31,3.58.39l1.56.13v2.61h-34v-2.61c3.73-.43,6.25-1.02,7.56-1.76s2.21-2.06,2.74-3.97V16.15l-30.09,65.66h-1.95l-29.18-62.79v51.59c0,2.43.46,4.21,1.37,5.34.91,1.13,1.89,1.82,2.93,2.08,1.13.26,3.47.65,7.04,1.17v2.61h-30.23v-2.61c2.52-.26,4.47-.54,5.86-.85,1.39-.3,2.52-.67,3.39-1.11,1.74-.78,2.6-2.69,2.6-5.73V12.25Z"
                                fill="#000" stroke-width="0" />
                            <path
                                d="M430.54,32.83c-1.04,2.6-2.5,4.84-4.36,6.71-1.87,1.87-4.06,3.39-6.58,4.56s-5.26,2.02-8.21,2.54c-2.86.44-6.08.78-9.64,1.04-3.56.26-7.3.39-11.2.39v21.63c0,2.35.3,4.13.91,5.34.61,1.22,1.39,2.08,2.35,2.61.26.17.78.37,1.56.59.78.22,1.58.39,2.41.52.82.13,1.63.24,2.41.33.78.09,1.3.13,1.56.13v2.61h-32.96v-2.61l7.56-1.56c.95-.43,1.69-1.26,2.21-2.47.52-1.22.78-3.04.78-5.47V14.2c0-3.13-.7-5.62-2.08-7.49-1.39-1.87-4.21-2.8-8.47-2.8V1.04h30.09c6.51,0,11.9.72,16.16,2.15,4.25,1.43,7.66,3.28,10.23,5.54,2.56,2.26,4.34,4.73,5.34,7.43,1,2.69,1.5,5.3,1.5,7.82,0,3.3-.52,6.25-1.56,8.86ZM420.25,23.19c0-2.95-.83-5.49-2.47-7.62-1.65-2.13-3.67-3.89-6.06-5.28-2.39-1.39-4.93-2.41-7.62-3.06-2.69-.65-5.13-.98-7.3-.98-1.74,0-3.21.13-4.43.39-1.22.26-1.82.74-1.82,1.43v34.26c4.78,0,8.99-.22,12.64-.65,3.65-.43,6.71-1.3,9.18-2.6,2.47-1.3,4.36-3.17,5.67-5.6,1.3-2.43,2.04-5.69,2.21-9.77v-.52Z"
                                fill="#000" stroke-width="0" />
                            <path
                                d="M500,57.71l-1.69,24.1h-62.4l30.49-44.16L435.9,1.04h62.79l1.3,18.89h-2.86c-.52-2.26-1.2-4.08-2.02-5.47s-1.93-2.48-3.32-3.26c-1.39-.78-3.06-1.3-5.02-1.56-1.95-.26-4.32-.39-7.1-.39h-22.93l24.36,28.4-25.14,35.44h26.84c2.43,0,4.47-.39,6.12-1.17,1.65-.78,3.02-1.87,4.1-3.26s1.93-3.02,2.54-4.89,1.13-3.89,1.56-6.06h2.86Z"
                                fill="#000" stroke-width="0" />
                        </g>
                    </g>
                </svg>
            </h1>
            <nav>
                <a href="index.php" data-text="Accueil"><span>Accueil</span></a>
                <a href="pages/services.php" data-text="Services"><span>Services</span></a>
                <a href="pages/about.php" data-text="À propos"><span>À propos</span></a>
            </nav>
            <a class="concept" href="pages/about.php#concept">
                Le Concept
                <div class="button__horizontal"></div>
                <div class="button__vertical"></div>
            </a>
        </div>
        <div class="container">
            <img class="header" src="./img/Bayeu_y_Subias,_Francisco_-_Olympus,_The_Fall_of_the_Giants_-_1764.jpg"
                alt="">
            <div id="annonce">
                <h2>Bienvenue au <br> mont <span class="underline">Olympe</span></h2>
                <p>Raprochez vous des dieux et obtenez des privilèges qu'aucun autres athéniens n'a pu obtenir pour peut
                    être
                    devenir le héro d'une futur légende !</p>
                <a class="button" href="#target"><span>Découvrir</span></a>
            </div>
        </div>
    </header>

    <main>
        <div class="box" id="target">
            <img src="./img/D._Creti_Mercurio_e_Paride.jpg" alt="">
            <div>

                <h2>Qui sommes-nous ?</h2>
                <p><strong>"Raprochez vous des dieux et obtenez des privilèges qu'aucun autres athéniens n'a pu obtenir pour peut être devenir le héro d'une futur légende !"</strong><br><br>Olympe Express est un site de réservation façonné par les dieux de l'Olympe pour vous permettre, chers Athéniens, d'atteindre vos rêves les plus inaccessibles. Parcourez nos pages et découvrez les services qui changeront le cours de votre vie.<br><br>
                    <strong>Hermès</strong>
                </p>
                <a class="button" href="pages/about.php#concept"><span>Le Concept</span></a>
            </div>

        </div>
    </main>
    <div class="scrolling_text">
        <div class="text">
            <span>Best-Sellers</span>
            <span>Best-Sellers</span>
            <span>Best-Sellers</span>
            <span>Best-Sellers</span>
            <span>Best-Sellers</span>
        </div>
        <div class="text">
            <span>Best-Sellers</span>
            <span>Best-Sellers</span>
            <span>Best-Sellers</span>
            <span>Best-Sellers</span>
            <span>Best-Sellers</span>
        </div>
        <div class="text">
            <span>Best-Sellers</span>
            <span>Best-Sellers</span>
            <span>Best-Sellers</span>
            <span>Best-Sellers</span>
            <span>Best-Sellers</span>
        </div>
    </div>
    <aside>
        <div>
            <h2>Nos meilleurs ventes</h2>
            <div>
                <?php
                    $query = "SELECT `id_Dieu`, `Nom`, `Image`, `Type`, `Nombre_Reservations`
                    FROM `Dieu`
                    ORDER BY `Nombre_Reservations` DESC
                    LIMIT 3";
                    $result = $conn->query($query);

                    if ($result) {
 
                    while ($row = $result->fetch_assoc()) {
                    echo "<section>";
                    echo "<h3><span class=\"underline\">" . $row['Nom'] . "</span></h3>";
                    echo '<img src="./' . htmlspecialchars($row['Image']) . '" alt="' . htmlspecialchars($row['Nom']) . '">';
                    echo "<p>" . $row['Type'] . "</p>";
                    echo '<a href="pages/details.php?id_Dieu=' . htmlspecialchars($row['id_Dieu']) . '" class="button2">Achetez un service</a>';
                    echo "</section>";
                    }
                    } else {

                    echo '<p>Aucun dieu trouvé.</p>';
                    }
                ?>
            </div>
        </div>
    </aside>

    <?php include './include/footer.php'; ?>