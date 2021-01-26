<?php
//Файл, который позволяет вывести перечни судов и компаний из БД
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
    }

    function get_vessels() {
        global $pdo;
        $query = "SELECT vessels.id, vessels.IMO, vessels.project, vessels.ship_name, 
        vessels.ship_type, vessels.building_number, vessels.project_stage, vessels.purchase_stage, designers.id_designer, designers.designer_working_name, shipyards.id_shipyard, shipyards.shipyard_working_name, customers.id_customer, customers.customer_working_name FROM vessels LEFT JOIN designers ON vessels.id_designer = designers.id_designer LEFT JOIN shipyards ON vessels.id_shipyard = shipyards.id_shipyard LEFT JOIN customers ON vessels.id_customer = customers.id_customer";
        $query_result = $pdo->query($query);
        return $query_result;
    }

    $title = "";

    switch ($category) {
        case 1:
            $title = "Суда:";
            $query_result = get_vessels();
            break;
    }
    
