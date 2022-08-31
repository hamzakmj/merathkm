<?php


$errors = [];
$inputs = [];

if (is_post_request()) {
    $fields = [
        'username' => 'string  | alphanumeric | between: 3, 25 | unique: users, username',
        'email' => 'email  | email | unique: users, email',
        'password' => 'string | secure',
        'password2' => 'string  | same: password',
    ];

    // custom messages
    $messages = [
        'password2' => [
            'required' => 'Please enter the password again',
            'same' => 'The password does not match'
        ]
    ];

    [$inputs, $errors] = filter($_POST, $fields, $messages);
    $x = $_POST['user_id'];
    $user = find_user_by_id($x);
    echo $x;
    echo var_dump($user);
    if ($errors) {
        redirect_with("/../merath/public/admin/edit_user.php?user_id=$x", ['inputs' => ($inputs),'errors' => $errors ]);
    }
    //########################################
    include_once('/xampp/htdocs/merath/src/libs/connection.php');

    $stmt = db()->prepare(
        "SELECT * FROM users
WHERE id=:id"
    );
    $stmt->bindValue(':id',  $x);
    $stmt->execute();
    $users = $stmt->fetchAll();

    echo var_dump($inputs['username']);
    echo '################################################################';
    $info = array('username', 'email', 'password');
    $arrlength = (count($info));
    for ($i = 0; $i < $arrlength; $i++) {
           echo var_dump($inputs[$info[0]]);
            if (!($inputs[$info[$i]] == "")) {
                $users[0][$info[$i]] = $inputs[$info[$i]];
                echo var_dump($inputs[$info[$i]]);
            }
    }
    $pass=password_hash($users[0]['password'], PASSWORD_BCRYPT);
    //################################################
    if (!is_user_active($user)) {
        redirect_with_message(
            "/../merath/public/admin/edit_user.php?user_id=$x",
            'لا يمكنك تحرير مستخدم غير نشط',
            FLASH_ERROR
        );
    } else {
        update_user( $users[0]['username'],  $users[0]['email'],  $pass, $x);
        redirect_with_message(
            '/../../../merath/public/admin/ManageUser.php',
            'تم تحديث معلومات المستخدم',
            FLASH_SUCCESS
        );
    }
} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}
