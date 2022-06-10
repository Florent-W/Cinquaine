<style>
    .nav-item:nth-child(1){
        background: rgba(31, 101, 126, 0.6);
    }
</style>
<section  class="py-5">
    <form action="index.php?controller=ControllerSearch&action=displaySearch" method="get">
        <div class="container">
            <form class="form-inline" action="/recherche/" method="get">
                <input type="hidden" name="controller" value="ControllerSearch">
                <input type="hidden" name="action" value="displaySearch">

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
                    </select>
                    </div>
                        <input id="oSaisie" name="oSaisie"
                        <?php
                        if(isset($_POST["oSaisie"]))
                        {
                            $saisie = htmlspecialchars($_POST["oSaisie"]);

                            echo " value='";
                            echo $saisie;
                            echo "'";
                        }
                        ?> type="text" class="form-control" aria-label="Saisie de mots clés" required="required" placeholder="Saisie de mots clés . . .">
                        <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit" style="width:200px">Recherche</button>
                    </div>
                </div>
                </fieldset>
            </form>
        </div>
    </form>
</section>