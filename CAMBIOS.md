# Nico
- (A) Listado de ítems: Se debe poder visualizar todos los ítems cargados
- (A) Detalle de ítem: Se debe poder navegar y visualizar cada ítem particularmente
- (A) El usuario administrador debe loguearse con usuario y contraseña. 
  - Debe exisitir al menos un administrador con usuario “webadmin” y contraseña “admin” para pruebas.
- (A) Administrar Ítems (entidad del lado N de la relación).
  - Lista de Items (Noticias/Productos/…)
  - Agregar Items (Noticias/Productos/…)
  - Eliminar Items (Noticias/Productos/…)
  - Editar Items (Noticias/Productos/…)

# Juli

- (B) Listado de categorías: Se debe poder visualizar un listado con todas las categorías cargadas
- (B) Listado de ítems por categoría: Se debe poder visualizar los ítems perteneciente a una categoría seleccionada
- (B) El usuario debe poder desloguearse (logout)
- (B) Administrar Categorías (entidad del lado 1 de la relación)
  - Lista de Categorías
  - Agregar Categorías
  - Eliminar Categorias
  - Editar Categorías.
  - Se puede subir una foto cuando se crea el ítem o categoría (Puede cargarse por url).

## HAY QUE VER LA RUTA
- <img width="670" height="108" alt="image" src="https://github.com/user-attachments/assets/7cdce30b-4282-4d62-abad-546e70d1cddd" />

## Se modificaron:
- Archivos .php a .phtml
- Todos los request_once con .phtml
## Se agregó en APP
  - Carpeta middlewares
  - Templates
    - main.phtml --> ESTO VER SI ES NECESARIO!!
    - form.login.phtml
    - categories.table.phtml --> VER COMO IMPRIMIRLA! SI TABLA O CARDS 
  - MVC USER creación:
    - Archivo auth.controler.php
    - Archivo user.model.php
    - Archivo auth.view.php
  - Actualización:
    - categories.controller.php --> HAY QUE VER LA FUNCIÓN UPDATE SI ESTÁ BIEN
## Hay que modificar 
- Archivo router.php (con el $request)
- Css (tema boostrap)
- Eliminar comentarios // MVC
## Tablas SQL
- Agregué en php myadmin la tabla de usuarios (despues subo el sql) 
    - id users password
    - Ver si necesitan Forein Keys
 
<img width="733" height="119" alt="image" src="https://github.com/user-attachments/assets/a0e090ac-9453-4f4d-87ce-5fa3b661f9db" />



