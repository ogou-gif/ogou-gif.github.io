<?php require ='index.php'?>
<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère et assainit les données du formulaire
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Adresse email du destinataire (propriétaire du site)
    $destinataire = 'ogoujuste60@gmail.com'; // Remplace par ton adresse email

    // Sujet de l'email
    $sujet = 'Nouveau message de votre portfolio';

    // Corps du message
    $corps = "Nom: $name\n";
    $corps .= "Email: $email\n";
    $corps .= "Sujet: $subject\n";
    $corps .= "Message:\n$message\n";

    // En-têtes de l'email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envoie l'email
    if (mail($destinataire, $sujet, $corps, $headers)) {
        echo "Le message a été envoyé avec succès.";
    } else {
        echo "Une erreur est survenue lors de l'envoi du message.";
    }
} else {
    // Si le formulaire n'a pas été soumis
    echo "Accès non autorisé.";
}
?>
