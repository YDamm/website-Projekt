 <!-- Templat aufrufen -->
 <?php INCLUDE_ONCE("tpl/header.php") ?>

 <body>
     <?php INCLUDE_ONCE("tpl/nav.php") ?>
     <!-- HTML Tabelle -->
     <table id="customers">
         <thead>
             <tr>
                 <th>id</th>
                 <th>Artikelnummer</th>
                 <th>Match</th>
                 <th>Name</th>
                 <th>VPE</th>
             </tr>

         </thead>
         <tbody>
             <!-- 
###############################################################
##### Daten Aus der Datenbank in einer Tabelle anzeigen   #####
###############################################################
-->
             <?php 
        //echo var_dump($xml);
        $conn = mysqli_connect("localhost", "root", "", "db_händler");
        $sql = "SELECT * FROM tb_artikel";
        $query = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($query)) {
        ?>
             <tr>
                 <div>
                     <?php
                    echo "<td>" .$row['id'] ."</td>";
                    echo "<td>" .$row['artikelnummer'] ."</td>";
                    echo "<td>" .$row['mengeneinheit'] ."</td>";
                    echo "<td>" .$row['artikelbezeichnung'] ."</td>";
                    echo "<td>" .$row['vpe'] ."</td>";
                  }
            ?>
                 </div>
             </tr>
         </tbody>
     </table>
     <?php INCLUDE_ONCE("tpl/footer.php") ?>
 </body>

 </html>