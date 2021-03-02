<?php
include_once("db_init.php");
 // Daten in der Tabelle tb_abteilung eintragen
$sql = "INSERT INTO tb_abteilung(name)
        VALUES('Service'),('Leitung'),('Kundenservice')
        ";

    checkSQLSyntax(); //SQL Syntax überprüfen
    // Daten aus der Tabelle tb_abteilung mit der ID Leitung auswählen
    $sql = "SELECT id FROM tb_abteilung WHERE name='Leitung'";

$res = $myPDO->query($sql);
checkSQLSyntax();
$id = $res->fetchColumn();
 $sql = "INSERT INTO tb_mitarbeiter(vorname, nachname, telefonnummer, id_abteilung)
        VALUES('Due', 'Liehuang', '222', $id )"; // Daten in der tb_mitarbeiter eintragen

#$myPDO->exec($sql);
checkSQLSyntax();
//Ansicht
echo "<hr>";
// Daten aus der Tabelle tb_mitarbeiter auswählen
$sql = "SELECT * FROM tb_mitarbeiter AS M INNER JOIN tb_abteilung AS A ON M.id_abteilung = A.id";

$res = $myPDO->query($sql);
    $arr = $res->fetchAll();
// Daten ausgabe
    foreach($arr as $spalte){
        echo $spalte['name']." ". $spalte['vorname']." ".$spalte['nachname']." ".$spalte['telefonnummer']." ".$spalte['id_abteilung']."<br>";
    }
?>