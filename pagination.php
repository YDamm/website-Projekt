<?php
// Datenbank anbindung
$con = mysqli_connect("localhost", "ghaendler_root", "root", "ghaendler");
if (!$con)
{
    echo ' Bitte noch einmal überprüfen ';
}
// Daten per Get Abfrage von der Seite holen
if (isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 1;
}
// Artikelanzahl pro Seite 
$num_per_page = 250;
$start_from = ($page - 1) * 250;
$query = "SELECT * FROM tb_artikel LIMIT $start_from,$num_per_page";
$result = mysqli_query($con, $query);
?>
