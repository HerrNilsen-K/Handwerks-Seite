<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../CSS/styling.css">
    <title>Kontakt aufnahme</title>
</head>

<body>
<header>
    <h1>Kontakt</h1>
</header>

<nav class="Inhalt">
    <hr/>
    <a href="../index.php" style="margin-left: -2.5%;">Home</a>
    <a href="Faehigkeiten.php">Fähigkeiten</a>
    <a href="Preise.php">Preise</a>
    <a href="Beispiele_unserer_Arbeit.php">Beispiele unserer Arbeit</a>
    <a href="Kontakt.php">Kontakt</a>
    <a href="Anfahrt.php">Anfahrt</a>
    <a href="Beschwerden.php">Beschwerden</a>
    <hr/>
</nav>

<div class="content">
    <p class="first-section">Für die Kontakt aufnahme mit uns f&uuml;r einen auftrag, oder weitere Fragen von ihnen,
        k&ouml;nnen sie uns &uuml;ber das Kontakt formular erreichen. </p>

    <div class="formular">
        <form method="post">
                <span>Anrede:<span>
                        <br>
                        <input type="radio" id="genderMale" name="gender" value="Herr">
                        <label for="genderMale">Herr</label><br>
                        <input type="radio" id="genderFemale" name="gender" value="Frau">
                        <label for="genderFemale">Frau</label><br>

                        <input type="text" name="givenName" placeholder="Vorname" id="m_givenName">
                        <br>
                        <input type="text" name="name" placeholder="Nachname" id="m_lastName">
                        <br>
                        <label>Wunschtermin:</label>
                        <input type="date" name="userDate" value="<?php echo date('Y-m-d'); ?>">
                        <br>
                        <input type="text" name="email" placeholder="E-Mail adresse" id="m_email">
                        <br>
                        <textarea placeholder="Ihre Nachricht..." name="text" id="m_textField"></textarea>
                        <br>
                        <input type="submit" name="send" value="Senden">
        </form>
        <?php
        if (isset($_POST['send'])) {
            //Check for empty fields
            $inputErrorLog = array();
            if (!isset($_POST["gender"])) $inputErrorLog[] = "Bitte geben Sie ihr Geschlecht an";
            if ($_POST["givenName"] == "") $inputErrorLog[] = "Bitte geben Sie Ihren Vornamen ein";
            if ($_POST["name"] == "") $inputErrorLog[] = "Bitte geben Sie Ihren Nachnamen ein";
            if ($_POST["email"] == "") $inputErrorLog[] = "Bitte geben Sie Ihre E-Mail-Adresse ein";
            if ($_POST["text"] == "") $inputErrorLog[] = "Vergessen Sie nicht, Ihre Nachricht zu hinterlassen!";
            if ($_POST["userDate"] == "") $inputErrorLog[] = "Vergessen Sie nicht Ihren Wunschtermin festzulegen!";

            //The two cool email validation methods
            //$regex_emailPattern= '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
            //if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            $formCorrect = true;
            //Output the errors
            if (!empty($inputErrorLog)) {
                echo "<br>";
                foreach ($inputErrorLog as $error)
                    echo($error . "<br  />");
                $formCorrect = false;
            }
            //Check if the email is valid
            $mail = $_POST['email'];
            if ($mail != "") {
                if (strpos($mail, '@') === false) {
                    echo "In der angegebenen E-Mail fehlt ein \"@\" <br />";
                    $formCorrect = false;
                }
                if (strlen($mail) < 6) {
                    echo "Die angegebende E-Mail ist zu kurz <br />";
                    $formCorrect = false;
                }
                if (strlen($mail) > 320) {
                    echo "Die angegebende E-Mail ist zu lang <br />";
                    $formCorrect = false;
                }
                if (strpos($mail, '.') === false) {
                    echo "In der angegebenen E-Mail fehlt ein \".\" <br />";
                    $formCorrect = false;
                }
                if (strpos(trim($mail), ' ') == true) {
                    echo "In der E-Mail sind keine Leerzeichen erlaubt <br />";
                    $formCorrect = false;
                }
            }

            if ($_POST["userDate"] != "") {
                $date = $_POST["userDate"];
                if (strtotime($date) < time() - 60 * 60 * 24) { //Add one day
                    $formCorrect = false;
                    echo "Bitte geben Sie kein Datum aus der Vergangenheit and <br>";
                }
            }

            //Greet the user and save his date if no errors occured
            if ($formCorrect) {
                $newTicket = 0;
                $counterFilePointer = fopen("../datenbanken/ticketCounter.txt", "a+");
                if (!$counterFilePointer) {
                    echo "<span>An error occured. Please reload the Page</span>";
                } else {    //Update the ticket counter
                    $ticketNumber = fread($counterFilePointer, 20);
                    $year = substr($ticketNumber, 0, 4);
                    $ticketNumber = substr($ticketNumber, 5, 4);
                    fclose($counterFilePointer);

                    //Delete the files content
                    $temp = fopen("../datenbanken/ticketCounter.txt", "w");
                    fclose($temp);

                    $counterFilePointer = fopen("../datenbanken/ticketCounter.txt", "a+");
                    $num = (int)$ticketNumber + 1;
                    $newTicket = $year . "-" . $num;
                    fwrite($counterFilePointer, $newTicket, 8);
                    //echo $newTicket . "<br>";

                    fclose($counterFilePointer);
                    echo "<br> <span>Ihre E-Mail ist eingegangen. Wir werden uns in kürze bei ihnen melden " . $_POST['gender'] . " " . $_POST['name'] . ".<br>" .
                        "Ihre Auftragsnummger: " . $newTicket . "</span>";
                }

                $filePointer = fopen("../datenbanken/database.txt", "a");
                if (!$filePointer) {    //Update the database
                    echo "<span>An error occured. Please reload the Page</span>";
                } else {
                    fseek($filePointer, 0, SEEK_END);
                    fwrite($filePointer, $_POST['email'] . " " . $newTicket . "\n", strlen($_POST['email']) + 8 + 1 + 1);
                    fclose($filePointer);
                }
            }
        } else {
        }

        ?>
    </div>
</div>


<footer class="Inhalt">
    <hr/>
    <a href="Impressum.php" style="margin-left: -2.5%;">Impressum</a>
    <a href="Datenschutz.php">Datenschutz</a>
    <hr/>
</footer>

</body>

</html>