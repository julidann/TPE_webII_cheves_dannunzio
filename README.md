README: 
# TPE_webII_cheves_dannunzio

º Datos integrantes

  - Cheves Nicolas, nicocheves99@gmail.com
  - D'Annunzio Julieta, dannunzio.juelieta@gmail.com

º Temática del Trabajo Especial 
- Catálogo de productos para una tienda de dispositivos tecnológicos.

º Descripción del tema
- Desarrollo de sitio web tipo catálogo para un local que vende dispositivos tecnológicos.
- Todos los usuarios pueden visualizar los productos y sus categorías, pero solo el administrador puede crear, modificar o eliminar productos y categorías.
- Cada producto pertenece a una sola categoría, estableciendo una relación 1:N entre Categorías y Productos.

º Diagrama de entidad relacion (DER)
  -Adjuntado DER.png
  
º Tablas
- categories (Padre):
    - id_category (PK)          INT
    - name_category             VARCHAR
    - description_category      VARCHAR
  
- products (Hijo)
    - id_product  (PK)           INT
    - name_product               VARCHAR
    - model_product              VARCHAR
    - id_category (FK)           INT

º Código SQL
  - Exportado 'database.sql'

