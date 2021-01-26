<?php
    if (isset($_GET["update_vessel"])) {
        $_SESSION["update_vessel"] = $_GET["update_vessel"];
    }

    if (isset($_POST["submit"]) && $_POST["IMO"] != "" && $_POST["project"] != "" 
    && $_POST["ship_name"] != "" && $_POST["ship_type"] != "" && $_POST["building_number"] != "" 
    && $_POST["project_stage"] != "" && $_POST["purchase_stage"] != "" 
    && isset($_POST["designers"]) && isset($_POST["shipyards"]) && isset($_POST["customers"])) {

        function change_vessel() {
            global $pdo;
            $query = "UPDATE vessels SET IMO = ?, project = ?, ship_name = ?, ship_type = ?, 
            building_number = ?, project_stage = ?, purchase_stage = ?, designer_id = ?, shipyard_id = ?,
            customer_id = ? WHERE id = ?";
            $query_result = $pdo->prepare($query);
            $query_result->execute([$_POST["IMO"], $_POST["project"], $_POST["ship_name"],
            $_POST["ship_type"], $_POST["building_number"], $_POST["project_stage"], 
            $_POST["purchase_stage"], $_POST["designers"], $_POST["shipyards"], $_POST["customers"],
            $_SESSION["update_vessel"]]);
            header("Location: category.php?category=1");
        }

        if (isset($_SESSION["update_vessel"])) {
            change_vessel();
        }
    }
?>