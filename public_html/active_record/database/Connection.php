<?php


namespace database;

use \PDO;



// класс для соединения и работы с БД
class Connection
{

    private $link;


    public function __construct(){
        $this->connect();
    }


    private function connect(){


        $config = [
            'host' => '127.0.0.1:3307',
            'username' => 'root',
            'password' => 'root',
            'db_name' => '',
        ];

        $dsn = 'mysql:host=' . $config['host'] .';dbname=' . $config['db_name'] . ';charset=' . $config['charset'];

        $this->link = new PDO($dsn, $config['username'], $config['password']);

        return $this;

    }


    public function execute($sql, $values = []){
        $sth = $this->link->prepare($sql);

        return $sth->execute($values);
    }


    public function query($sql, $values = []){


        $sth = $this->link->prepare($sql);

        $sth->execute($values);

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if($result === false) return [];

        return $result;

    }


}