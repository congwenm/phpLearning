<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/26/13
 * Time: 2:59 AM
 * To change this template use File | Settings | File Templates.
 */


/**
 * Only Syntactical,
 * - look up Doctrine,
 * - Ram driver speeds up database testing.
 * Class DatabaseTest
 */
class DatabaseTest extends PHPUnit_Framework_TestCase {

    protected $db;

    public function setUp()
    {
        $this->db = new PDO('sqlite::memory');//for use in memory
        $this->db = new PDO('sqlte:db.sq3'); // use in file possibly db.sq3?
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec('CREATE TABLE results ...');
        $this->db->query('INSERT INTO results ...');
    }

    public function testColumn(){
        $result = $this->db->query("$query")->fetchObject();
        $this-assertEquals($result->sum, 123123123);
    }

    public function tearDown(){
        $this->db->exec('DROP TABLE results');
    }
}
