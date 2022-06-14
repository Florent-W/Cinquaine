<style>
    .nav-item:nth-child(1){
        background: rgba(31, 101, 126, 0.6);
    }
</style>
<section  class="py-5">
    <form action="index.php?controller=ControllerSearch&action=displaySearch" method="get">
        <div class="container searchform">
            <form class="form-inline" action="/recherche/" method="get">
                <input type="hidden" name="controller" value="ControllerSearch">
                <input type="hidden" name="action" value="displaySearch">

                <fieldset>
                <div class="form-group row">
                <div class="col-md-2">
                    <div class="input-group-prepend">
                    <select id="oCategorie" name="oCategorie" class="form-control col-sm-2">
                        <?php

                            $types = TypeService::getAllTypesServices();
                            $selectedCategoryId = $types[0]->getId();

                            if(isset($_GET["oCategorie"])) {
                                $selectedCategoryId = $_GET["oCategorie"];
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
                </div>
                    <div class="col-md-7">
                        <input id="oSaisie" name="oSaisie"
                        <?php
                        if(isset($_GET["oSaisie"]))
                        {
                            $saisie = htmlspecialchars($_GET["oSaisie"]);

                            echo " value='";
                            echo $saisie;
                            echo "'";
                        }
                        ?> type="text" class="form-control" aria-label="Saisie de mots clés" required="required" placeholder="Saisie de mots clés . . ." class="col-sm-10">
                        
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-secondary" type="submit" class="col-sm-3">Recherche</button>
                    </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </form>
</section>