

<form  class="" action="?controller=admin&action=admin_all_affiches" method="POST">
    
    <div class="mb-3">
        <label for="checkbox" class="form-label">Titre </label>
        <input type="text" class="form-control" id="t" name="titre" value=" <?=$affiche[0]->titre?>">
    </div>

    <div class="mb-3">
        <label for="checkbox" class="form-label">Thème </label>
        <input type="text" class="form-control" id="th" name="Theme" value=" <?=$affiche[0]->Theme?>">
    </div>

    <div class="mb-3">
        <label for="checkbox" class="form-label">Catégorie</label>
        <input type="text" class="form-control" id="c" name="categorie" value=" <?=$affiche[0]->categorie?>">
    </div>

    <div class="mb-3">
        <label for="checkbox" class="form-label">Année de sortie</label>
        <input type="text" class="form-control" id="a" name="anneeSortie" value=" <?=$affiche[0]->anneeSortie?>">
    </div>

    <div class="mb-3">
        <label for="checkbox" class="form-label">Descritpion</label>
        <input type="text" class="form-control" id="d" name="description" value=" <?=$affiche[0]->description?>">
    </div>

    <div class="mb-3">
        <label for="checkbox" class="form-label">Prix</label>
        <input type="text" class="form-control" id="p" name="Prix" value=" <?=$affiche[0]->Prix?>">
    </div>

    <div class="mb-3">
        <label for="checkbox" class="form-label">Image</label>
        <input type="text" class="form-control" id="i" name="imageName" value=" <?=$affiche[0]->imageName?>">
    </div>

    <div class="mb-3">
        <input type="hidden" class="form-control" id="idAffiche" name="idAffiche" value="<?=$affiche[0]->idAffiche?>">
    </div>



    <div class="mb-5">
    <button type="submit" class="nb-5 btn btn-primary">Submit</button>
    </div>
</form>