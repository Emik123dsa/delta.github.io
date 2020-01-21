<?php 
    $json = file_get_contents('../list.json');
    $json = json_decode($json);

    $message = '';
    $message .= '<h1> Заказ </h1>';
    $message .='<p> Телефон:'.$_POST['phone'].'</p>';
    $message .= '<p> Name: '.$_POST['surname'].'</p>';
    $message .= '<p> Почта: '.$_POST['email'].'</p>';
    $cart = $_POST['cart'];
    print_r($message);
    //print_r($cart);
?>