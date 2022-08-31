<?php
//require __DIR__ . '/../../merath/src/bootstrap.php';

$errors = [];
$inputs = [];

if (is_post_request()) {
    $fields = [
        'username' => 'string    | unique: users, username',
        'age' => 'int  ',
        'phone_number' => 'string ',
        'nationality' => 'string  ',
        'user_img' => 'string  ',
    ];
    [$inputs, $errors] = filter($_POST, $fields);

    include_once('/xampp/htdocs/merath/src/libs/connection.php');
    $y = find_user_by_username($_SESSION['username']);
    $r = $y['id'];
    $stmt = db()->prepare(
        "SELECT * FROM user_info
  WHERE user_info_id=:user_info_id"
    );
    $stmt->bindValue(':user_info_id', $r);
    $stmt->execute();
    $users = $stmt->fetchAll();
    $x = $_POST['user_id'];
    echo var_dump($inputs['username']);
    echo '################################################################';
    $info=array('name','age','phone_number','nationality','user_img');
    $infon='username';
    $arrlength=(count($info));
    for($i=0;$i<$arrlength;$i++){
        if($i==0)
        {
            echo var_dump($inputs[$infon]);
            if(!($inputs[$infon]=="")){
                $users[0][$info[$i]]=$inputs[$infon];
                echo var_dump($inputs[$infon]);
            }
        }else{
        echo var_dump($inputs[$info[0]]);
        if(!($inputs[$info[$i]]=="")){
            $users[0][$info[$i]]=$inputs[$info[$i]];
            echo var_dump($inputs[$info[$i]]);
        }
    }
    }

    if ($errors) {
         redirect_with('/../../../merath/public/user/number6_edit.php', ['errors' => $errors, ]);
        //echo var_dump($inputs);
    }

    if (update_user_info($users[0]['name'], $users[0]['age'], $users[0]['phone_number'], $users[0]['nationality'], $users[0]['user_img'], $x));
    //echo var_dump($inputs);
    redirect_with_message('/../../../merath/public/user/number6.php', 'تم تحديث معلومات المستخدم', FLASH_SUCCESS);
} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}
