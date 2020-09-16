
<?php
    session_start();
    include './common/db_connect.php';
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Let's Chat
	</title>
	<link href="scripts/index.css" type="text/css" rel="stylesheet" />
	<link rel="icon" href="res/favicon.ico">
</head>

<body>

    <?php

        if(isset($_POST['submit_type']) && $_POST['submit_type']=='login') {
            echo("<p class='success'>Logged in.</p>");
            if(isset($_POST['user']) && isset($_POST['pass'])) {
                $varsql= 'SELECT id FROM users WHERE username="'.$_POST['user'].'" and userpass="'.$_POST['pass'].'"';
                $res_all= $pdo->query($varsql);
                if($res_arr= $res_all->fetch()) {
                    $_SESSION['user_id']= $res_arr['id'];
                } else {
                    echo("<p class='failure'>Invalid username or password.<br /> Please try again.</p>");
                }
            }

            

        }
        else if(isset($_POST['submit_type']) && $_POST['submit_type']=='signup') {
            if(isset($_POST['user']) && isset($_POST['pass'])) {
                $varsql= "INSERT INTO users(username, userpass) VALUES('".$_POST['user']."', '".$_POST['pass']."')";
                try {
                    $pdo->exec($varsql);
                    echo("<p class='success'>Account Created.<br /> Now login</p>");
                } catch(Exception $e) {
                    echo("<p class='failure'>Something went wrong.<br /> Account not created.</p>");
                }
            }
        }

    ?>


    <?php
        if(isset($_SESSION['user_id']) && $_SESSION['user_id']>0) {
            require './components/all_chats.php';
            // echo( $_SESSION['user_id']);
        } else {
            include './components/login.php';
        }
        


    ?>

</body>
</html>