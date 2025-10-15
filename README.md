README: 
# TPE_webII_cheves_dannunzio

### Datos integrantes

  - Cheves Nicolas, nicocheves99@gmail.com
  - D'Annunzio Julieta, dannunzio.julieta@gmail.com

### Temática del Trabajo Especial 
- Catálogo de productos para una tienda de dispositivos tecnológicos Apple.

### Descripción del tema
- Desarrollo de sitio web tipo catálogo para un local que vende dispositivos tecnológicos de la marca Apple.
- Todos los usuarios pueden visualizar los productos y sus categorías, pero solo el administrador puede crear, modificar o eliminar productos y categorías.
- Cada producto pertenece a una sola categoría, estableciendo una relación 1:N entre Categorías y Productos.
- Dentro de la tabla **categories**, encontramos el nombre y una breve descripción. (*Celulares*, *SmartWatch* y *Auriculares*).
- Dentro de la tabla **products**, encontramos el nombre, modelo y precio en U$D de cada uno. 

### Diagrama de entidad relacion (DER)
  - [DER](./DER.png)
  
### Tablas
- categories (Padre):
    - id(PK)                    INT
    - name                      VARCHAR
    - description               VARCHAR
  
- products (Hijo)
    - id(PK)                     INT
    - name                       VARCHAR
    - model                      VARCHAR
    - id_category (FK)           INT

### Código SQL
  - [SQL](./devices.sql)


# README PARA MODIFICAR:

## EXPLICACIÓN DE LAS CARPETAS

#### TPE WEB 2 

- **app** 

    - controllers
        - *category.controller.php*
        - *products.controller.php*
        - **//agregar usuario controller**
    - models
        - *category.model.php*
        - *products.model.php*
        - **//agregar usuario model**
    - views
        - *category.view.php*
        - *products.view.php*
        - **//agregar usuario view**
- **css**
    - *style.css* 
- **database**
    - *devices.sql*
- **templates**
    - **layout**
        - *header.php*  **//AGERGAR COSAS**
        - *footer.php*  **// AGREGAR COSAS**
    - *categories.table.php* **// RECHEQUEAR**
    - *products.table.php*
    - **//HAY QUE AGREGAR EL FORM DE INICIO DE SESIÓN**
- *.htaccess*
- *README.md*
- *router.php*


//ver el tema de style.css
Tabla fue cambiado a containers 



