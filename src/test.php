<?php
if (!isset ($_GET["action"]) || !isset ($_POST["nom"]) || !isset ($_POST["leCours"])) {
    header("Location: index.php");
}
echo "Action : " . $_GET["action"] . "<br/>";
echo "Nom : " . $_POST["nom"] . "<br/>";
echo "Cours : " . $_POST["leCours"] . "<br/>";
?>