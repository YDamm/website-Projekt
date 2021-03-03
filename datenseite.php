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
             $con = mysqli_connect("localhost", "root", "", "db_händler");
             if(!$con)
             {
                 echo ' Please Check Your Connection ';
             }
             if(isset($_GET['page']))
                {
                    $page = $_GET['page'];
                }
                else
                {
                    $page = 1;
                }

             $num_per_page = 20;
            $start_from = ($page-1)*20;
             $query = "SELECT * FROM tb_artikel LIMIT $start_from,$num_per_page";
             $result = mysqli_query($con,$query);

        //echo var_dump($xml);
        $sql = "SELECT * FROM tb_artikel";
        while($row = mysqli_fetch_assoc($result)) {
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
     <?php
     $pr_query = "select * from tb_artikel";
     $pr_result = mysqli_query($con,$pr_query);
     $total_record = mysqli_num_rows($pr_result );
     
     $total_page = ceil($total_record/$num_per_page);
    // letzte Seite
     if($page>1){
        echo "<a href='?page=".($page-1)."' class='btn-btn-danger'>Previous</a>'"; 
     }
    // Anzehl der Seiten 
     for($x=1; $x<$total_page;$x++){
         echo "<a href='?page=".$x."' class='btn btn-primary'>$x</a>'";
     }
    // nächste Seite
     if($x>$page){
        echo "<a href='?page=".($page+1)."' class='btn-btn-danger'>Next</a>'"; 
     }
     ?>
     <?php INCLUDE_ONCE("tpl/footer.php") ?>
 </body>

 </html>

 <!--
            // $mysqli = NEW mysqli("localhost", "root", "", "db_händler");
            // $rpp = 10;

             //seite überprüfen
             isset($_GET['page']) ? $page = $_GET['page'] : $page = 0;
             
             // Steite 1 überprüfen
             if($page > 1){
                 $start = ($page * $rpp) - $rpp;
             }else{
                 $start = 0;
             }
             $start_from = ($page-1)*05;
             // Querry DB für die ganze Einträge
             $resultSet = $mysqli->query("SELECT id FROM tb_artikel");

             // Allte Einträge einholen
             $numRows = $resultSet->num_rows;
             // alle Seiten anzeigen
             $totalPages = $numRows / $rpp;
             // Querry Results
             $resultSet = $mysqli->query("SELECT * FROM tb_artikel LIMIT $start_from, $rpp");
     -->