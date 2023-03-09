<?php

declare(strict_types=1);

require_once __DIR__ . "/../Data/OrderDAO.php";
require_once __DIR__ . "/../Entities/order.php";


class OrderService {

    private OrderDAO $orderDAO;

    public function __construct()
    {
        $this->orderDAO = new OrderDAO();
    }

    public function addOrder($brood, $person): ?int
    {
        return $this->orderDAO->createOrder( $brood, $person);
    }

    public function getOrderOverview(): array
    {
        $OrderDAO = new OrderDAO();
        $orderlijstOverview = $OrderDAO->getAll();
        return $orderlijstOverview;
    }
}