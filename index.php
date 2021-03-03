<?php INCLUDE_ONCE("tpl/header.php") ?>
<body>
<?php INCLUDE_ONCE("tpl/nav.php") ?>
  <form action="db/db.php" method="get" target="_blank">
    <button type="submit">Datenbank erstellen</button>
    <br>
  </form>
<form action="./upload.php" method="post" enctype="multipart/form-data">
  XML-Datei für den Upload: (max. 5MB) 
  <br>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload File" name="file">
</form>
<?php INCLUDE_ONCE("tpl/footer.php") ?>
</body>
</html>