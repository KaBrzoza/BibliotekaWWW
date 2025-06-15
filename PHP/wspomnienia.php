<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wspomnienia</title>
    <link rel="Stylesheet" href="../css/PHPstyle.css">
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
                    <section>
                        <img src="../img/wspomnienia.jpg" alt="Wspomnienia gracza giełdowego">
                    </section>
                </div>
            </section>
            <section>
               <div class="desc">
                <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'forumksiazki');

                    $kw1 = "SELECT opis FROM ksiazka WHERE id = 2";

                    $wyn = mysqli_query($conn, $kw1);
                    while($rek = mysqli_fetch_row($wyn))
                    echo "<p>".$rek[0]."</p>";
                ?>
               </div>
               <div style="clear: both;"></div>
            </section>
        </article>
    <hr>
    <section>
        <div id="kom">
            <form method="POST">
                <textarea name="komentarz" cols="40" rows="4" placeholder="wpisz swój komentarz"></textarea>
                <br>
                <input type="submit" value="Dodaj komentarz">
            </form>
        </div>
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'forumksiazki') or die("Błąd połączenia z bazą: " . mysqli_connect_error());
                
                if(isset($_POST['komentarz'])){
                    $komentarz = $_POST['komentarz'];
                    $kw = "INSERT INTO komentarze (id, konta_id, ksiazka_id, odpowiedz) VALUES (NULL, '2', '1','".$komentarz."')";
                
                    mysqli_query($conn, $kw);
                    $kw = "select * from komentarze";
                    $db = mysqli_query($conn, $kw);
                }
            ?>
            <h2>Komentarze użytkowników:</h2>
            <?php
                $kw2 = "SELECT komentarze.id, odpowiedz, nick FROM konta INNER join komentarze on konta_id = konta.id where ksiazka_id = 2";

                $wyn = mysqli_query($conn, $kw2);
                    
                echo "<ol>";
                while($zap = mysqli_fetch_row($wyn))
                echo "<li>".$zap[1]." <i>".$zap[2]."</i></li><hr>";
                echo "</ol> ";
                mysqli_close($conn);
                ?>
    </section>
    </main>
    <footer>
        <div id="info" href="#">
            tel: 123 123 123<br><br>
            Kacper Brzoznowski &copy; 2025
        </div>     
    </footer>
</body>
</html>