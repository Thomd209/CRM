<?php
    if (isset($_GET["change_designer_id"])) {
        $_SESSION["company_id"] = $_GET["change_designer_id"];
        $_SESSION["company"] = "designer";
        $_SESSION["title"] = "Изменить проектанта:";
    }

    if (isset($_GET["change_shipyard_id"])) {
        $_SESSION["company_id"] = $_GET["change_shipyard_id"];
        $_SESSION["company"] = "shipyard";
        $_SESSION["title"] = "Изменить верфь:";
    }

    if (isset($_GET["change_customer_id"])) {
        $_SESSION["company_id"] = $_GET["change_customer_id"];
        $_SESSION["company"] = "customer";
        $_SESSION["title"] = "Изменить заказчика:";
    }
    
    if (!empty($_POST["submit"]) && $_POST["name"] != "" && $_POST["entity"] != "" 
    && $_POST["INN"] != "" && $_POST["contacts"] != "") {
        
        function change_designer() {
            global $pdo;
            $query = "UPDATE designers SET designer_working_name = ?, entity = ?, INN = ?, contacts = ? WHERE id_designer = ?";
            $query_result = $pdo->prepare($query);
            $query_result->execute([$_POST["name"], $_POST["entity"], $_POST["INN"], $_POST["contacts"], $_SESSION["company_id"]]);
            header("Location: category.php?category=2");
        }
    
        if (isset($_SESSION["company_id"]) && isset($_SESSION["company"]) && $_SESSION["company"] == "designer") {
            $_SESSION["title"] = "Изменить проектанта:";
            change_designer();
        }
    
        function change_shipyard() {
            global $pdo;
            $query = "UPDATE shipyards SET shipyard_working_name = ?, entity = ?, INN = ?, contacts = ?  WHERE id_shipyard = ?";
            $query_result = $pdo->prepare($query);
            $query_result->execute([$_POST["name"], $_POST["entity"], $_POST["INN"], $_POST["contacts"], $_SESSION["company_id"]]);
            header("Location: category.php?category=3");
        }
    
        if (isset($_SESSION["company_id"]) && isset($_SESSION["company"]) && $_SESSION["company"] == "shipyard") {
            $_SESSION["title"] = "Изменить верфь:";
            change_shipyard();
        }
    
        function change_customer() {
            global $pdo;
            $query = "UPDATE customers SET customer_working_name = ?, entity = ?, INN = ?, contacts = ?  WHERE id_customer = ?";
            $query_result = $pdo->prepare($query);
            $query_result->execute([$_POST["name"], $_POST["entity"], $_POST["INN"], $_POST["contacts"], $_SESSION["company_id"]]);
            header("Location: category.php?category=4");
        }
    
        if (isset($_SESSION["company_id"]) && isset($_SESSION["company"]) && $_SESSION["company"] == "customer") {
            $_SESSION["title"] = "Изменить заказчика:";
            change_customer();
        }
    }
?>