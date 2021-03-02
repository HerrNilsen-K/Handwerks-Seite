<!DOCTYPE html>

<html lang="De-de">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Nils Salger">
    <meta name="keywords" content="Schornsteinfeger, Handwerker, Allround, Hilden">

    <title>Beschwerden</title>

    <link rel="stylesheet" href="../CSS/styling.css" type="text/css"/>
</head>

<body>
<nav class="Inhalt">
    <h1>Schornsteinfeger Hilden</h1>
    <hr/>
    <a href="../index.php" style="margin-left: -2.5%;">Home</a>
    <a href="Faehigkeiten.php">Fähigkeiten</a>
    <a href="Preise.php">Preise</a>
    <a href="Beispiele_unserer_Arbeit.php">Beispiele unserer Arbeit</a>
    <a href="Kontakt.php">Kontakt</a>
    <a href="Anfahrt.php">Anfahrt</a>
    <a href="Beschwerden.php">Anfahrt</a>
    <hr/>
</nav>

<h2>SIe haben mängel an ihrem Bauaufrag entdeckt?</h2>
<span>Jetzt ein Ticket ziehen, damit ein Mitarbeiter sich um ihr Anliegen kümmern</span>

<form method="post">
    <label>Ihre E-Mail:</label>
    <input type="email" name="email" required>
    <br>
    <label>Ihre Auftrags-ID</label>
    <input type="text" name="ticket" required>
    <br>
    <label for="problem">Bitt beschreiben Sie kurz das Problem</label>
    <br>
    <textarea name="problem" cols="30" rows="10" required></textarea>
    <br>
    <input type="submit" name="send" value="Senden">
    <br>
</form>

    <?php
    if (isset($_POST['send'])) {
        $databaseFilePointer = fopen("../datenbanken/database.txt", "r");
        $notError = false;
        while (($dataString = fgets($databaseFilePointer)) !== false) {
            $seperateEmail = strtok($dataString, " ");
            $seperateTicket = substr($dataString, strrpos($dataString, " ") + 1);

            if($_POST['email'] == $seperateEmail && trim($_POST['ticket']) == trim($seperateTicket)){
                $notError = true;
                break;
            }
        }

        if($notError){
            echo "<span>Vielen dank das sie auf unseren Kundenservice zugreiffen. Wir werden ihnen schnellst möglich eine E-Mail senden zur bestätigung des termins senden.</span>";
        } else {
            //Es wird nicht angegeben ob email oder ticket falsch ist, um die privatsphäre der Kunden zu schützen (Email könnte herausgefunden werden)
            echo "<span>Die angegebene E-Mail oder das Ticket ist falsch </span>";

            //Problem beschreibung wird als in irgendeiner Form an denn verantwortlichen der Firma gesendet
        }
        fclose($databaseFilePointer);
    }
    ?>

<footer>
    <hr/>
    <div class="Inhalt">
        <a href="Impressum.php" style="margin-left: -2.5%;">Impressum</a>
        <a href="Datenschutz.php">Datenschutz</a>
    </div>
    <hr/>
</footer>

</body>

</html>