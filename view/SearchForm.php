<section  class="py-5">
    <form action="index.php?controller=ControllerSearch&action=displaySearch" method="post">
        <div class="container">
            <form class="form-inline" action="/recherche/" method="get">
                <fieldset>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <select id="oCategorie" name="oCategorie" class="form-control">
                        <?php

                            $types = TypeService::getAllTypesServices();
                            $selectedCategoryId = $types[0]->getId();

                            if(isset($_POST["oCategorie"])) {
                                $selectedCategoryId = $_POST["oCategorie"];
                            }

                            for($i = 0; $i < count($types); $i++) {
                                if($types[$i]->getId() == $selectedCategoryId) {
                                    echo "<option selected='selected' value=".$types[$i]->getId().">".$types[$i]->getName()."</option>";
                                }
                                else {
                                    echo "<option value=".$types[$i]->getId().">".$types[$i]->getName()."</option>";
                                }
                            }
                        ?>
                        <!--
                        <option selected="selected"  value="2">Jeux</option>
                        <option value="3">Loisir</option>
                        <option value="4">Informatique</option>
                        -->
                    </select>
                    </div>
                    <input id="oSaisie" name="oSaisie" <?php if(isset($_POST["oSaisie"])) {echo "value=".$_POST["oSaisie"];} ?> type="text" class="form-control" aria-label="Saisie de mots clés" required="required" placeholder="Saisie de mots clés . . .">
                    <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit" style="width:200px">Recherche</button>
                    </div>
                </div>
                </fieldset>
            </form>
        </div>
    </form>
</section>