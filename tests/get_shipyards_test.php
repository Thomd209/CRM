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

    public function get_shipyards() {
        $object = $this->getConnection()->getConnection()->query('SELECT * FROM shipyards;');
        return $object->fetch();
    }

    public function test() 
    {
        $this->assertEquals(array('id_shipyard' => 15, 'shipyard_working_name' => 'Балтийский завод', 
        'entity' => 'АО Балтийский завод"', 'INN' => '7830001910', 
        'contacts' => 'zavod@bz.ru'), $this->get_shipyards());
    }
}