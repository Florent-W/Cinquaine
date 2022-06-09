<form action="view/Homepage.php" method="post">
    <div class="container">
        <form class="form-inline" action="/recherche/" method="get">
            <fieldset>
            <div class="input-group">
                <div class="input-group-prepend">
                <select id="oCategorie" name="oCategorie" class="form-control">
                    <option selected="selected" value="0">Catégorie</option>
                    <option value="1">Voyage</option>
                    <option value="5">Jeux</option>
                    <option value="3">Loisir</option>
                    <option value="4">Informatique</option>
                </select>
                </div>
                <input id="oSaisie" name="oSaisie" type="text" class="form-control" aria-label="Saisie de mots clés" required="required" placeholder="Saisie de mots clés . . .">
                <div class="input-group-append">
                <button class="btn btn-secondary" type="submit" style="width:200px">Recherche</button>
                </div>
            </div>
            </fieldset>
        </form>
    </div>
</form>