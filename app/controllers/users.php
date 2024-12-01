<?php
include __DIR__.'/../../app/database/db.php';


$errMsg = '';



if($_SERVER["REQUEST_METHOD"] === "POST"){

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($login, 'UTF-8') < 2){
        $errMsg = "Логин должен быть более двух символов!!!";
    }elseif ($passF !== $passS)
    {
        $errMsg = "Пароли в обоих полях должны совпадать!!!";
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email){
            $errMsg = "Пользователь с такой почтой уже существует!";
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post =  [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass

            ];

            $id = insert("users",$post);
            $user = selectOne('users', ['id' => $id]);


            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];

            if($_SESSION['admin']){
                header('Location: ' . BASE_URL . admin/admin.php);
            }else{
                header('Location: ' . BASE_URL);
            }




        }
    }

    //$last_row = selectOne("users",["id"=>$id]);

} else {

    $login = '';
    $email = '';
}

 //$pass = password_hash($_POST['pass-second'] , PASSWORD_DEFAULT);
