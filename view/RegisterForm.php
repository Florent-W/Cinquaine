<<<<<<< HEAD
<form action="index.php?action=register&controller=controllerLogin" method="post">
    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" maxlength="20" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" maxlength="20" required>
=======
<div class="container">
    <form action="index.php?action=register&controller=controllerLogin" method="post" class="loginform  ">
        <div class="form-group">
            <label for="uname"><b>Username :</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
        </div>

        <div class="form-group">
            <label for="psw"><b>Password :</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
        </div>
>>>>>>> 248ef211ebc2087395a3b3734a8cb4c3221e1a19

        <div class="form-group">
            <label for="email"><b>Email :</b></label>
            <input type="email" placeholder="Enter your mail" name="email" required>
        </div>

        <div class="form-group">
            <label for="phone_number"><b>Téléphone :</b></label>
            <input type="tel" placeholder="0768656887" name="phone_number" pattern="[0-9]{10}" required>
        </div>

        <button class="btn" type="submit">Inscription</button>
    </div>
    <div class="container" style="background-color:#f1f1f1">
        <span class="psw">Retour <a href="#">retour</a></span>
    </form>
</div>
