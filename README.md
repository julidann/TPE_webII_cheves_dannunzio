README: 
# TPE_webII_cheves_dannunzio

### Datos integrantes

  - Cheves Nicolas, nicocheves99@gmail.com
  - D'Annunzio Julieta, dannunzio.julieta@gmail.com

### NUEVO REPOSITORIO CON EL TPE PARTE 3 REST
https://github.com/julidann/TPEREST_WEBII_Cheves_DAnnunzio
---
### Temática del Trabajo Especial 
- Catálogo de productos para una tienda de dispositivos tecnológicos Apple.
  
### Descripción del tema
- Desarrollo de sitio web tipo catálogo para un local que vende dispositivos tecnológicos de la marca Apple.
- Todos los usuarios pueden visualizar los productos y sus categorías, pero solo el administrador puede crear, modificar o eliminar productos y categorías, una vez que inicie sesión. 
- Cada producto pertenece a una sola categoría, estableciendo una relación 1:N entre Categorías y Productos.
- Dentro de la tabla **categories**, encontramos el nombre, una breve descripción y una imagen. (*Celulares*, *SmartWatch* y *Auriculares*).
- Dentro de la tabla **products**, encontramos el nombre, modelo, imagen y precio en U$D de cada uno. 

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

- Users
    - id (PK)                    INT
    - name                       VARCHAR
    - password                   VARCHAR

### Código SQL
  - [SQL](database/devices.sql)
---
### Instrucciones para importar la base de datos en PHPMyAdmin

  - Abrir phpMyAdmin en el navegador.
  - Crear una nueva base de datos llamada **devices**.
  - Selecciona la base de datos **devices**
  - Hacer clic en la pestaña Importar.
  - Hacer clic en Seleccionar archivo y elige el archivo database/devices.sql de este proyecto.
  - Presiona Continuar para importar las tablas y datos.
---
### Iniciar sesión:
Usuario : webadmin
Contraseña : admin
---
### Explicación del directorio /templates: 

#### HOME

| Archivo | Descripción |
| :--- | :--- |
| `home.phtml` | Plantilla principal para la **Página de Inicio** (Home). |

---

#### PRODUCTOS

| Tipo de Vista | Archivo | Descripción |
| :---: | :--- | :--- |
| **Listado** | `products.phtml` | Muestra el listado general de todos los productos. |
| **Detalle** | `products.detail.phtml` | Presenta la información detallada de un producto específico. |
| **Formulario** | `form.add.product.phtml` | Formulario para la **creación** de un nuevo producto. |
| **Formulario** | `form.edit.product.phtml` | Formulario para la **edición** de un producto existente. |

---

#### CATEGORÍAS

| Tipo de Vista | Archivo | Descripción |
| :---: | :--- | :--- |
| **Listado** | `categories.phtml` | Muestra el listado general de todas las categorías. |
| **Detalle** | `categories.detail.phtml` | Presenta la información detallada de una categoría específica. |
| **Formulario** | `form.add.categories.phtml` | Formulario para la **creación** de una nueva categoría. |
| **Formulario** | `form.edit.categories.phtml` | Formulario para la **edición** de una categoría existente. |

---










