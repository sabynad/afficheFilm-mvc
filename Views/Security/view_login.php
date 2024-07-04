<?php
    // session_start(); //on la declare juste dans le header
  

    $_SESSION['email'] = $user->email;
    $_SESSION['nom'] = $user->lastname;
    $_SESSION['prenom'] = $user->firstname;
    $_SESSION['role'] = $user->role;
    $_SESSION['id'] = $user->idUser;

    

