<?php

class UsersController extends Controller
{
    public function sign_in()
    {
        header('Content-Type: application/json');
        $data = [ 'controller' => 'UsersController', 'method' => 'sign_in' ];
        echo json_encode($data);
    }

    public function sign_up()
    {
        header('Content-Type: application/json');
        $data = [ 'controller' => 'UsersController', 'method' => 'sign_up' ];
        echo json_encode($data);
    }
}
