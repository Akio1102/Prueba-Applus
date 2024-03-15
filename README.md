# Prueba-Applus

## Tabla Contenido

1. [CRUD PRODUCTOS](#crud-productos)
1. [GESTION DE BIBLIOTECAS](#gestion-de-bibliotecas)

## CRUD PRODUCTOS

### Descripción

Este proyecto consiste en una aplicación web para la gestión de productos, donde los usuarios pueden realizar operaciones como agregar, editar y eliminar productos. La aplicación está diseñada para ser utilizada por administradores de una tienda en línea.

### Explicación del Proyecto

1. [Requisitos Previos](#requisitos-previos)
2. [Caracteristicas principales](#características-principales)
3. [Tecnologias Utilizadas](#tecnologías-utilizadas)
4. [Uso del Proyecto](#uso)
5. [Estructura del Proyecto](#estructura-del-proyecto)
6. [Explicacion FrontEnd](#explicacion-frontend)
7. [Explicacion BackEnd](#explicacion-backend)
8. [EndPoints](#endpoints)

### Requisitos Previos

- PHP
- MySQL
- Servidor web (por ejemplo, Apache)

### Características Principales

- **Agregar producto**: Los usuarios pueden agregar nuevos productos proporcionando información como el código, nombre, categoría y precio del producto.
- **Editar producto**: Se permite la edición de productos existentes para actualizar su información, como el nombre, la categoría y el precio.
- **Eliminar producto**: Los usuarios pueden eliminar productos que ya no deseen mantener en la tienda.
- **Visualización de productos**: La aplicación proporciona una lista de productos disponibles para que los usuarios puedan ver rápidamente qué productos están disponibles en la tienda.

### Tecnologías Utilizadas

- **Frontend**: La interfaz de usuario está desarrollada utilizando AngularJS para el framework de frontend, HTML, CSS y Bootstrap para el diseño y estilos.
- **Backend**: El backend de la aplicación está desarrollado en PHP utilizando el patrón de arquitectura MVC (Modelo-Vista-Controlador).
- **Base de datos**: Se utiliza MySQL como base de datos para almacenar la información de los productos.

### Uso

Entrar al Siguiente enlace para poder Observar el Proyecto

```
http://localhost/Prueba-Applus/Frontend/
```

### Estructura del Proyecto

El proyecto se divide en varias partes principales:

1. [**Frontend**](./Frontend/): Contiene la interfaz de usuario de la aplicación desarrollada en AngularJS.
2. [**Backend**](/Backend/): Incluye los scripts PHP que se encargan de manejar las peticiones del frontend y realizar operaciones en la base de datos.
3. [**Base de datos**](./Backend/Database/): Contiene el esquema de la base de datos MySQL utilizado para almacenar la información de los productos.

### Explicacion FrontEnd

Contiene todos los archivos relacionados con la interfaz de usuario de la aplicación desarrollada en AngularJS. A continuación, se presenta una descripción de los principales archivos y su funcionalidad:

- [**index.html**](./Frontend/index.html): Este archivo es el punto de entrada de la aplicación y contiene la estructura básica del documento HTML, así como los enlaces a los scripts y estilos necesarios.

- [**app.js**](./Frontend/app.js): Aquí se define el módulo principal de la aplicación AngularJS y la configuración general de la aplicación.

- [**Controllers/**](./Frontend/controllers/): Esta carpeta contiene todos los controladores de AngularJS utilizados en la aplicación. Cada controlador se encarga de manejar la lógica de una vista específica.

- [**Services/**](./Frontend/services/): Aquí se encuentran los servicios de AngularJS que se utilizan para realizar solicitudes HTTP al backend y gestionar la lógica de negocio de la aplicación.

- [**Views/**](./Frontend/views/): En esta carpeta se almacenan todas las vistas HTML de la aplicación. Cada archivo HTML corresponde a una página o componente específico de la interfaz de usuario.

La estructura del proyecto en la carpeta frontend sigue las mejores prácticas recomendadas para el desarrollo de aplicaciones web con AngularJS, lo que facilita la comprensión y el mantenimiento del código.

### Explicacion BackEnd

Contiene todos los archivos relacionados con el backend de la aplicación desarrollada en PHP. A continuación, se presenta una descripción de los principales archivos y su funcionalidad:

- [**Controllers/**](./Backend/Controllers/): En esta carpeta se encuentran los controladores PHP que manejan las solicitudes HTTP del frontend y realizan operaciones en la base de datos. Cada controlador corresponde a un recurso específico de la aplicación, como productos o categorías.

- [**Models/**](./Backend/Models/): Aquí se almacenan los modelos PHP que representan las entidades de la base de datos, como productos y categorías. Estos modelos se utilizan para interactuar con la base de datos y realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) en los datos.

- [**Database/**](./Backend/Database/): Contiene el esquema de la base de datos MySQL utilizado para almacenar la información de los productos y categorías. Además, incluye un archivo `pdo.php` que configura la conexión a la base de datos utilizando PDO (PHP Data Objects).

La estructura del proyecto en la carpeta backend sigue las mejores prácticas recomendadas para el desarrollo de aplicaciones web con PHP, lo que facilita la organización y el mantenimiento del código.

### Endpoints

Para cambiar entre consultas de la Tabla Categoria o Producto se cambia la siguiente parte y la Opcion es la que nos especifica que tipo de consulta vamos a

| Operación      | Método HTTP | Descripción                                                                                        | Endpoint                                                                                |
| -------------- | ----------- | -------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------- |
| `Productos`    |             |                                                                                                    |                                                                                         |
| Obtener Todos  | GET         | Obtiene todos los productos.                                                                       | `http://localhost/Prueba-Applus/Backend/Controllers/producto.controller.php?op=GetAll`  |
| Obtener por ID | GET         | Obtiene un producto por su ID. Se envía el ID del producto en el body.                             | `http://localhost/Prueba-Applus/Backend/Controllers/producto.controller.php?op=GetId`   |
| Agregar        | POST        | Agrega un nuevo producto. Se envía la información del producto en el body.                         | `http://localhost/Prueba-Applus/Backend/Controllers/producto.controller.php?op=Post`    |
| Actualizar     | PUT         | Actualiza un producto existente. Se envía la información del producto actualizado en el body.      | `http://localhost/Prueba-Applus/Backend/Controllers/producto.controller.php?op=Put`     |
| Eliminar       | DELETE      | Elimina un producto. Se envía el ID del producto en el body.                                       | `http://localhost/Prueba-Applus/Backend/Controllers/producto.controller.php?op=Delete`  |
| `Categorias`   |             |                                                                                                    |                                                                                         |
| Obtener Todos  | GET         | Obtiene todas las categorías.                                                                      | `http://localhost/Prueba-Applus/Backend/Controllers/categoria.controller.php?op=GetAll` |
| Obtener por ID | GET         | Obtiene una categoría por su ID. Se envía el ID de la categoría en el body.                        | `http://localhost/Prueba-Applus/Backend/Controllers/categoria.controller.php?op=GetId`  |
| Agregar        | POST        | Agrega una nueva categoría. Se envía la información de la categoría en el body.                    | `http://localhost/Prueba-Applus/Backend/Controllers/categoria.controller.php?op=Post`   |
| Actualizar     | PUT         | Actualiza una categoría existente. Se envía la información de la categoría actualizada en el body. | `http://localhost/Prueba-Applus/Backend/Controllers/categoria.controller.php?op=Put`    |
| Eliminar       | DELETE      | Elimina una categoría. Se envía el ID de la categoría en el body.                                  | `http://localhost/Prueba-Applus/Backend/Controllers/categoria.controller.php?op=Delete` |

## GESTION DE BIBLIOTECAS

### Consulta 1

Esta consulta recupera información sobre los préstamos de libros, incluyendo el título y autor del libro, el nombre completo del usuario que realizó el préstamo, la fecha de préstamo y la fecha de devolución. Para ello, utiliza las siguientes tablas:

- `prestamo`: Contiene información sobre los préstamos realizados, incluyendo el ID del libro prestado, el ID del usuario que realizó el préstamo, la fecha de préstamo y la fecha de devolución (si está disponible).
- `libro`: Contiene detalles sobre los libros, incluyendo el título y el autor del libro.
- `usuario`: Almacena información sobre los usuarios del sistema, como el nombre y apellido del usuario.

La consulta utiliza la cláusula `JOIN` para combinar las tablas `prestamo`, `libro` y `usuario` según los ID correspondientes. Luego, utiliza la función `CONCAT` para unir el nombre y apellido del usuario en un solo campo. Finalmente, selecciona los campos relevantes para la salida.

### Consulta 2

Esta consulta busca los préstamos de libros que aún no han sido devueltos y que fueron realizados hace más de 7 días. Para ello, utiliza las mismas tablas que la consulta anterior (`prestamo`, `libro` y `usuario`) y las combina mediante la cláusula `JOIN`.

Además, utiliza una cláusula `WHERE` para filtrar los resultados y seleccionar solo aquellos préstamos que se realizaron hace más de 7 días (usando la función `DATE_SUB` para restar 7 días de la fecha actual) y que aún no han sido devueltos (la fecha de devolución es `NULL`).

La consulta selecciona los campos relevantes para la salida, incluyendo el título y autor del libro, el nombre completo del usuario y la fecha de préstamo.
