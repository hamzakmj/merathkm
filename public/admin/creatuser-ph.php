<?php


$errors = [];
$inputs = [];

if (is_post_request()) {
    $fields = [
        'username' => 'string | required | alphanumeric | between: 3, 25 | unique: users, username',
        'email' => 'email | required | email | unique: users, email',
        'password' => 'string | required | secure',
        'password2' => 'string | required | same: password'
    ];

    // custom messages
    $messages = [
        'password2' => [
            'required' => 'Please enter the password again',
            'same' => 'The password does not match'
        ]
    ];

    [$inputs, $errors] = filter($_POST, $fields, $messages);

    if ($errors) {
        redirect_with('createuser.php', [
            'inputs' =>$inputs,
            'errors' => $errors
        ]);

    }

    $activation_code = generate_activation_code();

    if (register_user($inputs['email'], $inputs['username'], $inputs['password'],$is_admin=0 ,$activation_code )) {

        // send the activation email
        send_activation_email($inputs['email'], $activation_code);

        redirect_with_message(
            '/../../../merath/public/admin/ManageUser.php',
            'يرجى التحقق من بريدك الإلكتروني لتفعيل حسابك قبل تسجيل الدخول',FLASH_INFO
        );
    }

} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}

