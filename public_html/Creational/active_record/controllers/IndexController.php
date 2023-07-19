<?php

namespace controllers;



use models\user\User;

class IndexController
{

    public function index(){


        $userModel = new User();
        $userModel->repository->test();
        var_dump($userModel->repository->getUsers());

    }

}