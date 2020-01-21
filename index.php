<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>PHP</title>
            <!--<link href="css/style.css" rel="stylesheet" type="text/css">
            <link href="css/normalize.css" rel="stylesheet" type="text/css">
            -->
            </head>
        <body>
             <?php 
             

             $driver = 'mysql';
             $host = 'localhost';
             $db_name = 'dynweb';
             $db_user = 'admin1';
             $db_pass = '123';
             $charset = 'utf8';
             $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    try {
            
             $pdo = new PDO("$driver:host=$host;dbname=$db_name; charset=$charset", $db_user, $db_pass, $options); 
            if (isset($_COOKIE['page_visit'])) {
                setcookie('page_visit', ++$_COOKIE['page_visit'], time() +3600);
            } else {
                setcookie('page_visit', 1, time()+3600);
                $_COOKIE['page_visit'] = 1;
            }
            session_start();
            }

    catch (PDOException $e) {
        die("Can' use it!");
    
    }

    //$sql = 'SELECT name FROM haribol WHERE duration =:duration';
    //$stmt = $pdo->prepare($sql);
    //$stmt->execute([':duration' => '141']);
    //$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //$sql_second = 'SELECT genre FROM haribol WHERE duration = ?';
   // $stmt_second =$pdo->prepare($sql_second);
    //$stmt_second->execute(['141']);
    //$rows_second = $stmt_second->fetchAll(PDO::FETCH_ASSOC);
    //echo '<pre>';
    //var_dump($rows_second);
    //$stmt_second->fetchAll(PDO::FETCH_ASSOC);
    //$xss_code = 'Hello!';
   // $user_input = '<script type="text/javascript"> 
    
             ?>
    <header></header>
    <main>
       
        <!-- /.container -->
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    </body>
</html>