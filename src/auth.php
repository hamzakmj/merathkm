<?php

/**
 * Register a user
 *
 * @param string $email
 * @param string $username
 * @param string $password
 * @param bool $is_admin
 * @return bool
 */

function register_user(string $email, string $username, string $password, int $is_admin = 0, string $activation_code, int $expiry = 1 * 24  * 60 * 60): bool
{
    $sql = 'INSERT INTO users(username, email, password, activation_code, is_admin, activation_expiry)
            VALUES(:username, :email, :password,  :activation_code, :is_admin, :activation_expiry)';

    $statement = db()->prepare($sql);

    $statement->bindValue(':username', $username);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
    $statement->bindValue(':activation_code', password_hash($activation_code, PASSWORD_DEFAULT));
    $statement->bindValue(':is_admin', (int)$is_admin, PDO::PARAM_INT);
    $statement->bindValue(':activation_expiry', date('Y-m-d H:i:s',  time() + $expiry));


    return $statement->execute();
}
function find_user_by_username(string $username)
{
    $sql = 'SELECT username, password, active, email,is_admin,id
            FROM users
            WHERE username=:username';

    $statement = db()->prepare($sql);
    $statement->bindValue(':username', $username);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}
function find_user_by_id(string $id)
{
    $sql = 'SELECT id,username, password, active, email,is_admin
            FROM users
            WHERE id=:id';

    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function require_login(): void
{
    if (!is_user_logged_in()) {
        redirect_to('login.php');
    }
}
function current_user()
{
    if (is_user_logged_in()) {
        return $_SESSION['username'];
    }
    return null;
}

function is_user_admin($user)
{
    return (int)$user['is_admin'] === 1;
}

function is_user_admin_by_id($user_id)
{
    return (int)$user_id === 1;
}

function is_user_active($user)
{
    return (int)$user['active'] === 1;
}
function generate_activation_code(): string
{
    return bin2hex(random_bytes(16));
}
function send_activation_email(string $email, string $activation_code): void
{
    // create the activation link
    $activation_link = APP_URL . "/../merath/public/activate.php?email=$email&activation_code=$activation_code";

    // set email subject & body
    $subject = 'Please activate your account';
    $message = <<<MESSAGE
            Hi,
            Please click the following link to activate your account:
            $activation_link
            MESSAGE;
    // email header
    $header = "From:" . SENDER_EMAIL_ADDRESS;

    // send the email
    mail($email, $subject, nl2br($message), $header);
}

function send_support_email(string $email, string $messagek, string $name, $subject): void
{
    // set email subject & body

    $message = <<<MESSAGE
            $messagek
            MESSAGE;
    // email header
    $header = "From:" . SENDER_EMAIL_ADDRESS;

    // send the email
    mail($email, $subject, nl2br($message), $header);
}

function delete_user_by_id_notactive(int $id, int $active = 0)
{
    $sql = 'DELETE FROM users
            WHERE id =:id and active=:active';

    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->bindValue(':active', $active, PDO::PARAM_INT);

    return $statement->execute();
}
function delete_user_by_id(int $id)
{
    $sql = 'DELETE FROM users
            WHERE id =:id ';

    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    return $statement->execute();
}
function find_unverified_user(string $activation_code, string $email)
{

    $sql = 'SELECT id, activation_code, activation_expiry < now() as expired
            FROM users
            WHERE active = 0 AND email=:email';

    $statement = db()->prepare($sql);

    $statement->bindValue(':email', $email);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // already expired, delete the in active user with expired activation code
        if ((int)$user['expired'] === 1) {
            delete_user_by_id_notactive($user['id']);
            return null;
        }
        // verify the password
        if (password_verify($activation_code, $user['activation_code'])) {
            return $user;
        }
    }

    return null;
}
function activate_user(int $user_id): bool
{
    $sql = 'UPDATE users
            SET active = 1,
                activated_at = CURRENT_TIMESTAMP
            WHERE id=:id';

    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $user_id, PDO::PARAM_INT);
    user_info_default($user_id);
    return $statement->execute();
}

function log_user_in($user)
{
    // prevent session fixation attack
    session_regenerate_id();

    // set username in the session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    return true;
}
function is_user_logged_in_admin(): bool
{
    // check the session
    if (isset($_SESSION['is_admin'])) {
        return true;
    }

    // check the remeber_me in cookie
    $token = filter_input(INPUT_COOKIE, 'remrmber_me', FILTER_SANITIZE_STRING);

    if ($token && token_is_valid($token)) {

        $user = find_user_by_token($token);

        if ($user) {
            return log_user_in($user);
        }
    }
    return false;
}
function update_user(string $username, string $email, string $password, int $id)
{
    password_hash($password, PASSWORD_BCRYPT);
    $data = [
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'id' => $id
    ];
    $sql = "UPDATE users SET username=:username, email=:email, password=:password WHERE id=:id";
    $stmt = db()->prepare($sql);
    $stmt->execute($data);
}
function user_info(string $name, int $age, int $phone_number, string $nationality, string $user_img): bool
{
    $sql = 'INSERT INTO user_info(name, age,phone_number,nationality, user_img)
            VALUES(:name, :age, :phone_number, :nationality, :user_img)';

    $statement = db()->prepare($sql);

    $statement->bindValue(':name', $name);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':phone_number', $phone_number);
    $statement->bindValue(':nationality', $nationality);
    $statement->bindValue(':user_img', $user_img);


    return $statement->execute();
}
function user_info_default(int $user_info_id)
{
    $data = [
        'name' => 'name',
        'age' => '0',
        'phone_number' => '0',
        'nationality' => 'natio',
        'user_img' => 'img',
        'user_info_id'=>$user_info_id
    ];
    $sql = 'INSERT INTO user_info(name, age, phone_number, nationality, user_img, user_info_id)
            VALUES(:name, :age, :phone_number,  :nationality, :user_img, :user_info_id)';

    $statement = db()->prepare($sql);
    $statement->execute($data);
}
function update_user_info(string $name, int $age, int $phone_number, string $nationality, string $user_img,int $user_info_id)
{

        $data = [
            'name' => $name,
            'age' => $age,
            'phone_number' => $phone_number,
            'nationality' => $nationality,
            'user_img' => $user_img,
            'user_info_id'=>$user_info_id
        ];
        $sql = "UPDATE user_info SET name=:name, age=:age, phone_number=:phone_number, nationality=:nationality, user_img=:user_img  WHERE user_info_id=:user_info_id";
        $stmt = db()->prepare($sql);
        $stmt->execute($data);

}
