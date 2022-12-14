<?php
function generate_tokens(): array
{
    $selector =bin2hex(random_bytes(16));
    $validator = bin2hex(random_bytes(32));
    
    return [$selector,$validator,$selector.':'.$validator];
}
function parse_token(string $token): ?array
{
    $parts = explode(':',$token);

    if($parts && count($parts)== 2){
        return [$parts[0], $parts[1]];
    }
    return null;
}

function insert_user_token(int $user_id, string $selector, string $hashed_validator,string $expiry): bool
{
    $sql='INSERT INTO user_tokens(user_id,selector,hashed_validator,expiry)
    VALUES(:user_id,:selector,:hashed_validator,:expiry)';

    $statement = db()->prepare($sql);

    $statement->bindValue(':user_id',$user_id);
    $statement->bindValue(':selector',$selector);
    $statement->bindValue(':hashed_validator',$hashed_validator);
    $statement->bindValue(':expiry',$expiry);

    return $statement->execute();
}

function find_user_token_by_selector(string $selector)
{
    $sql='SELECT id, selector, hashed_validator, user_id, expiry
    FRPM user_tokens
    WHERE selector = :selector ADN
    expiry >= now()
    LIMIT 1';
    $statement=db()->prepare($sql);

    $statement->bindValue(':selector',$selector);

    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function delete_user_token(int $user_id): bool
{
    $sql='DELETE FROM user_tokens WHERE user_id=:user_id';
    $statement = db()->prepare($sql);
    $statement->bindValue(':user_id',$user_id);
    return $statement->execute();
}

function find_user_by_token(string $token)
{
    $tokens= parse_token($token);

    if(!$tokens){
        return null;
    }
    $sql ='SELECT user_id, username
    FROM users
    INNER JOIN user_tokens ON user_id= user.id
    WHERE selector = :selector AND
    expiry >now()
    LIMIT 1';

    $statement = db()->prepare($sql);
    $statement->bindValue(':selector', $tokens[0]);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function logout(): void
{
    if(is_user_logged_in()){

        //delete the user token
        //delete_user_token($_SESSION['user_id']);

        //delete session
        unset($_SESSION['username'], $_SESSION['user_id']);

        //remove the remmember_me cookie
        if(isset($_COOKIE['remember_me'])){
            unset($_COOKIE['remember_me']);
            setcookie('remember_user',null, -1);
        }

    }
    if(!is_user_logged_in()){
        unset($_SESSION['username'], $_SESSION['user_id']);
        session_destroy();
        redirect_to('/merath/public/main.php');
    }
}


function is_user_logged_in(): bool
{
    // check the session
    if(isset($_SESSION['username'])){
        return true;
    }

    // check the remeber_me in cookie
    $token = filter_input(INPUT_COOKIE, 'remrmber_me', FILTER_SANITIZE_STRING);

    if($token && token_is_valid($token)){

        $user= find_user_by_token($token);

        if($user){
            return log_user_in($user);
        }
    }
    return false;
}

function token_is_valid(string $token): bool
{  
    [$selector, $validator] = parse_token($token);
    $tokens = find_user_token_by_selector($selector);
    if (!$tokens) {
        return false;
    }

}
function remember_me(int $user_id, int $day = 30)
{
    [$selector, $validator, $token] = generate_tokens();

    // remove all existing token associated with the user id
    delete_user_token($user_id);

    // set expiration date
    $expired_seconds = time() + 60 * 60 * 24 * $day;

    // insert a token to the database
    $hash_validator = password_hash($validator, PASSWORD_DEFAULT);
    $expiry = date('Y-m-d H:i:s', $expired_seconds);

    if (insert_user_token($user_id, $selector, $hash_validator, $expiry)) {
        setcookie('remember_me', $token, $expired_seconds);
    }
}
function login(string $username, string $password, bool $remember = false): bool
{

    $user = find_user_by_username($username);

    // if user found, check the password
    if ($user && is_user_active($user) && password_verify($password, $user['password'])) {

        log_user_in($user);

        if ($remember) {
            remember_me($user['id']);
        }

        return true;
    }

    return false;
}