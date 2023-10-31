<?php
    require_once "../HELPERS/AUTOLOAD.php";
    AUTOLOAD::AutoLoad();
    
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $id = $_GET['id'];
        $user = USER_REPOSITORY::FindBy($id);
    
        if ($user === false) {
            echo json_encode(array("success" => false));
        } else {
            $userData = array(
                "id" => $user->getId(),
                "username" => $user->getUsername(),
                "password" => $user->getPassword(),
                "rol" => $user->getRol()
            );
    
            echo json_encode($userData);
        }
    }






?>