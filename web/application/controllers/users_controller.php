<?php

class UsersController extends Controller
{
    public function sign_in()
    {
        header('Content-Type: application/json');
        $user = User::find_by('username', $_POST['username']);
        if (!$user || !$user->auth($_POST['pass'])) {
            echo json_encode([ 'message' => 'Invalid username or password!!' ]);
        } else {
            echo json_encode($user->get_data());
        }
    }

    public function sign_up()
    {
        header('Content-Type: application/json');
        $user = User::find_by('username', $_POST['username']);
        if ($user) {
            echo json_encode([ 'message' => 'already exist!' ]);
        } else {
            $user = new User($_POST);
            $user->save();
            echo json_encode($user->get_data());
        }
    }
}
