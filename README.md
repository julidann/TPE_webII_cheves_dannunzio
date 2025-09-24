README: 
# TPE_webII_cheves_dannunzio

### Datos integrantes

  - Cheves Nicolas, nicocheves99@gmail.com
  - D'Annunzio Julieta, dannunzio.juelieta@gmail.com

### Temática del Trabajo Especial 
- Catálogo de productos para una tienda de dispositivos tecnológicos Apple.

### Descripción del tema
- Desarrollo de sitio web tipo catálogo para un local que vende dispositivos tecnológicos de la marca Apple.
- Todos los usuarios pueden visualizar los productos y sus categorías, pero solo el administrador puede crear, modificar o eliminar productos y categorías.
- Cada producto pertenece a una sola categoría, estableciendo una relación 1:N entre Categorías y Productos.
- Dentro de la tabla **categories**, encontramos el nombre y una breve descripción. (*Celulares*, *SmartWatch* y *Auriculares*).
- Dentro de la tabla **products*, encontramos el nombre, modelo y precio en U$D de cada uno. 

### Diagrama de entidad relacion (DER)
  - [DER](./DER.png)
  
### Tablas
- categories (Padre):
    - id_category (PK)          INT
    - name_category             VARCHAR
    - description_category      VARCHAR
  
- products (Hijo)
    - id_product  (PK)           INT
    - name_product               VARCHAR
    - model_product              VARCHAR
    - id_category (FK)           INT

### Código SQL
  - Exportado 'database.sql'
  - [devices.sql](./devices.sql)

