<?php
require_once(dirname(__FILE__) . '/../Model/Books.php');

class MainController
{
    private $books;

    public function __construct()
    {
        $this->books = new Books(); #Iniciación del modelo
    }

    public function getBook($id) #Método para obtener un libro por el id
    {
        $book = $this->books->getBookById($id);
        if ($book) {
            $response = [
                'status' => 'success',
                'data' => $book
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Libro no encontrado'
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function getBooks() #Método para obtener todos los libros
    {
        $books = $this->books->getAllBooks();
        if ($books) {
            $response = [
                'status' => 'success',
                'data' => $books
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Error inesperado'
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    #Método para crear un libro en la base de datos
    public function createBook($nombre, $editorial, $categoria, $paginas){ 
        $create = $this->books->createBook($nombre, $editorial, $categoria, $paginas);

        if($create){
            $response = [
                'status' => 'success',
                'message' => 'Libro creado satisfactoriamente'
            ];
        }else {
            $response = [
                'status' => 'error',
                'message' => 'Error creando el libro'
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}


?>