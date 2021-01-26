<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

include_once './app/get_category.php';

class ConnectionTest extends TestCase
{
    use TestCaseTrait;

    public function getConnection()
    {
        $host = 'localhost';
        $db = 'crm';
        $user = 'root';
        $pass = 'root';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;port=3306;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $pdo = new PDO($dsn, $user, $pass, $opt);
        return $this->createDefaultDBConnection($pdo, $db);
    }

    public function getDataSet() 
    {
        return $dataSet = $this->createMySQLXMLDataSet(__DIR__ . '/dataSets/seed.xml');
    }

    public function get_vessels() {
        $object = $this->getConnection()->getConnection()->query('SELECT vessels.id, vessels.IMO, vessels.project, vessels.ship_name, vessels.ship_type, vessels.building_number, vessels.project_stage, vessels.purchase_stage, designers.id_designer, designers.designer_working_name, shipyards.id_shipyard, shipyards.shipyard_working_name, customers.id_customer, customers.customer_working_name FROM vessels LEFT JOIN designers ON vessels.id_designer = designers.id_designer LEFT JOIN shipyards ON vessels.id_shipyard = shipyards.id_shipyard LEFT JOIN customers ON vessels.id_customer = customers.id_customer;');
        return $object->fetch();
    }

    public function test() 
    {
        $this->assertEquals(array('id' => 2, 'IMO' => '9694725', 'project' => '22220', 'ship_name' => 'Арктика', 
        'ship_type' => 'Универсальный атомный ледокол', 'building_number' => '05706', 'project_stage' => 'Испытания', 
        'purchase_stage' => 'Завершена', 'id_designer'=> 1, 'designer_working_name' => '"ЦКБ "Айсберг"',  
        'id_shipyard' => 15, 'shipyard_working_name' => 'Балтийский завод', 'customer_working_name' => 'Атомфлот', 'id_customer' => 15), $this->get_vessels());
    }
}
