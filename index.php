<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acceuil</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <section>
        <?php
            echo "<p>Il est " . date('h:i:s') . '.</p>'
        ?>

        <form id="connexion">
            <label for="c-nom">Nom d'utilisateur</label>
            <input type="text" id="c-nom">
            <label for="c-mdp">Mot de passe</label>
            <input type="password" id="c-mdp">
        </form>

        <form id="inscription">
            <label for="i-nom">Nom d'utilisateur</label>
            <input type="text" id="i-nom">
            <label for="i-mdp">Mot de passe</label>
            <input type="password" id="i-mdp">
            <label for="i-cmdp">Confirmation du mot de passe</label>
            <input type="password" id="i-cmdp">
            <input type="button" onclick="<?php existe($_GET['i-nom']); ?>">
        </form>

        <?php
            function inscription($nom, $mdp, $cmdp) {
                if ($mdp != $cmdp) {
                    echo '<p class="error">Les mots de passe ne correspondent pas.</p>';
                    return;
                }

                $link = mysqli_connect('10.1.2.3', 'root', 'Lannion') or die ('Error connecting to mysql: ' . mysqli_error($link).'\r\n');

                if (!($result = mysqli_query($link, 'select * from utilisateurs where nom = ' . $nom . ';'))) {
                    printf("Error: %s\n", mysqli_error($link));
                }

                $trouve = false;
                while ($row = mysqli_fetch_row($result)) {
                    $trouve = true;
                }

                if ($trouve) {
                    echo '<p class="error">Un utilisateur avec ce nom existe deja.</p>';
                    return;
                }

                if (!($result = mysqli_query($link, 'insert into utilisateurs values (' . $nom . ', ' . $mdp . ')'))) {
                    printf("Error: %s\n", mysqli_error($link));
                }
                else {
                    echo '<p class="success">Inscription reussie.</p>';
                }
            }
        ?>
    </section>
</body>
</html>