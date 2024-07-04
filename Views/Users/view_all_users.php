<?php
include('./Utils/header_admin.php');
// var_dump($users);
?>

<div class="table-responsive">
    <table id='table' class="table w-75 mx-auto">
    <h2 class="text-center">Liste des utilisateurs</h2>

        <thead>
            <!-- <th>id user</th> -->
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <!-- <th>pass</th> -->
            <th>role</th>
        </thead>
        <?php  foreach($users as $u ): ?>
        <tr>
            <!-- htmlspecialchars() pour éviter les problèmes de sécurité comme les attaques XSS. -->
            <!-- <td><?= htmlspecialchars($u->idUser) ?></td> -->
            <td><?= htmlspecialchars($u->lastname) ?></td>
            <td><?= htmlspecialchars($u->firstname) ?></td>
            <td><?= htmlspecialchars($u->email) ?></td>
            <!-- <td><?= htmlspecialchars($u->pswd) ?></td> -->
            <td><?= htmlspecialchars($u->role) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>       