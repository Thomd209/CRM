<?php
//Страница, на которой происходит вывод информации из БД об одном судне
    function get_vessel($vessel_id) {
        global $pdo;
        $query = "SELECT * FROM vessels WHERE id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$vessel_id]);
        return $query_result;
    }

    if (isset($_GET["vessel"])) {
        $title = "Страница судна";
        $vessel_id = $_GET["vessel"];
        $vessel = get_vessel($vessel_id);
    }
