<?php INCLUDE_ONCE("tpl/header.php") ?>
<body>
<?php INCLUDE_ONCE("tpl/nav.php") ?>
<table  id="myTable" class="RespTable">
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
        <?php 
        echo var_dump($xml);
        foreach($sql as $row){ 
        ?>
        <tr>
            <div>
            <?php
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['artikelnummer']."</td>";
                    echo "<td>".$row['mengeneinheit']."</td>";
                    echo "<td>".$row['artikelbezeichnung']."</td>";
                    echo "<td>".$row['vpe']."</td>";
            ?>
            </div>
        </tr>
    </tbody>
</table>  
<?php INCLUDE_ONCE("tpl/footer.php") ?>
</body>
</html>