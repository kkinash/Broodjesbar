<?php //data/BroodDAO.php
declare(strict_types = 1);
require_once("DBConfig.php");
require_once("entities/Brood.php");


class BroodDAO {
    public function getAll(): array
    {
        $sql = "select broodjes.id as brood_id, naam as name, omschrijving as descr, prijs as price FROM broodjes";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $brood = new Brood((int) $rij["brood_id"], $rij["name"], $rij["descr"],(float) $rij["price"]);
            array_push($lijst, $brood);
        }
        $dbh = null;
        return $lijst;
    }

    public function getById(int $id): Brood
    {
        $sql = "select broodjes.id as brood_id, naam as name, omschrijving as descr, prijs as price FROM broodjes where broodjes.id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $brood = new Brood((int) $rij["brood_id"], $rij["name"], $rij["descr"],(float) $rij["price"]);
        $dbh = null;
        return $brood;
    }


}