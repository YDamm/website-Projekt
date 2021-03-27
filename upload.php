<?php
// Upload Pfad der Datei
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Überprüfen, ob die Datei bereits exitiert, falls ja wird sie gelöscht
if (file_exists($target_file))
{

	unlink($target_file);
}
// Dateigröße überprüfen MAX. 5 Megabyte
if ($_FILES["fileToUpload"]["size"] > 50000000)
{
	
 	echo "Die Datei ist zu gross. ";
    	$uploadOk = 0;
}
// Nur XML Datei zulassen
if ($FileType != "xml")
{
    echo "Die Datei ist im falschen Format. ";
    $uploadOk = 0;
}
// Check ob $uploadOk von Bedingung auf 0 gesetzt werden, falls ja Upload verweigert
if ($uploadOk == 0)
{
    echo "Datei konnte nicht hochgeladen werden. ";
    
}
// Wenn alles Passt, lade Datei hoch
else
{
    // Datei wird hochgeladen und der HEader auf die Datenseite gesetzt --> Weiterleitung
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    {
        header('Location:datenseite.php');
	echo "Die Datei " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " wurde erfolgreich hochgeladen.";
        
    
    }
    // Fehlermeldung falls Upload nicht geklappt hat.
    else
    {
        echo "Ein Fehler ist aufgetreten. ";
    }
}
// Verbindung zur SQL-Datenbank auf dem Server
$conn = mysqli_connect("localhost", "ghaendler_root", "root", "ghaendler");
$affectedRow = 0;
echo "Verbindung hergestellt";
// XML Datei wird geöffnet um Daten in SQL zu schreiben
$xml = simplexml_load_file("./uploads/artikeldaten.xml") or die("Error: Cannot create object");
echo "XML Datei ge�ffnet";
// Aufteilung der XML-Children in Strings um Eintragung in DB zu erleichtern; 
// Schleife geht durch ganze Datei durch
foreach ($xml->children() as $row)
{
    $art_nr = $row->art_nr;
    $name = $row->name;
    $match = $row->match;
    $vpe = $row->vpe;
    // Trage die Daten nun zeilenweise in der Tabelle ein 
    $sql = "INSERT INTO tb_artikel(artikelnummer,mengeneinheit,artikelbezeichnung,vpe) VALUES ('" . $art_nr . "','" . $name . "','" . $match . "','" . $vpe . "')";
    $result = mysqli_query($conn, $sql);
    // Wenn Zeile nun nicht mehr NULL - sprich Daten sind eingetragen, springe zur nächsten Zeile
    if (!empty($result))
    {
        $affectedRow++;
    }
    // Ansonsten werfe einen Fehler
    else
    {
        $error_message = mysqli_error($conn) . "\n";
    }
	echo "Daten eingetragen!";
}
