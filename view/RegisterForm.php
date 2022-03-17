<?php

?>
<form action="index.php?action=register&controller=controllerLogin" method="post">
    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label for="psw"><b>Email</b></label>
        <input type="password" placeholder="Enter your mail" name="email" required>

        <label for="psw"><b>Phone number</b></label>
        <input type="password" placeholder="Enter your phone number" name="email" required>

        <button type="submit">Register</button>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <span class="psw">Retour <a href="#">retour</a></span>
    </div>
</form>