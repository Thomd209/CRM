<?php
    function get_designers() {
        global $pdo;
        $query = "SELECT id_designer, designer_working_name FROM designers";
        $query_result = $pdo->query($query);
        return $query_result;
    }

    $query_designers_result = get_designers();

    function get_shipyards() {
        global $pdo;
        $query = "SELECT id_shipyard, shipyard_working_name FROM shipyards";
        $query_result = $pdo->query($query);
        return $query_result;
    }

    $query_shipyards_result = get_shipyards();

    function get_customers() {
        global $pdo;
        $query = "SELECT id_customer, customer_working_name FROM customers";
        $query_result = $pdo->query($query);
        return $query_result;
    }

    $query_customers_result = get_customers();
?>