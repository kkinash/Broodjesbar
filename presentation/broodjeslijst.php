<?php
//presentation/broodjeslijst.php


require_once("data/BroodDAO.php");
?>


<body>
<h1>Broodoverzicht </h1>
        <center>
        <table border='thin' class="styled-table">
            <thead>
                    <tr><th>Nr</th>
                        <th>Naam brood</th>
                        <th>Omschrijving</th>
                        <th>Prijs</th>
                        <th>Bestel</th>
                    </tr>
            </thead>
        <tbody><?php
            foreach ($broodjesLijst as $brood) {
                ?>
                <tr>
                <td>
                <?php print($brood->getId()); ?>
                </td>
                <td>
                    <?php print($brood->getName()); ?>
                </td>
                <td>
                    <?php print($brood->getDescr()); ?>
                </td>
                <td>
                    <?php print($brood->getPrice()); ?>
                </td><td style='font-size:70%'>
                <?php
    if (isset($_SESSION['userAccount'])) { ?>
        <a href='./orders.php?action=add&broodid=<?php print($brood->getId()); ?>'>Order</td> <?php
    } else { ?>
        
        <a href='./login.php'>Login</a> of <a href='./signup.php'>Sign Up</a> to order</td> <?php } ?>
            </tr>
                <?php
            }
            ?></tbody>
  </table>

  <br>
            