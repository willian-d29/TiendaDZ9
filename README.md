# Sistema de Tienda D29

Este es un proyecto de sistema de tienda en línea desarrollado con CodeIgniter 4. El sistema incluye funcionalidades tanto para administradores como para usuarios registrados, permitiendo la gestión de productos, clientes, ventas y más.

## Características

- **Administración de Productos**: Crear, editar, eliminar y listar productos.
- **Gestión de Clientes**: Crear, editar, eliminar y listar clientes.
- **Gestión de Ventas**: Crear, editar, eliminar y listar ventas.
- **Reportes**: Generar y exportar reportes en formatos PDF, XLS y HTML.
- **Interfaz de Usuario**: Ver productos, agregar al carrito, proceder al pago, y ver historial de pedidos.

## Prerrequisitos

- PHP 7.3 o superior
- Composer
- MySQL
- Git

## Instalación

1. **Clonar el repositorio**:
    ```sh
    git clone https://github.com/tu-usuario/tu-repositorio.git
    ```

2. **Navegar al directorio del proyecto**:
    ```sh
    cd tu-repositorio
    ```

3. **Instalar dependencias con Composer**:
    ```sh
    composer install
    ```

4. **Configurar el archivo `.env`**:
    - Copiar el archivo `.env.example` a `.env`:
        ```sh
        cp .env.example .env
        ```
    - Editar el archivo `.env` con la configuración de tu base de datos.

5. **Importar la base de datos**:
    - Abre tu herramienta de administración de base de datos (por ejemplo, phpMyAdmin).
    - Crea una nueva base de datos con el nombre `tienda02`.
    - Importa el archivo `tienda02.sql` que se encuentra en el directorio del proyecto:
        ```sh
        mysql -u tu_usuario -p tienda02 < database/tienda02.sql
        ```

6. **Ejecutar migraciones y seeders para crear las tablas en la base de datos**:
    ```sh
    php spark migrate
    php spark db:seed DatabaseSeeder
    ```

7. **Iniciar el servidor**:
    ```sh
    php spark serve
    ```

8. **Acceder a la aplicación en** `http://localhost:8080`.

## Estructura del Proyecto

- **app/Controllers**: Controladores de la aplicación.
- **app/Models**: Modelos de la aplicación.
- **app/Views**: Vistas de la aplicación.
- **public/**: Carpeta pública, contiene index.php.
- **writable/**: Carpeta para archivos de caché, logs, y sesiones.
- **database/tienda02.sql**: Archivo SQL para configurar la base de datos.

## Uso

### Administrador

1. **Iniciar sesión como administrador**.
2. **Gestionar productos**: Crear, editar y eliminar productos.
3. **Gestionar clientes**: Crear, editar y eliminar clientes.
4. **Gestionar ventas**: Crear, editar y eliminar ventas.
5. **Generar reportes**: Exportar reportes en PDF, XLS y HTML.

### Usuario Registrado

1. **Ver productos disponibles**.
2. **Agregar productos al carrito**.
3. **Proceder al pago**.
4. **Ver historial de pedidos**.

## Contribuir

Las contribuciones son bienvenidas. Puedes hacer un fork del repositorio, crear una rama, hacer tus cambios y enviar un pull request.

1. **Hacer fork del proyecto**.
2. **Crear una nueva rama** (`git checkout -b feature/nueva-funcionalidad`).
3. **Hacer commit de los cambios** (`git commit -m 'Agregar nueva funcionalidad'`).
4. **Hacer push a la rama** (`git push origin feature/nueva-funcionalidad`).
5. **Abrir un pull request**.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

