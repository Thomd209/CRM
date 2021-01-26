<?php
    function create_designer_history() {
        global $pdo, $designer_id;
        $query = "INSERT INTO history_designers SET history = ?, designer_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$_POST["history"], $designer_id]);
        header("Location:" . $_SERVER["REQUEST_URI"]);
    }

    function show_designer_history() {
        global $pdo, $designer_id;
        $query = "SELECT id, history FROM history_designers WHERE designer_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$designer_id]);
        return $query_result;
    }

    if (isset($_GET["designer"]) && isset($_POST["history"])) {
        $designer_id = $_GET["designer"];
        create_designer_history();
        $query_result = show_designer_history();
    }

    if (isset($_GET["designer"])) {
        $designer_id = $_GET["designer"];
        $query_result = show_designer_history();
    }

    function create_shipyard_history() {
        global $pdo, $shipyard_id;
        $query = "INSERT INTO history_shipyards SET history = ?, shipyard_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$_POST["history"], $shipyard_id]);
        header("Location:" . $_SERVER["REQUEST_URI"]);
    }

    function show_shipyard_history() {
        global $pdo, $shipyard_id;
        $query = "SELECT id, history FROM history_shipyards WHERE shipyard_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$shipyard_id]);
        return $query_result;
    }

    if (isset($_GET["shipyard"]) && isset($_POST["history"])) {
        $shipyard_id = $_GET["shipyard"];
        create_shipyard_history();
        $query_result = show_shipyard_history();
    }

    if (isset($_GET["shipyard"])) {
        $shipyard_id = $_GET["shipyard"];
        $query_result = show_shipyard_history();
    }

    function create_customer_history() {
        global $pdo, $customer_id;
        $query = "INSERT INTO history_customers SET history = ?, customer_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$_POST["history"], $customer_id]);
        header("Location:" . $_SERVER["REQUEST_URI"]);
    }

    function show_customer_history() {
        global $pdo, $customer_id;
        $query = "SELECT id, history FROM history_customers WHERE customer_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$customer_id]);
        return $query_result;
    }

    if (isset($_GET["customer"]) && isset($_POST["history"])) {
        $customer_id = $_GET["customer"];
        create_customer_history();
        $query_result = show_customer_history();
    }

    if (isset($_GET["customer"])) {
        $customer_id = $_GET["customer"];
        $query_result = show_customer_history();
    }
?>