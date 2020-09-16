
<p id="forms">

    <form method="post" id="login_form">
        <p class="details_line">Log into your account:</p>
        <input type="hidden" name="submit_type" value="login" /> <br />
        <input class="input_field" type="text" name="user" placeholder="Enter username" autocomplete="off" /> <br />
        <input class="input_field" type="password" name="pass" placeholder="Enter Password" autocomplete="off" /> <br />
        <button class="input_btn2" id="signup_instead"> Create Account</button>
        <input class="input_btn" type="submit" value="Log in" />
    </form>



    <form method="post" id="signup_form">
        <p class="details_line">Create_new_account:</p>
        <input type="hidden" name="submit_type" value="signup" /> <br />
        <input class="input_field" type="text" name="user" placeholder="Enter username" autocomplete="off" /> <br />
        <input class="input_field" type="password" name="pass" placeholder="Enter Password" autocomplete="off" /> <br />
        <input class="input_field" type="password" name="pass2" placeholder="ReType Password" autocomplete="off" /> <br />
        <button class="input_btn2" id="login_instead"> Login instead </button>
        <input class="input_btn" type="submit" value="Sign up" />
    </form>

</p>


<script>

let login_form= document.getElementById('login_form')
let signup_form= document.getElementById('signup_form')

document.getElementById('signup_instead').addEventListener('click', e => {
    e.preventDefault();
    login_form.style.display="none";
    signup_form.style.display="block";
},false);

document.getElementById('login_instead').addEventListener('click', e => {
    e.preventDefault();
    login_form.style.display="block";
    signup_form.style.display="none";
},false);


</script>