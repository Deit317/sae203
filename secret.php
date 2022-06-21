<?php
function supprimer() {
    $link = mysqli_connect('10.1.2.3', 'root', 'lannion') or die ('Error connecting to mysql: ' . mysqli_error($link).'\r\n');

    if (!mysqli_select_db($link, 'projet')) {
        printf("Erreur : impossible de selectionner la base.");
    }

    if (!($result = mysqli_query($link, 'delete from messages where 1=1;'))) {
        printf("Error: %s\n", mysqli_error($link));
    }
}
?>

<button onclick="<?php supprimer() ?>">Supprimer les messages</button>
