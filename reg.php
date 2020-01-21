<?php 
    require_once 'index.php';
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql_check = 'SELECT EXISTS(SELECT login FROM users WHERE login = :login)';
    $params_check = [':login' => $login];
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute($params_check);
    if ($stmt_check->fetchColumn() ){
        die('It"s existing already :"( ');
    } 
    $sql = 'INSERT INTO users(login, password) VALUES(:login, :password)';
    $params = [':login' => $login, ':password' => $password];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    //$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo 'Hello, '.$login. ' !';
?>