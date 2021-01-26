<?php
    if (isset($_GET["company"]) && $_GET["company"] == "designer") {
        $_SESSION["company"] = "designer";
        $_SESSION["title"] = "Добавить проектанта:";
    }

    if (isset($_GET["company"]) && $_GET["company"] == "shipyard") {
        $_SESSION["company"] = "shipyard";
        $_SESSION["title"] = "Добавить верфь:";
    }

    if (isset($_GET["company"]) && $_GET["company"] == "customer") {
        $_SESSION["company"] = "customer";
        $_SESSION["title"] = "Добавить заказчика:";
    }
    
    if (!empty($_POST["submit"]) && $_POST["name"] != "" && $_POST["entity"] != "" 
    && $_POST["INN"] != "" && $_POST["contacts"] != "") {
        
        function create_designer() {
            global $pdo;
            $query = "INSERT INTO designers SET designer_working_name = ?, entity = ?, INN = ?, contacts = ?";
            $query_result = $pdo->prepare($query);
            $query_result->execute([$_POST["name"], $_POST["entity"], $_POST["INN"], $_POST["contacts"]]);
            header("Location: category.php?category=2");
        }
    
        if (isset($_SESSION["company"]) && $_SESSION["company"] == "designer") {
            $_SESSION["title"] = "Добавить проектанта:";
            create_designer();
        }
    
        function create_shipyard() {
            global $pdo;
            $query = "INSERT INTO shipyards SET shipyard_working_name = ?, entity = ?, INN = ?, contacts = ?";
            $query_result = $pdo->prepare($query);
            $query_result->execute([$_POST["name"], $_POST["entity"], $_POST["INN"], $_POST["contacts"]]);
            header("Location: category.php?category=3");
        }
    
        if (isset($_SESSION["company"]) && $_SESSION["company"] == "shipyard") {
            $_SESSION["title"] = "Добавить верфь:";
            create_shipyard();
        }
    
        function create_customer() {
            global $pdo;
            $query = "INSERT INTO customers SET customer_working_name = ?, entity = ?, INN = ?, contacts = ?";
            $query_result = $pdo->prepare($query);
            $query_result->execute([$_POST["name"], $_POST["entity"], $_POST["INN"], $_POST["contacts"]]);
            header("Location: category.php?category=4");
        }
    
        if (isset($_SESSION["company"]) && $_SESSION["company"] == "customer") {
            $_SESSION["title"] = "Добавить заказчика:";
            create_customer();
        }
    }
?>