<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Die Datei existiert bereits. ";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Die Datei ist zu groß. ";
    $uploadOk = 0;
}

// Allow certain file formats
if ($FileType != "xml") {
    echo "Die Datei ist im falschen Format. ";
    $uploadOk = 0;
}

// Check ob $uploadOk von Bedingung auf 0 gesetzt werden
if ($uploadOk == 0) {
    echo "Datei konnte nicht hochgeladen werden. ";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Die Datei " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " wurde erfolgreich hochgeladen.";
    } else {
        echo "Ein Fehler ist aufgetreten. ";
    }
}
$xml = simplexml_load_file("./uploads/daten.xml") or die("Error: Cannot create object");
$objJsonDocument = json_encode($xml);
$arrOutput = json_decode($objJsonDocument, true); 
echo "<pre>";
print_r($arrOutput);
$sql = "INSERT INTO tb_artikel(artikelnummer)
      VALUES('$objJsonDocument')
      ";
?>