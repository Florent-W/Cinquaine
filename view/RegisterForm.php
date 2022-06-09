<form action="index.php?action=register&controller=controllerLogin" method="post">
    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" maxlength="20" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" maxlength="20" required>

        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter your mail" name="email" required>

        <label for="phone_number"><b>Phone number</b></label>
        <input type="tel" placeholder="0768656887" name="phone_number" pattern="[0-9]{10}" required>

        <button type="submit">Register</button>
        <label>

        </label>
    </div>
    <div class="container" style="background-color:#f1f1f1">
        <span class="psw">Retour <a href="#">retour</a></span>
    </div>
</form>