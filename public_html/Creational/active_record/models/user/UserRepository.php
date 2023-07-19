<?php


namespace models\user;


use database\Connection;
use database\QueryBuilder;



class UserRepository
{

    public function getUsers(){

        $queryBuilder = new QueryBuilder();
        $db = new Connection();

        $sql = $queryBuilder->select()
            ->from('user')
            ->orderBy('id', 'DESC')
            ->sql();

        return $db->query($sql);

    }


}