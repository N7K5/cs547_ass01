
<?php
    include '../common/db_connect.php';

    date_default_timezone_set("Asia/Kolkata");
    $date= date("l jS \of F Y h:i:s A");

    if(!isset($_GET['from']) || !isset($_GET['to']) || !isset($_GET['message'])) {
        echo 'none';
        exit();
    }

    $varsql= 'INSERT INTO chats(from_user, to_user, message, time) values("'.$_GET['from'].'", "'.$_GET['to'].'", "'.$_GET['message'].'", "'.$date.'")';

    $pdo->exec($varsql);

    echo 'ok';

?>