<?php
// Verbindung zur Datenbank
$con = mysqli_connect("localhost", "ghaendler_root", "root", "ghaendler");
if (!$con)
{
    echo ' Bitte noch einmal überprüfen ';
}
// Daten per GET-Abfrage von der Seite holen
if (isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 1;
}
// legt Artikelanzahl pro Seite fest
$num_per_page = 100;
$start_from = ($page - 1) * 100;
$query = "SELECT * FROM tb_artikel LIMIT $start_from,$num_per_page";
$result = mysqli_query($con, $query);
?>
