<?php
//business/BroodService.php
declare(strict_types=1);
require_once("data/BroodDAO.php");
class BroodService
{
    public function getBroodOverview(): array
    {
        $broodDAO = new BroodDAO();
        $lijstOverview = $broodDAO->getAll();
        return $lijstOverview;
    }
}