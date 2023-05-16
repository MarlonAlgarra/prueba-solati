<?php
include_once(dirname(__FILE__) . '/Database.php');

// Clase DAO para el acceso a datos
class Books
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getBookById($id)
    {
        $query = "SELECT * FROM books WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllBooks()
    {
        $query = "SELECT * FROM books";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $books = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $books[] = [
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'categoria' => $row['categoria'],
                'numero_paginas' => $row['numero_paginas']
            ];
        }
        return $books;
    }

    public function createBook($nombre, $editorial, $categoria, $paginas){
        $sql = "INSERT INTO books (nombre, editorial, categoria, numero_paginas) 
                VALUES (:nombre, :editorial, :categoria, :paginas)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':editorial', $editorial);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':paginas', $paginas);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
?>