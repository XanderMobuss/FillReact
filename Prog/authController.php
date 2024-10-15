<?php
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    if(isset($_POST('action'))){
        $action= $_POST('action');

        $authController = new authController();

    
    switch ($action){

    case 'login':

    
        $email = $ POST('correo');
        $password = $ POST ('contrasenia');

        authController=($email,$password);
        break;

    case 'logout':
        $authController ->logout();
        break;

        
    default:
        echo 'No válida.'
        break:
    }
}
    else {
        echo "No se ha especificado ninguna acción.";
    }
}:







class authController
{
    session_start();
    public function login($email=null,$password=null){

    }

    
    

}