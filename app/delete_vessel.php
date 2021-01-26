<?php
    if (isset($_GET["delete_vessel"])) {

        function delete_vessel() {
            global $pdo;
            $query = "DELETE FROM vessels WHERE id = ?";
            $query_result = $pdo->prepare($query);
            $query_result->execute([$_GET["delete_vessel"]]);
            header("Location: http://localhost/CRM/category.php?category=1");
        }

        delete_vessel();
    }
?>