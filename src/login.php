<?php

if (is_user_logged_in() ) {
    if(is_user_logged_in_admin()){
    redirect_to('/../merath/public/admin/ManageUser.php');
    }
    else
    redirect_to('main.php');
}

$inputs = [];
$errors = [];

if (is_post_request()) {

    [$inputs, $errors] = filter($_POST, [
        'username' => 'string | required',
        'password' => 'string | required',
        'remember_me' => 'string'
    ]);

    if ($errors) {
        redirect_with('login.php', ['errors' => $errors, 'inputs' => $inputs]);
    }

    // if login fails
    if (!login($inputs['username'], $inputs['password'], isset($inputs['remember_me']))) {

        $errors['login'] = 'Invalid username or password';

        redirect_with('login.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
    }

    // login successfully
    $user = find_user_by_username($inputs['username']);
    if(is_user_admin($user))
    {
        
        redirect_to('/../merath/public/admin/ManageUser.php');
    }else
    redirect_to('main.php');

} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}