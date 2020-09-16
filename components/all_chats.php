<p>
    <form style="display:flex;">
        <input type="text" name="search_q" id="search_q" class="searchbar" style="flex:6" placeholder=" Search" autoComplete="off" />
        <input type="submit" value=" Search " id="search_btn" class="search_btn" style="flex:1" />
    </form>
</p>

<div id="search_results_container"></div>


<script type="text/javascript">

    let result_container= document.getElementById('search_results_container');

    result_container.innerHTML="";

    function render_search_res(json) {
        json.results.forEach(result => {
            if(result.id==<?php echo $_SESSION['user_id'];?>) return;
            console.log(result);
            result_container.innerHTML+='<div class="one_result"><a class="new_chat_link" href="./chat/?id='+result.id+'">'+result.username+'</a></div>';
            
        })
    }

    function search_for_people(e) {
        e?e.preventDefault():null;
        let query= document.getElementById('search_q').value;

        if(query.length == 0 && false) {
            document.getElementById('search_results_container').innerHTML="";
            return;
        }

        let xhr= new XMLHttpRequest();
        xhr.onreadystatechange= function() {
            if(this.readyState == 4 && this.status == 200) {
                render_search_res(JSON.parse(this.responseText));
            }
        }
        xhr.open("GET", "components/search.php?q="+query, true);
        xhr.send();
    }

    document.getElementById('search_btn').addEventListener('click', search_for_people, false);

</script>

<div class="old_chat_title">Old chats</div>

<?php

    $varsql= 'SELECT * FROM users WHERE id IN (SELECT to_user FROM chats WHERE from_user="'.$_SESSION['user_id'].'")';

    $res_all= $pdo->query($varsql);

    while($res_arr= $res_all->fetch()) {
        echo '<div class="chatlist"><a href="./chat/?id='.$res_arr['id'].'">'.$res_arr['username'].'</a></div>';
    }


?>