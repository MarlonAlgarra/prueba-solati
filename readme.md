# Prueba Técnica: Solati.

Se desarrolla una aplicación web con arquitectura MVC, con una solución orientada a un servicio tipo rest para la consulta de una tabla en una base de datos.

El modelo creado para la comunicación con la tabla se desarrolló con el patrón DAO.

Para el desarrollo de las clases se tuvo en cuenta el patrón de diseño Singleton.

Base de datos creada en postgres con el nombre "solati" y la única tabla llamada "books".

SQL de la tabla: 

"CREATE TABLE books (
  id serial PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  editorial VARCHAR(50) NOT NULL,
  categoria VARCHAR(30) NOT NULL,
  numero_paginas INT NOT NULL
);"

El archivo config.php se creó para facilitar la edición y configuración de credenciales para la base de datos.