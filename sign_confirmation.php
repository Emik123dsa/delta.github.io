<?php 
    require_once 'index.php';

    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    if(!empty($login) && !empty($password)) {
        $sql = 'SELECT login, password FROM users WHERE login = :login';

        $params = [':login' => $login];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
       
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        //var_dump($password);
        if ($user) {
            if (password_verify($password, $user->password)) {
                header('Location: admin.php');
                $_SESSION['user_login'] = $user->login;
            } else {
                echo 'Not correct!';
            }
        } else {
           echo 'Not correct!'; 
        }
    } else {
        echo " DOESN'T EXIST! ";
    }
    
?>