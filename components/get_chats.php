<?php


    include '../common/db_connect.php';


    if(!isset($_GET['sid']) || !isset($_GET['rid']) || $_GET['sid']<1 || $_GET['rid']<1) {
        echo 'error';
        exit();
    }


        $tid= $_GET['sid']; //message to id
        $fid= $_GET['rid']; //message from id

        echo '<p id="message_body">';

        $varsql= 'SELECT * FROM chats WHERE (from_user="'.$fid.'" AND to_user="'.$tid.'") OR (from_user="'.$tid.'" AND to_user="'.$fid.'") ORDER BY id ASC';
        $res_all= $pdo->query($varsql);
        while($res_arr= $res_all->fetch()) {
            $whose_msg= 'my_message';
            if($res_arr['from_user']== $tid) {
                $whose_msg= 'his_message';
            }

            echo '<div class="one_message"><p class="message_text '.$whose_msg.'">'.$res_arr['message'].'</p></div>';
            
        }


        //echo '<div class="one_message '.$whose_msg.'"><span class="time">'.$res_arr['time'].'</span><p class="message">'.$res_arr['message'].'</p></div>';
            


?>