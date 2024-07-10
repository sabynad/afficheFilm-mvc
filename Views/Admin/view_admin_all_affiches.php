<?php
// var_dump($affiches)
?>
<div class="card-container " > 
    <?php foreach ($affiches as $a): ?>
        <!-- <?php var_dump($a); ?> -->

        <div class="card " style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center"><?= $a->titre ?></h5>
                <p class="card-text "><u>Description:</u> <?= $a->description ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $a->categorie ?></li>
                <li class="list-group-item"><?= $a->theme ?></li>
                <li class="list-group-item"><?= $a->prix ?> €</li>
            </ul>
            <div class="card-body">
                <a href="?controller=admin&action=formulaire_update_affiche" class="btn btn-success">Update</a>
            </div>
        </div>

    <?php endforeach; ?>
</div>