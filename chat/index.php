
<?php
    session_start();
    include '../common/db_connect.php';
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Let's Chat
	</title>
	<link href="../scripts/index.css" type="text/css" rel="stylesheet" />
	<link rel="icon" href="../res/favicon.ico">
</head>

<body>

    <?php
        if(!isset($_GET['id']) || $_GET['id']<1 || !isset($_SESSION['user_id'])) {
            echo ("<p class='failure'>Oops,<br /> Something went wrong.</p>");
            echo "<br /><a style='font-size:200%;' href='../'>Goto home</a>";
            exit();
        }
        $varsql= 'SELECT username FROM users WHERE id="'.$_GET['id'].'"';
        $res= $pdo->query($varsql)->fetch();
        echo '<p class="header">'.$res["username"].'</p>';

    ?>

    <a class="home_btn" href="../" >Home</a>

    <p id="message_body">
        a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />a<br />
    <br /><br /><br /><br /><br /><br /><br /><br /><br />
    </p>

    <form style="display:flex;" class="message_form">
        <input type="text" name="message" id="message" class="searchbar" style="flex:5" placeholder=" Type Here" autoComplete="off" />
        <input type="submit" value=" Send " id="send_btn" class="search_btn" style="flex:1" />
    </form>



</body>

    <script type="text/javascript">



        function update_msg() {
            let xhr= new XMLHttpRequest();
            xhr.onreadystatechange= function() {
                if(this.readyState == 4 && this.status == 200) {
                    // alert(this.responseText)
                    let old_scrl_height= document.getElementById("message_body").scrollHeight;
                    document.getElementById("message_body").innerHTML= this.responseText+"<br /><br /><br /><br /><br /><br /><br /><br /><br />";
                    let new_scrl_height= document.getElementById("message_body").scrollHeight;
                    // console.log(new_scrl_height);
                    if(old_scrl_height != new_scrl_height) {
                        window.scrollTo(0, 99999);
                    }
                }
            }
            xhr.open("GET", "../components/get_chats.php?sid=<?php echo $_GET['id'] ;?>&rid=<?php echo $_SESSION['user_id'] ?>", true);
            xhr.send();
        }

        window.onload=() => {
            update_msg();
        }

        let msg= document.getElementById('message');


        function send_msg(from, to, msg, done_fn) {
            let xhr= new XMLHttpRequest();
            xhr.onreadystatechange= function() {
                if(this.readyState == 4 && this.status == 200) {
                    // alert(this.responseText)
                    // document.getElementById("message_body").innerHTML= this.responseText;
                    done_fn();
                }
            }
            xhr.open("GET", "../components/send_msg.php?to="+to+"&from="+from+"&message="+msg, true);
            xhr.send();
        }

        document.getElementById('send_btn').addEventListener('click', e => {
            e.preventDefault();
            let msg_txt= msg.value.replace(/script/g, "");
            msg.value= "";
            send_msg(<?php echo $_SESSION['user_id']; ?>,<?php echo $_GET['id'] ;?>, msg_txt, () => {
                update_msg();
                
            } )
        }, false);

        setInterval(() => {
            update_msg();
        }, 2000);

    </script>
</html>