<?php
require_once(dirname(__FILE__) . '/../Controller/MainController.php');
#Vista que controla los metodos soportados, post o get en este caso.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['nombre']) 
    && isset($_POST['editorial']) 
    && isset($_POST['categoria']) 
    && isset($_POST['paginas']))
    {
        $api = new MainController();
        $api->createBook($_POST['nombre'],$_POST['editorial'],$_POST['categoria'],$_POST['paginas']);
    }else{
        $response = [
            'status' => 'error',
            'message' => 'No todos los campos están declarados'
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    

}else{
    $api = new MainController();
    if(isset($_GET['id'])){
        $api->getBook($_GET['id']); #Método para obtener solo un libro
    }else{
        $api->getBooks(); #Método para obtener todos los libros
    }
}

?>