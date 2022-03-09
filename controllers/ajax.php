<?php

if (isset($_POST['ope']) && $_POST['ope'] != '') {

    require_once('../models/usuarios.model.php');

    switch ($_POST['ope']) {

            /** Guardar nuevo usuario */
        case 1:

            $apellidos = $_POST['apellidos'];
            $nombres = $_POST['nombres'];

            $user = new Usuarios('', $nombres, $apellidos, $apellidos);

            echo json_encode($user->saveUser($user));
            break;
            /** Obtener todos los usuarios */
        case 2:

            $user = new Usuarios();

            echo json_encode($user->getAllUsers());

            break;
    }
}
