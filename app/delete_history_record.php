<?php
    function delete_designer_history_record() {
        global $pdo;
        $query = "DELETE FROM history_designers WHERE id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$_GET["history_record_id"]]);
        header("Location: category.php?category=2");
    }

    if (isset($_SESSION["designer"]) && isset($_GET["history_record_id"])) {
        delete_designer_history_record();
    }

    function delete_shipyard_history_record() {
        global $pdo;
        $query = "DELETE FROM history_shipyards WHERE id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$_GET["history_record_id"]]);
        header("Location: category.php?category=3");
    }

    if (isset($_SESSION["shipyard"]) && isset($_GET["history_record_id"])) {
        delete_shipyard_history_record();
    }

    function delete_customer_history_record() {
        global $pdo;
        $query = "DELETE FROM history_customers WHERE id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$_GET["history_record_id"]]);
        header("Location: category.php?category=4");
    }

    if (isset($_SESSION["customer"]) && isset($_GET["history_record_id"])) {
        delete_customer_history_record();
    }
?>