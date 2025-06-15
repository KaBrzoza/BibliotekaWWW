<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>48 praw władzy</title>
    <link rel="stylesheet" href="../css/PHPstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="../css/fontello.css">
</head>
<body>
    <script src="../jquery-3.6.1.min.js"></script>
    <script src="../javascript.js"></script>
    <header>
        <div>
            <h1 class="logo">Moja Własna Biblioteka<i class="icon-book-open"></i></h1>
        </div>
        <nav id="topnav">
            <ul class="menu">
                <li><a href="../index.html">Powrót na stronę główną</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <article>
            <section>
                <div class="scalebook">
                    <img src="../img/48-praw.jpg" alt="48 praw władzy.">
                </div>
            </section>
            <section>
                <div class="desc">
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'forumksiazki');
                        $kw1 = "SELECT opis FROM ksiazka WHERE id = 4";
                        $wyn = mysqli_query($conn, $kw1);
                        while($rek = mysqli_fetch_row($wyn)) {
                            echo "<p>".$rek[0]."</p>";
                        }
                    ?>
                </div>
                <div style="clear: both;"></div>
            </section>
        </article>

        <hr>

        <section id="komentarze">
            <h2>Komentarze użytkowników:</h2>
            <ol id="comments-list">
                <?php
                    $kw2 = "SELECT komentarze.id, odpowiedz, nick FROM konta INNER JOIN komentarze ON konta_id = konta.id WHERE ksiazka_id = 4";
                    $wyn = mysqli_query($conn, $kw2);
                    while($zap = mysqli_fetch_row($wyn)) {
                        echo "<li>" . htmlspecialchars($zap[1]) . " <i>" . htmlspecialchars($zap[2]) . "</i></li><hr>";
                    }
                    mysqli_close($conn);
                ?>
            </ol>

            <!-- Formularz komentarza -->
            <form id="comment-form">
                <textarea id="comment-input" rows="4" placeholder="Wpisz swój komentarz..." required></textarea>
                <br>
                <button type="submit">Dodaj komentarz</button>
            </form>

            <!-- Ukryty formularz PHP (na przyszłość, jeśli chcesz zapisywać do bazy) -->
            <form method="POST" id="php-form" style="display:none;">
                <input type="hidden" name="komentarz" id="php-komentarz">
            </form>
        </section>
    </main>

    <footer>
        <div id="info">
            tel: 123 123 123<br><br>
            Kacper Brzoznowski &copy; 2025
        </div>
    </footer>
</body>
</html>
