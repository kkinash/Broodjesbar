<?php //data/OrderDAO.php
declare(strict_types = 1);
require_once __DIR__ . "/DBConfig.php";
require_once __DIR__ . "/../entities/order.php";

class OrderDAO {


public function getAll(): array
    {
        	
$sql = "SELECT orders.id, broodjes.Naam, users.name, status.statusname FROM orders
INNER JOIN broodjes on broodjes.ID = orders.brood
INNER JOIN users on users.personID = orders.person
INNER JOIN status on status.ID = orders.status";			

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $order = new Order((int) $rij["id"], $rij["Naam"], $rij["name"],(string) $rij["statusname"]);
            array_push($lijst, $order);
        }
        $dbh = null;
        return $lijst;
    }

    public function createOrder(int $brood, int $person): int
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("
        
        INSERT INTO orders (brood, person, status) VALUES (:brood, :person, :status)");      
        $stmt->bindValue(":brood", $brood);
        $stmt->bindValue(":person", $person);
        $stmt->bindValue(":status", '1');
        $stmt->execute();
        $laatsteNieuweId = $dbh->lastInsertId();
        $dbh = null;
        $id = $laatsteNieuweId;
        return (int) $id;
    }
}


