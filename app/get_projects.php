<?php
//Файл, использующиеся для получения проектов (судов) на главной странице (index.php)
    function get_projects() {
        global $pdo;
        $query = "SELECT vessels.IMO, vessels.project, vessels.ship_name, vessels.ship_type, vessels.building_number, vessels.project_stage, vessels.purchase_stage, designers.designer_working_name, shipyards.shipyard_working_name, customers.customer_working_name FROM vessels LEFT JOIN designers ON vessels.id_designer = designers.id_designer LEFT JOIN shipyards ON vessels.id_shipyard = shipyards.id_shipyard LEFT JOIN customers ON vessels.id_customer = customers.id_customer";
        $query_result = $pdo->query($query);
        return $query_result;
    }

    $query_result = get_projects();
