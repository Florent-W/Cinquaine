<div class="container">
    <form action="index.php?action=login&controller=controllerLogin" method="post" class="loginform">

        <div class="form-group">
            <label for="uname"><b>Username :</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
        </div>
        <div class="form-group">
            <label for="psw"><b>Password :</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
        </div>
        <button class="btn" type="submit">Connexion</button>
        <div class="form-check">
            <input type="checkbox" checked="checked" name="remember">
            <label>Remember me</label>
        </div>
        <div class="psw"><a href="#">Forgot password?</a></div>
    </form>
</div>