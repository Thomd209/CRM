<?php
    if (isset($_GET["delete_designer_id"])) {
        $company_id = $_GET["delete_designer_id"];
        $company = "designer";
    }

    if (isset($_GET["delete_shipyard_id"])) {
        $company_id = $_GET["delete_shipyard_id"];
        $company = "shipyard";
    }

    if (isset($_GET["delete_customer_id"])) {
        $company_id = $_GET["delete_customer_id"];
        $company = "customer";
    }

    function change_designer_projects() {
        global $pdo, $company_id;
        $query = "UPDATE vessels SET designer_id = ? WHERE designer_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([NULL, $company_id]);
    }

    function delete_designer_history() {
        global $pdo, $company_id;
        $query = "DELETE FROM history_designers WHERE designer_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$company_id]);
    }
        
    function delete_designer() {
        global $pdo, $company_id;
        $query = "DELETE FROM designers WHERE id_designer = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$company_id]);
        header("Location: http://localhost/CRM/category.php?category=2");
    }

    if (isset($company_id) && isset($company) && $company == "designer") {
        change_designer_projects();
        delete_designer_history();
        delete_designer();
    }

    function change_shipyard_projects() {
        global $pdo, $company_id;
        $query = "UPDATE vessels SET shipyard_id = ? WHERE shipyard_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([NULL, $company_id]);
    }

    function delete_shipyard_history() {
        global $pdo, $company_id;
        $query = "DELETE FROM history_shipyards WHERE shipyard_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$company_id]);
    }

    function delete_shipyard() {
        global $pdo, $company_id;
        $query = "DELETE FROM shipyards WHERE id_shipyard = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$company_id]);
        header("Location: http://localhost/CRM/category.php?category=3");
    }

    if (isset($company_id) && isset($company) && $company == "shipyard") {
        change_shipyard_projects();
        delete_shipyard_history();
        delete_shipyard();
    }

    function change_customer_projects() {
        global $pdo, $company_id;
        $query = "UPDATE vessels SET customer_id = ? WHERE customer_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([NULL, $company_id]);
    }

    function delete_customer_history() {
        global $pdo, $company_id;
        $query = "DELETE FROM history_customers WHERE customer_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$company_id]);
    }

    function delete_customer() {
        global $pdo, $company_id;
        $query = "DELETE FROM customers WHERE id_customer = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$company_id]);
        header("Location: http://localhost/CRM/category.php?category=4");
    }

    if (isset($company_id) && isset($company) && $company == "customer") {
        change_customer_projects();
        delete_customer_history();
        delete_customer();
    }
?>