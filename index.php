<?php //test.php
// require_once("data/BroodDAO.php");
// $dao = new BroodDAO();
// $boek = $dao->getById(2);
// print("<pre>");
// print_r($boek);
// print("</pre>");

// session_start();

require_once("business/BroodServise.php");
require_once("presentation/header.php");

//require_once("presentation/header.php");  // Adinda aangepast: in presentation/broodjeslijst.php geplaatst
$broodSvc = new BroodService();
$broodjesLijst = $broodSvc->getBroodOverview();
$_SESSION['test'] = 'index test session ';

include("presentation/broodjeslijst.php");   