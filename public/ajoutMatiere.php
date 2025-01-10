<?php
session_start();
if (isset($_POST['nomMatiere']) && isset($_POST['codeMatiere'])) {

    $nomMatiere = trim($_POST['nomMatiere'] ?? "");
    $codeMatiere = trim($_POST['codeMatiere'] ?? "");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">

    <title>Document</title>
</head>

<body>
    <form action="traitementMatiere.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION["csrf_token"]; ?>">
        <div>
            <label for="nomMatiere">Nom de la matière : </label>
            <input type="text" name="nomMatiere" id="nomMatiere">
        </div>
        <div>
            <label for="codeMatiere">Code de la matière : </label>
            <input type="text" name="codeMatiere" id="codeMatiere">
        </div>
        <button type="submit">Entrez</button>
    </form>
</body>

</html>