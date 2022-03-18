<script type="text/javascript" src="js/toggle.js" defer></script>
<style>
    input::-ms-reveal,
    input[type="password"]::-ms-clear {
        display: none;
    }
</style>
<div class="container" style="max-width: 800px">
    <form action="./index.php" method="post">
        <input type="hidden" name="controller" value="userController">
        <input type="hidden" name="action" value="update">
        <!-- <input type="hidden" name="id" value="<//?php echo $user->getId(); ?>"> -->
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="firstname" required>
                    <label for="firstname">Prenom</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="lastname">
                    <label for="lastname" class="form-label">Nom</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="email">
                    <label for="email" class="form-label">Email</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="tel" name="phonenumber" class="form-control" id="phonenumber" placeholder="phonenumber">
                    <label for="phonenumber" class="form-label">Numero de telephone</label>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="input-group" id="new-password-group">
                <div class="form-floating flex-grow-1">
                    <input type="password" name="new_password" class="form-control password" id="new-password" placeholder="password">
                    <label for="new-password">Nouveau mot de passe</label>
                </div>
                <button type="button" class="btn btn-outline-secondary toggle">
                    <i class="bi bi-eye bi-eye-slash"></i>
                </button>
            </div>
        </div>
        <hr>
        <div class="mb-3">
            <div class="input-group">
                <div class="form-floating flex-grow-1">
                    <input type="password" name="password" class="form-control password" id="current-password" placeholder="password" required>
                    <label for="current-password">Mot de passe actuel</label>
                </div>
                <button type="button" class="btn btn-outline-secondary toggle">
                    <i class="bi bi-eye bi-eye-slash"></i>
                </button>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="submit">Confirmer</button>
    </form>
</div>