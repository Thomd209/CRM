<?php
//Файл, в котором можно получить данные об одной компании
    function get_designer() {
        global $pdo, $designer;
        $query = "SELECT * FROM designers WHERE id_designer = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$designer]);
        return $query_result;
    }

    if (isset($_GET["designer"])) {
        $title = "Страница проектанта";
        $designer = $_GET["designer"];
        $_SESSION["designer"] = $_GET["designer"];
        $company = get_designer();
    } else {
        $_SESSION["designer"] = null;
    }

    function get_shipyard() {
        global $pdo, $shipyard;
        $query = "SELECT * FROM shipyards WHERE id_shipyard = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$shipyard]);
        return $query_result;
    }
    
    if (isset($_GET["shipyard"])) {
        $title = "Страница верфи";
        $shipyard = $_GET["shipyard"];
        $_SESSION["shipyard"] = $_GET["shipyard"];
        $company = get_shipyard();
    } else {
        $_SESSION["shipyard"] = null;
    }

    function get_customer() {
        global $pdo, $customer;
        $query = "SELECT * FROM customers WHERE id_customer = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$customer]);
        return $query_result;
    }
    
    if (isset($_GET["customer"])) {
        $title = "Страница заказчика";
        $customer = $_GET["customer"];
        $_SESSION["customer"] = $_GET["customer"];
        $company = get_customer();
    } else {
        $_SESSION["customer"] = null;
    }
?>