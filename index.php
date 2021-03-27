<!-- Standard definierte header Template aufrufen -->
<?php INCLUDE_ONCE("tpl/header.php") ?>
<body>
    <!-- Standard definierte Navigationsmenü Template aufrufen -->
    <?php INCLUDE_ONCE("tpl/nav.php") ?>
    <br>
    <h1 style="text-align:center"> digitale OBST und GEMUESE  </h1>
    <div class="container ">
        <div class="row" style="text-align:center">
                <h1 class="white">Datenbank erstellen</h1>
        </div>
        <!--  -->
        <div class="row" style="justify-content:center">
            <div class="col-md-6 col-md-offset-3">
                <div class="btn-container center">
                    <br>
                    <p id="namefile">Beim Klicken auf dem Button, wird die Datenbank angelegt</p>
                    <br>
                    <!-- Datenbanktabellen Skript zum Erzeugen aufrufen -->
                    <button class="btn btn-primary"><a href="db/db.php" target="_blank"
                            style="color:white;">erstellen</a></button>
                </div>
            </div>
        </div>
        <!-- upload Formulare -->
        <div class="container" style="text-align:center" >
                    <h1 class="white" >Datei hochladen</h1>
            <!-- HTML Formular zum Upload der XML Datei -->
            <form method="post" action="./upload.php" enctype="multipart/form-data" accept-charset="utf-8">
                <div class="row" style="justify-content:center">
                    <div class="col-md-6 col-md-offset-3 ">
                        <div class="btn-container " style="text-align:center">
                            <br>
                            <p id="namefile">Nur XML Datei ist erlaubt (.xml) - Bitte Datei als artikeldaten.xml benennen.</p>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <br>
                            <br>
                            <div class="row ">
                                <div class="col-md-12">
                                    <input type="submit" value="Upload File" name="file" class="btn btn-primary"
                                        id="submitbtn">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <!-- Standard definierte Footer Template aufrufen -->
        <?php INCLUDE_ONCE("tpl/footer.php") ?>
</body>
</html>
