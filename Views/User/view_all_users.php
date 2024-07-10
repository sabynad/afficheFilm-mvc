<?php
include('./Utils/header_admin.php');
?>

<div class="table-responsive">
    <table id='table' class="table w-75 mx-auto">
        <h2 class="text-center">Liste des utilisateurs</h2>

        <thead class="table-warning">
            <!-- <th>id user</th> -->
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th>role</th>
        </thead>

        <?php  foreach($users as $u ): ?>

        <tbody class="table-group-divider">
            <tr>
                <!-- htmlspecialchars() pour éviter les problèmes de sécurité comme les attaques XSS. -->
                <!-- <td><?= htmlspecialchars($u->idUser) ?></td> -->
                <td><?= htmlspecialchars($u->lastname) ?></td>
                <td><?= htmlspecialchars($u->firstname) ?></td>
                <td><?= htmlspecialchars($u->email) ?></td>
                <td><?= htmlspecialchars($u->role) ?></td>      
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>       