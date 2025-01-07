<?php
include __DIR__.'/../../app/database/db.php';


$errMsg = [];



// Функция для аутентификации пользователя
function userAuth($user)
{
        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['username'];
        $_SESSION['admin'] = $user['admin'];

        // Проверка на наличие прав администратора
        if ($_SESSION['admin']) {
            // Перенаправляем админа на страницу администрирования
            header('Location: ' . BASE_URL . "admin/posts/index.php");
        } else {
            // Перенаправляем обычного пользователя на главную страницу
            header('Location: ' . BASE_URL);
        }
    }

$users = selectAll('users');

// Код для регистрации
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['button-reg'])){


    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === ''){
        array_push($errMsg,"Не все поля заполнены!");
    }elseif (mb_strlen($login, 'UTF-8') < 2){
        array_push($errMsg,"Логин должен быть более двух символов!!!");
    }elseif ($passF !== $passS)
    {
        array_push($errMsg,"Пароли в обоих полях должны совпадать!!!");
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email){
            array_push($errMsg,"Пользователь с такой почтой уже существует!");
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
            userAuth($user);

        }
    }

    //$last_row = selectOne("users",["id"=>$id]);

} else {

    $login = '';
    $email = '';
}

 //$pass = password_hash($_POST['pass-second'] , PASSWORD_DEFAULT);

// Код для авторизации
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['button-log'])) {
    $email = trim($_POST['mail']);
    $pass = trim($_POST['password']);



    if($email === '' || $pass === '') {
        array_push($errMsg,"Не все поля заполнены!");
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if ($existence && password_verify($pass, $existence['password'])) {
            userAuth($existence);

        }else{
            array_push($errMsg,"Почта либо пароль введены неверно!");
        }
    }

}else{
    $email = '';
}

// Код для добавления пользователя в админке
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['create-user'])){


    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === ''){
        array_push($errMsg,"Не все поля заполнены!");
    }elseif (mb_strlen($login, 'UTF-8') < 2){
        array_push($errMsg,"Логин должен быть более двух символов!!!");
    }elseif ($passF !== $passS)
    {
        array_push($errMsg,"Пароли в обоих полях должны совпадать!!!");
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email){
            array_push($errMsg,"Пользователь с такой почтой уже существует!");
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $admin = 1;

            $user =  [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass

            ];

            $id = insert("users",$user);
            $user = selectOne('users', ['id' => $id]);
            userAuth($user);

        }
    }

    //$last_row = selectOne("users",["id"=>$id]);

} else {

    $login = '';
    $email = '';
}

//Удаление пользователя в админке
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('users', $id);
    header('location: ' . BASE_URL . 'admin/users/index.php');
}



//Редактирование пользователя через админку
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['edit_id'])) {
    $user = selectOne('users', ['id' => $_GET['edit_id']]);

    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['username'];
    $email = $user['email'];
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update-user'])) {
    $id = $_POST['id'];
    $mail = trim($_POST['mail']);
    $login = trim($_POST['login']);
    $PassF = trim($_POST['pass-first']);
    $PassS = trim($_POST['pass-second']);

    $admin = isset($_POST['admin']) ? 1 : 0;

    if ($login === '') {
        array_push($errMsg, "Не все поля заполнены!");
    } elseif (mb_strlen($login, 'UTF-8') < 2) {
        array_push($errMsg, "Логин должен быть более 2-ух символов!!!");
    } else {
        if (empty($PassF) || empty($PassS)) {
            if (isset($_POST['admin'])) {
                $admin = 1;
            }

            $user = [
                'admin' => $admin,
                'username' => $login
            ];
            update('users', $id, $user);
            header('Location: ' . BASE_URL . 'admin/users/index.php');
        } else {
            if ($PassF !== $PassS) {
                array_push($errMsg, "Пароли в обоих полях должны совпадать!!!");
            } else {
                $pass = password_hash($PassF, PASSWORD_DEFAULT);
                if (isset($_POST['admin'])) {
                    $admin = 1;
                }

                $user = [
                    'admin' => $admin,
                    'username' => $login,
                    'password' => $pass
                ];

                update('users', $id, $user);
                header('Location: ' . BASE_URL . 'admin/users/index.php');
            }
        }
    }
}