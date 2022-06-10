<div class="container">
    <form action="index.php?action=login&controller=controllerLogin" method="post" class="loginform">

        <div class="form-group">
            <label for="uname" ><b>Login :</b></label>
            <input type="text" placeholder="Entrer le login" name="uname" required>
        </div>
        <div class="form-group">
            <label for="psw"><b>Mot de passe :</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="psw" required>
        </div>
        <button class="btn" type="submit">Connexion</button>
        <div><button class="btn btnregister"><a class="btn" href="index.php?controller=controllerLogin&action=displayRegister">Inscription</a></button></div>
        <div class="form-check">
            <input type="checkbox" checked="checked" name="remember">
            <label>Se souvenir de moi</label>
        </div>
        <div class="psw"><a href="#">Mot de passe oublié?</a></div>
        
    </form>
</div>