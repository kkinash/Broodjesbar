<?php


require_once __DIR__ . "/Business/orderService.php";
require_once __DIR__ . "/presentation/header.php";

$orderSvc = new OrderService();

if (isset($_GET['broodid']) && isset($_GET['action']) && $_GET['action'] === 'add') {
$person =  (int)$_SESSION['userid'];
$brood = (int)$_GET['broodid'];
$order = $orderSvc->addOrder($brood, $person);
}
$orderlijst = $orderSvc->getOrderOverview();


include_once __DIR__ . "/presentation/orders.php";