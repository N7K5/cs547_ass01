
<?php

    include './db_connect.php';

    
    $varsql= 'CREATE TABLE users (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        username TEXT NOT NULL UNIQUE,
        userpass TEXT NOT NULL
    )DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';

    try {
        $pdo->exec($varsql);
    } catch(Exceptiion $e) {
        echo "<br />Error creating DB USERES <br /><br />";
    }

    $varsql= 'CREATE TABLE chats (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        from_user INT NOT NULL,
        to_user INT NOT NULL,
        message TEXT NOT NULL,
        time TEXT NOT NULL,
        FOREIGN KEY (from_user) REFERENCES users(id),
        FOREIGN KEY (to_user) REFERENCES users(id)
    )DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';


    try {
        $pdo->exec($varsql);
    } catch(Exceptiion $e) {
        echo "<br />Error creating DB CHATS <br /><br />";
    }


    echo "<br />DONE CREATING TABLES................. <br /><br />";

?>