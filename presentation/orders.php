<?php
declare(strict_types = 1);
//presentation/orders.php


?>
<h1>Besteloverzicht</h1>

<h2>  </h2> 
<?php
    ?>
    <center>
    <table>
        <thead>
                <tr><th>Bestel Id</th>
                    <th>Naam</th>
                    
                   
                    <th>Achternam</th>
                    <th>Status</th>
                </tr>
        </thead>
    <tbody>
        
      <?php
       foreach ($orderlijst as $order) { ?>
            <tr>
                
                <td><?php print($order->getId()); ?></td>
                <td><?php print($order->getBrood()); ?></td>
                <td><?php print($order->getPerson()); ?> </td>
                <td><?php print($order->getStatus());?></td>

              
       </tr>
      
        <?php  }
        ?></tbody>
</table>
