<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Űrlap adatok
    $name = $_POST["name"];
    $message = $_POST["message"];
    $member = $_POST["member"];
    $subscribe = isset($_POST["subscribe"]) ? "Yes" : "No";

    // E-mail cím
    $to = "janoshar@gmail.com";

    // E-mail tárgya
    $subject = "Üzenet az űrlapról";

    // E-mail tartalma
    $email_content = "Név: $name\n";
    $email_content .= "Üzenet: $message\n";
    $email_content .= "Tag vagy: $member\n";
    $email_content .= "Feliratkozás a hírlevélre: $subscribe\n";

    // E-mail fejléce
    $headers = "From: $name <$to>";

    // E-mail küldése
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Az üzenet sikeresen elküldve.";
    } else {
        echo "Hiba történt az üzenet küldése közben.";
    }
} else {
    // Ha valaki közvetlenül megpróbálja elérni a fájlt
    echo "Ez a fájl csak POST kérésekkel érhető el.";
}
?>
