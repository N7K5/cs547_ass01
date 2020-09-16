

<?php

    include '../common/db_connect.php';

    $q= "";
    if(isset($_GET['q'])) {
        $q= $_GET['q'];
    }


    $varsql= 'SELECT * FROM users WHERE username like "'.$q.'%" limit 10';

    $res_all= $pdo->query($varsql);

    $cur_json='{"results": [';
    $more_than_one_res= false;
    while($res_arr= $res_all->fetch()) {
        if($more_than_one_res) {
            $cur_json.=',';
        }
        $cur_json.='{';
        $cur_json.='"username":"'.$res_arr['username'].'",';
        $cur_json.='"id":"'.$res_arr['id'].'"';
        $cur_json.='}';
        $more_than_one_res= true;
    }
    $cur_json.="]}";

    echo($cur_json);



    

?>